<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Perpus</title>
  <link rel="stylesheet" href="./assets/css/elibrary/index.css">
  <link rel="stylesheet" href="./assets/css/main/app.css">
  <link rel="shortcut icon" href="./assets/images/eperpus/logo-eperpus-mini.png" type="image/x-icon">
</head>

<body>
  <div class="container-fluid" style="overflow-x:hidden">
    <div class="row">
      <?php include('./components/sidebar.php')?>
      <div class="col-md-9" style="height:100vh">
        <div class="main-content">
          <div class="row">
            <div class="col-md-12 d-flex justify-content-between">
              <div class="profile-pic" style="height:100%; display: flex; align-items:center; gap:10px">
              <h4 class="title"><span><img src="./assets/images/faces/2.jpg" alt="pp" class="profile-picture rounded-circle"></span> Ahmad Saugi</h4>
              </div>
              <i class="bi bi-box-arrow-left" style="font-size:1.3rem"></i>
            </div>
            <div class="col-md-6 mt-2">
              <div class="card bg-white shadow-sm">
                <div class="card-body">
                  <div class="row d-flex justify-content-between">
                    <div class="icon">
                      <i class="bi bi-book" style="font-size:2rem"></i>
                    </div>
                      <div class="title">
                      <h2 class="card-title text-muted">Buku Yang Dipinjam</h2>
                      <h1 class="card-text">2</h1>
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
                      <h2 class="card-title text-muted">Buku Yang Dikembalikan</h2>
                      <h1 class="card-text">3</h1>
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
                    <tr class="">
                      <td scope="row">1</td>
                      <td>Dilan 1990</td>
                      <td>08/11/2023</td>
                      <td>10/11/2023</td>
                      <td>Belum Dikembalikan</td>
                    </tr>
                    <tr class="">
                      <td scope="row">Item</td>
                      <td>Laut Bercerita</td>
                      <td>09/11/2023</td>
                      <td>12/11/2023</td>
                      <td>Belum Dikembalikan</td>
                    </tr>
                  </tbody>
                </table>
               </div>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./assets/js/app.js"></script>
</body>

</html>