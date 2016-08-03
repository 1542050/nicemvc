<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-03 09:32:11
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-03 10:17:15
 */
class Route {
  private $_request = NULL;
  private $_response = NULL;
  private $_result = '';

  function __construct() {
    $this->_request = new Request();
    $this->_response = new Response();
  }

  public function renderFromUrl() {
    # Routing request
    $this->_request->route();

    # Create Controller
    $controllerName = lowerToUpper($this->_request->getParam('controller'), TRUE) . 'Controller';
    $controllerPath = APPLICATION_PATH . '/controllers/' . $controllerName . '.php';

    # Check exists controller file
    if (file_exists($controllerPath)) {
      require_once 'Controller.php';
      require_once $controllerPath;
      # Check exists controller class
      if (class_exists($controllerName)) {
        $controllerObj = new $controllerName($this->_request, $this->_response);
        # Check exists action method
        $actionName = $this->_request->getParam('action');
        $actionMethod = upperToLower($actionName) . 'Action';
        if (method_exists($controllerObj, $actionMethod)) {
          $controllerObj->$actionMethod();
          # Check exist action file
          if (!$controllerObj->checkViewFile()) {
            $layout_file = $controllerObj->getView()->getLayout() . $controllerObj->getView()->getsuffix();
            if (!$controllerObj->checkViewFile($layout_file)) {
              # Render Layout
              $controllerObj->autoRender();
            } else {
              $this->_response->fileNotFound($layout_file); 
            }
          } else {
            $response->fileNotFound($this->_request->getParam('controller') . '/' . $actionName . '.tpl.php');
          }
        } else {
          $this->_response->methodNotFound($actionMethod);
        }
      } else {
        $this->_response->classNotFound($controllerName);
      }
    } else {
      $this->_response->fileNotFound($controllerPath);
    }
    $this->_result = $this->_response->getMarkup();
  }

  public function getResult() {
    return $this->_result;
  }

  public function setResult($value) {
    $this->_result = $value;
  }
}