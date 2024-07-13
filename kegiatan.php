<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Kegiatan - HKBP Ressort Jatimurni</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    </script>
    <link rel="apple-touch-icon" sizes="180x180" href=".//assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="style/style.css" />
</head>
<?php
require_once("connect.php");
include("navbar.php");
?>

<body>
    <section>
        <div class="first-section">
            <div class="header"></div>
            <h1 class="hero-text">Kegiatan</h1>
        </div>
    </section>
    <div class="container">
        <section>
            <div class="activities">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "jemaat") :?>
                    <h4>Jadwal Kegiatan di HKPB Ressort Jatimurni</h4>
                <?php else : ?>
                    <h4>Jadwal Kegiatan Umum di HKPB Ressort Jatimurni</h4>
                <?php endif;?>
                <div class="table-responsive">
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "nonjemaat") : ?>
                        <table class="table table-striped table-hover" style="margin-top: 20px">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style='background-color: #5b0f00; color: #fff'>Kegiatan</th>
                                    <th scope="col" style='background-color: #5b0f00; color: #fff'>Wijk</th>
                                    <th scope="col" style='background-color: #5b0f00; color: #fff'>Tanggal</th>
                                    <th scope="col" style='background-color: #5b0f00; color: #fff'>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $loop = 0;
                                $sql = "SELECT * FROM activities WHERE id_wijk = '7' ORDER BY tanggal DESC LIMIT 10";
                                $q = mysqli_query($conn, $sql);
                                $namaWijk = "";

                                while ($activities = mysqli_fetch_assoc($q)) {

                                    $kegiatan = $activities['kegiatan'];
                                    $tanggalMulai = $activities['tanggal'];
                                    $deskripsi = $activities['deskripsi'];
                                    $idWijk = $activities['id_wijk'];
                                    $convertedDeskripsi = nl2br($deskripsi);
                                    $convertedTanggal = date('d M Y, H:i', strtotime($tanggalMulai)) . " WIB";

                                    if ($idWijk == "1") {
                                        $namaWijk = "Sion";
                                    } else if ($idWijk == "2") {
                                        $namaWijk = "Nazareth";
                                    } else if ($idWijk == "3") {
                                        $namaWijk = "Bethlehem";
                                    } else if ($idWijk == "4") {
                                        $namaWijk = "Jerusalem";
                                    } else if ($idWijk == "5") {
                                        $namaWijk = "Galilea";
                                    } else if ($idWijk == "6") {
                                        $namaWijk = "Parhalado";
                                    } else if ($idWijk == "7") {
                                        $namaWijk = "Umum";
                                    }

                                    echo "<tr>
                                        <td class='table-child'>$kegiatan</td>
                                        <td class='table-child'>$namaWijk</td>
                                        <td class='table-child'>$convertedTanggal</td>
                                        <td class='table-child'>$convertedDeskripsi</td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === "jemaat") : ?>
                        <div class="header-button" style="float:right; margin-bottom: 5px;">
                            
                            <?php if(!isset($_SESSION['username']) && !isset($_SESSION['id_wijk'])) : ?>
                                <a href="login.php"><button class='pengajuan-button' style="margin-bottom: 0">Pengajuan Ruangan</button></a>
                            <?php else: ?>
                                <a href="request-activity.php"><button class='pengajuan-button' style="margin-bottom: 0">Pengajuan Ruangan</button></a>
                            <?php endif;?>
                        </div>
                        <table class="table table-striped table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="background-color: #5b0f00; color: white" scope="col">#</th>
                                    <th style="background-color: #5b0f00; color: white" scope="col">Nama Kegiatan</th>
                                    <th style="background-color: #5b0f00; color: white" scope="col">Nama Peminjam</th>
                                    <th style="background-color: #5b0f00; color: white" scope="col">Nomor Telpon</th>
                                    <th style="background-color: #5b0f00; color: white" scope="col">Wijk</th>
                                    <th style="background-color: #5b0f00; color: white" scope="col">Tanggal Mulai</th>
                                    <th style="background-color: #5b0f00; color: white" scope="col">Tanggal Berakhir</th>
                                    <th style="background-color: #5b0f00; color: white" scope="col">Gedung</th>
                                    <th style="background-color: #5b0f00; color: white" scope="col">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM request_activities WHERE approved = '1' ORDER BY tanggal_mulai ASC";
                                $q = mysqli_query($conn, $sql);
                                $counter = 1;

                                while ($row = mysqli_fetch_assoc($q)) {
                                    $id = $row['id'];
                                    $nama = $row['nama_peminta'];
                                    $namaKegiatan = $row['nama_kegiatan'];
                                    $telpon = $row['nomor_telpon'];
                                    $idWijk = $row['id_wijk'];
                                    if ($idWijk == "1") {
                                        $nama_wijk = "Sion";
                                    } else if ($idWijk == "2") {
                                        $nama_wijk = "Nazareth";
                                    } else if ($idWijk == "3") {
                                        $nama_wijk = "Bethlehem";
                                    } else if ($idWijk == "4") {
                                        $nama_wijk = "Jerusalem";
                                    } else if ($idWijk == "5") {
                                        $nama_wijk = "Galilea";
                                    } else if ($idWijk == "6") {
                                        $nama_wijk = "Parhalado";
                                    } else if ($idWijk == "7") {
                                        $nama_wijk = "Umum";
                                    }

                                    $deskripsi = $row['deskripsi'];
                                    $convertedDeskripsi = nl2br($deskripsi);

                                    $tanggalMulai = $row['tanggal_mulai'];
                                    $tanggalBerakhir = $row['tanggal_berakhir'];
                                    $tanggalApprove = $row['tanggal_approve'];
                                    //konversi tanggal
                                    $convertedTanggalMulai = date('d M Y H:i', strtotime($tanggalMulai));
                                    $convertedTanggalBerakhir = date('d M Y H:i', strtotime($tanggalBerakhir));
                                    $convertedTanggalApprove = date('d M Y', strtotime($tanggalApprove));

                                    $pilihanGedung = $row['pilihan_gedung'];

                                    echo "<tr>
                                <td class='child-activity-list'>$counter</td>
                                <td class='child-activity-list'>$namaKegiatan</td>
                                <td class='child-activity-list'>$nama</td>
                                <td class='child-activity-list'>$telpon</td>
                                <td class='child-activity-list'>$idWijk - $nama_wijk</td>
                                <td class='child-activity-list'>$convertedTanggalMulai</td>
                                <td class='child-activity-list'>$convertedTanggalBerakhir</td>
                                <td class='child-activity-list'>$pilihanGedung</td>
                                <td class='child-activity-list' style='text-align:left;'>$convertedDeskripsi</td>
                            </tr>
                            ";
                                    $counter = $counter + 1;
                                }

                                ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>

            </div>
        </section>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>