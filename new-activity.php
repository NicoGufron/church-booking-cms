<?php
require_once("connect.php");
session_start();
include("sidenav.php");

if ($_SESSION['id_wijk'] != "6") {
    header("Location: index.php");
}

if (!isset($_SESSION['username']) && !isset($_SESSION['id_wijk'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>

<html>

<head>
    <title>Buat Kegiatan Baru</title>
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
    $postPilihanWijk = $_POST["pilihan_sektor"];
    $postTanggal = $_POST["startDate"];
    $postDeskripsi = $_POST["deskripsi"];
    $postAlamat = $_POST['alamat'];

    $namaWijk = "";
    
    if ($postPilihanWijk == "1") {
        $namaWijk = "Nazareth";
    } else if ($postPilihanWijk == "2") {
        $namaWijk = "Jerusalem";
    } else if ($postPilihanWijk == "3") {
        $namaWijk = "Bethlehem";
    } else if ($postPilihanWijk == "4") {
        $namaWijk = "Sion";
    } else if ($postPilihanWijk == "5") {
        $namaWijk = "Galilea";
    }
    
    $convertedDate = date("Y-m-d H:i", strtotime($postTanggal));

    if ($postNamaKegiatan != "" && $postPilihanWijk != "" && $postTanggal != "" && $postAlamat != "" && $postDeskripsi != "") {
        $sql = "INSERT INTO activities (id, kegiatan, deskripsi, id_wijk, tanggal, alamat) VALUES (0, '$postNamaKegiatan', '$postDeskripsi', '$postPilihanWijk', '$convertedDate', '$postAlamat')";
        $result = "<div class='alert alert-success' role='alert'>
            <i class='fa-solid fa-check' style='padding-right: 10px;padding-top: 5px'></i>
            Kegiatan baru telah dikirim!
        </div>";
        $q = mysqli_query($conn, $sql);
    } else {
        $result = "<div class='alert alert-danger' role='alert'>
            <i class='fa-solid fa-xmark' style='padding-right: 10px;padding-top: 5px'></i>
            Gagal membuat kegiatan baru, mohon coba lagi!
        </div>";
    }
}

?>

<body>
    <div class="container-fluid">
        <section class="new-activity-section">
            <div class="form-new-activity">
                <form class="form-group create-activity-section" method="post">
                    <h4 style="text-align: center";>Buat Kegiatan Baru</h4>
                        <?php echo $result; ?>
                    <label>Nama Kegiatan:<span style="color: red">*</span></label>
                    <input type="text" placeholder="Masukkan nama kegiatan disini" name="nama_kegiatan" required>
                    <label>Untuk Wijk ke:<span style="color: red">*</span></label>
                    <select name="pilihan_sektor" class="choose-sector-option">
                        <?php 
                            $sql = "SELECT * FROM `wijk`";
                            $q = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($q)) {
                                $idWijk = $row['id_wijk'];
                                $namaWijk = $row['nama_wijk'];
                                echo "<option class='options' value='$idWijk'>$idWijk - $namaWijk</option>";
                            }
                        ?>
                    </select>
                    <label>Tanggal dan Waktu Kegiatan:<span style="color: red">*</span></label>
                    <input class="waktu-kegiatan" type="datetime-local" name='startDate' required>
                    <label>Alamat:<span style="color: red">*</span></label>
                    <input type="text" name="alamat">
                    <label>Deskripsi Kegiatan:<span style="color: red">*</span></label>
                    <textarea class="deskripsi-area" rows="4" cols="50" name="deskripsi" title="Mohon untuk mengisi deskripsi kegiatan" required></textarea>
                    <button type="submit" class="main-button">Atur Jadwal</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>