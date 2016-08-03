<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-01 17:56:24
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-03 00:33:43
 */
class View {
  private $_viewPath;

  private $_layout = NULL;

  private $_suffix = '.tpl.php';

  private $_defaultLayout = 'layout';

  public function __construct($viewPath) {
    $this->_viewPath = $viewPath;
    $this->layout = new stdClass();
    $this->_layout = $this->_defaultLayout;
  }

  public function setViewPath($value) {
    $this->_viewPath = $value;
  }

  public function getViewPath() {
    return $this->_viewPath;
  }

  public function setLayout($data) {
    $this->_layout = $data;
  }

  public function getLayout() {
    return $this->_layout;
  }

  public function setSuffix($data) {
    $this->_suffix = $data;
  }

  public function getSuffix() {
    return $this->_suffix;
  }

  public function render($file, $layout = null) {
    if (!is_null($layout)) {
      $this->_layout = $layout;
    }

    # render content layout
    $this->layout->content = $this->renderPartial($file);

    # render layout
    return $this->renderPartial($this->_layout);
  }

  public function renderPartial($file) {
    # Start output buffer
    ob_start();

    # Render template
    require_once $this->_viewPath . '/' . $file . $this->_suffix;

    # Get result
    $result = ob_get_contents();

    # Clean buffer
    ob_end_clean();
    return $result;
  }
}