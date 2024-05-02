<?php
require_once("connect.php");
session_start();
include("sidenav.php");

?>

<!DOCTYPE html>

<html>

<head>
    <title>Daftar Pengajuan Kegiatan</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/500e5d004e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css" />
</head>

<?php
    $sql = "SELECT * FROM request_activities WHERE approved = '0'";

    $q = mysqli_query($conn, $sql);
    
    $totalRequests = mysqli_num_rows($q);

    $result = "";
?>

<body>
    <div class="container-fluid">
        <section class="request-list-section">
            <h4>Daftar Pengajuan Kegiatan</h4>
            <p class='subtitle' style="font-size: 14px" ;>Data diurut berdasarkan tanggal mulai</p>
            <div class="cards">
                <?php
                    echo $totalRequests == 0 ? "<div class='row justify-content-start align-items-start'>" : "<div class='row justify-content-start'>";
                    echo $totalRequests > 0 ? "<div class='col-sm-6 notice'>
                        <div class='text-card'>
                            <i class='fa-solid fa-circle-info' style='padding-right: 20px;padding-top: 5px'></i>
                            <p>Kamu memiliki <b>$totalRequests</b> pengajuan kegiatan. </p>
                        </div>
                    </div>"
                        :
                    "<div class='col-sm-6 notice'>
                        <div class='text-card'>
                            <i class='fa-solid fa-circle-info' style='padding-right: 20px;padding-top: 5px'></i>
                            <p>Belum ada laporan pengajuan kegiatan.</p>
                        </div>
                    </div>";
                    ?>
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover .table-responsive">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Peminta</th>
                        <th scope="col">Nomor Telpon</th>
                        <th scope="col">Sektor</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Berakhir</th>
                        <th scope="col">Pilihan Gedung</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Approve</th>
                        <!-- <th scope="col">Status</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sort = 'nomor_telpon';
                    $limit = 0;
                    $offset = 25;


                    $sql = "SELECT * FROM request_activities WHERE approved = '0' ORDER BY tanggal_mulai ASC";
                    // $sql .= ' ORDER BY ' . $sort . ' ASC ';
                    // $sql .= ' LIMIT ' . $limit . ', ' . $offset;
                    $q = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($q)) {
                        $id = $row['id'];
                        $nama = $row['nama_peminta'];
                        $telpon = $row['nomor_telpon'];
                        $sektor = $row['sektor'];
                        $deskripsi = $row['deskripsi'];

                        $tanggalMulai = $row['tanggal_mulai'];
                        $tanggalBerakhir = $row['tanggal_berakhir'];
                        $tanggalApprove = $row['tanggal_approve'];
                        //konversi tanggal
                        $convertedTanggalMulai = date('d M Y', strtotime($tanggalMulai));
                        $convertedTanggalBerakhir = date('d M Y', strtotime($tanggalBerakhir));
                        $convertedTanggalApprove = date('d M Y', strtotime($tanggalApprove));

                        $pilihanGedung = $row['pilihan_gedung'];
                        $approve = $row['approved'];

                        if ($approve == 0) {
                            $value = "<p style='padding: 5px; font-weight: 600; background-color: #ccc; border-radius: 10px;'>Belum disetujui</p>";
                        } else if ($approve == 1) {
                            $value = "<p style='padding: 5px; font-weight: 600; background-color: #7ABA78; border-radius: 10px; color: #fff'>Disetujui</p>";
                        } else if ($approve == 2) {
                            $value = "<p style='padding: 5px; font-weight: 600; background-color: #B80000; border-radius: 10px; color: #fff'>Tidak Disetujui</p>";
                        }

                        echo "<tr>
                                <td class='child-request-list'>$id</td>
                                <td class='child-request-list'>$nama</td>
                                <td class='child-request-list'>$telpon</td>
                                <td class='child-request-list'>$sektor</td>
                                <td class='child-request-list'>$convertedTanggalMulai</td>
                                <td class='child-request-list'>$convertedTanggalBerakhir</td>
                                <td class='child-request-list'>$pilihanGedung</td>
                                <td class='child-request-list'>$deskripsi</td>
                                <td class='child-request-list'>
                                    <span class='choice-buttons'>
                                        <a href='accept-request.php?id=$id'>
                                            <i class='fa-solid fa-square-check fa-2xl' style='color: #63E6BE;'></i>
                                        </a>
                                        <button type='button' class='approval-buttons' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever=$id data-bs-name=$nama>
                                            <i class='fa-solid fa-rectangle-xmark fa-2xl' style='color: #f05151;'></i>
                                        </button>
                                    </span>
                                </td>
                            ";
                    }

                    ?>

                </tbody>
            </table>
        </section>
    </div>

    
    <!-- Untuk modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alasan Penolakan</h1>
                    <button  id="dismiss" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearField()"></button>
                </div>
                <form method="post" id='#modal-form'>
                    <div class="modal-body">
                            <input type="hidden" class="form-control" id='no-pengajuan' name='idForm' value=<?php $id?>>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Alasan (Opsional):</label>
                                <textarea id="reason-area" name='reason' class="form-control" id="message-text" rows='10'></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button id="dismiss" type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearField()" >Kembali</button>
                        <button name='submit-form' type="submit" class="btn btn-primary">Kirim</button>
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
                const inputNoPengajuan = document.getElementById('no-pengajuan');
                inputNoPengajuan.value = event.relatedTarget.getAttribute('data-bs-whatever');

                const inputNama = document.getElementById('nama-pengajuan');
                inputNama.value = event.relatedTarget.getAttribute('data-bs-name');
            })
        }
    </script>
</body>

</html>