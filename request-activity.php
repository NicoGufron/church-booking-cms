<?php 
require_once("connect.php");
session_start();
include("sidenav.php");

?>


<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Formulir Pengajuan Kegiatan</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style-form.css">
    <!-- Quill JS -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid">
        <section>
            <h4>Formulir Pengajuan Kegiatan</h4>
            <div class="request-form-section">

                <form class="form-group request-form">
                    <label>Nama: </label>
                    <input type="text" placeholder="Masukkan nama disini">
                    <label>Nomor telp yang bisa dihubungi:</label>
                    <input type="tel" placeholder="Nomor yang berawalan dengan 08..."/>
                    <div class="row">
                        <div class="col-md-6">

                            <label style="padding-right: 20px; padding-top: 50px">Mulai Tanggal: </label>
                            <input type="date" />
                        </div>
                        <div class="col-md-6">
                            <label style="padding-right: 20px; padding-top: 50px">Akhir Tanggal: </label>
                            <input type="date" />
                        </div>
                    </div>
                    <label>Gedung yang ingin digunakan: </label>
                    <label>Informasi Tambahan: </label>
                    <div id="editor">
                        <p>Hello World!</p>
                        <p>Some initial <strong>bold</strong> text</p>
                        <p><br /></p>
                    </div>
                    <button class="main-button">Ajukan Formulir</button>
                </form>
            </div>
        </section>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>

<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>


</html>