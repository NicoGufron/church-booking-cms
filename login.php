<!DOCTYPE html>

<html>

<head>
    <title>Masuk Akun</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style-form.css">
</head>
<?php 
    $result = "";
    include("navbar.html");
?>


<body>
    <div class="container-fluid" style="display: flex; flex-direction: column; align-items: center">
        <div class="signup-section">
            <?php echo $result ?>
            <div class="header">
                <h3 style="text-align: left; font-weight: bold";>Masuk Akun</h3>
                <p>Mari kita masuk akun anda untuk mengakses fitur lebih banyak!</p>
            </div>
            <p></p>
            <form class="form-group signup-form" method="post">
                <label style="padding-top: 0%;">Username</label>
                <input type="text" name="username">
                <label>Kata Sandi</label>
                <input type="password" name="password">
                
                <button class="btn main-button">Masuk</button>
                <p style="text-align: center; padding-top: 25px">Belum mempunyai akun? <a href="signup.php"><u>Daftar disini</u></a></p>
            </form>
        </div>
    </div>
</body>

</html>