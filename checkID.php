<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinicmate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM dossiers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='editRecord.php?id=" . $row["ID"] . "'>" . $row["ID"] . "</a></td>";
        echo "<td>" . $row["patient"] . "</td>";
        echo "<td>" . $row["doctor"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No records found</td></tr>";
}

$conn->close();
?>
