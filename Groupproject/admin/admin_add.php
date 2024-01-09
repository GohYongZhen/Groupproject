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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body>
    <?php include('../admin_header.php');?>
     
    <div class="admin_add_div">
        <h1>Register Admin</h1>

        <form action="admin_add_action.php" method="post">
            <label for="admin_username">Username:</label>
            <input type="text" id="admin_username" name="admin_username" required>

            <label for="admin_name">Name:</label>
            <input type="text" id="admin_name" name="admin_name" required>

            <label for="admin_contact">Contact:</label>
            <input type="tel" id="admin_contact" name="admin_contact" placeholder="+601X-XXXXXXXX" pattern="+[0-9]{4}-[0-9]{7/8}" required >

            <label for="admin_email">Email:</label>
            <input type="email" id="admin_email" name="admin_email" required >

            <label for="userPwd">Password:</label>
            <input type="password" id="admin_pwd" name="admin_pwd" required maxlength="8">

            <label for="userPwd">Confirm Password:</label>
            <input type="password" id="confirm_pwd" name="confirm_pwd" required>

            <div class="admin_add_button">
                <input type="submit" value="Register">
                <input type="reset" value="Reset">
            </div>
        </form>
        
        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="admin.php" onclick='return confirm("Cancel registration?");'><button>Cancel</button></a>
        </div>   
    </div>
  
</body>
</html>