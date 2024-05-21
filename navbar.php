<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" ref="style/style.css"> -->
</head>
<nav class="navbar navbar-expand-lg" style="border-bottom: 1px solid black">
    <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo.jpg" style="width: 50px; height: 50px">
        Gereja HKBP Ressort Jatimurni
    </a>
    <button class="drawer-menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="background-color: transparent; color: white; border: 0px"><i class="fa-solid fa-bars fa-xl"></i></button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Beranda </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about-us.php">Tentang Kami</a>
            </li>
            <!-- JEMAAT -->
            <?php if (isset($_SESSION["username"]) && isset($_SESSION['id_wijk']) && $_SESSION['id_wijk'] != "6") : ?>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Jadwal Kegiatan</a>
                </li>
                <!-- ADMIN -->
            <?php elseif (isset($_SESSION["username"]) && $_SESSION['id_wijk'] == "6") : ?>
                <li class="nav-item">
                    <a class="nav-link" href="activity-list.php">Jadwal Kegiatan</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="kegiatan.php">Jadwal Kegiatan</a>
                </li>
            <?php endif; ?>
            <?php if (!isset($_SESSION["username"]) && !isset($_SESSION['id_wijk'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <!-- DASHBOARD ADMIN -->
            <?php elseif (isset($_SESSION["username"]) && $_SESSION['id_wijk'] == 6) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="request-activity-list.php">Daftar Pengajuan Kegiatan</a>
                </li>
                <!-- DASHBOARD JEMAAT -->
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="request-activity.php">Pengajuan Kegiatan</a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION["username"]) && isset($_SESSION['id_wijk'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Keluar</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- BUAT MOBILE -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="background-color: #f5eeEb">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="index.php">Beranda </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="about-us.php">Tentang Kami</a>
                </li>
                <!-- JEMAAT -->
                <?php if (isset($_SESSION["username"]) && isset($_SESSION['id_wijk']) && $_SESSION['id_wijk'] != "6") : ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="request-activity.php">Jadwal Kegiatan</a>
                    </li>
                    <!-- ADMIN -->
                <?php elseif (isset($_SESSION["username"]) && $_SESSION['id_wijk'] == 6) : ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="request-activity-list.php">Jadwal Kegiatan</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="kegiatan.php">Kegiatan</a>
                    </li>
                <?php endif; ?>
                <?php if (!isset($_SESSION["username"]) && !isset($_SESSION['id_wijk'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="login.php">Login</a>
                    </li>
                    <!-- DASHBOARD ADMIN -->
                <?php elseif (isset($_SESSION["username"]) && $_SESSION['id_wijk'] == 6) : ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="request-activity-list.php">Pengajuan Kegiatan</a>
                    </li>
                    <!-- JEMAAT -->
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="request-activity.php">Pengajuan Kegiatan</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION["username"]) && isset($_SESSION['id_wijk'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #5b0f00; font-weight:bold" href="logout.php">Keluar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

</html>