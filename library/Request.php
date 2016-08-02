<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:56:47
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-02 08:03:24
 */
class Request {
  private $_param = array();

  function __construct() {
    $this->setParam('controller', 'index');
    $this->setParam('action', 'index');
  }

  public function setParam($name = NULL, $value = NULL) {
    $this->_param[$name] = $value;
  }

  public function getParam($name = NULL) {
    if (is_null($name)) {
      return $this->_param;
    }
    return $this->_param[$name];
  }

  public function route() {
    if (isset($_SERVER['PATH_INFO'])) {
      $path_info = $_SERVER['PATH_INFO'];
      $parts = explode('/', $path_info);
      $size_path = sizeof($parts);
      if ($size_path > 1 && !empty($parts[1])) {
        $this->setParam('controller', $parts[1]);
      }

      if ($size_path > 2 && !empty($parts[2])) {
        $this->setParam('action', $parts[2]);
      }
    }
  }
}