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
    <link rel="stylesheet" href="../css/editpages.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>

<body>
    <?php include('../admin_header.php');?>

    <?php 
            $id = ""; 
            $pageTitle="";
            $smallDescription = "";
            $titleDescription = ""; 
            $pageDescription ="";
            $img_path="";

    if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
        $sql = "SELECT * FROM page WHERE page_id=". $_GET["id"] . " AND pagetype = 'aboutus'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["page_id"]; 
            $pageTitle = $row["pageTitle"]; 
            $smallDescription = $row["smallDescription"];
            $titleDescription = $row["titleDescription"];
            $pageDescription = $row["pageDescription"]; 
            $img_path = $row["img_path"];
        }  
    } 
      mysqli_close($conn); 
?>     

  <div class="pages_add_div">
        <h1>Edit About Us</h1>

        <form action="aboutus_edit_action.php" method="post"  enctype="multipart/form-data">
            <!--id--> 
            <input type="text" id="page_id" name="page_id" value="<?=$_GET['id']?>" hidden> 
               
            <label for="pageTitle">Title:</label>
            <input type="text" id="pageTitle" name="pageTitle" value="<?php echo $pageTitle ?>" required>

            <label for="smallDescription">Small Description:</label>
            <input type="text" id="smallDescription" name="smallDescription" value="<?php echo $smallDescription ?>" required>

            <label for="titleDescription">Title Description:</label>
            <input type="text" id="titleDescription" name="titleDescription" value="<?php echo $titleDescription ?>" required>
            
            <label for="pageDescription">Page Description:</label>
            <textarea type="text" id="pageDescription" name="pageDescription" cols="30" rows="7"><?php echo $pageDescription ?></textarea>

            <label for="fileToUpload">Potrait</label>
            <div class="upload_pic_div">    
                <input type="file" id="img_path" name="img_path"  accept=".jpg, .jpeg, .png" onchange="previewImage()">
                <img src="../images/<?php echo $img_path ?>" id="img_preview" alt="Image Preview" >
            </div>

            <div class="pages_add_button">
                <input type="submit" value="Save Change"> 
            </div>
        </form>
        
        <div style="display: flex;  justify-content: center; align-items: center;">
            <a href="editpages.php" onclick='return confirm("Stop Editing?");'><button>Cancel</button></a>
        </div>   
    </div>

    <?php include("aboutus_script.php")?>

</body>
</html>