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
    <title>Pre-School enrollment system | homepage</title>
    <link rel="stylesheet" href="../css/editpages.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>

<body>
    <?php include('../admin_header.php');?>
    
     <?php 
            $pagetype = ""; 
            $pageTitle = ""; 
            $titleDescription="";
            $pageDescription = ""; 

        if(isset($_GET["pagetype"]) && $_GET["pagetype"] != ""){ ; 
                $sql = "SELECT * FROM page WHERE pagetype = 'homepage'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $pagetype= $row["pagetype"];
                    $pageTitle= $row["pageTitle"]; 
                    $titleDescription=$row["titleDescription"];
                    $pageDescription = $row["pageDescription"]; 
                }  
            } 
            mysqli_close($conn); 
        ?> 

         <div class="pages_add_div">
        <h1>Edit Admin</h1>

        <form action="homepage_edit_action.php" method="post">
            <!--Get id-->  
            <input type="hidden" id="pagetype" name="pagetype" value="<?=$_GET['pagetype']?>"> 

            <label for="pageTitle">Title:</label>
            <input type="text" id="pageTitle" name="pageTitle" value="<?php echo $pageTitle ?>" required>

            <label for="titleDescription">Title Description:</label>
            <input type="text" id="titleDescription" name="titleDescription" value="<?php echo $titleDescription ?>" required>
            
            <label for="pageDescription">Page Description:</label>
            <textarea type="text" id="pageDescription" name="pageDescription" cols="30" rows="17"><?php echo $pageDescription ?></textarea>

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