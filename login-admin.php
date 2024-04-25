<html>

<head>
    <title>Akses Admin Panel</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style-form.css" />

</head>

<?php
require_once("connect.php");
session_start();
$result = "";
if (isset($_SESSION["username"])) {
    //pindah ke halaman dashboard
    header("dashboard-admin.php");
} else {
    if ($_POST) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM accounts where username = '$username' and password = '$password'";
        $q = mysqli_query($conn, $sql);

        $accountFound = mysqli_num_rows($q);

        if ($accountFound == 1) {
            $_SESSION['username'] = $username;
            $result = "<div class='alert alert-dismissible alert-success'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Berhasil masuk!</strong>
            </div>";
            header("Refresh: 3, url= dashboard-admin.php");
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
    <div class="container-fluid">
        <section>
            <div class="admin-access">
                <h1> Akses Admin Panel</h1>
                <div class="signup-section">
                    <?php echo $result;?>
                    <h3>Masuk ke Akun</h3>
                    <p></p>
                    <form class="signup-form" method="post">
                        <label>Username</label>
                        <input type="text" name="username">
                        <p></p>
                        <label>Kata Sandi</label>
                        <input type="password" name="password">
                        <button class="btn main-button">Masuk</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>

</html>