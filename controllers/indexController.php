<?php

/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:52:52
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-09-02 19:57:03
 */

$includes = [
  'Client', 'Product', 'User'
];

foreach ($includes as $key => $value) {
  require_once 'Base/' . $value . '.php';
  require_once 'Base/' . $value . 'Query.php';
  require_once $value . '.php';
  require_once $value . 'Query.php';
  require_once 'Map/' . $value . 'TableMap.php';
}

class IndexController extends Controller {
  public function indexAction() {
    // $this->_autoRender = false;
    $this->_view->layout->title = 'Nice MVC framework for PHP';

    // $users = UserQuery::create()->find()->toArray();
    // print_r($users); exit;
  }
}