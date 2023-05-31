<?php

include('DB.php');

class Book extends DB
{

    public function index()
    {
        $sql = "SELECT * FROM book";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_all(MYSQLI_ASSOC);

        return $data;

    } 

    public function getAllCategory(){
        $sql = "SELECT * FROM category";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_all(MYSQLI_ASSOC);

        return $data;
    }
    public function getPenulisById($id){
        $sql =  "SELECT * FROM penulis WHERE id='$id'";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_assoc();
        return $data;
    }

    public function getCategoryById($id){
        $sql = "SELECT * FROM category WHERE id='$id'";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_assoc();
        return $data;
    }

    public function show(){
        $idOfBook = $_GET['id'];
        $sql = "SELECT * FROM book WHERE id='$idOfBook'";
        $queryExec = $this->db->query($sql);
        $data = $queryExec->fetch_assoc();
        return $data;
    }


}


?>