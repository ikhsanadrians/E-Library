<?php

include('../../core/controllers/book.php');

$books = new Book;
$bookData = $books->index();


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
                    <h3>Cari Buku</h3>
                    <div class="col-md-12 d-flex flex-col">
                        <div class="form-filter d-flex align-items-center gap-2">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Masukan Judul</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Cth:Madilog.."
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="filter bg-primary d-flex justify-content-center rounded-2" style="height:35px;width:35px;margin-top:13px">
                            <i class="bi bi-funnel-fill" style="color:white;font-size:15px;margin-top:5px"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <?php foreach($bookData as $key => $book) : ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img-top">
                                        <img src="../../admin/buku/<?=  $book['image'] ?>" alt="Title">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="detail.php?id=<?= $book['id'] ?>"><?= $book["judul"] ?></a></h4>
                                        <p class="card-text"><?= $books->getPenulisById($book['penulis_id'])['nama'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                           
                        </div>
                        <ul class="pagination pagination-primary d-flex justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>