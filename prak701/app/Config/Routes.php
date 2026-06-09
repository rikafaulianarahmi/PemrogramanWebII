<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// Login & Logout
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// CRUD Buku (dilindungi filter auth)
$routes->group('buku', ['filter' => 'auth'], function($routes) {
    $routes->get('/',        'BukuController::index');
    $routes->get('create',   'BukuController::create');
    $routes->post('store',   'BukuController::store');
    $routes->get('edit/(:num)',   'BukuController::edit/$1');
    $routes->post('update/(:num)', 'BukuController::update/$1');
    $routes->get('delete/(:num)', 'BukuController::delete/$1');
});

// Redirect root ke buku
$routes->get('/', function() {
    return redirect()->to('/buku');
});
