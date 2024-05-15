<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Pendaftaran Akun - HKBP Ressort Jatimurni</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="180x180" href=".//assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="style/style-form.css">
</head>
<?php 
require_once("connect.php");
session_start();
$result = "";
include("navbar.html");

if (isset($_SESSION['username']) && isset($_SESSION['id_wijk'])) {
    header("Location: dashboard.php");
} else {
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if ($username == "") {
            $result = "<div class='alert alert-danger' role='alert'>
                Mohon untuk memasukkan username!
            </div>";
        } else if ($password !== $password2) {
            $result = "<div class='alert alert-danger' role='alert'>
                Kata sandi tidak sama!
            </div>";
        } else if ($password == "" || $password2 == "") {
            $result = "<div class='alert alert-danger' role='alert'>
                Kata sandi harus diisi!
            </div>";   
        } else {
            //sektor 6 berarti admin
            //sektor 7 berati tidak ada sektor
            //sektor 1 - 5 diatur sama admin
            //otomatis atur sektor jadi 7, anggapannya belum di assign admin
            $sql = "INSERT INTO accounts (id, username, password, id_wijk, nama_wijk) values (0, '$username', '$password', 7, 'Umum')";
            
            $q = mysqli_query($conn, $sql);

            //set sesi
            $_SESSION['username'] = $username;

            if ($q == true) {
                $result = "<div class='alert alert-success' role='alert'>
                    Pendaftaran akun berhasil!
                </div>";
            } else {
                $result = "<div class='alert alert-danger' role='alert'>
                    Mohon maaf, terjadi kesalahan. Mohon coba lagi!
                </div>";   
            }

        }
    }
}

?>

<body>
    <div class="container-fluid" style="display: flex; flex-direction: column; align-items: center">
        <div class="signup-section">
            <div class="header">
                <h3 style="text-align: left; font-weight: bold";>Daftar Akun</h3>
                <p>Mari daftarkan akun anda untuk mengakses fitur lebih banyak!</p>
            </div>
            <br>
            <?php echo $result ?>
            <form class="form-group signup-form" method="post">
                <label style="padding-top: 0%;">Username</label>
                <input type="text" name="username">
                <label>Kata Sandi</label>
                <input type="password" name="password" id="password">
                <label>Konfirmasi Kata Sandi</label>
                <input type="password" name="password2" id="password2">
                
                <button class="btn main-button">Daftar</button>
                <p style="text-align: center; padding-top: 25px">Sudah mempunyai akun? <a href="login.php"><u><b>Masuk disini</b></u></a></p>
            </form>
        </div>
    </div>
</body>

</html>