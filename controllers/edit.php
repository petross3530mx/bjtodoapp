<?php
  class Edit extends Controller{
   public function __construct() {
     parent::__construct();

    if(!isset($_SESSION['admin'])){
      header("Location: /login");
      exit();
    }
  else{

  }


}

public function task($id='')
{
  $id = intval($id);

  $item = $this->model->getItemById($id);
  if(isset($_POST['btn'])){
      if(!empty( $_POST['name'] ) && !empty( $_POST['text'] ) && !empty( $_POST['email'] ) ){
      $message = '';
      if (parent::validateEmail($_POST['email']) ){
        if (parent::validateField($_POST['text']) !== $_POST['text']){
          $message = 'Your text was filtered but added to new task. ';
        }
        $email = $_POST['email'];
        $text = parent::validateField($_POST['text']);
        $item = $this->model->getItemById($id);
        $name = $_POST['name'];
        $status = $_POST['status'];

        $this->model->UpdateTask($name, $email, $text, $status, $id);

        $item1 = $this->model->getItemById($id);

        if( trim($item[0]['text']) !=trim($item1[0]['text'])){
          //admin edited task
          $this->model->setAdminEdited($id);
        }
        $message.= 'Your task was updated.';

        $item = $this->model->getItemById($id);
        $this->view->render('edit', $item[0], array('message' => $message, 'class'=> 'alert alert-info' ));

      }
      else{
        $message.='Email is not valid. Please, enter correct details and try later';
        $this->view->render('edit', $item[0], array('message' => $message, 'class'=> 'alert alert-danger' ));
      }

    }
    else if( !empty( $_POST['name'] ) || !empty( $_POST['text'] ) || !empty( $_POST['email'] ) || isset( $_POST['btn'] ) ){
      $this->view->render('edit', $item[0], array('message' => 'Please enter all task details', 'class'=> 'alert alert-danger' ));
    }
    else{
      $this->view->render('edit', $item[0]);
    }
  }
  else{
    $this->view->render('edit', $item[0]);
  }
}


  }
?>
