<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/(:hash)-converter', 'Home::category/$1');
$routes->get('/option', 'Home::option');
$routes->get('/pricing', 'Home::pricing');
$routes->get('/logout', 'Home::logout');

$routes->post('/convert', 'Home::convert');
$routes->post('/login', 'Home::login');
$routes->post('/signup', 'Home::signup');