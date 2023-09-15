<?php
  
  class Dbh {

    protected $db_host = "localhost";
    protected $db_user = "intriny6_user2";
    protected $db_pass = "intrinsic77##";
    protected $db_name = "intriny6_intrinsic";
    public $con;

      public function connect() {
        $this->con = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if($this->con) {
          $echoes = "Confirmed"; 
        }

        else {
          $echoes = mysqli_error($this->con);
        }
        return $echoes;
      }

      public function recieveInput($data) {
        $this->connect();
        $encrypt = mysqli_real_escape_string($this->con,$data);
        $encryptHtmlentities = htmlentities($encrypt, ENT_COMPAT, 'UTF-8');
        $encryptHtmlentitiesUse = htmlentities($encryptHtmlentities, ENT_COMPAT, 'UTF-8');
        return $encrypt;
    }

  }

  

?>
