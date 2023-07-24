<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
include "../config/connection.php";
$id_user = $_SESSION['id_user'];
$id_pengajuan = $_GET['id_pengajuan'];
$sql = "SELECT * FROM pengajuan JOIN member ON pengajuan.id_user = member.id_user WHERE pengajuan.id_pengajuan = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_pengajuan);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$_SESSION['status'] = $user['status'];
$_SESSION['id_pengajuan'] = $user['id_pengajuan'];
$_SESSION['company_name'] = $user['company_name'];
$_SESSION['tglterima'] = $user['tglterima'];

if (!isset($_SESSION['id_user'])) {
    header('Location: ../login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-tambah-terima.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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

    <div class="progress-container">
        <div class="circleOn">
            <p class="text-progress">1</p>
        </div>
        <div class="line"></div>
        <div class="circleOn">
            <p class="text-progress">2</p>
        </div>
        <div class="line"></div>
        <div class="circleOn">
            <p class="text-progress">3</p>
        </div>
    </div>

    <div id="container" class="mt-5">
        <p class="p-container" style="color:lightgreen">Selamat! Pengajuan Kerjasama Telah Diterima.</p>
        <p class="p-container mb-5">Silahkan inputkan hasil Liputan pada Form di bawah ini : </p>
        <div class="rectangle">
            <p class="text-rect" style="color: #000;">ID Pengajuan : &nbsp &nbsp &nbsp &nbsp<?php echo $id_pengajuan; ?></p>
            <div id="modalProcess">
                <div class="modal fade" id="modalUpload" tabindex="-1" aria-labelledby="modalUploadLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalUploadLabel">FORM UPLOAD LIPUTAN</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="process-modal.php">
                                    <div class="mb-3">
                                        <label for="judul" class="col-form-label">Judul Liputan:</label>
                                        <input type="text" class="form-control" name="judul">
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="col-form-label">Link Liputan:</label>
                                        <input type="text" class="form-control" name="link">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Link" class="col-form-label">Keterangan:</label>
                                        <textarea class="form-control" name="keterangan"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="oval">
                    <button style="display: flex; flex-direction: row; " type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalUpload">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                            <path d="M20.4168 2.91675H8.75016C7.146 2.91675 5.84808 4.22925 5.84808 5.83341L5.8335 29.1667C5.8335 30.7709 7.13141 32.0834 8.73558 32.0834H26.2502C27.8543 32.0834 29.1668 30.7709 29.1668 29.1667V11.6667L20.4168 2.91675ZM26.2502 29.1667H8.75016V5.83341H18.9585V13.1251H26.2502V29.1667ZM11.6668 21.8897L13.7231 23.9459L16.0418 21.6417V27.7084H18.9585V21.6417L21.2772 23.9605L23.3335 21.8897L17.5147 16.0417L11.6668 21.8897Z" fill="#CE3939" />
                        </svg>
                        <p id="upload-text" style="color: #CE3939; font-size:1rem; margin-top: 0.3rem;">Upload Liputan</p>
                    </button>
                </div>
            </div>
            <p class="text-rect" style="color: #000;">Nama Media : &nbsp &nbsp &nbsp &nbsp<?php echo $_SESSION['company_name']; ?></p>
            <p class="text-rect" style="color: #000;">Tanggal Diterima : &nbsp &nbsp &nbsp &nbsp<?php echo $_SESSION['tglterima']; ?></p>
        </div>

        <div id="riwayat-liputan">
            <p id="riwayat-text">Riwayat Upload Liputan :</p>
            <div class="rectangle">
                <table class="table table-dark table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Upload</th>
                            <th scope="col">Waktu Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM hasilliputan JOIN pengajuan ON hasilliputan.id_pengajuan = pengajuan.id_pengajuan WHERE hasilliputan.id_pengajuan = ? ORDER BY hasilliputan.tglUpload DESC;";
                        if ($stmt = $conn->prepare($sql)) {
                            $stmt->bind_param("s", $id_pengajuan);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $no = 1;
                            while ($user = $result->fetch_assoc()) {
                                $datetime = new DateTime($user['tglUpload']);
                                $date = $datetime->format('Y-m-d');
                                $time = $datetime->format('H:i:s');
                                $id_hasil = $user['id_hasil'];
                                echo "<tr data-bs-toggle='modal' data-bs-target='#modal-riwayat' data-id='$id_hasil'>
                                <td><p class='text-table'>$no</p></td>
                                <td><p class='text-table'>$date</p></td>
                                <td><p class='text-table'>$time</p></td>
                              </tr>";
                                $no++;
                            }
                        } else {
                            echo "Error: " . $conn->error;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal-riwayat">
            <div class="modal fade" id="modal-riwayat" tabindex="-1" aria-labelledby="modal-riwayatLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-riwayatLabel">FORM EDIT LIPUTAN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="update-modal.php">

                                <div class="mb-3">
                                    <label for="judul" class="col-form-label">Judul Liputan:</label>
                                    <input type="text" class="form-control" name="judul-riwayat">
                                </div>
                                <div class="mb-3">
                                    <label for="link" class="col-form-label">Link Liputan:</label>
                                    <input type="text" class="form-control" name="link-riwayat">
                                </div>
                                <div class="mb-3">
                                    <label for="Link" class="col-form-label">Keterangan:</label>
                                    <textarea class="form-control" name="keterangan-riwayat"></textarea>
                                    <input type="hidden" id="id_hasil" name="id_hasil">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#modal-riwayat').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes

            // Use AJAX to get data from server
            $.ajax({
                url: 'get_liputan.php', // URL to your PHP script to get data
                method: 'POST',
                data: {
                    id_hasil: id
                },
                success: function(data) {
                    // If the request was successful, data will contain the response from your PHP script
                    // Assuming the response is in JSON format, you can parse it and use it to set the form values
                    var liputan = JSON.parse(data);

                    $('input[name="judul-riwayat"]').val(liputan.judul);
                    $('input[name="link-riwayat"]').val(liputan.link);
                    $('textarea[name="keterangan-riwayat"]').val(liputan.keterangan);
                    $('#id_hasil').val(id);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // If an error occurred, you can print it to the console for debugging
                    console.error(textStatus, errorThrown);
                }
            });
        });
    </script>
</body>

</html>