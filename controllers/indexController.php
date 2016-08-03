<?php

/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:52:52
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-03 10:46:06
 */

class IndexController extends Controller {
  public function indexAction() {
    // $this->_autoRender = false;
    $this->_view->layout->title = 'Nice MVC framework for PHP';
  }
}