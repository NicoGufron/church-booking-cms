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
    <link rel="apple-touch-icon" sizes="180x180" href=".//assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="style/style.css" />
</head>
<?php
require_once("connect.php");
include("navbar.html");

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
                <h4>Jadwal Kegiatan di HKPB Ressort Jatimurni</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="margin-top: 20px">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $loop = 0;
                                $sql = "SELECT * FROM activities WHERE id_sektor = '7' ORDER BY tanggal DESC LIMIT 10";
                                $q = mysqli_query($conn, $sql);
    
                                while ($activities = mysqli_fetch_assoc($q)) {
    
                                    $kegiatan = $activities['kegiatan'];
                                    $tanggalMulai = $activities['tanggal'];
                                    $deskripsi = $activities['deskripsi'];
                                    $convertedDeskripsi = nl2br($deskripsi);
                                    $convertedTanggal = date('d M Y, H:i', strtotime($tanggalMulai)) . " WIB";
    
                                    echo "<tr>
                                    <td class='table-child'>$kegiatan</td>
                                    <td class='table-child'>$convertedTanggal</td>
                                    <td class='table-child'>$convertedDeskripsi</td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>