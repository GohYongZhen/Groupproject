<?php
session_start();
//database connection
include("config.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>about us</title>
    <link rel="stylesheet" href="css/aboutus.css">
</head>
<body>
    <?php include('header.php');?>
    <?php
        $sql = "SELECT * FROM page where pagetype='aboutus'";
        $result = mysqli_query($conn,$sql);

    while($data=mysqli_fetch_array($result)){
        ?>
            <div class="about-content">
        <section id="sectiontop">
            <h1><?php echo $data['pageTitle']?></h1>
            <p>Our historical story</p> 
        </section>
        <section>
            <img src="images/<?php echo $data['img_path']?>" alt="">
            <div class="about-content">
                <h2><?php echo $data['titleDescription']?></h2>
                <p><?php echo $data['pageDescription']?></p>

                <button class="readmore">Readmore</button>
            </div>

        </section>
    </div>
    
<?php } ?>



 <?php include('footer.php');?>
</body>
</html>
