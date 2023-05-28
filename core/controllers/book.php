<?php

require_once('../core/DB.php');

class Book extends DB
{

    public function index()
    {
        $sql = "SELECT * FROM book";
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


}


?>