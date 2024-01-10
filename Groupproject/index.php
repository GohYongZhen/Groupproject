<?php
session_start();
//database connection
include("config.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pre-School enrollment system | Home page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
  <body>
        <?php include('header.php');?>

        
</br>
<hr></hr>
    <?php
    $sql = "SELECT * FROM page where pagetype='homepage'";
    $result = mysqli_query($conn,$sql);
        while($data=mysqli_fetch_array($result)){
    ?>
     <div class=" header-banner">
        <div class="banner">
            <h1><?php echo $data['pageTitle']?> <br> <span style="color: #20bcd0;"><?php echo $data['titleDescription']?></span></h1>
            <p><?php echo $data['pageDescription']?></p>
            <a href="aboutus.php"><button class="read-button">Read More</button></a>
        </div>
    </div>
<?php } ?>
    <section>
      <blockquote></blockquote>
    </section>


        <?php include('footer.php');?>
</body>
</html>