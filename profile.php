<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
session_start();
include "config/connection.php";

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$message = $_SESSION['message'];
$id_user = $_SESSION['id_user'];
$profileImageUrl = "profile_member/" . $id_user . ".png";

$sql = "SELECT * FROM user WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_user);
$stmt->execute();
$result = $stmt->get_result();

$sql2 = "SELECT * FROM member WHERE id_user = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("s", $id_user);
$stmt2->execute();
$result2 = $stmt2->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $member = $result2->fetch_assoc();
}

$_SESSION['company_name'] = $member['company_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Layanan Pengajuan Media Online</title>
</head>

<body>
    <div class="navbar">
        <a href="index.php" style="text-decoration: none; color:white">
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
    <!-- Content -->
    <div id="content">
        <p>Profile</p>
        <img src="<?php echo $profileImageUrl; ?>" id="profile-img">
        <form action="profile_processing.php" method="post" enctype="multipart/form-data" class="profile-form">
            <input type="file" id="myfile" name="myfile" accept="image/png">
            <div class="form-col">
                <label for="nik">Nama Perusahaan:</label><br>
                <input required class="input-profile" type="text" id="company_name" name="company_name" value="<?php echo isset($user) ? $member['company_name'] : ''; ?>"><br>
                <label for="fullname">Alamat Perusahaan:</label><br>
                <input required class="input-profile" type="text" id="company_address" name="company_address" value="<?php echo isset($user) ? $member['company_address'] : ''; ?>"><br>
                <label for="email">Email:</label><br>
                <input required class="input-profile" type="email" id="email" name="email" value="<?php echo isset($user) ? $member['email'] : ''; ?>"><br>
                <label for="username">Username:</label><br>
                <input required class="input-profile" type="text" id="username" name="username" value="<?php echo isset($user) ? $user['username'] : ''; ?>"><br>
                <label for="username">Password:</label><br>
                <input required class="input-profile" type="password" id="password" name="password" value="<?php echo isset($user) ? $user['password'] : ''; ?>"><br>
                <label for="notelp">No Telp:</label><br>
                <input required class="input-profile" type="tel" id="notelp" name="notelp" value="<?php echo isset($user) ? $member['phone'] : ''; ?>"><br>
            </div>
            <input type="submit" value="Submit" style="margin-top: 5rem; 
                                                        width: 15.8125rem; 
                                                        height: 3.8125rem; 
                                                        flex-shrink: 0; 
                                                        border-radius: 1.25rem; 
                                                        background: #C4BABA; 
                                                        color: #000;
                                                        font-family: Roboto;
                                                        font-size: 1.5rem;
                                                        font-style: normal;
                                                        font-weight: 400;
                                                        line-height: 1.71875rem;">
            <?php
            error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
            session_start();
            $message = $_SESSION['message'];
            if (isset($_SESSION['message'])) {
                echo '<p id="message-profile">' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);
            } ?>
        </form>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>