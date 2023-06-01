<?php

include('../../core/controllers/peminjaman.php');
include('../../core/controllers/admin.php');


session_start();
$admins = new Admin;
$admins->Middleware(2,'Location:login.php');

$peminjamans = new Peminjaman;
$peminjamansData = $peminjamans->index();


if(isset($_POST['acc'])){
    $peminjamans->AktivasiPeminjaman($_POST['idtoacc']);
}

if(isset($_POST['delete'])){
    $peminjamans->TolakPeminjaman($_POST['idtodelete']);
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
                    <h3>Aktivasi Peminjaman</h3>
                    <div class="col-md-12 d-flex flex-col align-items-center justify-content-between">
                        <div class="form-filter d-flex align-items-center gap-2">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Masukan Peminjaman</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Cth:Andrea Hirata.."
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

                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="table-responsive">
                            <?php if (isset($_GET['message']) && $_GET['message'] == "update-berhasil"): ?>
                                <div class="alert alert-success">
                                    <i class="bi bi-check-circle-fill">
                                    </i>
                                    Berhasil Update Data
                                </div>
                            <?php elseif (isset($_GET['message']) && $_GET['message'] == "berhasil-hapus"): ?>
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
                                        <th scope="col">Nama Peminjam</th>
                                        <th scope="col">Nama Buku</th>
                                        <th scope="col">Tgl Awal Pinjam</th>
                                        <th scope="col">Tgl Akhir Pinjam</th>
                                        <th scope="col">Kode Peminjaman</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($peminjamansData as $key => $peminjaman): ?>
                                        <tr class="">
                                            <td scope="row">
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <?= $peminjamans->getMemberById($peminjaman['member_id'])['fullname'] ?>
                                            </td>
                                            <td>
                                                <?= $peminjamans->getBookById($peminjaman['buku_id'])['judul'] ?>
                                            </td>
                                            <td>
                                                <?= $peminjaman['tgl_awal_pinjam'] ?>
                                            </td>
                                            <td>
                                                <?= $peminjaman['tgl_akhir_pinjam'] ?>
                                            </td>
                                            <td>
                                                <?= $peminjaman['kode_peminjaman'] ?>
                                            </td>
                                            <td class="d-flex flex-row gap-1 align-items-center">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="idtoacc" value="<?= $peminjaman['id'] ?>">
                                                    <button type="submit" name="acc" method="POST" style="border:none"
                                                        class="edit bg-success p-2 rounded-2">
                                                        <i class="bi bi-calendar-check-fill text-white"></i>
                                                    </button>
                                                </form>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="idtodelete" value="<?= $peminjaman['id'] ?>">
                                                    <button type="submit" name="delete"
                                                        class="delete bg-danger p-2 rounded-2" style="border:none">
                                                        <i class="bi bi-trash-fill text-white"></i>
                                                    </button>
                                                </form>

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