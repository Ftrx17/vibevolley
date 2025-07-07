<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::homepage');
$routes->post('api/signup', 'Auth::signup');
$routes->post('api/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('debug', 'Debug::index');
$routes->post('api/payment', 'Payment::create');
$routes->get('api/get-users', 'UserApi::index');
$routes->get('api/test', 'UserApi::test');
$routes->get('homepage', 'Pages::homepage');
$routes->get('login', 'Pages::login');
$routes->get('payment', 'Pages::payment');
$routes->get('product-page', 'ProductPage::index');
$routes->get('signup', 'Pages::signup');
$routes->get('admin', 'Pages::admin');
$routes->get('admin/members', 'Pages::adminMembers');
$routes->get('training-page', 'Pages::trainingPage');
$routes->get('resources', 'Pages::resources');
$routes->post('api/update-tier', 'UserApi::updateTier');
$routes->post('api/update-status-bulk', 'UserApi::updateStatusBulk');
$routes->get('cart', 'Cart::index');
$routes->get('cart/clear', 'Cart::clear');
$routes->post('cart/add', 'Cart::add');
$routes->post('cart/add-ajax', 'Cart::addAjax');
$routes->get('cart/count', 'Cart::count');
$routes->get('/checkout', 'Checkout::index');
$routes->post('/checkout/placeOrder', 'Checkout::placeOrder');
$routes->get('/admin/products', 'Admin::products');
$routes->get('/admin/addProduct', 'Admin::addProduct');
$routes->post('/admin/addProduct', 'Admin::addProduct');
$routes->get('/admin/editProduct/(:num)', 'Admin::editProduct/$1');
$routes->post('/admin/editProduct/(:num)', 'Admin::editProduct/$1');
$routes->get('/admin/deleteProduct/(:num)', 'Admin::deleteProduct/$1');
$routes->get('/profile', 'Profile::index');
$routes->post('/profile/addCard', 'Profile::addCard');
$routes->get('/profile/test', 'Profile::test');
$routes->post('/profile/test', 'Profile::test');
$routes->get('/upgrade-tier', 'Pages::upgradeTier');
