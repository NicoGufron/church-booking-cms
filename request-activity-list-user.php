<?php
require_once("connect.php");
session_start();
include("sidenav.php");

?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Daftar Pengajuan Kegiatan</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="180x180" href=".//assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="style/style.css" />
</head>

<?php
$id = $_SESSION['id'];

$result = "";
?>

<body>
    <div class="container-fluid">
        <section class="request-list-section">
            <h4>Daftar Pengajuan Kegiatan</h4>
            <p class='subtitle' style="font-size: 14px" ;>Data diurut berdasarkan pengajuan paling baru</p>
            <br>
            <div class='table-responsive'>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col"># Pengajuan</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Nama Kegiatan</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Nama Peminta</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Nomor Telpon</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Wijk</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Tanggal Mulai</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Tanggal Berakhir</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Pilihan Gedung</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Deskripsi</th>
                            <th style="background-color: #5b0f00; color: #fff; padding: .5rem .5rem" scope="col">Status Pengajuan</th>
                            <!-- <th scope="col">Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sort = 'nomor_telpon';
                        $limit = 0;
                        $offset = 25;


                        $sql = "SELECT * FROM request_activities WHERE id_account = $id ORDER BY id DESC";
                        // $sql .= ' ORDER BY ' . $sort . ' ASC ';
                        // $sql .= ' LIMIT ' . $limit . ', ' . $offset;
                        $q = mysqli_query($conn, $sql);
                        $counter = 1;

                        while ($row = mysqli_fetch_assoc($q)) {
                            $id = $row['id'];
                            $namaKegiatan = $row['nama_kegiatan'];
                            $nama = $row['nama_peminta'];
                            $telpon = $row['nomor_telpon'];
                            $idWijk = $row['id_wijk'];
                            $deskripsi = $row['deskripsi'];
                            $convertedDeskripsi = nl2br($deskripsi);

                            $tanggalMulai = $row['tanggal_mulai'];
                            $tanggalBerakhir = $row['tanggal_berakhir'];
                            $tanggalApprove = $row['tanggal_approve'];
                            //konversi tanggal
                            $convertedTanggalMulai = date('d M Y', strtotime($tanggalMulai));
                            $convertedTanggalBerakhir = date('d M Y', strtotime($tanggalBerakhir));
                            $convertedTanggalApprove = date('d M Y', strtotime($tanggalApprove));

                            $pilihanGedung = $row['pilihan_gedung'];
                            $approve = $row['approved'];

                            $approvedMessage = "";

                            $reason = $row['reason'];
                            $convertedReason = nl2br($reason);

                            if ($approve == "0") {
                                $approvedMessage = "<span class='status-message-on-process'>Dalam Proses</span>";
                            } else if ($approve == "1") {
                                $approvedMessage = "<span class='status-message-accepted'>Pengajuan diterima</span>";
                            } else if ($approve == "2" && $reason == "") {
                                $approvedMessage = "<span class='status-message-denied'>Pengajuan ditolak</span>";
                            } else if ($approve == "2" && $reason != "") {
                                $approvedMessage = "<span class='status-message-denied'>Pengajuan ditolak <button class='approval-buttons' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='$reason'><i class='fa-solid fa-file-invoice' style='padding-left: 5px; color: #721c24'></i></button></span>";
                            }

                            if ($approve == "0") {
                                $value = "<p style='padding: 5px; font-weight: 600; background-color: #ccc; border-radius: 10px;'>Belum disetujui</p>";
                            } else if ($approve == "1") {
                                $value = "<p style='padding: 5px; font-weight: 600; background-color: #7ABA78; border-radius: 10px; color: #fff'>Disetujui</p>";
                            } else if ($approve == "2") {
                                $value = "<p style='padding: 5px; font-weight: 600; background-color: #B80000; border-radius: 10px; color: #fff'>Tidak Disetujui</p>";
                            }


                            echo "<tr>
                                <td class='child-request-list'>$counter</td>
                                <td class='child-request-list'>$namaKegiatan</td>
                                <td class='child-request-list'>$nama</td>
                                <td class='child-request-list'>$telpon</td>
                                <td class='child-request-list'>$idWijk</td>
                                <td class='child-request-list'>$convertedTanggalMulai</td>
                                <td class='child-request-list'>$convertedTanggalBerakhir</td>
                                <td class='child-request-list'>$pilihanGedung</td>
                                <td class='child-request-list'>$convertedDeskripsi</td>
                                <td class='child-request-list'>$approvedMessage</td>
                            ";

                            $counter = $counter + 1;
                        }

                        ?>

                    </tbody>
                </table>
            </div>

        </section>
    </div>


    <!-- Untuk modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Kegiatan Ditolak</h1>
                    <button id="dismiss" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id='#modal-form'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Alasan:</label>
                            <textarea id="reason-area" name='reason' class="form-control" id="message-text" rows='10' readonly></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="dismiss" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit-form'])) {
        $reasonForm = $_POST["reason"];
        $idForm = $_POST["idForm"];
        $todayDate = date('Y-m-d');

        $sql = "UPDATE request_activities SET approved = '2', tanggal_approve = '$todayDate', reason = '$reasonForm' WHERE id = '$idForm'";
        $q = mysqli_query($conn, $sql);

        if ($q) {
            header("Refresh: 1");
        }
    }
    ?>

    <script>
        function clearField() {
            document.getElementById("reason-area").value = "";
        }

        const modal = document.getElementById('exampleModal');
        if (modal) {
            modal.addEventListener('show.bs.modal', event => {
                const reasonArea = document.getElementById('reason-area');
                reasonArea.value = event.relatedTarget.getAttribute('data-bs-whatever');
            })
        }
    </script>
</body>

</html>