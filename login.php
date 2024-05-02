<!DOCTYPE html>

<html>

<head>
    <title>Masuk Akun - HKBP Ressort Jatimurni</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style-form.css">
</head>
<?php 
    require_once("connect.php");
    $result = "";
    session_start();
    include("navbar.html");

    if (isset($_SESSION['username'])) {
        header('location: dashboard.php');
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

                while($row = mysqli_fetch_assoc($q)) {
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["sektor"] = $row['sektor'];
                }
                $_SESSION['username'] = $username;

                $accountFound = mysqli_num_rows($q);

                if ($accountFound == 1) {
                    $result = "<div class='alert alert-success' role='alert'>
                        Login berhasil!
                    </div>";
                    header("Refresh: 3, url=dashboard.php");
                } else {
                    $result = "<div class='alert alert-danger' role='alert'>
                        Maaf, akun tidak ditemukan!
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
                <h3 style="text-align: left; font-weight: bold";>Masuk Akun</h3>
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