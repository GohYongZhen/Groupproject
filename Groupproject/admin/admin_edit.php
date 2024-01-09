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

    <?php 
            $id = ""; 
            $admin_username = ""; 
            $admin_name="";
            $admin_contact = ""; 
            $admin_email =" ";
            
            if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
                $sql = "SELECT * FROM admin WHERE admin_id=". $_GET["id"];
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row["admin_id"];
                    $admin_username = $row["admin_username"]; 
                    $admin_name=$row["admin_name"];
                    $admin_contact = $row["admin_contact"]; 
                    $admin_email =$row["admin_email"];
                }  
            } 
            mysqli_close($conn); 
        ?> 
     
    <div class="admin_add_div">
        <h1>Edit Admin</h1>

        <form action="admin_edit_action.php" method="post">
            <!--Get id-->  
            <input type="hidden" id="admin_id" name="admin_id" value="<?=$_GET['id']?>"> 

            <label for="admin_username">Username:</label>
            <input type="text" id="admin_username" name="admin_username" value="<?php echo $admin_username?>" disabled>

            <label for="admin_name">Name:</label>
            <input type="text" id="admin_name" name="admin_name" value="<?php echo $admin_name?>" required>

            <label for="admin_contact">Contact:</label>
            <input type="tel" id="admin_contact" name="admin_contact" value="<?php echo $admin_contact?>" placeholder="+601X-XXXXXXXX" pattern="+[0-9]{4}-[0-9]{7/8}" required >

            <label for="admin_email">Email:</label>
            <input type="email" id="admin_email" name="admin_email"  value="<?php echo $admin_email?>" required >

            <div class="admin_add_button">
                <input type="submit" value="Update">
                <input type="reset" value="Reset">
            </div>
        </form>

        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="admin.php" onclick='return confirm("Cancel Edit?");'><button>Cancel</button></a>
        </div>   
    </div>
  
</body>
</html>