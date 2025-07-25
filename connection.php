<?php
    $con=mysqli_connect("localhost","root","","err_database");
    if(mysqli_connect_error()){
        echo"<script>alert(Canot Connect to the database);</script>";
        exit();
    }
?>