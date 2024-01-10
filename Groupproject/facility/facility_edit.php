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
    <title>Pre-School enrollment system | facility</title>
    <link rel="stylesheet" href="../css/teacher_admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body>
    <?php include('../admin_header.php');
    
    $id = ""; 
    $faci_name = ""; 
    $faci_desc="";
    $faci_photo =" ";
    
    if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
        $sql = "SELECT * FROM facilities WHERE faci_id=". $_GET["id"];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["faci_id"]; 
            $faci_name = $row["faci_name"]; 
            $faci_desc= $row["faci_desc"];
            $faci_photo = $row["faci_photo"];
        }  
    } 
    mysqli_close($conn); 
    ?>
    
    <div class="teacher_add_div">
        <h1>Edit facility</h1>

        <form action="facility_edit_action.php" method="post"  enctype="multipart/form-data">
            <!--id--> 
            <input type="text" id="faci_id" name="faci_id" value="<?=$_GET['id']?>" hidden> 
            
            <div class="name_email_div">
                <label for="faci_name">Name:</label>
                <input type="text" id="faci_name" name="faci_name" value="<?php echo $faci_name ?>" required>
            </div>

            <label for="faci_desc">Description:</label>
            <textarea type="text" id="faci_desc" name="faci_desc" cols="30" rows="7"><?php echo $faci_desc ?></textarea>

            <label for="faci_photo">Potrait</label>
            <div class="upload_pic_div">    
                <input type="file" id="img_file" name="img_file"  accept=".jpg, .jpeg, .png" onchange="previewImage()">
                <img src="img/<?php echo $faci_photo ?>" id="img_preview" alt="Image Preview">
            </div>

            <div class="teacher_add_button">
                <input type="submit" value="Save Change"> 
            </div>
        </form>
        
        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="facility.php" onclick='return confirm("Stop Editing?");'><button>Cancel</button></a>
        </div>   
    </div>

    <?php include("facility_script.php")?>

</body>
</html>