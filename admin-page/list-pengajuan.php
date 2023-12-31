<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
include "../config/connection.php";
$id_user = $_SESSION['id_user'];
$level = $_SESSION['level'];
if (!isset($_SESSION['id_user']) || $level != 'admin') {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-list-pengajuan.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Layanan Pengajuan Media Online</title>
</head>

<body>
    <div class="navbar">
        <a href="../index.php" style="text-decoration: none; color:white">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                <g clip-path="url(#clip0_229_133)">
                    <path d="M4.9245 16.4096C4.50315 16.8315 4.26648 17.4033 4.26648 17.9996C4.26648 18.5958 4.50315 19.1677 4.9245 19.5896L13.4085 28.0781C13.8306 28.5002 14.4031 28.7373 15 28.7373C15.5969 28.7373 16.1694 28.5002 16.5915 28.0781C17.0136 27.656 17.2507 27.0835 17.2507 26.4866C17.2507 25.8897 17.0136 25.3172 16.5915 24.8951L11.9475 20.2496H29.25C29.8467 20.2496 30.419 20.0125 30.841 19.5906C31.2629 19.1686 31.5 18.5963 31.5 17.9996C31.5 17.4028 31.2629 16.8306 30.841 16.4086C30.419 15.9866 29.8467 15.7496 29.25 15.7496L11.9475 15.7496L16.5915 11.1056C16.8005 10.8966 16.9663 10.6485 17.0794 10.3754C17.1925 10.1023 17.2507 9.80965 17.2507 9.51408C17.2507 9.21852 17.1925 8.92584 17.0794 8.65277C16.9663 8.3797 16.8005 8.13158 16.5915 7.92258C16.3825 7.71358 16.1344 7.5478 15.8613 7.43469C15.5882 7.32158 15.2956 7.26336 15 7.26336C14.7044 7.26336 14.4118 7.32158 14.1387 7.43469C13.8656 7.5478 13.6175 7.71358 13.4085 7.92258L4.9245 16.4096Z" fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_229_133">
                        <rect width="36" height="36" fill="white" transform="matrix(0 -1 1 0 0 36)" />
                    </clipPath>
                </defs>
            </svg>
        </a>
    </div>

    <div class="content">
        <div id="pilihan">
            <a href="list-pengajuan.php" class="text-yellow" id="pengajuan">Pengajuan Saya</a>
            <a href="table_setuju.php" class="text-black" id="setuju">Disetujui</a>
        </div>

        <div class="rectangle">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID USER</th>
                        <th scope="col">NAMA MEDIA</th>
                        <th scope="col">TGL PENGAJUAN</th>
                        <th scope="col">STATUS
                            <div class="sort">
                                <form method="get" id="sortForm">
                                    <label for="sort_by">Sort by:</label>
                                    <select name="sort_by" id="sort_by">
                                        <option value="">Semua</option>
                                        <?php
                                        $sql = "SELECT * FROM member JOIN user on member.id_user = user.id_user WHERE user.level IS NULL OR user.level = '' ORDER BY member.company_name ASC";
                                        $selected_sort = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';
                                        if ($stmt = $conn->prepare($sql)) {
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while ($row = $result->fetch_assoc()) {
                                                $selected = ($row['company_name'] == $selected_sort) ? 'selected' : '';
                                                echo "<option value='" . $row['company_name'] . "' $selected>" . $row['company_name'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </form>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';

                    if ($sort_by != '') {
                        $sql = "SELECT * FROM pengajuan JOIN member on pengajuan.id_user = member.id_user WHERE member.company_name = ? ORDER BY pengajuan.tglaju DESC;";
                        if ($stmt = $conn->prepare($sql)) {
                            $stmt->bind_param('s', $sort_by);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($user = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td data-bs-toggle='modal' data-bs-target='#modal-file' data-id='$user[id_pengajuan]'><p class='table-a'>$user[id_user]</p></td>
                                    <td><p class='table-a'>$user[company_name]</p></td>
                                    <td><p class='table-a'>$user[tglaju]</p></td>
                                    <td id='td-status'><p class='table-a'><a href='hasil_liputan.php?id_pengajuan=".$user['id_pengajuan']."'>$user[status]</a></p>";
                                if ($user['status'] === 'Menunggu') {
                                    echo "<form method='post' action='update_status.php'>
                                            <input type='hidden'name='id_user' value='$user[id_user]'>
                                            <input type='hidden'name='id_pengajuan' value='$user[id_pengajuan]'>
                                            <button type='button' name='action' value='approve' class='btn btn-success ml-5' data-toggle='modal' data-target='#ModalSetuju'>SETUJU</button>
                                            <!-- Modal -->
                                            <div class='modal fade' id='ModalSetuju' tabindex='-1' role='dialog' aria-labelledby='ModalSetujuLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                            <p>Apakah Anda Sudah Yakin Untuk Menerima?</p>
                                                            <button type='submit' name='action' value='approve' class='btn btn-success'>YA</button>
                                                            <button type='button' class='btn btn-danger' data-dismiss='modal'>TIDAK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#TolakModal'>TOLAK</button>
                                            <div class='modal fade' id='TolakModal' tabindex='-1' role='dialog' aria-labelledby='TolakModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-body'>
                                                        <form>
                                                        <p>Apakah Anda Sudah Yakin Untuk Menolak? <br> Sertakan Alasan Penolakan</p>
                                                        <div class='form-group'>
                                                            <label for='keterangan' class='col-form-label'>Pesan/Keterangan:</label>
                                                            <textarea class='form-control' id='keterangan' name='keterangan'></textarea>
                                                        </div>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                        <button type='submit' name='action' value='reject' class='btn btn-primary'>Send message</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </form>";
                                }
                                echo "</td></tr>";
                            }
                        }
                    } else {
                        $sql = "SELECT * FROM pengajuan JOIN member on pengajuan.id_user = member.id_user ORDER BY pengajuan.tglaju DESC;";
                        if ($stmt = $conn->prepare($sql)) {
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($user = $result->fetch_assoc()) {
                                $id_pengajuan = $user['id_pengajuan'];
                                echo "<tr'>
                                    <td data-bs-toggle='modal' data-bs-target='#modal-file' data-id='$id_pengajuan'><p class='table-a'>$user[id_user]</p></td>
                                    <td><p class='table-a'>$user[company_name]</p></td>
                                    <td><p class='table-a'>$user[tglaju]</p></td>
                                    <td id='td-status'><p class='table-a'>$user[status]</p>";
                                if ($user['status'] === 'Menunggu') {
                                    echo "<form method='post' action='update_status.php'>
                                            <input type='hidden'name='id_user' value='$user[id_user]'>
                                            <input type='hidden'name='id_pengajuan' value='$user[id_pengajuan]'>
                                            <button type='button' class='btn btn-success' data-toggle='modal' data-target='#ModalSetuju'>SETUJU</button>
                                            <!-- Modal -->
                                            <div class='modal fade' id='ModalSetuju' tabindex='-1' role='dialog' aria-labelledby='ModalSetuju' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content'>
                                                        <div class='modal-body'>
                                                            <p>Apakah Anda Sudah Yakin Untuk Menerima?</p>
                                                            <button type='submit' name='action' value='approve' class='btn btn-success'>YA</button>
                                                            <button type='button' class='btn btn-danger' data-dismiss='modal'>TIDAK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#TolakModal'>TOLAK</button>
                                            <div class='modal fade' id='TolakModal' tabindex='-1' role='dialog' aria-labelledby='TolakModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-body'>
                                                        <form>
                                                        <p>Apakah Anda Sudah Yakin Untuk Menolak? <br> Sertakan Alasan Penolakan</p>
                                                        <div class='form-group'>
                                                            <label for='keterangan' class='col-form-label'>Pesan/Keterangan:</label>
                                                            <textarea class='form-control' id='keterangan' name='keterangan'></textarea>
                                                        </div>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                        <button type='submit' name='action' value='reject' class='btn btn-primary'>Send message</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </form>";
                                }
                                echo "</td></tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="modal-file">
            <div class="modal fade" id="modal-file" tabindex="-1" aria-labelledby="modal-fileLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-fileLabel">Dokumen Pengajuan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="uploaded-files">
                            <!-- Uploaded files will be displayed here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sort_by').change(function() {
                $('#sortForm').submit();
            });
        });

        $(document).ready(function() {
            $('#modal-file').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id_pengajuan = button.data('id');
                $.ajax({
                    type: 'POST',
                    url: 'get_file.php',
                    data: {
                        id_pengajuan: id_pengajuan
                    },
                    success: function(data) {
                        $('#uploaded-files').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>