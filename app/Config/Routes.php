<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Login::index');
$routes->post('/login/authenticate', 'Login::authenticate');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');
$routes->post('/register/create', 'Register::create');
$routes->post('/register/createlogged', 'Register::createlogged');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/users', 'Users::index');
$routes->delete('/users/delete/(:num)', 'Users::delete/$1');
$routes->post('/users/update/(:num)', 'Users::update/$1');
$routes->get('dashboard/getSystemStatus', 'Dashboard::getSystemStatus');






