<?php

class Model {
  private $dbh;

 public function __construct() {
   $this->dbh = new PDO('mysql:host=185.181.165.252;dbname=emlysvap_fh', 'emlysvap_fh', 'emlysvap_fhemlysvap_fh');
 }

 public function runsql($sql) {

    echo "<script>console.log(\"" . $sql ."\");</script>";

    $stmt = $this->dbh->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll();
    $stmt = null;

    return $result;
 }

 public function addTask($name,$email, $text , $status){
  return $this->runsql("INSERT INTO `tasks` (`user`, `email`, `text`, `status`) VALUES ('".$name."', '".$email."', '".$text."', '".$status."');");
 }

 public function UpdateTask($name, $email, $text, $status, $id){
   $this->runsql("UPDATE `tasks` SET `user`='".$name."', `email`='".$email."', `text`='".$text."', `status`='".$status."'  WHERE `id`='".$id."';");
 }

 public function setAdminEdited($id){
   $this->runsql("UPDATE `tasks` SET `edited`='1' WHERE `id`='".$id."';");
 }

 public function getItemById($id){
  return $this->runsql("SELECT * FROM `tasks` WHERE `id`=".$id);
 }

 public function getItems(){
  return $this->runsql("SELECT COUNT(*) as items FROM tasks");
 }

 public function getTasks(){
  $sortby='id'; $sortorder = "ASC"; $page = "1";
  //calculating sql pagination limits
  $fistindex = ($page-1) * 3;
  $lastindex = 3;
  return $this->runsql("SELECT * FROM `tasks` ORDER BY `".$sortby."` ".$sortorder." LIMIT ".$fistindex.",".$lastindex." " );
 }

 public function getIndexItems($sortby, $sortorder, $page){
  //calculating sql pagination limits
  $fistindex = ($page-1) * 3;
  $lastindex = 3;
  return $this->runsql("SELECT * FROM `tasks` ORDER BY `".$sortby."` ".$sortorder." LIMIT ".$fistindex.",".$lastindex." " );
 }

 public function getAdminByHash($hash_admin){
  return $this->runsql("SELECT hash FROM admin WHERE hash='".$hash_admin."'");
 }

}

 ?>
