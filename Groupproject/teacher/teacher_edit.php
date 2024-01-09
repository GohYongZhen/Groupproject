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
    <?php include('../admin_header.php');
    
    $id = ""; 
    $tc_name = ""; 
    $tc_desc="";
    $tc_email = ""; 
    $tc_pic =" ";
    
    if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
        $sql = "SELECT * FROM teacher WHERE teacher_id=". $_GET["id"];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["teacher_id"]; 
            $tc_name = $row["tc_name"]; 
            $tc_desc= $row["tc_desc"];
            $tc_email = $row["tc_email"]; 
            $tc_pic = $row["tc_pic"];
        }  
    } 
    mysqli_close($conn); 
    ?>
    
    <div class="teacher_add_div">
        <h1>Edit teacher</h1>

        <form action="teacher_edit_action.php" method="post"  enctype="multipart/form-data">
            <!--id--> 
            <input type="text" id="teacher_id" name="teacher_id" value="<?=$_GET['id']?>" hidden> 
            
            <div class="name_email_div">
                <label for="tc_name">Name:</label>
                <input type="text" id="tc_name" name="tc_name" value="<?php echo $tc_name ?>" required>

                <label for="tc_email">Email:</label>
                <input type="email" id="tc_email" name="tc_email" value="<?php echo $tc_email ?>" required >
            </div>

            <label for="tc_desc">Description:</label>
            <textarea type="text" id="tc_desc" name="tc_desc" cols="30" rows="7"><?php echo $tc_desc ?></textarea>

            <label for="tc_pic">Potrait</label>
            <div class="upload_pic_div">    
                <input type="file" id="img_file" name="img_file"  accept=".jpg, .jpeg, .png"     onchange="previewImage()">
                <img src="<?php echo $tc_pic ?>" id="img_preview" alt="Image Preview" >
            </div>

            <div class="teacher_add_button">
                <input type="submit" value="Save Change"> 
            </div>
        </form>
        
        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="teacher.php" onclick='return confirm("Stop Editing?");'><button>Cancel</button></a>
        </div>   
    </div>

    <?php include("teacher_script.php")?>

</body>
</html>