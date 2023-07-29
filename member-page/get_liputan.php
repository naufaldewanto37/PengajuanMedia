<?php
include '../config/connection.php';
$id_hasil = $_POST['id_hasil'];

$sql = "SELECT * FROM hasilliputan WHERE id_hasil = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id_hasil);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $liputan = $result->fetch_assoc();

    echo json_encode($liputan);
} else {
    echo json_encode(array());
}

$stmt->close();
$conn->close();
