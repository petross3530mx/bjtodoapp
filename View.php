<?php
  class View {
   public function __construct() { 
   }
   public function render($name, $data = null, $params  = null) {
    require 'views/'.$name.'.php';
   }
  }
?>
