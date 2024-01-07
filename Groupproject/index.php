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
     <div class=" header-banner">
        <div class="banner">
            <h1>Design <br> <span style="color: #20bcd0;">Landing Page</span></h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore repellat suscipit beatae ducimus, aspernatur culpa soluta eum at unde facilis ipsum veniam enim harum nesciunt consequuntur quo provident, voluptatum nisi commodi reprehenderit aut sint? Laboriosam voluptas provident esse harum explicabo rem, dolor quis unde voluptatem tempore praesentium, accusantium pariatur libero debitis a eius voluptate.</p>
            <button class="read-button">Read More</button>
        </div>
    </div>
    
    <section>
      <blockquote></blockquote>
    </section>

    <section class="slogan">
      <blockquote>Visit to out School</br><h3>Facilities</h3></blockquote>
    </section>

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