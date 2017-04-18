<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. ", Type: " . $row["type"]. ", Email: " . $row["email"].  ", Blowfish: " . $row["blowfish_hash"].  "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();


?>