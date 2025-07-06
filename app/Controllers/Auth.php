<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth extends BaseController
{
    use ResponseTrait;

    public function signup()
    {
        $rules = [
            'full_name' => 'required',
            'phone_num' => 'required',
            'address' => 'required',
            'DOB' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required',
            'tier' => 'required',
        ];
        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors(), 400);
        }
        $userModel = new UserModel();
        $tier = ucfirst(strtolower(trim($this->request->getVar('tier'))));
        $db = \Config\Database::connect();
        $tierRow = $db->table('tier')->where('tier_name', $tier)->get()->getRowArray();
        if (!$tierRow) {
            return $this->fail('Invalid tier selected.', 400);
        }
        $data = [
            'full_name' => $this->request->getVar('full_name'),
            'phone_num' => $this->request->getVar('phone_num'),
            'address' => $this->request->getVar('address'),
            'DOB' => $this->request->getVar('DOB'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'mem_countdown' => 30,
            'membership_expiry' => date('Y-m-d', strtotime('+30 days')),
            'tier_ID' => $tierRow['tier_ID'],
            'payment_status' => strtolower($tier) === 'normal' ? 'paid' : 'unpaid',
        ];
        $userModel->insert($data);
        $userId = $userModel->getInsertID();
        if (strtolower($tier) === 'normal') {
            return $this->respondCreated([
                'user_id' => $userId,
                'redirect' => base_url('homepage'),
                'message' => 'User registered successfully.'
            ]);
        } else {
            // Get tier price from DB
            $tierCost = $db->table('tier')->where('tier_name', $tier)->get()->getRowArray();
            $amount = $tierCost ? $tierCost['member_cost'] : 0;
            return $this->respondCreated([
                'user_id' => $userId,
                'redirect' => base_url('payment?user_id=' . $userId . '&amount=' . $amount),
                'amount' => $amount,
                'message' => 'User registered, please proceed to payment.'
            ]);
        }
    }

    public function login()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];
        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors(), 400);
        }
        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getVar('email'))->first();
        if (!$user || !password_verify($this->request->getVar('password'), $user['password'])) {
            return $this->fail('Invalid email or password.', 401);
        }
        
        // Set session data for server-side authentication
        $session = session();
        $session->set([
            'user_id' => $user['user_ID'],
            'user_email' => $user['email'],
            'user_name' => $user['full_name'],
            'tier_ID' => $user['tier_ID']
        ]);
        
        $key = getenv('JWT_SECRET') ?: 'supersecretkey';
        $payload = [
            'iss' => base_url(),
            'sub' => $user['user_ID'],
            'email' => $user['email'],
            'role' => ($user['email'] === 'vibevolley@gmail.com') ? 'admin' : 'user',
            'iat' => time(),
            'exp' => time() + 3600
        ];
        $token = JWT::encode($payload, $key, 'HS256');
        $redirect = ($user['email'] === 'vibevolley@gmail.com') ? base_url('admin') : base_url('homepage');
        return $this->respond([
            'token' => $token,
            'user' => [
                'user_ID' => $user['user_ID'],
                'full_name' => $user['full_name'],
                'email' => $user['email'],
                'tier_ID' => $user['tier_ID'],
                'role' => $payload['role']
            ],
            'redirect' => $redirect
        ]);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/homepage')->with('success', 'You have been logged out successfully.');
    }
}
