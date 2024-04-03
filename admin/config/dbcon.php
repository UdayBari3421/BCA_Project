<?php

$host = "localhost";
$username = "root";
$password = "";
$database ="bcapro";

//Connection
$conn = mysqli_connect("$host","$username","$password","$database");

// Check Connection
if(!$conn)
{
    header("Location: errors/db.php");
    die();
}
else
{
    // echo "Database Connected!";
}

?>