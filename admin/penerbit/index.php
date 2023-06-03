<?php

include('../../core/controllers/penerbit.php' );
include('../../core/controllers/admin.php');

$penerbits = new Penerbit;
$penerbitsData = $penerbits->index();


session_start();                                                                                                                                                                                                                                                                                                                                          

$admins = new Admin;
$admins->Middleware(2,'Location:login.php');


if(isset($_POST['delete'])){
    $penerbits->destroy($_POST['idtodelete']);
}

   


if (isset($_GET['message'])) {
    echo "<script>
    setTimeout(function() {
        window.location.href = window.location.href.split('?')[0];
    }, 2000);
    </script>";
  
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

</head>

<body>
    <div class="container-fluid" style="overflow-x:hidden">
        <div class="row">
            <?php include('../../components/adminsidebar.php') ?>
            <div class="col-md-9">
                <div class="main-content">
                    <h3>Cari Penerbit</h3>
                    <div class="col-md-12 d-flex flex-col align-items-center justify-content-between">
                        <div class="form-filter d-flex align-items-center gap-2">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Masukan Nama Penerbit</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Cth:Gramedia.."
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="filter bg-primary d-flex justify-content-center rounded-2"
                                style="height:35px;width:35px;margin-top:13px">
                                <i class="bi bi-funnel-fill" style="color:white;font-size:15px;margin-top:5px"></i>
                            </div>
                        </div>
                        <div class="add-new-book mt-2">
                            <a href="./create.php" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                data-bs-target="#border-less">
                                Tambah Penerbit
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="table-responsive">
                        <?php if (isset($_GET['message']) && $_GET['message'] == "tambah-berhasil"): ?>
                                <div class="alert alert-success">
                                    <i class="bi bi-check-circle-fill">
                                    </i>
                                    Berhasil Menambah Data
                                </div>
                            <?php elseif (isset($_GET['message']) && $_GET['message'] == "berhasil-hapus") : ?>
                                <div class="alert alert-success">
                                    <i class="bi bi-check-circle-fill">
                                    </i>
                                    Berhasil Menghapus Data
                                </div>

                            <?php endif ?>
                            <table class="table table-lg bg-white shadow-sm rounded-3">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Penerbit</th>
                                        <th scope="col">Jumlah Buku</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($penerbitsData as $key => $penerbit): ?>
                                        <tr class="">
                                            <td scope="row">
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <?= $penerbit["name"] ?>
                                            </td>
                                            <td>
                                               <?= $penerbits->getJumlahBukuByPenerbit($penerbit['id']) ?>
                                            </td>
                                            <td class="d-flex flex-row gap-1 align-items-center">
                                               <form action="" method="POST">
                                                 <input type="hidden" name="idtodelete" value="<?= $penerbit['id'] ?>">
                                                 <button type="submit" name="delete" class="delete bg-danger p-2 rounded-2" style="border:none">
                                                    <i class="bi bi-trash-fill text-white"></i>
                                                 </button>
                                               </form> 
                                                <div class="edit bg-warning p-2 rounded-2">
                                                    <i class="bi bi-pencil-fill text-white"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>