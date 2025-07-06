<?php
namespace App\Controllers;

use App\Models\UserModel;

class Checkout extends BaseController
{
    public function index()
    {
        try {
            // If no user is logged in, redirect to login page
            if (!$this->isLoggedIn()) {
                return redirect()->to('/login')->with('error', 'Please log in to proceed to checkout.');
            }
            $cart = session()->get('cart') ?? [];
            $userId = session()->get('user_id');
            $db = \Config\Database::connect();
            $user = $db->table('users')->where('user_ID', $userId)->get()->getRowArray();
            $tier = $user ? (int)$user['tier_ID'] : 0;
            $discounts = [0 => 0, 1 => 0.05, 2 => 0.10, 3 => 0.15];
            $discount = $discounts[$tier] ?? 0;
            $total = 0;
            foreach ($cart as &$item) {
                $item['original_price'] = $item['price'];
                $item['discount'] = $discount;
                $item['discounted_price'] = round($item['price'] * (1 - $discount), 2);
                $total += $item['discounted_price'] * $item['quantity'];
            }
            unset($item);
            $cards = $db->table('credit_card')->where('user_ID', $userId)->get()->getResultArray();
            
            // Debug: Log the card structure
            if (!empty($cards)) {
                log_message('debug', 'Credit card fields: ' . json_encode(array_keys($cards[0])));
            }
            
            return view('checkout', [
                'cart' => $cart,
                'total' => $total,
                'cards' => $cards,
                'discount' => $discount,
                'tier' => $tier
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Checkout index error: ' . $e->getMessage());
            return redirect()->to('/cart')->with('error', 'An error occurred while loading checkout. Please try again.');
        }
    }

    public function placeOrder()
    {
        try {
            // If no user is logged in, redirect to login page
            if (!$this->isLoggedIn()) {
                return redirect()->to('/login')->with('error', 'Please log in to place an order.');
            }
            
            $cart = session()->get('cart') ?? [];
            if (empty($cart)) {
                return redirect()->to('/cart')->with('error', 'Cart is empty.');
            }
            
            $userId = session()->get('user_id');
            $db = \Config\Database::connect();
            $user = $db->table('users')->where('user_ID', $userId)->get()->getRowArray();
            $tier = $user ? (int)$user['tier_ID'] : 0;
            $discounts = [0 => 0, 1 => 0.05, 2 => 0.10, 3 => 0.15];
            $discount = $discounts[$tier] ?? 0;
            $total = 0;
            foreach ($cart as &$item) {
                $item['original_price'] = $item['price'];
                $item['discount'] = $discount;
                $item['discounted_price'] = round($item['price'] * (1 - $discount), 2);
                $total += $item['discounted_price'] * $item['quantity'];
            }
            unset($item);
            
            // Save order
            $orderData = [
                'user_id' => $userId,
                'total' => $total,
                'shipping_address' => 'Mock Address', // You can extend this
                'status' => 'paid',
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $db->table('orders')->insert($orderData);
            $orderId = $db->insertID();
            
            // Save order items
            foreach ($cart as $item) {
                $db->table('order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => isset($item['product_id']) ? $item['product_id'] : null,
                    'quantity' => $item['quantity'],
                    'price' => $item['discounted_price'],
                ]);
            }
            
            // Clear cart
            session()->remove('cart');
            return view('order_success', ['order_id' => $orderId, 'total' => $total]);
            
        } catch (\Exception $e) {
            log_message('error', 'Place order error: ' . $e->getMessage());
            return redirect()->to('/cart')->with('error', 'An error occurred while placing your order. Please try again.');
        }
    }
}
