<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:55:37
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-02 20:34:33
 */
class Controller {
  protected $_view;

  protected $_request;

  protected $_response;

  protected $_autoRender = true;

  public function __construct($request, $response) {
    $this->_request = $request;
    $this->_response = $response;
    $this->_view = 'AA';
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
      echo "Render Nè";
    }
  }
}