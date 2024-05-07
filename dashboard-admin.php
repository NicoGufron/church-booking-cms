<?php
require_once("connect.php");
session_start();
include("sidenav.php");

if (!isset($_SESSION['id_sektor'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>

<html>

<head>
    <title>Dashboard Admin</title>
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
$sql = "SELECT * FROM request_activities WHERE approved = '0'";

$q = mysqli_query($conn, $sql);

$totalRequests = mysqli_num_rows($q);

?>

<body class="container-fluid">
    <section>
        <div class="dashboard-section">
            <h3>Hallo, <?php echo $_SESSION['username'] ?></h3>
            <div class="cards">
                <?php
                    echo $totalRequests == 0 ? "<div class='row justify-content-start align-items-start'>" : "<div class='row justify-content-start'>";
                    echo $totalRequests > 0 ? "<div class='col notice'>
                        <div class='text-card'>
                            <i class='fa-solid fa-circle-info' style='padding-right: 20px;padding-top: 5px'></i>
                            <p style='color: #183153'>Kamu memiliki <b>$totalRequests</b> pengajuan kegiatan. </p>
                        </div>
                        <a href='request-activity-list.php'><button class='check-now-button'>Cek Sekarang</button></a>
                    </div>"
                        :
                    "<div class='col-sm-6 notice'>
                        <div class='text-card'>
                            <i class='fa-solid fa-circle-info' style='padding-right: 20px;padding-top: 5px'></i>
                            <p>Belum ada laporan pengajuan kegiatan.</p>
                        </div>
                    </div>";
                    ?>
                </div>
            </div>
            <br><br>
            <div class="row justify-content-between align-items-center">
                <div class="col-md-4">
                    <h4 class="title">Jadwal Kegiatan Mendatang</h4>
                    <p class="subtitle">Jadwal diurut dari yang paling baru.</p>
                    <br>
                </div>
                <div class="col-md-4" style="display: flex; justify-content:flex-end">
                    <a href="new-activity.php"><button class='check-now-button' style="margin-left: 0">Buat Kegiatan Baru</button></a>
                </div>
            </div>
            <table class="table table-striped table-hover .table-responsive">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Wijk</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sektor = $_SESSION['id_sektor'];
                        $sql = "SELECT * FROM activities order by tanggal desc";
                        $q = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($q)) {
                            $kegiatan = $row['kegiatan'];
                            $tanggalMulai = $row['tanggal'];
                            $sektor = $row['id_sektor'];
                            $deskripsi = $row['deskripsi'];
                            $convertedTanggal = date('d M Y, H:i', strtotime($tanggalMulai)) . " WIB";
                            $convertedDeskripsi = nl2br($deskripsi);
                            echo "<tr>
                                <td class='table-child'>$kegiatan</td>
                                <td class='table-child'>$convertedTanggal</td>
                                <td class='table-child'>$sektor</td>
                                <td class='table-child'>$convertedDeskripsi</td>
                            </tr>";
                        }

                    ?>
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>