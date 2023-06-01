<?php


include_once('../../core/controllers/penerbit.php');
include_once('../../core/controllers/admin.php');


session_start();

$admins = new Admin;
$admins->Middleware(2,'Location:login.php');



$penerbits = new Penerbit;


if(isset($_POST['submit'])){
    $penerbits->store();
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku | E-Perpus</title>
    <link rel="stylesheet" href="../../assets/css/elibrary/index.css">
    <link rel="stylesheet" href="../../assets/css/main/app.css">
    <link rel="shortcut icon" href="../../assets/images/eperpus/logo-eperpus-mini.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
    <div class="container-fluid" style="overflow-x:hidden">
        <div class="row">
            <?php include('../../components/adminsidebar.php') ?>
            <div class="col-md-9">
                <div class="main-content">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="title">Tambah Penerbit</h3>
                        <a href="../penerbit/">Kembali</a>
                    </div>
                    <form class="form-group mb-4" action="" method="POST">
                        <div class="my-3">
                            <label>Nama Penerbit</label>
                            <input name="penerbit_name" type="text" class="form-control mt-2" placeholder="Masukan Judul Buku">
                        </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>