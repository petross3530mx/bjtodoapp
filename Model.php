<?php
class Model
{
    private $dbh;

    public function __construct()
    {
        require 'db-config.php';
        $this->dbh = new PDO($host_plus_dbname, $dbuser, $pass);
    }

    private function runsql($sql, $params = null)
    {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll();
        $stmt = null;
        return $result;
    }

    public function addTask($name, $email, $text, $status)
    {
        $this->runsql("INSERT INTO `tasks` (`user`, `email`, `text`, `status`) VALUES (?, ?, ?, ?)", array( $name, $email, $text, $status ));
    }

    public function UpdateTask($name, $email, $text, $status, $id)
    {
        $this->runsql("UPDATE `tasks` SET `user`=?, `email`=?, `text`=?, `status`=?  WHERE `id`=? ", array( $name, $email, $text, $status, $id ));
    }

    public function setAdminEdited($id)
    {
        $this->runsql("UPDATE `tasks` SET `edited`='1' WHERE `id`=? ", array($id));
    }

    public function getItemById($id)
    {
        return $this->runsql("SELECT * FROM `tasks` WHERE `id`=? ", array($id));
    }

    public function getItems()
    {
        return $this->runsql("SELECT COUNT(*) as items FROM tasks");
    }

    public function getTasks()
    {
        $page = "1";
        //calculating sql pagination limits
        $fistindex = ($page - 1) * 3;
        $per_page = 3;
        return $this->runsql("SELECT * FROM `tasks` ORDER BY `id` ASC LIMIT " . $fistindex . "," . $per_page );
    }

    public function getIndexItems($sortby, $sortorder, $page)
    {
        //calculating sql pagination limits
        $fistindex = ($page - 1) * 3;
        $per_page = 3;

        return $this->runsql("SELECT * FROM `tasks` ORDER BY ? ? LIMIT " . $fistindex . "," . $per_page , array( $sortby, $sortorder ));
    }

    public function getAdminByHash($hash_admin)
    {
        return $this->runsql("SELECT hash FROM admin WHERE hash='" . $hash_admin . "'");
    }
}

?>
