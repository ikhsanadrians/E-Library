<?php

include_once('DB.php');

class Peminjaman extends DB
{
   
    public function getAllPeminjamanById($id){
      $sql = "SELECT * FROM peminjaman WHERE member_id='$id'";
      $action = $this->db->query($sql);
      $data = $action->fetch_all(MYSQLI_ASSOC);
      return $data;
    } 


    public function index(){
        $sql = "SELECT * FROM peminjaman";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

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
    
     
    public function AktivasiPeminjaman($id){
        $sql = "UPDATE peminjaman SET status='acc' WHERE id='$id'";
        $queryExec = $this->db->query($sql);
        
        if($queryExec){
            header("Location:./index.php?message=update-berhasil");
        }
    }

    public function TolakPeminjaman($id){
        $sql = "DELETE FROM peminjaman WHERE id='$id'";
        $queryExec = $this->db->query($sql);
        
        if($queryExec){
            header("Location:./index.php?message=berhasil-hapus");
        }

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

        $sql = "INSERT INTO `peminjaman`(`buku_id`, `member_id`, `petugas_id`, `tgl_awal_pinjam`, `tgl_akhir_pinjam`, `kode_peminjaman`,`status`) VALUES ('$book','$memberId',1,'$startDate','$endDate','$isi','process')";
        
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
        
        if($action->num_rows > 0) return $data;
        else Header('Location:index.php');
        
        

    }

}



?>