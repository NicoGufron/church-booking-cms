<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <img src="assets/images/logo.jpg" alt="HKBP Jatimurni Logo">
                        </div>
                        <p>Lokasi: Jl. Raya Kampung Sawah, Gang Mantri Tiing No. 30, RT 007/RW 001, Jatimurni, Pondok Melati, Kota Bekasi, Jawa Barat 17415</p>
                        <ul class="social-icons">
                            <li>
                                <a href="https://www.instagram.com/hkbpjatimurni_"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.youtube.com/@hkbpjatimurni5820"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Jelajah</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-auto">
                                <ul>
                                    <li><a href="index.php"><i class="fa fa-stop"></i>Beranda</a></li>
                                    <li><a href="about-us.php"><i class="fa fa-stop"></i>Tentang Kami</a></li>
                                    <!-- JEMAAT -->
                                    <?php if (isset($_SESSION["username"]) && isset($_SESSION['id_wijk']) && $_SESSION['id_wijk'] != "6") : ?>
                                        <li class="nav-item"><a href="request-activity.php"><i class="fa fa-stop"></i>Kegiatan</a></li>
                                        <!-- ADMIN -->
                                    <?php elseif (isset($_SESSION["username"]) && $_SESSION['id_wijk'] == "6") : ?>
                                        <li class="nav-item"><a href="request-activity-list.php"><i class="fa fa-stop"></i>Kegiatan</a></li>
                                    <?php else : ?>
                                        <li class="nav-item"><a href="kegiatan.php"><i class="fa fa-stop"></i>Kegiatan</a></li>
                                    <?php endif; ?>
                                    
                                    <?php if (isset($_SESSION["username"]) && isset($_SESSION['id_wijk']) && $_SESSION['id_wijk'] != "6") : ?>
                                        <li><a href="dashboard.php"><i class="fa fa-stop"></i>Dashboard</a></li>
                                        <!-- DASHBOARD ADMIN -->
                                    <?php elseif (isset($_SESSION["username"]) && $_SESSION['id_wijk'] == 6) : ?>
                                        <li><a href='dashboard-admin.php'><i class="fa fa-stop"></i>Dashboard</a></li>
                                        <!-- DASHBOARD JEMAAT -->
                                    <?php else : ?>
                                        <li><a href="login.php"><i class="fa fa-stop"></i>Login</a></li>
                                    <?php endif; ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Kontak Informasi</h4>
                        </div>
                        <ul>
                            <li><i class="fa fa-phone" style="padding-right: 10px"></i>Telepon:</li>
                            <ul>
                                <li class="contact-phones">Parhalado: <a target='_blank' href="https://wa.me/6285891683833">085891683833</a> (St. S. Malau)</li>
                                <li class="contact-phones">Sekolah Minggu: <a target='_blank' href="https://wa.me/625694870463">085694870463</a> (Brigitta Malau)</li>
                                <li class="contact-phones">Naposo: <a target='_blank' href="https://wa.me/62811550053">0811550053</a> (Gaby Silalahi)</li>
                                <li class="contact-phones">Remaja: <a target='_blank' href="https://wa.me/6282123202987">082123202987</a> (Racheal Silaban)</li>
                            </ul>
                            <li><i class="fa fa-envelope" style="padding-right: 10px"></i>Email: <a href="mailto:hkbpjtm@gmail.com">hkbpjtm@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>