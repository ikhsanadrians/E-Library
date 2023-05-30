<?php

include_once('DB.php');

class Admin extends DB {
    public function GenerateAdminToken($length = 13)
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $token = 'AD';
  
      for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $token .= $characters[$randomIndex];
      }
      return $token;
    }

    public function Login()
    {
      $userName = $_POST['username'];
      $pass = $_POST['password'];
      // $rememberMe = $_POST['rememberMe'];
      $value = $this->GenerateAdminToken();
  
      $sql = "SELECT * FROM petugas WHERE username = '$userName' AND password = '$pass'";
  
      $action = $this->db->query($sql);
  
      $data = $action->fetch_assoc();
  
      if ($action->num_rows > 0) {
        $id = $data["id"];
        $sql = "UPDATE `petugas` SET `token` = '$value' WHERE `petugas`.`id` = '$id'";
        $action = $this->db->query($sql);
        session_start();
        $_SESSION['admin_token'] = $value;
        header('Location:../index.php');
      } else {
        header('Location:admin/auth/login.php?message=error');
      }
    }


    public function getAdminByToken($token)
    {
      $sql = "SELECT * FROM petugas WHERE token='$token'";
      $action = $this->db->query($sql);
      $data = $action->fetch_assoc();
      return $data;
    }
  


    public function LogOut(): void
    {
      session_unset();
      session_destroy();
      header('Location:auth/login.php');
    }



}



?>