<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class ProductPage extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $products = $db->table('products')->get()->getResultArray();
        // No image mapping needed, use image from DB
        return view('ProductPage', ['products' => $products]);
    }
}
