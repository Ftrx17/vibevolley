<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    private function checkAdmin()
    {
        if (!session()->get('user_id') || session()->get('user_email') !== 'vibevolley@gmail.com') {
            return redirect()->to('/login')->with('error', 'Admin access required.');
        }
        return null;
    }

    public function products()
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $db = \Config\Database::connect();
        $products = $db->table('products')->get()->getResultArray();
        return view('admin_products', ['products' => $products]);
    }

    public function addProduct()
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        if ($this->request->getMethod() === 'post') {
            $db = \Config\Database::connect();
            $db->table('products')->insert([
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
            ]);
            return redirect()->to('/admin/products');
        }
        return view('admin_add_product');
    }

    public function editProduct($id)
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $db = \Config\Database::connect();
        if ($this->request->getMethod() === 'post') {
            $db->table('products')->where('id', $id)->update([
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
            ]);
            return redirect()->to('/admin/products');
        }
        $product = $db->table('products')->where('id', $id)->get()->getRowArray();
        return view('admin_edit_product', ['product' => $product]);
    }

    public function deleteProduct($id)
    {
        if ($redirect = $this->checkAdmin()) return $redirect;
        $db = \Config\Database::connect();
        $db->table('products')->where('id', $id)->delete();
        return redirect()->to('/admin/products');
    }
}
