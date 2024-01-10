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
    <title>Pre-School enrollment system | footer</title>
    <link rel="stylesheet" href="../css/editpages.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>

<body>
    <?php include('../admin_header.php');?>

    <?php 
            $id = ""; 
            $footer_email = ""; 
            $footer_phoneNumber="";
            $footer_address = ""; 

        if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
                $sql = "SELECT * FROM footer WHERE ft_id=". $_GET["id"];
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row["ft_id"];
                    $footer_email= $row["email"]; 
                    $footer_phoneNumber=$row["phoneNumber"];
                    $footer_address = $row["address"]; 
                }  
            } 
            mysqli_close($conn); 
        ?> 

        <div class="pages_add_div">
        <h1>Edit Admin</h1>

        <form action="footer_edit_action.php" method="post">
            <!--Get id-->  
            <input type="hidden" id="ft_id" name="ft_id" value="<?=$_GET['id']?>"> 

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $footer_email?>" required>

            <label for="phoneNumber">Contact:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $footer_phoneNumber?>" placeholder="+601X-XXXXXXXX" pattern="+[0-9]{4}-[0-9]{7/8}" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $footer_address?>" required>

            <div class="pages_add_button">
                <input type="submit" value="Update">
                <input type="reset" value="Reset">
            </div>
        </form>

        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="editpages.php" onclick='return confirm("Cancel Edit?");'><button>Cancel</button></a>
        </div>   
    </div>
        <?php include("editpages_script.php")?>
</body>
</html>