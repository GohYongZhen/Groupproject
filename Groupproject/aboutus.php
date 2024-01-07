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
    <div class="about-content">
        <section id="sectiontop">
            <h1>About Us</h1>
            <p>Our historical story</p> </section>
        <section>
            <img src="images/about.jpg" alt="">
            <div class="about-content">
                <h2>The story</h2>
                <p>Playschool helps in building a strong foundation in social, pre-academics, and general life skills. 
                    It helps in the development of a child’s emotional and personal growth and provides opportunities for children to learn in ways that sheerly 
                    interests them and develop a strong sense of curiosity. 
                    Playschool is important for your child as it helps in making the child habitual of the routine. The child also becomes aware of himself/herself and develops motor and cognitive skills. Playschools further enable the child to receive individual attention as the school has a very low student-to-teacher ratio. According to the report, only 48% of poor children who were born in 2001 "started school ready to learn, compared to 75% of children from middle-income families." Additionally, the amount of time parents of various socioeconomic statuses spend reading to their children has changed since the 1960s and 1970s. Parents with higher education read to their kids for up to an additional 30 minutes per day between 2010 and 2012, which adds up by the time the kids enter kindergarten.The kids are given the ‘right’ toys to play with according to their age of development which helps them to develop and learn the things that can be implemented or transferred onto them, such as changing the clothes of the doll, feeding the doll, etc. 
                    BELOW:
                </p>

                <button class="readmore">Readmore</button>
            </div>

        </section>
    </div>

 <?php include('footer.php');?>
</body>
</html>