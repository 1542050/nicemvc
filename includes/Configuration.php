<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-03 10:30:34
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-09-02 19:53:11
 */

# Add require path
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/includes');
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/libraries');
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/models');
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/views');

# Include library
require_once 'Define.php';
require_once 'Function.php';
require_once 'Route.php';
require_once 'Request.php';
require_once 'Response.php';

# read config file
$config = require_once 'config.php';
define('BASE_URL', $config['base_url']);

# Config Database
require_once 'propel/vendor/autoload.php';
require_once 'generated-conf/config.php';