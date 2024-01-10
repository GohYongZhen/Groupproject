<?php
session_start();
//database connection
include("../config.php");

//variables  
$pagetype = ""; 
$pageTitle="";
$titleDescription = ""; 
$pageDescription = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //values for add or edit 
    $pagetype=$_POST["pagetype"];
    $pageTitle=$_POST["pageTitle"];
    $titleDescription =$_POST["titleDescription"]; 
    $pageDescription =$_POST["pageDescription"];

$sql = "UPDATE page 
        SET pageTitle = '$pageTitle', 
            titleDescription = '$titleDescription',
            pageDescription = '$pageDescription' 
        WHERE pagetype = '" . $pagetype . "'";

    $status = update_DBTable($conn, $sql);
        
        if (mysqli_query($conn, $sql)) {
            echo "Form data updated successfully!<br>";
            echo '<a href="editpages.php">Back</a>';
        } else {
            echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>"; 
            echo '<a href="editpages.php">Back</a>';
        }  
 
} 

mysqli_close($conn); 

//Function to insert data to database table 
function update_DBTable($conn, $sql){ 
    if (mysqli_query($conn, $sql)) { 
        return true; 
    } 
    else { 
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>"; 
        return false; 
    } 
} 
?>