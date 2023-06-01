<?php

include_once('DB.php');


class Penulis extends DB {
    public function index()
    {
        $sql = "SELECT * FROM penulis";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_all(MYSQLI_ASSOC);

        return $data;

    } 
    
    public function destroy($id){
        $sql = "DELETE FROM penulis WHERE id='$id'";
        $queryExec = $this->db->query($sql);
        header('Location:index.php?message=berhasil-hapus');
  
    }

    public function getJumlahBukuByPenulis($id){
        $sql = "SELECT * FROM book WHERE penulis_id = '$id'";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_all(MYSQLI_ASSOC);
        $countedData = count($data);
        return $countedData;
    }
 
    public function store(){
        $namaPenulis = $_POST['namapenulis'];
        $deskripsiPenulis = $_POST['deskripsipenulis'];
        $fotoPenulis = $_POST['fotopenulis'];
    
        $sql = "INSERT INTO `penulis`(`nama`, `deskripsi`, `foto`) VALUES ('$namaPenulis','$deskripsiPenulis','$fotoPenulis')"; 
        $queryExec = $this->db->query($sql);
        
        if($queryExec){
            header('Location:index.php?message=tambah-berhasil');
        }
      
    }


}



?>