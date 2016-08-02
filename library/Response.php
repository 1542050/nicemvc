<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:57:14
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-02 20:36:41
 */
require_once 'View.php';

class Response {

  public function render() {

  }

  public function renderPartial() {

  }

  public function fileNotFound($file) {
    echo $file . ' not found';
  }

  public function classNotFound($class) {
    echo $class . ' not found';
  }

  public function methodNotFound($method) {
    echo $method . ' not found';
  }
}