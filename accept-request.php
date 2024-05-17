<?php
require_once("connect.php");
session_start();
// if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['id'] == 0) {
    if ($_GET['id'] != "") {
        $id = $_GET['id'];
        $todayDate = date("Y-m-d");
        $sql = "UPDATE request_activities SET approved = '1', tanggal_approve = '$todayDate' WHERE id = '$id'";

        $q = mysqli_query($conn, $sql);

        // jika sukses
        if ($q) {
            $sql = "SELECT nama_kegiatan, deskripsi, id_wijk, tanggal_mulai FROM request_activities WHERE id = $id";

            $query = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($query)) {
                $namaKegiatan = $row['nama_kegiatan'];
                $deskripsi = $row['deskripsi'];
                $tanggal_mulai = $row['tanggal_mulai'];
                $idWijk = $row['id_wijk'];

                $convertedDeskripsi = nl2br($deskripsi);
                $insertSql = "INSERT INTO activities (id, kegiatan, deskripsi, id_wijk, tanggal) VALUES (0, '$namaKegiatan', '$convertedDeskripsi', $idWijk, '$tanggal_mulai')";
                var_dump($insertSql);
                mysqli_query($conn, $insertSql);
            }


        }

        header("location: request-activity-list.php");

    }
// }
?>