<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth\LoginController::index');
$routes->post('/process', 'Auth\LoginController::process');

$routes->get('/register', 'Auth\RegisterController::index');
$routes->post('/register/process', 'Auth\RegisterController::process');

$routes->get('/forgot-password', 'Auth\ForgotPasswordController::index');
$routes->post('/send-token', 'Auth\ForgotPasswordController::sendToken');
$routes->get('/reset-password/(:any)', 'Auth\ForgotPasswordController::resetPassword');
$routes->post('/reset-password/process', 'Auth\ForgotPasswordController::updatePassword');

$routes->get('/logout', 'Auth\LoginController::logout');

$routes->get('/profile', 'UsersController::index', ['filter' => 'auth']);
