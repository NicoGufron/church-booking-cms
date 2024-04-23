<html>

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css" />
</head>

<?php
require_once("connect.php");
session_start();
$result = "";
if (isset($_SESSION["username"])) {
    //pindah ke halaman dashboard
} else {
    if ($_POST) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM account where username = '$username' or email='$username' and password = '$password'";
        $q = mysqli_query($conn, $sql);

        $accountFound = mysqli_num_rows($q);
        if ($accountFound == 1) {
            $result = "<div class='alert alert-dismissible alert-success'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Berhasil masuk!</strong>
            </div>";
        } else {
            $result =
                "<div class='alert alert-dismissible alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Email / username salah, atau kata sandi salah!</strong>
            </div>";
        }
    }
}

?>

<body>
    <div class="container">
        <h1> Akses Admin Panel</h1>
        <div class="login-section">
            <?php echo $result ?>
            <h3>Masuk ke Akun</h3>
            <p></p>
            <form class="login-form" method="post" >
                <label>Email / username</label>
                <input type="text" name="username">
                <p></p>
                <label>Kata Sandi</label>
                <input type="password" name="password">
                <button class="btn main-button">Masuk</button>
            </form>
        </div>
    </div>
</body>

</html>