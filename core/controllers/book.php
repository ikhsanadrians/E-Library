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

    public function store(){
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $gambarBuku = $_FILES['gambar_buku'];
        $kategoriBuku = $_POST['kategori_buku'];
        $penerbitBuku = $_POST['penerbit_buku'];
        $tanggalTerbit = $_POST['tanggal_terbit_buku'];
        $penulisBuku = $_POST['penulis_book']; 
         
        
        if($gambarBuku){
            $allowedTypes = ['jpeg', 'png','jpg'];
            $imgName = $gambarBuku['name'];
            $tmpName = $_FILES['gambar_buku']['tmp_name'];

            $img_ex = pathinfo($imgName,PATHINFO_EXTENSION);
           
            if (in_array($img_ex, $allowedTypes)){
                $newImgName = uniqid("IMG-", true).'.'. strtolower($img_ex);

                $uploadPath = 'thumbnail/';
                $filePath = $uploadPath . $newImgName;
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }    
                copy($tmpName, $filePath);
                $sql = "INSERT INTO `book`(`judul`, `deskripsi`, `image`, `category_id`, `penerbit_id`, `tanggal_terbit`, `penulis_id`)  VALUES ('$judul','$deskripsi','$filePath','$kategoriBuku','$penerbitBuku','$tanggalTerbit','$penulisBuku')";
                $this->db->query($sql);
                header('Location:index.php?mesage=berhasil');
            }
            

             

           
             

     }

    }
  
    public function destroy($id){
      $sql = "DELETE FROM book WHERE id='$id'";
      $queryExec = $this->db->query($sql);
      header('Location:index.php?message=berhasil-hapus');

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