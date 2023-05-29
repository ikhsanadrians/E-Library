<?php

include('DB.php');


class Member extends DB
{

  public function GenerateToken($length = 15)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';

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
    $value = $this->GenerateToken();

    $sql = "SELECT * FROM member WHERE username = '$userName' AND password = '$pass'";

    $action = $this->db->query($sql);

    $data = $action->fetch_assoc();

    if ($action->num_rows > 0) {
      $id = $data["id"];
      $sql = "UPDATE `member` SET `token` = '$value' WHERE `member`.`id` = '$id'";
      $action = $this->db->query($sql);
      session_start();
      $_SESSION['user_token'] = $value;
      header('Location:/');
    } else {
      header('Location:login.php?message=error');
    }
  }

  public function getMemberByToken($token)
  {
    $sql = "SELECT * FROM member WHERE token='$token'";
    $action = $this->db->query($sql);
    $data = $action->fetch_assoc();
    return $data;
  }

  public function Middleware($sessionCondition,$headerLoc): void
  {
    
    if (session_status() === PHP_SESSION_NONE) session_start();

    if ($sessionCondition == 1 ? ($_SESSION['user_token'] ?? null) : (!$_SESSION['user_token'] ?? null) ) 
        header($headerLoc);
    
  }

  public function LogOut(): void
  {
    session_unset();
    session_destroy();
    header('Location:Auth/login.php');
  }

  public function Register()
  {

  }

}

?>