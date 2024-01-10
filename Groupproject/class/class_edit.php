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
    <title>Pre-School enrollment system | class</title>
    <link rel="stylesheet" href="../css/class_admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body>
    <?php include('../admin_header.php');
    
    $id = ""; 
    $teacher_id=0;
    $cl_name = ""; 
    $cl_agegroup="";
    $cl_time = ""; 
    $cl_photo =" ";
    
    if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
        $sql = "SELECT * FROM class LEFT JOIN teacher ON class.teacher_id = teacher.teacher_id WHERE class_id=". $_GET["id"];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["class_id"];
            $teacher_id = $row["teacher_id"]; 
            $cl_name = $row["cl_name"]; 
            $cl_agegroup= $row["cl_agegroup"];
            $cl_time = $row["cl_time"]; 
            $cl_photo = $row["cl_photo"];
        }  
    } 
    ?>
    
    <div class="class_add_div">
        <h1>Edit Class</h1>

        <form action="class_edit_action.php" method="post"  enctype="multipart/form-data">
            <!--id--> 
            <input type="text" id="class_id" name="class_id" value="<?=$_GET['id']?>" hidden> 
            
            <div class="input_row">
                <label for="cl_name">Name:</label>
                <input type="text" id="cl_name" name="cl_name" value="<?php echo $cl_name?>" required>


                <label for="cl_name">Teacher:</label>            
                <select name="teacher_id" id="teacher_id">
                    <option value="">&nbsp;</option>
                <?php
                    $sql =  "SELECT * FROM teacher;";
                    $result = mysqli_query($conn, $sql);
                    $current_id="0";
                    while($row =mysqli_fetch_assoc($result)){
                        if(mysqli_num_rows($result) > 0 && $current_id != $row["teacher_id"]){
                            $current_id=$row["teacher_id"];
                ?>
                    <option value="<?php echo $row["teacher_id"]?>"<?php 
                        if($current_id == $teacher_id)
                            echo " selected ";
                    ?>><?php echo $row["tc_name"]?></option>
                <?php
                        }
                    }
                ?>
                </select>
            </div>

            <div class="input_row">
                <label for="cl_agegroup">Age Group:</label>
                <input type="text" id="cl_agegroup" name="cl_agegroup" value="<?php echo $cl_agegroup?>" required >

                <label for="cl_time">Time:</label>
                <input type="text" id="cl_time" name="cl_time" value="<?php echo $cl_time?>" required >
            </div>
            
            <div>
                <label for="cl_photo">Image:</label>
                <div class="upload_pic_div">    
                    <input type="file" id="img_file" name="img_file"  accept=".jpg, .jpeg, .png" onchange="previewImage()">
                    <img src="<?php echo "img/". $cl_photo?>" id="img_preview" alt="Image Preview">
                </div>
            </div>

            <div class="class_add_button">
                <input type="submit" value="Save Changes">
            </div>
        </form>

        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="class.php" onclick='return confirm("Stop editing class?");'><button>Cancel</button></a>
        </div>   
    </div>
    <?php mysqli_close($conn);  ?>
    <?php include("class_script.php")?>

</body>
</html>