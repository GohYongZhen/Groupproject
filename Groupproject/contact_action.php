<?php
session_start();
include("config.php");


$name = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$name =  $_POST["name"];
$email =  $_POST["email"];
$message =  $_POST["message"];

$sql = "INSERT INTO message (mess_name, mess_email, message)
     VALUES ('" . $name . "', '". $email . "', '" . $message . "')";

$status = insertTo_DBTable($conn, $sql);
    if ($status) {
    echo "Form data saved successfully!<br>";
    echo '<a href="contact.php">Back</a>';
} else {
    echo '<a href="contact.php">Back</a>';
}
}


function insertTo_DBTable($conn, $sql){
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}
?>