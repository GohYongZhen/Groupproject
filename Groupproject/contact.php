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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Contact Us Form</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <?php include('header.php');?>
    <div class="contact-form">
        <h1>Contact Us</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Enter Your Name">
                      
                        <input type="email" name="name" placeholder="Enter Your Email">
                        <textarea name="message" placeholder="Your Message"></textarea>                   
             <button type="submit" class="btn">Send <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="form-img">
                    <img src="images\childrencontact.jpg" alt="">
                </div>
            </div>
        </div>
    </div> 
    <!--trying to put contact and icons-->
    <section class="facilities">
        <div>
          <img src="images/classroom.jpg">
          <h3>Classroom</h3>
        </div>
                <div>
          <img src="images/playground.jpg">
          <h3>Playground</h3>
        </div>
        <div>
          <img src="images/library.jpg">
          <h3>Library</h3>

        </div>
    </section>


    <?php include('footer.php');?>
</body>
</html>