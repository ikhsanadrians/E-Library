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
                    <div class="col-md-12 d-flex flex-col align-items-center justify-content-between">
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
                            <div class="filter bg-primary d-flex justify-content-center rounded-2"
                                style="height:35px;width:35px;margin-top:13px">
                                <i class="bi bi-funnel-fill" style="color:white;font-size:15px;margin-top:5px"></i>
                            </div>
                        </div>
                        <div class="add-new-book mt-2">
                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                data-bs-target="#border-less">
                                Tambah Buku
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="table-responsive">
                            <table class="table table-lg bg-white shadow-sm rounded-3">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Buku</th>
                                        <th scope="col">Jumlah Peminjam</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bookData as $key => $book): ?>
                                        <tr class="">
                                            <td scope="row">
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <?= $book["judul"] ?>
                                            </td>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                <?= $books->getCategoryById($book['category_id'])['name'] ?>
                                            </td>
                                            <td>
                                                <?= $books->getPenulisById($book['penulis_id'])['nama'] ?>
                                            </td>
                                            <td class="d-flex flex-row gap-1 align-items-center">
                                                <div class="delete bg-danger p-2 rounded-2">
                                                    <i class="bi bi-trash-fill text-white"></i>
                                                </div>
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
    <div class="modal fade text-left modal-borderless hidden" id="border-less" tabindex="-1"
        aria-labelledby="myModalLabel1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Border-Less</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>