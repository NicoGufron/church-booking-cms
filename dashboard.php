<?php 
require_once("connect.php");
session_start();
include("sidenav.html")

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Dashboard Admin</title>
    </head>
    <body class="container-fluid">
        <h3>Hallo, <?php echo $_SESSION['username']?></h3>
        <p>Kamu mmemiliki 4 pengajuan kegiatan</p>
    </body>
</html>