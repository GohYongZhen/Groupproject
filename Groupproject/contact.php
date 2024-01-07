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
<style>
body{
    background-color:black;
}
</style>
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
    <section class="contact-card">
        <div class="contact-info" style="color:black">
            <div class="card">
                <i class="card-icon far fa-envelope"></i>
                <p>pre-school@example.com</p>
            </div>
        </div>

        <div class="contact-info" style="color:black">
            <div class="card">
                <i class="card-icon fa-solid fa-phone"></i>
                <p>+6078828576</p>
            </div>
        </div>        

        <div class="contact-info" style="color:black">
            <div class="card">
                <i class="card-icon fa fa-map-marker"></i>
                <p>Kuala Lumpur Malaysia</p>
            </div>
        </div>          
    </section>


    <?php include('footer.php');?>
</body>
</html>
