<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:55:37
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-03 00:32:00
 */
class Controller {
  protected $_view;

  protected $_request;

  protected $_response;

  protected $_autoRender = true;

  protected $_controller;

  protected $_action;

  public function __construct($request, $response) {
    $this->_request = $request;
    $this->_response = $response;
    $this->_controller = $request->getParam('controller');
    $this->_action = $request->getParam('action');
    $this->_view = $response->getView();
  }

  # Shortcut Request
  public function getRequest() {
    return $this->_request;
  }

  # Shortcut Response
  public function getResponse() {
    return $this->_response;
  }

  # Shortcut View
  public function getView() {
    return $this->_view;
  }

  # Auto render view
  public function autoRender() {
    if ($this->_autoRender) {
      $this->_response->render($this->_controller. '/' . $this->_action);
    }
  }

  # Check viewFile
  public function checkViewFile($file_name = null) {
    if (is_null($file_name)) {
      if (!file_exists($this->_view->getViewPath() . '/' . $this->_controller . '/' . $this->_action . $this->_view->getSuffix())) {
        return true;
      }
    } else {
      if (!file_exists($this->_view->getViewPath() . '/' . $file_name)) {
        return true;
      }
    }
    
    return false;
  }
}