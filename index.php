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
    <link rel="stylesheet" href="style/style.css" />
</head>

<?php
include("navbar.html");

?>

<body>

    <div class="container-fluid">
        <section>
            <div class="first-section">
                <div class="header">
                    <img class="hero-img" src="assets/images/1.jpg">
                    <h1 class="hero-text">Gereja HKBP Resort Jatimurni</h1>
                </div>
            </div>
        </section>

        <section class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>Tentang Kami</h4>
                            <p>HKBP Ressort Jatimurni merupakan salah satu gereja di kawasan Kampung Sawah. HKBP Ressort Jatimurni masuk ke dalam Distrik XIX Bekasi.</p>
                            <a href="about-us.php">
                                <button class="more-button">Selengkapnya</button>
                            </a>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="assets/images/2.jpg" class="img-fluid image-church" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="second-section">
                <h4 class="title">Jadwal Ibadah Umum</h4>
                <p class="subtitle">Jadwal Ibadah Daring / Online
                <table class="table">
                    <tr>
                        <th scope="col">Ibadah</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                    <?php

                    //query untuk seluruh ibadah gereja?
                    $loop = 0;

                    while ($loop < 5) {

                        echo "<tr>
                        <td>Ibadah Mingguan</td>
                        <td>Kamis, 09 September 2024</td>
                        <td>Pukul 06.30 WIB Bahasa Indonesia</td>
                        </tr>";

                        $loop = $loop + 1;
                    }

                    ?>
                </table>
            </div>
        </section>
        <section>

            <div class="third-section">
                <h4 class="title">Kegiatan Gereja</h4>
                <p class="subtitle"></p>
                <div class="church-activities">
                    <?php
                    //query untuk semua kegiatan gereja

                    ?>
                </div>
            </div>
        </section>

        <!-- <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4961904600045!2d106.93415877499133!3d-6.32969439365987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6992e76c954885%3A0x2a74938e1af7e7e5!2sHKBP%20Ressort%20Jatimurni!5e0!3m2!1sen!2sid!4v1713943691465!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> -->

        
        <?php
        include("footer.php");

        ?>

    </div>
</body>

</html>