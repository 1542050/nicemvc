<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 09:46:35
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-03 00:02:28
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
require_once 'Function.php';
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

# Create Controller
$controllerName = lowerToUpper($request->getParam('controller'), TRUE) . 'Controller';
$controllerPath = APPLICATION_PATH . '/controllers/' . $controllerName . '.php';

# Check exists controller file
if (file_exists($controllerPath)) {
  require_once 'Controller.php';
  require_once $controllerPath;
  # Check exists controller class
  if (class_exists($controllerName)) {
    $controllerObj = new $controllerName($request, $response);
    # Check exists action method
    $actionName = $request->getParam('action');
    $actionMethod = upperToLower($actionName) . 'Action';
    if (method_exists($controllerObj, $actionMethod)) {
      $controllerObj->$actionMethod();

      # Check exist action file
      if (!$controllerObj->checkViewFile()) {
        # Render Layout
        $controllerObj->autoRender();
      } else {
        $response->fileNotFound($request->getParam('controller') . '/' . $actionName . '.tpl.php');
      }
    } else {
      $response->methodNotFound($actionMethod);
    }
  } else {
    $response->classNotFound($controllerName);
  }
} else {
  $response->fileNotFound($controllerPath);
}

echo $response->getMarkup();








