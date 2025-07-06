<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Payment extends ResourceController
{
    public function create()
    {
        $user_id = $this->request->getVar('user_id');
        $amount = floatval($this->request->getVar('amount'));
        $new_tier = (int) $this->request->getVar('tier');
        $db = \Config\Database::connect();
        
        // Debug logging
        log_message('info', "Payment create called - user_id: $user_id, amount: $amount, new_tier: $new_tier");
        
        // Fetch user's current tier_ID
        $user = $db->table('users')->where('user_ID', $user_id)->get()->getRowArray();
        $tier_ID = $user ? (int) $user['tier_ID'] : null;
        
        log_message('info', "Current user tier: $tier_ID, new tier: $new_tier");

        // If a new tier is provided, update the user's tier_ID
        if ($new_tier !== null && $new_tier != $tier_ID) {
            $update_result = $db->table('users')->where('user_ID', $user_id)->update(['tier_ID' => $new_tier]);
            log_message('info', "Tier update result: " . ($update_result ? 'success' : 'failed'));
            $tier_ID = $new_tier;
            
            // Update session with new tier
            if (session()->get('user_id') == $user_id) {
                session()->set('tier_ID', $new_tier);
                log_message('info', "Session updated with new tier: $new_tier");
            }
        }

        // If amount is 0 (free tier), skip payment processing
        if ($amount == 0) {
            // Insert into payments table with 0 amount
            $reference = "FREE" . strtoupper(uniqid());
            $notes = "Free tier upgrade";
            $payment_insert = $db->table('payments')->insert([
                'user_ID' => $user_id,
                'tier_ID' => $tier_ID,
                'amount' => 0,
                'status' => 'completed',
                'payment_date' => date('Y-m-d'),
                'reference' => $reference,
                'notes' => $notes
            ]);
            
            log_message('info', "Payment insert result: " . ($payment_insert ? 'success' : 'failed'));

            // Update user payment status
            $status_update = $db->table('users')->where('user_ID', $user_id)->update([
                'payment_status' => 'paid',
                'membership_expiry' => date('Y-m-d', strtotime('+30 days')),
                'mem_countdown' => 30
            ]);
            
            log_message('info', "Status update result: " . ($status_update ? 'success' : 'failed'));

            return $this->respond(['success' => true, 'message' => 'Free upgrade successful!']);
        }

        // Regular payment processing for paid tiers
        $card_number = $expiry_date = $cvv = null;
        $saved_card_id = $this->request->getVar('saved_card');
        if ($saved_card_id) {
            // Use saved card
            $card = $db->table('credit_card')->where('card_id', $saved_card_id)->where('user_ID', $user_id)->get()->getRowArray();
            if (!$card) {
                return $this->fail('Selected card not found.', 400);
            }
            $card_number = $card['card_number'];
            $expiry_date = $card['expiry_date'];
            $cvv = $card['cvv'];
        } else {
            // Use new card
            $card_number = preg_replace('/\D/', '', $this->request->getVar('card_number'));
            $expiry_date = $this->request->getVar('expiry_date') . "-01";
            $cvv = preg_replace('/\D/', '', $this->request->getVar('cvv'));
            // Insert new card
            $db->table('credit_card')->insert([
                'user_ID' => $user_id,
                'card_number' => $card_number,
                'expiry_date' => $expiry_date,
                'cvv' => $cvv
            ]);
        }

        // Insert into payments table
        $reference = "TXN" . strtoupper(uniqid());
        $notes = "Paid via card";
        $db->table('payments')->insert([
            'user_ID' => $user_id,
            'tier_ID' => $tier_ID,
            'amount' => $amount,
            'status' => 'completed',
            'payment_date' => date('Y-m-d'),
            'reference' => $reference,
            'notes' => $notes
        ]);

        // Update user payment status
        $db->table('users')->where('user_ID', $user_id)->update([
            'payment_status' => 'paid',
            'membership_expiry' => date('Y-m-d', strtotime('+30 days')),
            'mem_countdown' => 30
        ]);

        return $this->respond(['success' => true, 'message' => 'Payment successful!']);
    }
}
