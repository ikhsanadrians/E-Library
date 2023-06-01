<?php

include_once('../../core/controllers/book.php');
include_once('../../core/controllers/penulis.php');
include_once('../../core/controllers/penerbit.php');

$books = new Book;
$categoryData = $books->getAllCategory();
$penulis = new Penulis;
$penulisData = $penulis->index();
$penerbit = new Penerbit;
$penerbitData = $penerbit->index();

if(isset($_POST['submit'])){
    $books->store();
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
                        <h3 class="title">Tambah Buku</h3>
                        <a href="/">Kembali</a>
                    </div>
                    <form class="form-group mb-4" action="" method="POST" enctype="multipart/form-data">
                        <div class="my-3">
                            <label>Judul Buku</label>
                            <input name="judul" type="text" class="form-control mt-2" placeholder="Masukan Judul Buku">
                        </div>
                        <div class="my-3">
                            <label>Deskripsi Buku</label>
                            <textarea name="deskripsi" type="text" class="form-control mt-2"
                                placeholder="Masukan Deskripsi Buku"></textarea>
                        </div>
                        <div class="my-3">
                            <label>Gambar Buku</label>
                            <input name="gambar_buku" type="file" class="form-control mt-2" placeholder="Masukan Judul Buku">
                        </div>
                        <div class="my-3">
                            <label class="mb-2">Kategori Buku</label>
                            <select id="inputs1" name="kategori_buku" class="form-control">
                                <?php foreach ($categoryData as $key => $category): ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="my-3">
                            <label class="mb-2">Penerbit Buku</label>
                            <select id="inputs2" name="penerbit_buku" class="form-control">
                                <?php foreach ($penerbitData as $key => $penerbit): ?>
                                    <option value="<?= $penerbit['id'] ?>"><?= $penerbit['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="my-3">
                            <label class="mb-2">Tanggal Terbit Buku</label>
                            <input name="tanggal_terbit_buku" type="text" id="date-picker" placeholder="Select a date" class="form-control">
                        </div>
                        <div class="my-3">
                            <label class="mb-2">Penulis Buku</label>
                            <select id="inputs3" name="penulis_book" class="form-control">
                                <?php foreach ($penulisData as $key => $penulis): ?>
                                    <option value="<?= $penulis['id'] ?>"><?= $penulis['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="my-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        const selectElement1 = document.getElementById('inputs1');
        const selectElement2 = document.getElementById('inputs2');
        const selectElement3 = document.getElementById('')
        const choices1 = new Choices(selectElement1);
        const choises2 = new Choices(selectElement2);

        flatpickr("#date-picker", {
            dateFormat: "Y-m-d", // Customize the date format as needed
            minDate: "1960-01-01" // Set the minimum date to 1960-01-01
        });
    </script>
</body>