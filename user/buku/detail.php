<?php

include('../../core/controllers/book.php');

$books = new Book;
$book = $books->show();


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
            <?php include('../../components/sidebar.php') ?>
            <div class="col-md-9">
                <div class="main-content">
                    <h3>Detail Buku</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-white" style="overflow:hidden">
                                <div class="card-img-detail">
                                    <img src="<?= $book['image'] ?>" alt="Title">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?= $book['judul'] ?>
                                    </h4>
                                    <p class="card-text text-primary">
                                        <?= $books->getPenulisById($book['penulis_id'])['nama'] ?>
                                    </p>
                                    <p class="card-text">
                                        <?= $book['deskripsi'] ?>
                                    </p>
                                    <h6 class="font-ultrabold"><span style="font-weight: 400;">Kategori / </span>
                                        <?= $books->getCategoryById($book['id'])['name'] ?>
                                    </h6>
                                    <button class="btn btn-primary float-end">Ajukan Peminjaman</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h4>Tulis Review</h4>
                            <div class="card">
                                <div class="card-body">
                                    <h6>Kirim Sebagai Ahmad Saugi</h6>
                                    <div class="review-input d-flex flex-row gap-2">
                                        <input type="text" placeholder="Tambahkan Review" class="form-control">
                                        <i class="bi bi-send-fill text-primary" style="font-size:20px;margin-top:5px"></i>
                                    </div>
                                    <div class="review-other-user">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="user-review">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>