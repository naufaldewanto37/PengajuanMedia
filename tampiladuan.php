<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tampil Aduan</title>
</head>
<body>
    <h1>Daftar Aduan</h1>
    <table border="1">
        <tr>
            <th>ID Aduan</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Layanan</th>
            <th>Laporan</th>
        </tr>
        <?php
        // Database connection
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "your_db_name";

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT report_id, name, email, service, report FROM reports";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row["report_id"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["service"]."</td>
                    <td>".$row["report"]."</td>
                </tr>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
