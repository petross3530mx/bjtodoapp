<?php
  class Login extends Controller {
   public function __construct() {
    parent::__construct();

    if(isset( $_POST['login'] ) && isset( $_POST['password'] ) ){
      $hash_admin = md5($_POST['login'].";".$_POST['password']);
      $admin = $this->model->getAdminByHash($hash_admin);
      if(sizeof($admin) > 0){
        $_SESSION['admin'] = $_POST['login'];
        $tasks = $this->model->getTasks();
        $params  = array('page'=>$_GET['page'], 'sortby' => $_GET['sortby'], 'order'=>$_GET['sortorder'], 'message' => 'You are logged in and have ability to edit tasks' , 'class'=> 'alert alert-primary' );
        $this->view->render('index', $tasks, $params); 
      }
      else{
        $this->view->render('login', array('message' => 'Please enter correct credentials', 'class'=> 'alert alert-danger' ));
      }
    }
    else if(isset( $_POST['login'] ) || isset( $_POST['password'] ) || isset( $_POST['btn'] ) ){
      $this->view->render('login', array('message' => 'Please enter all credentials', 'class'=> 'alert alert-danger' ));
    }
    else{
      $this->view->render('login', array('message' => 'You are not logged in', 'class'=> 'alert alert-primary' ));
    }
   }
  }
?>
