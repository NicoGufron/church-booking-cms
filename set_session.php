<?php
session_start();
if (isset($_POST['role'])) {
    $_SESSION['role'] = $_POST['role'];
    echo "success";
}

?>