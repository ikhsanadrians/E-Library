<?php

include "../../assets/extensions/phpqrcode/qrlib.php";


$storeLocation = "temp/";

if (!file_exists($storeLocation))
    mkdir($storeLocation);

$isi = generateVerificationCode(8);

QRcode::png($isi, $storeLocation . '004_4.png', QR_ECLEVEL_H, 4, 5);

function generateVerificationCode($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = 'pm';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $code .= $characters[$randomIndex];
    }

    return $code;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman | E-Perpus</title>
    <link rel="stylesheet" href="../../assets/css/elibrary/index.css">
    <link rel="stylesheet" href="../../assets/css/main/app.css">
    <link rel="shortcut icon" href="../../assets/images/eperpus/logo-eperpus-mini.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
    <div class="container-fluid" style="overflow-x:hidden;">
        <div class="row">
            <?php include('../../components/sidebar.php') ?>
            <div class="col-md-9">
                <div class="main-content" style="height:100%; overflow-y:hidden">
                    <h3>Peminjaman Buku</h3>
                    <p>Serahkan QR-Code Pada Pustakawan di Lokasi Yang Anda Pilih</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row d-flex align-items-start">
                                <div class="col-md-4 col-sm-12">
                                    <div class="gambar-qr">
                                        <?= '<img id="qr" src="' . $storeLocation . '004_4.png" style="height:300px;border-radius:15px;">' ?>
                                    </div>
                                    <div class="kode-qr d-flex align-items-center justify-content-center gap-1">
                                        <h6 class="mt-1">Kode : </h6>
                                        <p class="text-center mt-2">
                                            <?= $isi ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card m-2">
                                        <div class="card-body">
                                            <h5>Detail Peminjaman</h5>
                                            <div class="table-responsive">

                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Peminjam</th>
                                                        <th>Kode Peminjaman</th>
                                                        <th>Judul Buku</th>
                                                        <th>Tanggal Peminjaman</th>
                                                        <th>Tanggal Pengembalian</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Ahmad Saugi</td>
                                                        <td>1122334</td>
                                                        <td>Catatan Seorang Demostran</td>
                                                        <td>12/4/2023</td>
                                                        <td>12/5/2023</td>
                                                    </tr>
                                                </table>
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