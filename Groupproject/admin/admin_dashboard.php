<?php
session_start();
//database connection
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pre-School enrollment system | Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
  <body>
      <?php include('../admin_header.php');?>

      <div id="dashboard_container">
        <div id="right_container">

        <?php
          $new_enrol=0;
          $new_ja=0;
          $new_message=0;

          /*Count new enrol*/
          $sql ="SELECT COUNT(enrol_status) AS new_enrol FROM enrollment WHERE enrol_status='Unreview';";
          $result = mysqli_query($conn, $sql);

          if ($result) {
            $data = mysqli_fetch_assoc($result);
            $new_enrol = $data['new_enrol'];
          } 
          else {
              echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
              echo '<a href="admin.php">Back</a>';
          }

          /*Count new job application*/
          $sql ="SELECT COUNT(ja_status) AS new_ja FROM application WHERE ja_status='Unreview';";
          $result = mysqli_query($conn, $sql);

          if ($result) {    
            $data = mysqli_fetch_assoc($result);
            $new_ja = $data['new_ja'];
          } 
          else {
              echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
              echo '<a href="admin.php">Back</a>';
          }

          /*Count new messages*/
          $sql ="SELECT COUNT(mess_status) AS new_ms FROM message WHERE mess_status=0;";
          $result = mysqli_query($conn, $sql);

          if ($result) {    
            $data = mysqli_fetch_assoc($result);
            $new_ms = $data['new_ms'];
            echo $new_ms;
          } 
          else {
              echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
              echo '<a href="admin.php">Back</a>';
          }
          mysqli_close($conn); 
        ?>

        <a href="../enrollment/enrollment_list.php">
          <div class="noti">
            <div style="height:150px">
              <img src="img/enrol.png" alt="enrol">
            </div>
            <div class="info">
              <p> <span style="text-shadow: 2px 1px #b5e9ed;"> <?php echo "$new_enrol" ?> </span> new enrolment</p>       
            </div>
          </div>
        </a>      

        <a href="../career/application_list.php">
          <div class="noti">
            <div style="height:150px">
              <img src="img/application.png" alt="application">
            </div>
            <div class="info">
              <p> <span style="text-shadow: 2px 1px #b5e9ed;"><?php echo "$new_ja" ?></span> new application</p>       
            </div>
          </div>
        </a>

        <a href="../message/message.php">
          <div class="noti">
            <div style="height:150px">
              <img src="img/message.png" alt="application">
            </div>
            <div class="info">
              <p> <span style="text-shadow: 2px 1px #b5e9ed;"><?php echo "$new_ms" ?></span> new message</p>       
            </div>
          </div>
        </a>

        </div>
      </div>
    
</body>
</html>