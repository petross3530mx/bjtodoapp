<?php
  class Index extends Controller {
   public function __construct() {
    parent::__construct();

    $sortby='id';
    $sortorder = "ASC";
    $page = "1";

    if(!empty( $_GET['sortby'] )){
      $sortby = $_GET['sortby'];
    }
    if(!empty( $_GET['sortorder'] )){
      $sortorder = $_GET['sortorder'];
    }
    if(!empty( $_GET['page'] )){
      $page = $_GET['page'];
    }

    $tasks = $this->model->getIndexItems($sortby, $sortorder, $page);

    $pages = $this->model->getItems();

    $ceilitems = ceil(intval($pages[0]['items'])/3);

    $params  = array('page'=>$_GET['page'], 'sortby' => $sortby, 'order'=>$sortorder, 'page' => $page, 'pages'=>$ceilitems );

    $this->view->render('index', $tasks, $params);
   }
  }
?>
