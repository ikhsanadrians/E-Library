<?php

include('../../core/controllers/book.php');

$books = new Book;
$categoryData = $books->getAllCategory();



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
</head>

<body>
    <div class="container-fluid" style="overflow-x:hidden">
        <div class="row">
            <?php include('../../components/sidebar.php') ?>
            <div class="col-md-9">
                <div class="main-content">
                    <h3 class="title">Tambah Buku</h3>
                    <form class="form-group">
                        <div class="my-3">
                            <label>Judul Buku</label>
                            <input type="text" class="form-control mt-2" placeholder="Masukan Judul Buku">
                        </div>
                        <div class="my-3">
                            <label>Deskripsi Buku</label>
                            <textarea type="text" class="form-control mt-2"
                                placeholder="Masukan Deskripsi Buku"></textarea>
                        </div>
                        <div class="my-3">
                            <label>Gambar Buku</label>
                            <input type="file" class="form-control mt-2" placeholder="Masukan Judul Buku">
                        </div>
                        <div class="my-3">
                            <label class="mb-2">Kategori Buku</label>
                            <select id="inputs1" name="book" class="form-control">
                                <?php foreach ($categoryData as $key => $category): ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="my-3">
                        <label class="mb-2">Penerbit Buku</label>
                            <select id="inputs2" name="book" class="form-control">
                                <?php foreach ($categoryData as $key => $category): ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        const selectElement1 = document.getElementById('inputs1');
        const selectElement2 = document.getElementById('inputs2');
        const choices1 = new Choices(selectElement1,selectElement2);
        const choises2 = new Choices(selectElement2);
       
 
    </script>
</body>