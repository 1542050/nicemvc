<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 09:46:35
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-02 08:18:03
 */

# Start session
session_start();

# Create application path
define('APPLICATION_PATH', __DIR__);

# Add require path
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/library');
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/models');
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/views');

# Include library
require_once 'Request.php';
require_once 'Response.php';



# read config file
$config = require_once('config.php');
define('BASE_URL', $config['base_url']);

# Config Database

# Create request & response object
$request = new Request();
$response = new Response();

# Routing request
$request->route();

function dashToCamelCase($s, $ucfirst = true) {
  $s = preg_replace('/-(.?)/e', "strtoupper('$1')", $s);
  if ($ucfirst) {
    return ucfirst($s);
  }
  return $s;
}

function camelCaseToDash($s) {
  return strtolower(preg_replace('/([^A-Z])([A-Z])/', "$1-$2", $s)); 
}

# Create Controller
$controllerName = $request->getParam('controller') . 'Controller';
$controllerPath = APPLICATION_PATH . '/controllers/' . $controllerName . '.php';

print_r($controllerName); exit;









