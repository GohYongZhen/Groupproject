<!--header-->
<?php
echo'
    <header>
      <img class="logo" src="images/logo.svg" alt="logo">
      <a class="dashboard" href="admin_dashboard.php">Dashboard</a>
      <a href="admin_logout.php"><button class="admin_logout_button">Logout</button></a>
    </header>

    <div id="sideNav" class="sidenav">
      <a href="admin.php">Admin</a>
      <a href="enrolment.php">Enrolment</a>
      <a href="application.php">Application</a>
      <a href="#">Messages</a>
      <a href="#">Teacher</a>
      <a href="#">Class</a>
      <a href="#">Facilities</a>
      <a href="#">Edit Pages</a>
    </div>

    <script>
      function openNav() {
        document.getElementById("sideNav").style.width = "15%";
      }

      function closeNav() {
        document.getElementById("sideNav").style.width = 0;
      }
    </script>
'
?>