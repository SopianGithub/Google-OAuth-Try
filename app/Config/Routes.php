<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/token', 'Login::token');
$routes->get('/wb', 'Login::wb');

$routes->get('/webhook', 'Webhook::index');
