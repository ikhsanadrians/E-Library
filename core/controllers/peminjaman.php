<?php

include('DB.php');

class Peminjaman extends DB
{

    public function getMemberByToken($token)
    {
        $sql = "SELECT * FROM member WHERE token='$token'";
        $action = $this->db->query($sql);
        $data = $action->fetch_assoc();
        return $data;
    }

    public function getMemberById($id){
       $sql = "SELECT * FROM member WHERE id='$id'";
       $action = $this->db->query($sql);
       $data = $action->fetch_assoc();
       return $data;

    }

    public function getBookById($id){
       $sql = "SELECT * FROM book WHERE id='$id'";
       $action = $this->db->query($sql);
       $data = $action->fetch_assoc();
       return $data;
    }

    public function showAllBook()
    {

        $sql = "SELECT * FROM book";

        $queryExec = $this->db->query($sql);

        $data = $queryExec->fetch_all(MYSQLI_ASSOC);

        return $data;

    }


    public function generateVerificationCode($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = 'pm';
    
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $code .= $characters[$randomIndex];
        }
    
        return $code;
    }
    
     



    public function requestPeminjaman()
    { 
        session_start();
        $token = $_SESSION['user_token'];
        $memberDetail = $this->getMemberByToken($token); 

        $book = $_POST['book'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $memberId = $memberDetail['id'];
        $isi = $this->generateVerificationCode(8);

        $sql = "INSERT INTO `peminjaman`(`buku_id`, `member_id`, `petugas_id`, `tgl_awal_pinjam`, `tgl_akhir_pinjam`, `kode_peminjaman`) VALUES ('$book','$memberId',1,'$startDate','$endDate','$isi')";
        
        $action = $this->db->query($sql);
        
        if($action){
            header("Location:loan.php?code=$isi");
        }

    }

    public function getDetailByCode(){
        $code = $_GET['code'];
        $sql = "SELECT * FROM peminjaman WHERE kode_peminjaman='$code'";
        $action = $this->db->query($sql);

        $data = $action->fetch_assoc();
        
        return $data;

    }

}



?>