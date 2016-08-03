<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:56:47
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-03 21:40:08
 */
class Request {
  private $_param = array();

  function __construct() {
    $this->setParam('controller', 'index');
    $this->setParam('action', 'index');
  }

  public function _getValue(&$array, $name) {
    if ($name === NULL || $name == '') {
      return $array;
    }
    if (isset($array[$name])) {
      return $array[$name];
    }
    return NULL;
  }

  public function getQuery($name = NULL) {
    return $this->_getValue($_GET, $name);
  }

  public function isQuery($name) {
    if (isset($_GET[$name])) {
      return TRUE;
    }
    return FALSE;
  }

  public function getPost($name = NULL) {
    return $this->_getValue($_POST, $name);
  }

  public function isPost($name) {
    if (isset($_POST[$name])) {
      return TRUE;
    }
    return FALSE;
  }

  public function getSession($name = NULL) {
    return $this->_getValue($_SESSION, $name);
  }

  public function setSession($name, $value) {
    $_SESSION[$name] = $value;
  }

  public function isSession($name) {
    if (isset($_SESSION[$name])) {
      return $_SESSION[$name];
    }
    return FALSE;
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