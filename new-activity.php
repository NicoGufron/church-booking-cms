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
    <link rel="apple-touch-icon" sizes="180x180" href=".//assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="style/style.css" />
</head>

<?php 
$result = "<div class='notify'>
        <i class='fa-solid fa-circle-info' style='padding-right: 10px;padding-top: 5px'></i>
        <p>Mohon untuk mengecek kembali semua data yang dibutuhkan untuk membuat kegiatan baru.</p>
    </div>";

if ($_POST) {
    $postNamaKegiatan = $_POST["nama_kegiatan"];
    $postPilihanSektor = $_POST["pilihan_sektor"];
    $postTanggal = $_POST["startDate"];
    $postDeskripsi = $_POST["deskripsi"];

    $namaSektor = "";

    if ($postPilihanSektor == "1") {
        $namaSektor = "Nazareth";
    } else if ($postPilihanSektor == "2") {
        $namaSektor = "Jerusalem";
    } else if ($postPilihanSektor == "3") {
        $namaSektor = "Bethlehem";
    } else if ($postPilihanSektor == "4") {
        $namaSektor = "Sion";
    } else if ($postPilihanSektor == "5") {
        $namaSektor = "Galilea";
    }

    $convertedDate = date("Y-m-d H:m:s", strtotime($postTanggal));

    $sql = "INSERT INTO activities (id, kegiatan, deskripsi, id_sektor, tanggal) VALUES (0, '$postNamaKegiatan', '$postDeskripsi', '$postPilihanSektor', '$convertedDate')";

    $q = mysqli_query($conn, $sql);

    var_dump($q, $sql);

}

?>

<body>
    <div class="container-fluid">
        <section class="new-activity-section">
            <div class="form-new-activity">
                <form class="form-group create-activity-section" method="post">
                    <h4 style="text-align: center";>Buat Kegiatan Baru</h4>
                        <?php echo $result; ?>
                    <label>Nama Kegiatan: </label>
                    <input type="text" placeholder="Masukkan nama kegiatan disini" name="nama_kegiatan">
                    <label>Untuk Wijk ke: </label>
                    <select name="pilihan_sektor" class="choose-sector-option" style="width: 35%">
                        <option value='1'>1 - Nazareth</option>
                        <option value='2'>2 - Jerusalem</option>
                        <option value='3'>3 - Bethlehem</option>
                        <option value='4'>4 - Sion</option>
                        <option value='5'>5 - Galilea</option>
                    </select>
                    <label>Tanggal dan Waktu Kegiatan:</label>
                    <input type="datetime-local" name='startDate' style="width: 35%" required>
                    <label>Deskripsi Kegiatan: </label>
                    <textarea class="deskripsi-area" rows="4" cols="50" name="deskripsi"></textarea>
                    <button type="submit" class="main-button">Atur Jadwal</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>