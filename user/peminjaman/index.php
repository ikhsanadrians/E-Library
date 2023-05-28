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
    <div class="container-fluid" style="overflow-x:hidden">
        <div class="row">
            <?php include('../../components/sidebar.php') ?>
            <div class="col-md-9" style="height:100vh">
                <div class="main-content">
                    <h3>Ajukan Peminjaman Buku</h3>
                    <div class="col-md-12 mt-4">
                        <form class="form-group">
                            <label for="mySelect" class="mb-2">Pilih Buku Yang Ingin Dipinjam</label>
                            <select id="mySelect" name="mySelect" class="form-control">
                                <option value="option1">Madilog</option>
                                <option value="option2">Laut Bercerita</option>
                                <option value="option3">Bagaimana Negara Gagal</option>
                            </select>
                            <div class="tgl-pinjam mt-4">
                                <label for="mySelect">Pilih Tanggal Meminjam Buku</label>
                                <input type="text" id="startDate" name="startDate" placeholder="Tanggal Peminjaman"
                                    class="form-control mt-2">
                            </div>
                            <div class="tgl-kembali mt-4">
                                <label for="mySelect">Pilih Buku Yang Ingin Dipinjam</label>
                                <input type="text" id="endDate" name="endDate" placeholder="Tanggal Pengembalian"
                                    class="form-control mt-2">
                            </div>
                            <div class="button-to-submit mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/extensions/fla"></script>
    <script>
        const selectElement = document.getElementById('mySelect');
        const choices = new Choices(selectElement);

        const startDateElement = document.getElementById('startDate');
        const endDateElement = document.getElementById('endDate');

        flatpickr(startDateElement, {
            dateFormat: 'Y-m-d',
            onChange: function (selectedDates, dateStr) {
                endDatePicker.set('minDate', dateStr);
            }
        });

        const endDatePicker = flatpickr(endDateElement, {
            dateFormat: 'Y-m-d',
            onChange: function (selectedDates, dateStr) {
                startDatePicker.set('maxDate', dateStr);
            }
        });
    </script>

</body>