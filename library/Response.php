<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:57:14
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-03 00:08:29
 */
require_once 'View.php';

class Response {
  private $_view = '';

  private $_markup = '';

  public function setView($value) {
    $this->_view = $value;
  }

  public function getView() {
    return $this->_view;
  }

  public function setMarkup($value) {
    $this->_markup = $value;
  }

  public function getMarkup() {
    return $this->_markup;
  }

  public function __construct() {
    $this->_view = new View(APPLICATION_PATH . '/views');
  }

  public function render($file, $layout = null) {
    if (!is_null($layout)) {
      $this->_view->setLayout($layout);
    }
    $this->_markup = $this->_view->render($file);
  }

  public function renderPartial($file) {
    $this->_markup = $this->_view->renderPartial($file);
  }

  public function fileNotFound($file) {
    echo $file . ' not found';
    exit;
  }

  public function classNotFound($class) {
    echo $class . ' not found';
    exit;
  }

  public function methodNotFound($method) {
    echo $method . ' not found';
    exit;
  }
}