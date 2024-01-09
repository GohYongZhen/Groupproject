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
    <title>Pre-School enrollment system | Facility</title>
    <link rel="stylesheet" href="../css/teacher_admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body>
    <?php include('../admin_header.php');?>
     
    <div class="teacher_add_div">
        <h1>Add facility</h1>

        <form action="facility_add_action.php" method="post"  enctype="multipart/form-data">
            <div class="name_email_div">
                <label for="faci_name">Name:</label>
                <input type="text" id="faci_name" name="faci_name" required>
            </div>

            <label for="faci_desc">Description:</label>
            <textarea type="text" id="faci_desc" name="faci_desc" cols="30" rows="7"></textarea>

            <label for="faci_photo">Potrait</label>
            <div class="upload_pic_div">    
                <input type="file" id="img_file" name="img_file"  accept=".jpg, .jpeg, .png"  required onchange="previewImage()">
                <img id="img_preview" alt="Image Preview" style="display: none;">
            </div>

            <div class="teacher_add_button">
                <input type="submit" value="Add">
                <input type="reset" value="Reset" onclick="closeImage()">
            </div>
        </form>
        
        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="admin_facility.php" onclick='return confirm("Stop Adding Facility?");'><button>Cancel</button></a>
        </div>   
    </div>
  
    <?php include("teacher_script.php")?>

</body>
</html>