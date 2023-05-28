<?php

require_once('../../core/DB.php');

class Member extends DB {
   
    public function GenerateToken($length = 32){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
      
        for ($i = 0; $i < $length; $i++) {
          $randomIndex = rand(0, strlen($characters) - 1);
          $token .= $characters[$randomIndex];
        }
      
        return $token;
    }

    public function Login(){
      $userName = $_POST['username'];
      $pass = $_POST['password'];
      $rememberMe = $_POST['rememberMe'];
      $value = $this->GenerateToken();
      
      $sql = "SELECT * FROM member WHERE username = '$userName' AND password = '$pass'";
   
      if($rememberMe) {
    
      }


    }

    public function Middleware(){

    }

    public function Register(){

    }

}

?>