<?php
session_start();
//database connection
include("config.php");
?> 


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teacher page</title>
    <link rel="stylesheet" type="text/css" href="css/teacher.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

        <?php include('header.php');?>
        <hr></hr>

    <section class="team">
      <div class="center">
        <h1>Our Teacher</h1>
      </div>


      <div class="team-content">
    <?php
        $sql = "SELECT * FROM teacher";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
           ?>

        <div class="box">
          <img src="teacher/img/<?php echo $row['tc_pic']?>" />
          <h3><?php echo $row['tc_name']?></h3>
          <h4><?php echo $row['tc_email']?></h4>
          <h5><?php echo $row['tc_desc']?></h5>
        </div>
            <?php }

          ?>        
      </div>

  
    </section>
    <div>
 <?php include('footer.php');?>
        </div>
  </body>
</html>
