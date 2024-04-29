<?php
require_once("connect.php");
session_start();
include("sidenav.php");

?>

<!DOCTYPE html>

<html>

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css" />
</head>

<?php 
$result = "<div class='notify'>
        <i class='fa-solid fa-circle-info' style='padding-right: 10px;padding-top: 5px'></i>
        <p>Mohon untuk mengecek kembali semua data yang dibutuhkan untuk membuat kegiatan baru.</p>
    </div>";

?>

<body>
    <div class="container-fluid">
        <section class="new-activity-section">
            <div class="form-new-activity">
                <form class="form-group create-activity-section" method="post">
                    <h4 style="text-align: center";>Buat Kegiatan Baru</h4>
                        <?php echo $result; ?>
                    <label>Nama Kegiatan: </label>
                    <input type="text" placeholder="Masukkan nama kegiatan disini" name="kegiatan">
                    <label>Untuk sektor ke: </label>
                    <select class="choose-sector-option" style="width: 35%">
                        <option>Sektor 1</option>
                        <option>Sektor 2</option>
                        <option>Sektor 3</option>
                        <option>Sektor 4</option>
                        <option>Sektor 5</option>
                    </select>
                    <label>Tanggal Kegiatan:</label>
                    <input type="datetime-local" name='startDate' style="width: 35%">
                    <label>Deskripsi Kegiatan: </label>
                    <textarea class="input-text-area" rows="4" cols="50" name="deskripsi"></textarea>
                    <button type="submit" class="main-button">Atur Jadwal</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>