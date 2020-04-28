<?php
  class Router {
   public function __construct() {
    $url = $_GET['url'];
    if($url){
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    $file = 'controllers/'.$url[0].'.php';
    if(file_exists($file)) {
     require $file;
    } else {
      header("Location: /login");
      exit();
    }
    $controller = new $url[0];
    if(isset($url[1])) {
      $function_name = $url[1];
     $controller->$function_name($url[2]);
    } else {
     if(isset($url[1])) {
      $controller->$url[1]();
     }
    }
  }
  else{
      $file = 'controllers/index.php';
      require $file;

      $controller = new index;
  }
}
  }
?>
