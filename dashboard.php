<?php
require_once("connect.php");
session_start();
include("sidenav.php");

?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Dashboard Akun</title>
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

<body>
    <div class="container-fluid">
        <section>
            <div class="dashboard-section">
                <h3>Selamat datang, <?php echo $_SESSION['username'] ?></h3>

                <section>
                    <div class="ibadah-section">
                        <?php
                        $id = $_SESSION['id'];
                        $sql = "SELECT id_sektor, nama_sektor FROM accounts where id = $id";

                        $q = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($q)) {
                            $id_sektor = $row['id_sektor'];
                            $nama_sektor = $row['nama_sektor'];
                        }

                        if ($id_sektor == "7") {
                            echo "<div class='notice one-notice'>
                                <div class='text-card' style='justify-content: flex-start;'>
                                    <i class='fa-solid fa-circle-info' style='padding-right: 20px;padding-top: 5px'></i>
                                    <p>Mari selesaikan registrasi kamu dengan mengisi data diri!</p>
                                </div>
                                <a href='account.php'><button class='check-now-button'>Lengkapi Sekarang</button></a>
                            </div>";
                        }

                        ?>

                        <h4 class="title">Jadwal Kegiatan Mendatang untuk <?php echo $nama_sektor ?></h4>
                        <p class="subtitle">Jadwal Ibadah Daring / Online </p>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Kegiatan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    // $idsektor = $_SESSION['id_sektor'];
                                    $sql = "SELECT * FROM activities WHERE id_sektor = $id_sektor ORDER BY tanggal DESC";
                                    $q = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($q)) {
                                        $kegiatan = $row['kegiatan'];
                                        $deskripsi = $row['deskripsi'];
                                        $tanggalMulai = $row['tanggal'];
                                        $convertedTanggal = date('d M Y, H:i', strtotime($tanggalMulai)) . " WIB";
                                        echo "<tr>
                                        <td class='table-child'>$kegiatan</td>
                                        <td class='table-child'>$convertedTanggal</td>
                                        <td class='table-child'>$deskripsi</td>
                                    </tr>";
                                    }

                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</body>

</html>