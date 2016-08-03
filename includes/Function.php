<?php
/**
 * @Author: kimbui
 * @Date:   2016-08-02 17:53:46
 * @Last Modified by:   kimbui
 * @Last Modified time: 2016-08-02 17:59:50
 */

function lowerToUpper($str, $uc_first = FALSE) {
  if ($uc_first) {
    $str = ucfirst($str);
  }
  return $str;
}

function upperToLower($str) {
  return strtolower($str);
}
