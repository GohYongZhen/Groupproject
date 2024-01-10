<!--header-->
<?php
if (!isset($_SESSION['UID'])) {
  header("Location: ../index.php");
  exit(); // Make sure to include an exit() after redirection
}
echo'
    <header>
      <a class="dashboard" href="../admin/admin_dashboard.php"><img class="logo" src="../images/logo_white.png" alt="logo"></a>
      <a href="../admin/changePw.php"><button class="admin_logout_button">Change password</button></a>
      <a href="../admin/admin_logout.php"><button class="admin_logout_button">Logout</button></a>
    </header>

    <div id="sideNav" class="sidenav">
      <a href="../admin/admin.php">Admin</a>
      <a href="../enrollment/enrollment_list.php">Enrolment</a>
      <a href="../career/application_list.php">Application</a>
      <a href="../message/message.php">Messages</a>
      <a href="../teacher/teacher.php">Teacher</a>
      <a href="../class/class.php">Class</a>
      <a href="../facility/facility.php">Facilities</a>
      <a href="../editpages/editpages.php">Edit Pages</a>
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