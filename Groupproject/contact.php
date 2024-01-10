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
    <title>Contact Us Form</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <?php include('header.php');?>

<form method="POST" action="contact_action.php">
    <div class="contact-form">
        <h1>Contact Us</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form action="#" method="post">
                        <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
                      
                        <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                        <textarea type="text" id="message" name="message" placeholder="Your Message"></textarea>                   
             <button type="submit" name="submit" class="btn">Send<i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="form-img">
                    <img src="images\childrencontact.jpg" alt="">
                </div>
            </div>
        </div>
    </div> 

</form>
    
    <!--trying to put contact and icons-->
    <?php
        $sql = "SELECT * FROM footer";
        $result = mysqli_query($conn,$sql);

    while($data=mysqli_fetch_array($result)){
        ?>
    <section class="contact-card">
        <div class="contact-info">
            <div class="card" style="border-radius:50px">
                <i class="card-icon far fa-envelope"></i>
                <p><?php echo $data['email']?></p>
            </div>
        </div>

        <div class="contact-info">
            <div class="card" style="border-radius:50px">
                <i class="card-icon fa-solid fa-phone"></i>
                <p><?php echo $data['phoneNumber']?></p>
            </div>
        </div>        

        <div class="contact-info">
            <div class="card" style="border-radius:50px">
                <i class="card-icon fa fa-map-marker"></i>
                <p><?php echo $data['address']?></p>
            </div>
        </div>          
    </section>
    <?php } ?>


    <?php include('footer.php');?>
</body>
</html>