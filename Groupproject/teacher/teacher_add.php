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
    <title>Pre-School enrollment system | teacher</title>
    <link rel="stylesheet" href="../css/teacher.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body>
    <?php include('../admin_header.php');?>
     
    <div class="teacher_add_div">
        <h1>Add teacher</h1>

        <form action="teacher_add_action.php" method="post"  enctype="multipart/form-data">
            <div class="name_email_div">
                <label for="tc_name">Name:</label>
                <input type="text" id="tc_name" name="tc_name" required>

                <label for="tc_email">Email:</label>
                <input type="email" id="tc_email" name="tc_email" required >
            </div>

            <label for="tc_desc">Description:</label>
            <textarea type="text" id="tc_desc" name="tc_desc" cols="30" rows="7"></textarea>

            <label for="tc_pic">Potrait</label>
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
            <a href="teacher.php" onclick='return confirm("Stop Adding Teacher?");'><button>Cancel</button></a>
        </div>   
    </div>
  
    <?php include("teacher_script.php")?>

</body>
</html>