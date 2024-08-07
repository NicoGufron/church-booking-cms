<?php 
    require_once("connect.php");
    $result = "";
    include("navbar.php");

    if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
        header('Location: dashboard.php');
    } else {
        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == "") {
                $result = "<div class='alert alert-danger' role='alert'>
                    Mohon untuk memasukkan username!
                </div>";
            } else if ($password == "") {
                $result = "<div class='alert alert-danger' role='alert'>
                    Mohon untuk memasukkan kata sandi!
                </div>";
            } else if ($username != "" && $password != "") {
                $sql = "SELECT * FROM accounts where username = '$username' and password = '$password';";
                $q = mysqli_query($conn, $sql);

                /// Jika query ada return sesuatu
                if (mysqli_num_rows($q) >= 1) {
                    while($row = mysqli_fetch_assoc($q)) {
                        $_SESSION["id"] = $row['id'];
                        $_SESSION["id_wijk"] = $row['id_wijk'];
                    }
                    $_SESSION['username'] = $username;
                }

                $accountFound = mysqli_num_rows($q);

                if ($accountFound == 1) {
                    $result = "<div class='alert alert-success' role='alert'>
                        Login berhasil!
                    </div>";
                    header("Refresh: 2, url=index.php");
                } else {
                    $result = "<div class='alert alert-danger' role='alert'>
                        Maaf, akun tidak ditemukan!
                    </div>";   
                }
            }
        }
    }
?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Masuk Akun - HKBP Ressort Jatimurni</title>
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



<body>
    <div class="container-fluid" style="display: flex; flex-direction: column; align-items: center">
        <div class="signup-section">
            <div class="header">
                <h3 style="text-align: left; font-weight: bold; color: #5b0f00";>Masuk Akun</h3>
                <p>Mari kita masuk akun anda untuk mengakses fitur lebih banyak!</p>
            </div>
            <br>
            <?php 
                echo $result; 
            ?>
            <form class="form-group signup-form" method="post">
                <label style="padding-top: 0%;">Username</label>
                <input type="text" name="username">
                <label>Kata Sandi</label>
                <input type="password" name="password">
                
                <button class="btn main-button">Masuk</button>
                <p style="text-align: center; padding-top: 25px">Belum mempunyai akun? <a href="signup.php"><u><b>Daftar disini</b></u></a></p>
            </form>
        </div>
    </div>
</body>

</html>