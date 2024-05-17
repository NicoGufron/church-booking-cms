<?php
require_once("connect.php");
session_start();
include_once("sidenav.php");

if (!isset($_SESSION['username']) && !isset($_SESSION["id_wijk"]) && $_SESSION["id_wijk"] != "6") {
    header("Location: index.php");
}

?>
<!DOCTYPE html>

<html>

<head>
    <title>Jadwal Penggunaan Ruangan Gereja</title>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <div class="container-fluid">
        <section class="activity-list-section">
            <h4 style="margin-top: 40px">Jadwal Penggunaan Ruang Gereja</h4>
            <p class="subtitle" style="font-size: 14px">Data diurut berdasarkan tanggal mulai dan pengajuan telah diterima</p>
            <br><br>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Nama Peminjam</th>
                            <th scope="col">Nomor Telpon</th>
                            <th scope="col">Wijk</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Berakhir</th>
                            <th scope="col">Pilihan Gedung</th>
                            <th scope="col">Tanggal Approve</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM request_activities WHERE approved = '1' ORDER BY tanggal_mulai ASC";
                        $q = mysqli_query($conn, $sql);

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
                            $convertedTanggalMulai = date('d M Y', strtotime($tanggalMulai));
                            $convertedTanggalBerakhir = date('d M Y', strtotime($tanggalBerakhir));
                            $convertedTanggalApprove = date('d M Y', strtotime($tanggalApprove));

                            $pilihanGedung = $row['pilihan_gedung'];

                            echo "<tr>
                                <td class='child-activity-list'>$id</td>
                                <td class='child-activity-list'>$namaKegiatan</td>
                                <td class='child-activity-list'>$nama</td>
                                <td class='child-activity-list'>$telpon</td>
                                <td class='child-activity-list'>$idWijk - $nama_wijk</td>
                                <td class='child-activity-list'>$convertedTanggalMulai</td>
                                <td class='child-activity-list'>$convertedTanggalBerakhir</td>
                                <td class='child-activity-list'>$pilihanGedung</td>
                                <td class='child-activity-list'>$convertedTanggalApprove</td>
                                <td class='child-activity-list'>$convertedDeskripsi</td>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>


</html>