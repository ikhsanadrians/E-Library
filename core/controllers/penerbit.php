<?php

include_once('DB.php');

class Penerbit extends DB {

    public function index()
    {
        $sql = "SELECT * FROM penerbit";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_all(MYSQLI_ASSOC);

        return $data;

    } 

    public function getJumlahBukuByPenerbit($id){
        $sql = "SELECT * FROM book WHERE penerbit_id = '$id'";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_all(MYSQLI_ASSOC);
        $countedData = count($data);
        return $countedData;
    }

    public function destroy($id){
        $sql = "DELETE FROM penerbit WHERE id='$id'";
        $queryExec = $this->db->query($sql);
        header('Location:index.php?message=berhasil-hapus');
  
    }

     
    public function store(){
        $namaPenerbit = $_POST['penerbit_name'];
    
        $sql = "INSERT INTO `penerbit`(`name`) VALUES ('$namaPenerbit')"; 
        $queryExec = $this->db->query($sql);
        
        if($queryExec){
            header('Location:index.php?message=tambah-berhasil');
        }
      
    }

}


?>