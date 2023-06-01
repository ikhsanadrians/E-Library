<?php

include_once('../core/controllers/admin.php');
include_once('../core/controllers/peminjaman.php');

$admins = new Admin;

session_start();

$admin = $admins->getAdminByToken($_SESSION['admin_token']);
$peminjaman = new Peminjaman;
$peminjamanCount = count($peminjaman->index());


$admins->Middleware(2,'Location:login.php');


if(isset($_POST['logout'])){
    $admins->LogOut();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Perpus</title>
  <link rel="stylesheet" href="../assets/css/elibrary/index.css">
  <link rel="stylesheet" href="../assets/css/main/app.css">
  <link rel="shortcut icon" href="../assets/images/eperpus/logo-eperpus-mini.png" type="image/x-icon">
</head>

<body>
  <div class="container-fluid" style="overflow-x:hidden">
    <div class="row">
      <?php include('../components/adminsidebar.php')?>
      <div class="col-md-9" style="height:100vh">
        <div class="main-content">
          <div class="row">
            <div class="col-md-12 d-flex justify-content-between">
              <div class="profile-pic" style="height:100%; display: flex; align-items:center; gap:20px">
                 <h4 class="title"><span><img src="../assets/images/faces/2.jpg" alt="pp" class="profile-picture rounded-circle m-2"></span><?= $admin['fullname'] ?></h4>
                 <p>Admin</p>  
               </div>
              <form action="" method="post">
                <button type="submit" name="logout" class="btn btn-none">
                  <i class="bi bi-box-arrow-left" style="font-size:1.3rem"></i>
                </button>
              </form>
            </div>
            <div class="col-md-6 mt-2">
              <div class="card bg-white shadow-sm">
                <div class="card-body">
                  <div class="row d-flex justify-content-between">
                    <div class="icon">
                      <i class="bi bi-book" style="font-size:2rem"></i>
                    </div>
                      <div class="title">
                      <h2 class="card-title text-muted">Request Pinjam Buku</h2>
                      <h1 class="card-text">
                        <?= $peminjamanCount ?>
                      </h1>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mt-2">
            <div class="card bg-white shadow-sm">
                <div class="card-body">
                  <div class="row d-flex justify-content-between">
                    <div class="icon">
                      <i class="bi bi-journal" style="font-size:2rem"></i>
                    </div>
                      <div class="title">
                      <h2 class="card-title text-muted">Buku Yang Belum Dikembalikan</h2>
                      <h1 class="card-text">
                        1
                      </h1>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
               <div class="table-responsive">
                <table class="table table-lg bg-white shadow-sm rounded-3">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Buku</th>
                      <th scope="col">Tanggal Peminjaman</th>
                      <th scope="col">Tanggal Pengembalian</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <?php foreach($peminjamanData as $key => $peminjaman) :?>
                    <tr class="">
                      <td scope="row"><?= $key + 1 ?></td>
                      <td><?= $peminjamans->getBookById($peminjaman["buku_id"])['judul'] ?></td>
                      <td><?= $peminjaman['tgl_awal_pinjam'] ?></td>
                      <td><?= $peminjaman['tgl_akhir_pinjam'] ?></td>
                      <td><?= $peminjaman['status'] ?></td>
                    </tr>
                    <?php endforeach ?> -->
                  </tbody>
                </table>
               </div>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/app.js"></script>
</body>

</html>