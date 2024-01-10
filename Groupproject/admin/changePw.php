<?php
session_start();
//database connection
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST['npassword'];
    $confirmPassword = $_POST['cpassword'];

    // Validate new and confirm passwords
    if ($newPassword === $confirmPassword) {
        $userId = $_SESSION['UID'];
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $sql = "UPDATE admin SET password = '$hashedPassword' WHERE admin_id = '$userId'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Password changed successfully
            echo '<script>alert("Password changed successfully!"); window.location.href="../admin/admin_dashboard.php";</script>';
        }else {
            // Error in updating password
            echo '<script>alert("Failed to change password. Please try again.");</script>';
        }
    } else {
        // Passwords do not match
        echo '<script>alert("Passwords do not match!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password | Admin</title>
    <link rel="stylesheet" href="../css/admin_header.css">
        <link rel="stylesheet" href="../css/admin_login.css">
</head>
<body onload="makeTableScroll();">
    <?php include('../admin_header.php');?>
    
    <div class="admin_container">
        <h1>Admin List</h1> 

        <form method="POST" action = "">
            <div class="container1">
                <table>
                    <tr>
                    <th><label for="psw"><b>New Password</b></label></th>
                        <th><input type="password" placeholder="New Password"name="npassword" required></th>
                    </tr>
                    <tr>
                        <th><label for="1psw"><b>Comfirm Password</b></label></th>
                        <th><input type="password" placeholder="Comfirm Password"name="cpassword" required></th>
                    </tr>
                </table>
                <br></br>
                <div class = "button">
		        	<button  type="submit">Change</button>
                </div>
		        </div>
        <form>
        </div>
        <table class="admin_table">
            <tr class="button_row">
                <td colspan="6"><a href="admin_add.php"><button class="add_button">Add</button></a></td>  
            </tr>
        </table>

        <br> 
    </div>

    <?php include("admin_script.php");?>

    </body>
</html>