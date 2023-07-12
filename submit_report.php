<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "config/connection.php";

//Load Composer's autoloader
require 'librarysmtp/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'naufaldewanto38@gmail.com';        // SMTP username (your email)
    $mail->Password = 'nkgihnfrbqomderm';                 // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    // get from Form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $report = $_POST['report'];
    $report_id = rand();

    // Recipients
    $mail->setFrom($email, 'Layanan Aduan');

    // Choose recipient based on service selection
    switch ($service) {
        case 'internet':
            $recipientEmail = 'naufaldewanto37@gmail.com';
            break;
        case 'telepon':
            $recipientEmail = 'naufaldewanto32@gmail.com';
            break;
        case 'lainnya':
            $recipientEmail = 'naufaldewanto11@gmail.com';
            break;
        default:
            $recipientEmail = 'naufaldewanto32@gmail.com';
    }

    $mail->addAddress($recipientEmail, 'Recipient Name');
    // Content
    $mail->isHTML(false);

    // Subject
    $mail->Subject = 'Laporan Layanan Baru';

    $mail->Body = "Report ID:  $report_id \n";
    $mail->Body = "Nama: $name\n";
    $mail->Body .= "Email: $email\n";
    $mail->Body .= "Layanan: $service\n";
    $mail->Body .= "Laporan:\n$report";

    // Save report to database
    $stmt = $conn->prepare("INSERT INTO reports (report_id, name, email, service, report) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $report_id, $name, $email, $service, $report);

    if ($stmt->execute()) {
        // If saving to database was successful, send email
        $mail->send();
        echo 'Pengaduan berhasil dikirim. Terima kasih!';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "Pengaduan tidak dapat dikirim. Silakan coba lagi.";
}
