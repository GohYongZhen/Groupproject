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
    <title>Pre-School enrollment system | Teacher</title>
    <link rel="stylesheet" href="../css/class_admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body>
    <?php include('../admin_header.php');?>
     
    <div class="class_add_div">
        <h1>Add Class</h1>

        <form action="class_add_action.php" method="post"  enctype="multipart/form-data">


            <div class="input_row">
                <label for="cl_name">Name:</label>
                <input type="text" id="cl_name" name="cl_name" required>


                <label for="tc_name">Teacher:</label>            
                <select name="teacher_id" id="teacher_id">
                    <option value="">&nbsp;</option>
                <?php
                    $sql =  "SELECT * FROM teacher";
                    $result = mysqli_query($conn, $sql);
                    $current_id="0";
                    while($row =mysqli_fetch_assoc($result)){
                        if(mysqli_num_rows($result) > 0 && $current_id != $row["teacher_id"]){
                            $current_id=$row["teacher_id"];

                ?>
                    <option value="<?php echo $row["teacher_id"]?>"><?php echo $row["tc_name"]?></option>
                <?php
                        }
                    }
                ?>
                </select>
            </div>

            <div class="input_row">
                <label for="cl_agegroup">Age Group:</label>
                <input type="text" id="cl_agegroup" name="cl_agegroup" required >

                <label for="cl_time">Time:</label>
                <input type="text" id="cl_time" name="cl_time" required >
            </div>
            
            <div>
                <label for="cl_pic">Image:</label>
                <div class="upload_pic_div">    
                    <input type="file" id="img_file" name="img_file"  accept=".jpg, .jpeg, .png"  required onchange="previewImage()">
                    <img id="img_preview" alt="Image Preview" style="display: none;">
                </div>
            </div>

            <div class="class_add_button">
                <input type="submit" value="Add">
                <input type="reset" value="Reset" onclick="closeImage()">
            </div>
        </form>
        
        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="class.php" onclick='return confirm("Stop adding class?");'><button>Cancel</button></a>
        </div>   
    </div>
  
    <?php include("class_script.php")?>

</body>
</html>