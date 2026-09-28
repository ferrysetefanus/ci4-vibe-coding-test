<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Default route: redirect ke /login jika belum login, atau ke /products jika sudah login
$routes->get('/', static function () {
    if (session()->get('is_logged_in')) {
        return redirect()->to(site_url('products'));
    }

    return redirect()->to(site_url('login'));
});

// Auth Routes (tanpa filter auth)
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::register');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// Products Routes (terproteksi dengan filter 'auth')
$routes->group('products', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'ProductController::index');
    $routes->get('create', 'ProductController::create');
    $routes->post('store', 'ProductController::store');
    $routes->get('edit/(:segment)', 'ProductController::edit/$1');
    $routes->post('update/(:segment)', 'ProductController::update/$1');
    $routes->get('delete/(:segment)', 'ProductController::delete/$1');
});
