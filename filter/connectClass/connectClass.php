<?php

class connectClass{
  
    public $dbhost;
    public $dbname;
    public $username;
    public $password;
    public $categ;
    public $base;
   


    public function connect($dbhost,$dbname,$username,$password){
      global $db;
        $this->dbhost = $dbhost;
        $this->dbname = $dbname; 
        $this->username = $username;
        $this->password = $password;

          $con = "mysql:host=".$this->dbhost.";dbname=".$this->dbname;
          $db = new PDO($con, $this->username, $this->password);
          $db->exec("set names utf8");
          if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
           echo "Щось пішло під три чорти...";
          }

        return $db;
  }

  public function get_c($categ,$base){
      global $db;
      $this->categ = $categ;
      $this->base = $base;
    $getcategory = $db->query("SELECT DISTINCT ".$this->categ." FROM ".$this->base);
      return $getcategory;
  }

  public function get_cells($base){
    global $db;
    $this->base = $base;
    $cellsl = [];
    $geta = $db->query("SELECT * FROM ".$this->base." LIMIT 1");
    $getx = array_keys($geta->fetch(PDO::FETCH_ASSOC));
    foreach ($getx as $ed) {
        $cellsl .='<option value="'.$ed.'">'.$ed.'</option>';
    }
    return $cellsl;
  }

  public function pars($dbhost,$dbname,$username,$pas){
    $this->dbhost = $dbhost;
    $this->dbname = $dbname;
    $this->username = $username;
    $this->password = $pas;
    if(isset($_POST['localhost'])){
        return $_SESSION['pars'] = [$this->dbhost,$this->dbname,$this->username,$this->password];
    }else{
        return 'ok';
    }
  }
}

$dt = new connectClass;


?>