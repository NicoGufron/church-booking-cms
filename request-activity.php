<?php
require_once("connect.php");
session_start();
include("sidenav.php");

?>


<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Formulir Pengajuan Kegiatan</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style-form.css">
</head>

<?php
$result = "<div class='notice'>
    <i class='fa-solid fa-circle-info' style='padding-right: 10px;padding-top: 5px'></i>
    <p>Pengajuan akan diberikan kepada admin, lalu akan diproses. Tekan tombol '<b>Ajukan Formulir</b>' apabila sudah mengisi semua informasi yang dibutuhkan.</p>
    </div>";
// $result = "<div class='alert alert-danger' role='alert'>
//             <i class='fa-solid fa-xmark' style='padding-right: 10px;padding-top: 5px'></i>
//             Gagal mengirim pengajuan kegiatan, mohon coba lagi!
//         </div>";

if ($_POST) {
    $id_account = $_SESSION['id'];
    $name = $_POST['nama'];
    $phone = $_POST['phone'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $new_startDate = date('Y-m-d', strtotime($startDate));
    $new_endDate = date('Y-m-d', strtotime($endDate));

    $building = $_POST['buildingOption'];
    $deskripsi = $_POST['deskripsi'];
    $sektor = $_SESSION['id_sektor'];

    

    if ($name != "" && $phone != "" && $startDate != "" && $endDate != "" && $building != "" && $deskripsi != "") {   
        $sql = "INSERT INTO request_activities (id, id_account, nama_peminta, nomor_telpon, id_sektor, deskripsi, tanggal_mulai, tanggal_berakhir, pilihan_gedung, approved) values (0, '$id_account', '$name', '$phone', '$sektor', '$deskripsi', '$new_startDate', '$new_endDate', '$building', false)";
        $result = "<div class='alert alert-success' role='alert'>
            <i class='fa-solid fa-check' style='padding-right: 10px;padding-top: 5px'></i>
            Pengajuan kegiatan telah dikirim!
        </div>";
    } else {
        $result = "<div class='alert alert-danger' role='alert'>
            <i class='fa-solid fa-xmark' style='padding-right: 10px;padding-top: 5px'></i>
            Gagal mengirim pengajuan kegiatan, mohon coba lagi!
        </div>";
    }

    $q = mysqli_query($conn, $sql);
}

?>

<body>
    <div class="container-fluid">
        <a href="request-activity-list-user.php"><button class='main-button' style='margin-left: 12.5%'>Cek Pengajuan Kegiatan Kamu</button></a>
        <section>
            <div class="request-form-section">
                <h4>Formulir Pengajuan Kegiatan</h4>
                <?php
                    echo $result;
                ?>

                <form class="form-group request-form" method="POST" id='request-form-application'>
                    <label>Nama Lengkap: </label>
                    <input type="text" placeholder="Masukkan nama disini" name='nama'>
                    <label>Nomor telpon yang bisa dihubungi:</label>
                    <input type="tel" placeholder="Nomor yang berawalan dengan 08..." name='phone' />
                    <div class="row justify-content-between">
                        <div class="col-6">

                            <label class="label-date">Tanggal Mulai: </label>
                            <input type="date" name='startDate' />
                        </div>
                        <div class="col-6">
                            <label class="label-date">Tanggal Akhir: </label>
                            <input type="date" name='endDate' />
                        </div>
                    </div>
                    <div class="custom-select">
                        <label>Gedung yang ingin digunakan: </label>
                        <select name='buildingOption'>
                            <option value="Gedung A">Gedung A</option>
                            <option value="Gedung B">Gedung B</option>
                        </select>
                    </div>
                    <label>Informasi Tambahan (Opsional): </label>
                    <textarea class="input-text-area" rows="4" cols="50" name="deskripsi"></textarea>
                    <button type="submit" class="main-button">Ajukan Formulir</button>
                </form>
            </div>
        </section>
    </div>
</body>


</html>