<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>HKBP Ressort Jatimurni</title>
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
include("navbar.php");
?>

<body>

    <div class="container-fluid">
        <section>
            <div class="first-section">
                <div class="header">
                </div>
                <h1 class="hero-text">Gereja HKBP Resort Jatimurni</h1>
            </div>
        </section>

        <section class="about-us">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>Tentang Kami</h4>
                            <p style="font-size:14px">HKBP Ressort Jatimurni merupakan salah satu gereja di kawasan Kampung Sawah. HKBP Ressort Jatimurni masuk ke dalam Distrik XIX Bekasi.</p>
                            <br>
                            <a href="about-us.php">
                                <button class="more-button">Selengkapnya</button>
                            </a>
                            <br><br>
                            <div class="row justify-content-around">
                                <div class="col-sm-3 m-1 additional-info">
                                    <i class="fa-solid fa-person fa-xl"></i>
                                    <h5 style="text-align: center">Jumlah Jemaat</h5>
                                    <p class="about-us-text">837</p>
                                </div>
                                <div class="col-sm-3 m-1 additional-info">
                                    <i class="fa-solid fa-house fa-xl"></i>
                                    <h5 style="text-align: center">Tahun Berdiri</h5>
                                    <p class='about-us-text'>2008</p>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="assets/images/2.jpg" class="img-fluid image-church" alt="">
                    </div>
                </div>
                <!-- </div> -->
        </section>
        <section>
            <div class="second-section">
                <h4 class="title">Jadwal Kegiatan Umum</h4>
                <p class="subtitle">Jadwal Kegiatan Daring / Online
                <div class="table-responsive">
                    <table class="table-umum table-hover" style="margin-top: 20px">
                        <thead>
                            <tr>
                                <th bgcolor="#5b0f00" style="color:white">Tanggal</th>
                                <th bgcolor="#5b0f00" style="color:white">Kegiatan</th>
                                <th bgcolor="#5b0f00" style="color:white">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            //query untuk seluruh ibadah gereja, batasin hanya 5
                            $loop = 0;
                            $sql = "SELECT * FROM activities WHERE id_wijk = '7' ORDER BY tanggal DESC LIMIT 5";
                            $q = mysqli_query($conn, $sql);

                            while ($activities = mysqli_fetch_assoc($q)) {

                                $kegiatan = $activities['kegiatan'];
                                $tanggalMulai = $activities['tanggal'];
                                $deskripsi = $activities['deskripsi'];
                                $convertedDeskripsi = nl2br($deskripsi);
                                $convertedTanggal = date('d M Y, H:i', strtotime($tanggalMulai)) . " WIB";

                                echo "<tr>
                                <td class='table-home-child'>$kegiatan</td>
                                <td class='table-home-child'>$convertedTanggal</td>
                                <td class='table-home-child'>$convertedDeskripsi</td>
                            </tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section>

            <div class="third-section">
                <h4 class="title">Kegiatan Gereja</h4>
                <p class="subtitle"></p>
                <div class="church-activities">
                    <img class="img-responsive activity-img" src="assets/images/Ibadah Paskah/1.png" />
                    <img class="img-responsive activity-img" src="assets/images/Ibadah Paskah/2.png" />
                    <img class="img-responsive activity-img" src="assets/images/Ibadah Paskah/3.png" />
                    <img class="img-responsive activity-img" src="assets/images/Ibadah Paskah/4.png" />
                </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Selamat Datang!</h5>
                    </div>
                    <div class="modal-body">
                        Untuk website dapat berfungsi secara baik, mohon untuk memilih peran anda sebelum melanjutkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn more-button" id="roleJemaat">Jemaat</button>
                        <button type="button" class="btn more-button" id="roleNonJemaat">Non-Jemaat</button>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include("footer.php");
        ?>

    </div>
</body>
<script>
    function showModal() {
        <?php if (!isset($_SESSION['role'])) : ?>
            $(function() {
                $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false});
                $('#exampleModalCenter').modal('show');
            });
        <?php endif ?>

        var roleButtonJemaat = document.getElementById("roleJemaat");
        roleButtonJemaat.onclick = function() {
            setRole("jemaat")
        }

        var roleButtonNonJemaat = document.getElementById("roleNonJemaat");
        roleButtonNonJemaat.onclick = function() {
            setRole("nonjemaat");
        }
    }

    function setRole(role) {
        $.ajax({
            type: 'POST',
            url: 'set_session.php',
            data: {role: role},
            success: function(response) {
                if (response === "success") {
                    $("#exampleModalCenter").modal("hide");
                } else {
                    console.log("failed");
                }
            }
        })
    }

    window.onload = showModal();
</script>

</html>