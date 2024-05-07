<?php
require_once("connect.php");
session_start();
include("sidenav.php");

$id = $_SESSION['id'];

$sql = "SELECT * FROM accounts WHERE id = $id";
$q = mysqli_query($conn, $sql);

$result = "<div class='one-notice' style='flex-direction: row'>
    <i class='fa-solid fa-circle-info' style='padding-right: 10px;padding-top: 5px'></i>
    <p>Mohon untuk mengisi informasi data pribadi dengan benar ya, agar dapat ditinjau dengan baik.</p>
</div>";

while ($row = mysqli_fetch_assoc($q)) {
    $username = $row['username'];
    $namaLengkap = $row['nama_lengkap'];
    $email = $row['email'];
    $nomorTelpon = $row['nomor_telpon'];
    $namaKeluarga = $row['nama_keluarga'];
    $idSektor = $row['id_sektor'];
    $namaSektor = $row['nama_sektor'];
}

if ($_POST) {
    $postNamaLengkap = $_POST['nama-lengkap'];
    $postEmail = $_POST['email'];
    $postNomorTelpon = $_POST['nomor-telpon'];
    $postNamaKeluarga = $_POST['nama-keluarga'];
    $postIdSektor = $_POST['pilihan_sektor'];

    //Sektor == Wijk

    $namaSektor = "";

    if ($postIdSektor == "1") {
        $idSektor = "1";
        $namaSektor = "Nazareth";
    } else if ($postIdSektor == "2") {  
        $idSektor = "2";
        $namaSektor = "Jerusalem";
    } else if ($postIdSektor == "3") {
        $idSektor = "3";
        $namaSektor = "Bethlehem";
    } else if ($postIdSektor == "4") {
        $idSektor = "4";
        $namaSektor = "Sion";
    } else if ($postIdSektor == "5") {
        $idSektor = "5";
        $namaSektor = "Galilea";
    }

    //pengecekan semuanya disini
    if ($postNamaLengkap == "" || $postEmail == "" || $postNomorTelpon == "" || $postNamaKeluarga == "" || $postIdSektor == "") {
        $result = "<div class='alert alert-danger' role='alert'>
            <i class='fa-solid fa-xmark' style='padding-right: 10px;padding-top: 5px'></i>
            Mohon untuk mengisi informasi data yang kosong!
        </div>";
    } else {
        $result = "<div class='alert alert-success' role='alert'>
            <i class='fa-solid fa-check' style='padding-right: 10px;padding-top: 5px'></i>
            <strong>Informasi data pribadi berhasil disimpan!</strong>
        </div>";
        $sql = "UPDATE accounts SET nama_lengkap = '$postNamaLengkap', email = '$postEmail', nomor_telpon = '$postNomorTelpon', nama_keluarga = '$postNamaKeluarga', id_sektor = '$postIdSektor', nama_sektor = '$namaSektor' WHERE id = '$id'";
        $_SESSION['id_sektor'] = $postIdSektor;
        $q = mysqli_query($conn, $sql);
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Informasi Pribadi</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="180x180" href=".//assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container-fluid">
        <div style="text-align: left; padding: 3% 7.5% 2.5% 5%;";>
            <h3>Data Pribadi</h3>
            <p class='subtitle'>Mohon untuk mengisi informasi tentang kamu ya.</p>
        </div>
        <section class="profile-section">
            <div class='account-box'>
                <?php
                    echo $result;
                
                ?>
                <form class="form-group account-form" method="POST">
                    <label style='padding-top: 0%'>Username: </label>
                    <input type="text" value=<?php echo $username ?> disabled>
                    <label>Nama Lengkap<span style="color: red">*</span></label>
                    <input type="text" name='nama-lengkap' value=<?php echo $namaLengkap ?>>
                    <label>Pilihan Wijk<span style="color: red">*</span> </label>
                    <select name ='pilihan_sektor' class='custom-select'>
                        <option value='<?php echo $idSektor?>' selected readonly hidden><?php echo $idSektor == "7" ? "Silahkan pilih sektor" : "$idSektor - $namaSektor" ?></option>
                        <option class='options'value="1">1 - Nazareth</option>
                        <option class='options'value="2">2 - Jerusalem</option>
                        <option class='options'value="3">3 - Bethlehem</option>
                        <option class='options'value="4">4 - Sion</option>
                        <option class='options'value="5">5 - Galilea</option>
                    </select>
                    <label>Email<span style="color: red">*</span></label>
                    <input type="email" name='email' value=<?php echo $email ?>>
                    <label>Nomor Telpon<span style="color: red">*</span></label>
                    <input type="telp" name='nomor-telpon' value=<?php echo $nomorTelpon ?>>
                    <label>Nama Keluarga<span style="color: red">*</span></label>
                    <input type="text" name='nama-keluarga' value=<?php echo $namaKeluarga ?>>
                    
                    <button type="submit" class="main-button">Simpan</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>