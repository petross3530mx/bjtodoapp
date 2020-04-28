<?php
  class Logout extends Controller {
   public function __construct() {
    parent::__construct(); 
    unset($_SESSION['admin']);
    $this->view->render('login', array('message' => 'You are logged out' , 'class'=> 'alert alert-warning'));
   }
  }
?>
