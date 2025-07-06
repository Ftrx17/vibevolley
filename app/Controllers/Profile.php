<?php
namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        // If no user is logged in, redirect to login page
        if (!$this->isLoggedIn()) {
            return redirect()->to('/login')->with('error', 'Please log in to access your profile.');
        }
        
        $user = $this->getCurrentUser();
        
        // If user not found in database, clear session and redirect
        if (!$user) {
            session()->destroy();
            return redirect()->to('/login')->with('error', 'User session expired. Please log in again.');
        }
        
        $userId = session()->get('user_id');
        $db = \Config\Database::connect();
        $orders = $db->table('orders')->where('user_id', $userId)->orderBy('created_at', 'DESC')->get()->getResultArray();
        $cards = $db->table('credit_card')->where('user_ID', $userId)->get()->getResultArray();
        
        // Calculate membership countdown
        $today = date_create(date('Y-m-d'));
        $expiry = $user['membership_expiry'] ? date_create($user['membership_expiry']) : null;
        $interval = $expiry ? date_diff($today, $expiry) : false;
        $countdown = ($interval && !$interval->invert) ? $interval->days . ' days' : '0 days';
        
        return view('profile', [
            'user' => $user,
            'orders' => $orders,
            'cards' => $cards,
            'countdown' => $countdown,
            'membership_expiry' => $user['membership_expiry']
        ]);
    }

    public function addCard()
    {
        try {
            // Only allow logged-in users
            if (!$this->isLoggedIn()) {
                return $this->response->setJSON(['success' => false, 'message' => 'Please log in to add a card.']);
            }

            // Accept JSON AJAX requests
            $input = $this->request->getJSON();
            if ($input) {
                $userId = session()->get('user_id');
                $card_number = isset($input->card_number) ? preg_replace('/\D/', '', $input->card_number) : '';
                $expiry_date = isset($input->expiry) ? $input->expiry . '-01' : '';
                $cvv = isset($input->cvv) ? preg_replace('/\D/', '', $input->cvv) : '';

                if (!$card_number || !$expiry_date || !$cvv) {
                    return $this->response->setJSON(['success' => false, 'message' => 'All fields are required.']);
                }

                $db = \Config\Database::connect();
                $insertData = [
                    'user_ID' => $userId,
                    'card_number' => $card_number,
                    'expiry_date' => $expiry_date,
                    'cvv' => $cvv
                ];
                $result = $db->table('credit_card')->insert($insertData);
                if ($result) {
                    return $this->response->setJSON(['success' => true, 'message' => 'Card added successfully!']);
                } else {
                    return $this->response->setJSON(['success' => false, 'message' => 'Failed to add card to database.']);
                }
            }

            // Fallback for non-JSON requests
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request.']);
        } catch (\Exception $e) {
            log_message('error', 'Add card error: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An error occurred while adding your card. Please try again.']);
        }
    }

    public function test()
    {
        log_message('debug', 'Test method called');
        
        if ($this->request->getMethod() === 'post') {
            log_message('debug', 'POST data received in test: ' . json_encode($this->request->getPost()));
            return 'POST data received: ' . json_encode($this->request->getPost());
        }
        
        return 'Test route working - GET method';
    }
}
