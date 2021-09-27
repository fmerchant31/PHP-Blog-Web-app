<?php
class Databases
{
  public $con;
  public $error;
  public function __construct()
  {
    $this->con = mysqli_connect("localhost", "root", "", "simple-blog");
    if (!$this->con) {
      echo 'Database Connection Error ' . mysqli_connect_error($this->con);
    }
  }
}

global $db;
$db = new Databases();
