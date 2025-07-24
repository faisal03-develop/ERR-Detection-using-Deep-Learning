<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "err_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $toothID = $_POST['toothID'];
    $errDepth = $_POST['errDepth'];
    $cbctScanID = $_POST['cbctScanID'];
    $scanDate = $_POST['scanDate'];
    $diagnosis = $_POST['diagnosis'];
    $treatmentPlan = $_POST['treatmentPlan'];

    // SQL query to insert data
    $sql = "INSERT INTO PatientRecords (Age, Gender, ToothID, ERRDepth, CBCTScanID, ScanDate, Diagnosis, TreatmentPlan) 
            VALUES ('$age', '$gender', '$toothID', '$errDepth', '$cbctScanID', '$scanDate', '$diagnosis', '$treatmentPlan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img" href="/err/pictures/Logo_favicon@300x.png">
    <title>Add Record</title>
    <style>
        body {
            font-family: poppins;
            background-color: #F0F8FF;
            color: #2D266A;
            margin: 20px;
        }

        form {
            background-color: #C6E7F7;
            padding: 20px;
            border-radius: 10px;
            max-width: 527px;
            margin: auto;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        h1{
            text-align: center;
            margin-top: 3rem;
            margin-bottom: 2rem;
        }
        input, textarea, select {
            width: 500px;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #2D266A;
            border-radius: 5px;
        }
        select{
            width: 522px;
        }

        button {
            background-color: #2D266A;
            color: #F0F8FF;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 39%;
            margin-top: 2rem;
        }

        button:hover {
            background-color: #C6E7F7;
            color: #2D266A;
        }
    </style>
</head>
<body>
    <h1>Add New Patient Record</h1>
    <form method="POST">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="toothID">Tooth ID:</label>
        <input type="text" id="toothID" name="toothID" required>

        <label for="errDepth">ERR Depth:</label>
        <select id="errDepth" name="errDepth" required>
            <option value="0.5mm">0.5mm</option>
            <option value="1mm">1mm</option>
            <option value="2mm">2mm</option>
            <option value="None">None</option>
        </select>

        <label for="cbctScanID">CBCT Scan ID:</label>
        <input type="text" id="cbctScanID" name="cbctScanID" required>

        <label for="scanDate">Scan Date:</label>
        <input type="date" id="scanDate" name="scanDate" required>

        <label for="diagnosis">Diagnosis:</label>
        <textarea id="diagnosis" name="diagnosis" rows="3" required></textarea>

        <label for="treatmentPlan">Treatment Plan:</label>
        <textarea id="treatmentPlan" name="treatmentPlan" rows="3" required></textarea>

        <button type="submit">Add Record</button>
    </form>
</body>
</html>
