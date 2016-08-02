<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:57:14
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-02 19:31:45
 */
class Response {
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