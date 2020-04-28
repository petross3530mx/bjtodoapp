<?php
  class Controller {
   public function __construct() {
     session_start(); 
    $this->view = new View();
    $this->model = new Model();
   }
   public function validateEmail($email){
     return filter_var($email, FILTER_VALIDATE_EMAIL);
   }
   public function validateField($string){
     return filter_var($string, FILTER_SANITIZE_STRING);
   }
  }
?>
