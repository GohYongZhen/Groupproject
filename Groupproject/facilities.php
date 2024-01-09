<?php

//database connection
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/facilities.css" />
    <title>Facilities page</title>
  </head>
  <body>

        <?php include('header.php');?>
        <hr></hr>
    <div class="head">
      <h2>Facilities</h2>
    </div>
 <?php
        $sql = "SELECT * FROM facilities";
        $result = mysqli_query($conn,$sql);
    

        while($row = mysqli_fetch_assoc($result)){
           ?>
           
<div class="word">

<div class="row">
      <div class="leftcolumn">

        <div class="card">
          <h2><?php echo $row['faci_name']?></h2>
          <div class="image-container1">
            <img src="images/<?php echo $row['faci_photo']?>" alt="Real Image" class="realimg" />
            <p class="right"><?php echo $row['faci_desc']?></p>
          </div>
        </div>
        <!-- for changing to second show in photo in right -->
        <!-- and checking for the databse still have info or not-->
        <?php $row = mysqli_fetch_assoc($result);
        if($row){
            
            ?>
        <div class="card">
          <h2><?php echo $row['faci_name']?></h2>
          <div class="image-container2">
            <img src="images/<?php echo $row['faci_photo']?>" alt="Real Image" class="realimg" />
            <p class="left"><?php echo $row['faci_desc']?></p>
         </div>
        </div>

      </div>
    </div>
</div>    
       <?php }
        }
?>
 <?php include('footer.php');?>

  </body>
</html>
