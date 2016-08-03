<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 09:46:35
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-03 10:45:06
 */

# Start session
session_start();

# Create application path
define('APPLICATION_PATH', getcwd());
require_once APPLICATION_PATH . '/includes/configuration.php';

# Create request & response object
$route = new Route();
$route->renderFromUrl();
echo $route->getResult();