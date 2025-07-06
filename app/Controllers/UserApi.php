<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class UserApi extends ResourceController
{
    public function index()
    {
        try {
            $userModel = new UserModel();
            $db = \Config\Database::connect();
            
            // Check if tables exist
            $users = $db->table('users u')
                ->select('u.user_ID, u.full_name, u.email, u.tier_ID, u.payment_status, u.membership_expiry, t.tier_name')
                ->join('tier t', 'u.tier_ID = t.tier_ID', 'left')
                ->get()->getResultArray();
                
            log_message('debug', 'Users query result: ' . json_encode($users));
            
            $result = [];
            foreach ($users as $row) {
                // Calculate countdown
                $today = date_create(date('Y-m-d'));
                $expiry = date_create($row['membership_expiry']);
                $interval = $expiry && $row['membership_expiry'] ? date_diff($today, $expiry) : false;
                $countdown = ($interval && !$interval->invert) ? $interval->days . ' days' : '0 days';
                $result[] = [
                    'id' => $row['user_ID'],
                    'name' => $row['full_name'],
                    'email' => $row['email'],
                    'tier' => $row['tier_name'],
                    'tier_ID' => $row['tier_ID'],
                    'payment' => $row['payment_status'],
                    'expiry' => $row['membership_expiry'],
                    'countdown' => $countdown
                ];
            }
            return $this->respond($result);
        } catch (\Exception $e) {
            log_message('error', 'Error in UserApi index: ' . $e->getMessage());
            return $this->fail('Database error: ' . $e->getMessage(), 500);
        }
    }

    public function updateTier()
    {
        $data = $this->request->getJSON();
        $id = $data->id ?? null;
        $tier = $data->tier ?? null;
        if (!$id || $tier === null) {
            return $this->fail('Missing user ID or tier.', 400);
        }
        $db = \Config\Database::connect();
        $updated = $db->table('users')->where('user_ID', $id)->update(['tier_ID' => $tier]);
        return $this->respond(['success' => $updated]);
    }

    public function updateStatusBulk()
    {
        $data = $this->request->getJSON();
        $updates = $data->updates ?? [];
        $db = \Config\Database::connect();
        $success = true;
        foreach ($updates as $u) {
            $fields = ['payment_status' => $u->status];
            if ($u->status === 'paid') {
                $fields['membership_expiry'] = date('Y-m-d', strtotime('+30 days'));
                $fields['mem_countdown'] = 30;
            } elseif ($u->status === 'unpaid') {
                $fields['membership_expiry'] = null;
                $fields['mem_countdown'] = 0;
            }
            $ok = $db->table('users')->where('user_ID', $u->id)->update($fields);
            if (!$ok) $success = false;
        }
        return $this->respond(['success' => $success]);
    }

    public function test()
    {
        try {
            $db = \Config\Database::connect();
            $userCount = $db->table('users')->countAllResults();
            $tierCount = $db->table('tier')->countAllResults();
            
            return $this->respond([
                'success' => true,
                'user_count' => $userCount,
                'tier_count' => $tierCount,
                'message' => 'Database connection successful'
            ]);
        } catch (\Exception $e) {
            return $this->fail('Database error: ' . $e->getMessage(), 500);
        }
    }
}
