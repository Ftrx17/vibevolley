<?php
namespace App\Controllers;

class Debug extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');
        
        echo "<h2>Debug Information</h2>";
        echo "<p><strong>Session user_id:</strong> " . ($userId ?? 'null') . "</p>";
        echo "<p><strong>Is Logged In:</strong> " . ($this->isLoggedIn() ? 'Yes' : 'No') . "</p>";
        
        if ($userId) {
            try {
                $db = \Config\Database::connect();
                $user = $db->table('users')->where('user_ID', $userId)->get()->getRowArray();
                echo "<p><strong>User found in DB:</strong> " . ($user ? 'Yes' : 'No') . "</p>";
                if ($user) {
                    echo "<p><strong>User name:</strong> " . $user['full_name'] . "</p>";
                    echo "<p><strong>User email:</strong> " . $user['email'] . "</p>";
                }
                
                // Check credit card table structure
                echo "<hr><h3>Credit Card Table Structure</h3>";
                $cards = $db->table('credit_card')->where('user_ID', $userId)->get()->getResultArray();
                echo "<p><strong>Number of cards:</strong> " . count($cards) . "</p>";
                if (!empty($cards)) {
                    echo "<p><strong>Card fields:</strong> " . implode(', ', array_keys($cards[0])) . "</p>";
                    echo "<p><strong>First card data:</strong> " . json_encode($cards[0]) . "</p>";
                } else {
                    echo "<p>No credit cards found for this user.</p>";
                }
                
            } catch (\Exception $e) {
                echo "<p><strong>Database error:</strong> " . $e->getMessage() . "</p>";
            }
        }
        
        echo "<p><strong>Cart items:</strong> " . count(session()->get('cart') ?? []) . "</p>";
        
        echo "<hr>";
        echo "<p><a href='/homepage'>Back to Homepage</a></p>";
    }
} 