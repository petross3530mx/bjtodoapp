<?php
  class Add extends Controller {
   public function __construct() {
    parent::__construct();


    if(!empty( $_POST['name'] ) && !empty( $_POST['text'] ) && !empty( $_POST['email'] ) ){

      $message = '';

      if (parent::validateEmail($_POST['email']) ){

        if (parent::validateField($_POST['text']) !== $_POST['text']){
          $message = 'Your text was filtered but added to new task. ';
        }
        $email = $_POST['email'];
        $text = parent::validateField($_POST['text']);
        $name = $_POST['name'];

        $this->model->addTask($name,$email, $text , 'To Do');
        
        $message.= 'Your task was added.';
        $this->view->render('add', array('message' => $message, 'class'=> 'alert alert-info' ));
      }
      else{
        $message.='Email is not valid. Please, enter correct details and try later';
        $this->view->render('add', array('message' => $message, 'class'=> 'alert alert-danger' ));
      }
 
    }
    else if( !empty( $_POST['name'] ) || !empty( $_POST['text'] ) || !empty( $_POST['email'] ) || isset( $_POST['btn'] ) ){
      $this->view->render('add', array('message' => 'Please enter all task details', 'class'=> 'alert alert-danger' ));
    }
    else{
      $this->view->render('add');
    }

   }
  }
?>
