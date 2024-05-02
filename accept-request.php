<?php
require_once("connect.php");
session_start();
// if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['id'] == 0) {
    if ($_GET['id']) {
        $id = $_GET['id'];
        $todayDate = date("Y-m-d");
        $sql = "UPDATE request_activities SET approved = '1', tanggal_approve = '$todayDate' WHERE id = '$id'";

        $q = mysqli_query($conn, $sql);
        header("location: request-activity-list.php");

    }
// }
?>