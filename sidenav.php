<?php 
require_once("connect.php");

$menu = "";
$username = $_SESSION['username'];

$sql = "SELECT username, sektor FROM accounts WHERE username = '$username'";

$q = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($q);



?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
         /* Side nav only */
            .sidenav{
                height: 100%;
                width: 0;
                position:fixed;
                z-index:1;
                top: 0;
                left: 0;
                background-color: whitesmoke;
                border-right: 1px solid black;
                overflow-x: hidden;
                padding-top: 80px;
                transition: 0.5s;
            }

            .sidenav a:nth-child(1) {
                margin-top: 20px;
            }
            .sidenav a {
                padding: 7.5% 7.5%;
                text-decoration: none;
                font-size: 16px;
                color: #000;
                display: block;
                transition: 0.3s;
            }
            .sidenav a:hover {
                background-color: #cccccc;
                font-weight: bold;
                color: black;
            }
            .sidenav .closebtn {
                background-color: transparent;
                position: absolute;
                top: 0;
                right: 25px;
                font-size:36px;
                margin-left:50px;
            }

            .sidenav .closebtn:hover {
                background-color: transparent;
                color: #ff0000;
            }

            .navbar-brand {
                padding-left: 40px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" onclick="openNav()"><i class="fa-solid fa-bars fa-md" style="padding-right: 20px"></i>Dashboard</a>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">

                </button> -->
        </nav>
        <div id ="sidenav" class="sidenav">
            <?php echo $_SESSION['sektor'] != 0 ? "<a href='account.php' class='sidenav-links'><i class='fa-solid fa-user'></i>Atur Informasi Pribadi</a>" : "" ?> 
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="request-activity.php" class="sidenav-links active"><i class="fa-solid fa-file-lines"></i>Pengajuan Kegiatan</a>
            <?php echo $_SESSION['sektor'] == 0 ? "<a href='dashboard.php' class='sidenav-links'><i class='fa-regular fa-calendar-days'></i>Pengaturan Jadwal Ibadah</a>" : "<a href='dashboard.php' class='sidenav-links'><i class='fa-regular fa-calendar-days'></i>Lihat Jadwal Ibadah</a>"; ?> 
            <a href="logout.php" class="sidenav-links"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000"></i>Keluar</a>
        </div>
    </body>
    <script>
    function openNav(){
        document.getElementById("sidenav").style.width="250px";
    }
    function closeNav(){
        document.getElementById("sidenav").style.width = "0px";
    }
    </script>
</html>