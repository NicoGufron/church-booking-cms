<?php 
require_once("connect.php");
session_start();

if ($_SESSION['id_wijk'] == '6' && $_GET['id']) {
    $id = $_GET['id'];
    $sql = "DELETE FROM activities WHERE id = '$id'";

    $q = mysqli_query($conn, $sql);

    if ($q) {
        header("location: dashboard-admin.php");
    }
}

?>