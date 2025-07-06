<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Cart extends Controller
{
    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        $user_id = $session->get('user_id');
        $tier = 0;
        if ($user_id) {
            $db = \Config\Database::connect();
            $user = $db->table('users')->where('user_ID', $user_id)->get()->getRowArray();
            $tier = $user ? (int)$user['tier_ID'] : 0;
        }
        // Discount rates: 0=0%, 1=5%, 2=10%, 3=15%
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
        return view('cart', [
            'cart' => $cart,
            'total' => $total,
            'discount' => $discount,
            'tier' => $tier
        ]);
    }

    public function clear()
    {
        $session = session();
        $session->remove('cart');
        return redirect()->to('/cart');
    }

    public function add()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        $name = $this->request->getPost('product_name');
        $price = (float)$this->request->getPost('product_price');
        $product_id = $this->request->getPost('product_id');
        log_message('debug', 'Cart add: product_id=' . $product_id . ', name=' . $name . ', price=' . $price);

        $found = false;
        foreach ($cart as &$item) {
            if ($item['product_id'] == $product_id) {
                $item['quantity']++;
                $found = true;
                break;
            }
        }
        unset($item); // break reference

        if (!$found) {
            $cart[] = [
                'product_id' => $product_id,
                'name' => $name,
                'price' => $price,
                'quantity' => 1
            ];
        }

        $session->set('cart', $cart);
        $session->setFlashdata('success', 'Added to cart successfully!');
        return redirect()->to('/product-page');
    }

    public function addAjax()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        $name = $this->request->getPost('product_name');
        $price = (float)$this->request->getPost('product_price');
        $product_id = $this->request->getPost('product_id');
        log_message('debug', 'Cart addAjax: product_id=' . $product_id . ', name=' . $name . ', price=' . $price);

        $found = false;
        foreach ($cart as &$item) {
            if ($item['product_id'] == $product_id) {
                $item['quantity']++;
                $found = true;
                break;
            }
        }
        unset($item); // break reference

        if (!$found) {
            $cart[] = [
                'product_id' => $product_id,
                'name' => $name,
                'price' => $price,
                'quantity' => 1
            ];
        }

        $session->set('cart', $cart);
        // Return the new cart count
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $this->response->setJSON(['count' => $count]);
    }

    public function count()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $this->response->setJSON(['count' => $count]);
    }
}
