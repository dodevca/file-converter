<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pricing', 'Home::pricing');
$routes->post('login', 'Home::login');
$routes->post('signup', 'Home::signup');
$routes->get('logout', 'Home::logout');

$routes->group('dashboard', static function($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('/payment', 'Dashboard::payment');
    $routes->get('/account', 'Dashboard::account');
});

$routes->group('convert', static function($routes) {
    $routes->post('/', 'Convert::index');
    $routes->get('option', 'Convert::option');
});