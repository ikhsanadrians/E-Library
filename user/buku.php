<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku | E-Perpus</title>
    <link rel="stylesheet" href="../assets/css/elibrary/index.css">
    <link rel="stylesheet" href="../assets/css/main/app.css">
    <link rel="shortcut icon" href="../assets/images/eperpus/logo-eperpus-mini.png" type="image/x-icon">

</head>

<body>
    <div class="container-fluid" style="overflow-x:hidden">
        <div class="row">
            <?php include('../components/sidebar.php') ?>
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
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/samples/jump.jpg" alt="Title">
                                    <div class="card-body">
                                        <h4 class="card-title">Madilog</h4>
                                        <p class="card-text">Tan Malaka</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/samples/jump.jpg" alt="Title">
                                    <div class="card-body">
                                        <h4 class="card-title">Dilan 1991</h4>
                                        <p class="card-text">Pidi Baiq</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/samples/jump.jpg" alt="Title">
                                    <div class="card-body">
                                        <h4 class="card-title">Laut Bercerita</h4>
                                        <p class="card-text">Leila S. Chudori</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/samples/jump.jpg" alt="Title">
                                    <div class="card-body">
                                        <h4 class="card-title">Sang Pemimpi</h4>
                                        <p class="card-text">Andrea Hirata</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/samples/jump.jpg" alt="Title">
                                    <div class="card-body">
                                        <h4 class="card-title">Orang Orang Dipersimpangan Kiri Jalan</h4>
                                        <p class="card-text">Soe Hok Gie</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/samples/jump.jpg" alt="Title">
                                    <div class="card-body">
                                        <h4 class="card-title">Orang Orang Dipersimpangan Kiri Jalan</h4>
                                        <p class="card-text">Soe Hok Gie</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/samples/jump.jpg" alt="Title">
                                    <div class="card-body">
                                        <h4 class="card-title">Orang Orang Dipersimpangan Kiri Jalan</h4>
                                        <p class="card-text">Soe Hok Gie</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/images/samples/jump.jpg" alt="Title">
                                    <div class="card-body">
                                        <h4 class="card-title">Orang Orang Dipersimpangan Kiri Jalan</h4>
                                        <p class="card-text">Soe Hok Gie</p>
                                    </div>
                                </div>
                            </div>
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