<!DOCTYPE html>

<html>
<meta name="viewport" content="width= device-width, initial-scale=1" />

<head>
    <title>Gereja</title>
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
        <div class="first-section">
            <div class="header">
                <img class="hero-img" src="assets/images/1.jpg">
                <h1 class="hero-text">Gereja HKBP Resort Jatimurni</h1>
            </div>
        </div>
        <div class="second-section">
            <h4 class="title">Jadwal Ibadah</h4>
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
        <div class="third-section">
            <h4 class="title">Kegiatan Gereja</h4>
            <p class="subtitle"></p>
            <div class="church-activities">
                <?php 
                    //query untuk semua kegiatan gereja
                    
                ?>
            </div>
        </div>
        <div class="fourth-section">
            <div class="fourth-col">
                <i class="fa-solid fa-person-digging fa-2xl" style="height: 40px"></i>
                <h4 class="fourth-col-text">2008</h4>
                <p class="fourth-col-text">Tahun Berdiri</p>
            </div>
            <div class="fourth-col">
                <i class="fa-solid fa-user-group fa-2xl" style="height: 40px"></i>
                <h4 class="fourth-col-text">> 500</h4>
                <p class="fourth-col-text">Jumlah Jemaat</p>
            </div>
        </div>
        <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4961904600045!2d106.93415877499133!3d-6.32969439365987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6992e76c954885%3A0x2a74938e1af7e7e5!2sHKBP%20Ressort%20Jatimurni!5e0!3m2!1sen!2sid!4v1713943691465!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>

</html>