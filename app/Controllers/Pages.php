<?php
namespace App\Controllers;

class Pages extends BaseController
{
    public function homepage()
    {
        return view('homepage');
    }
    public function login()
    {
        return view('login');
    }
    public function payment()
    {
        $cards = [];
        $user_id = $this->request->getGet('user_id') ?? session()->get('user_id');
        if ($user_id) {
            $db = \Config\Database::connect();
            $cards = $db->table('credit_card')->where('user_ID', $user_id)->get()->getResultArray();
        }
        return view('payment', ['cards' => $cards]);
    }
    public function productPage()
    {
        return view('ProductPage');
    }
    public function signup()
    {
        return view('signup');
    }
    public function admin()
    {
        // Check if user is admin
        if (!session()->get('user_id') || session()->get('user_email') !== 'vibevolley@gmail.com') {
            return redirect()->to('/login')->with('error', 'Admin access required.');
        }

        $db = \Config\Database::connect();
        
        // Get statistics
        $total_users = $db->table('users')->countAllResults();
        $total_products = $db->table('products')->countAllResults();
        $total_orders = $db->table('orders')->countAllResults();
        
        // Count active members (members with valid membership)
        $active_members = $db->table('users')
            ->where('membership_expiry >=', date('Y-m-d'))
            ->where('payment_status', 'paid')
            ->countAllResults();
        

        
        return view('admin_dashboard', [
            'total_users' => $total_users,
            'total_products' => $total_products,
            'total_orders' => $total_orders,
            'active_members' => $active_members
        ]);
    }

    public function adminMembers()
    {
        // Check if user is admin
        if (!session()->get('user_id') || session()->get('user_email') !== 'vibevolley@gmail.com') {
            return redirect()->to('/login')->with('error', 'Admin access required.');
        }
        
        return view('admin');
    }
    public function trainingPage()
    {
         /* $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/login')->with('error', 'Please log in to access training.');
        }
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($session->get('user_id'));
        if (!$user || $user['tier_ID'] == 1) { // Assuming tier_ID 1 is normal tier
            return redirect()->to('/homepage')->with('error', 'Upgrade your membership to access training.');
        }*/
        return view('trainingPage');
    }
    public function resources()
    {
        return view('Resources');
    }
    public function upgradeTier()
    {
        $db = \Config\Database::connect();
        $tiers = $db->table('tier')->select('tier_ID, tier_name, member_cost')->get()->getResultArray();
        $current_tier = null;
        if (session()->get('user_id')) {
            $user = $db->table('users')->where('user_ID', session()->get('user_id'))->get()->getRowArray();
            $current_tier = $user ? $user['tier_ID'] : null;
        }
        return view('upgrade_tier', ['tiers' => $tiers, 'current_tier' => $current_tier]);
    }
}