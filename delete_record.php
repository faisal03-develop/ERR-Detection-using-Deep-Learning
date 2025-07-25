<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "err_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM PatientRecords WHERE PatientID = $id";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>
                alert('Record deleted successfully!');
                window.location.href='records.php';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "<script>
            alert('No record selected for deletion.');
            window.location.href='records.php';
          </script>";
}

$conn->close();
?>
