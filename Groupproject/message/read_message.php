<?php
session_start();
//database connection
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pre-School enrollment system | Admin</title>
    <link rel="stylesheet" href="../css/message.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body onload="makeTableScroll();">
    <?php include('../admin_header.php');?>

    <?php 
        $sql = "UPDATE message SET mess_status=1 WHERE mess_id=". $_GET["id"];
        mysqli_query($conn, $sql);

        $id = ""; 
        $mess_name = ""; 
        $mess_email="";
        $message = ""; 
        $mess_time =" ";
        
        if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
            $sql = "SELECT * FROM message WHERE mess_id=". $_GET["id"];
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $id = $row["mess_id"];
                $mess_name = $row["mess_name"]; 
                $mess_email=$row["mess_email"];
                $message= $row["message"]; 
                $mess_time =$row["mess_time"];
            }  
        } 
        mysqli_close($conn); 
    ?> 
    
    <div class="container">
        <h1 style="width: 100%; border-bottom: solid 3px #aec8d9; padding: 5px 0px;">Message from <?php echo $mess_name?>:</h1> 
        <p style="border-bottom: solid 2px #aec8d9; padding: 5px 0px;"><?php echo "Time : ".$mess_time?></p>
        <p style="border-bottom: solid 2px #aec8d9; padding: 5px 0px;"><?php echo "Email: ".$mess_email?></p>
        <div class="message_container">
            <p><?php echo $message?></p>
        </div>

        <div class="message_button">
            <a href="message.php"><button>Back</button></a>
        </div>

    </div>

    

    </body>
</html>