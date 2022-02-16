<?php
// Start Session
session_start();

// Include Config
require('config.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');

$requestUri = ltrim($_SERVER['REQUEST_URI'], '/');;
$requestUri = explode('/', $requestUri);

$request = array();
$request['controller'] = isset($requestUri[0]) ? $requestUri[0] : null;
$request['action'] = isset($requestUri[1]) ? $requestUri[1] : null;
$request['id'] = isset($requestUri[2]) ? $requestUri[2] : null;

$bootstrap = new Bootstrap($request);
$controller = $bootstrap->createController();
if($controller) {
    $controller->executeAction();
}
