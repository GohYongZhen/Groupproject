<?php
//database connection
include("config.php");
?>

<head>
    <link rel="stylesheet" type="text/css" href="css/footer.css">
        <script
      src="https://kit.fontawesome.com/1165876da6.js"
      crossorigin="anonymous"
    ></script>
</head>

    <footer>
        <?php
        $sql = "SELECT * FROM footer";
        $result = mysqli_query($conn,$sql);

    while($data=mysqli_fetch_array($result)){
        ?>
        <div class="footer-container">
            <div class="footer-content">
                <h3>Contact Us</h3>
                <p>Email: <?php echo $data['email']?></p>
                <p>Phone: <?php echo $data['phoneNumber']?></p>
                <p>Address: <?php echo $data['address']?></p>
            </div>
            <div class="footer-content">
                <h3>Quick Links</h3>
                <ul class="list">
                    <li><a href="">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Classes</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Admin</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <h3>Follow Us</h3>
                <ul class="social-icons">
                    <li><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-bar">
            <p>&copy; pre-school . All rights reserved</p>
        </div>
    <?php } ?>
    </footer>

