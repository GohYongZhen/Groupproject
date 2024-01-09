<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PreSchool Enrollment System </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
 
    <!-- Template Stylesheet -->
    <link href="css/classes.css" rel="stylesheet">
</head>

<body>
<?php include('header.php');?>

<div class="page-header">
<h1>Classes</h1>
 </div>

 <?php
        $sql = "SELECT class.*, teacher.*
        FROM class
        INNER JOIN teacher ON class.teacher_id = teacher.teacher_id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)){
           ?>
           
<div class="word">

<div class="row">
      <div class="leftcolumn">

        <div class="card">
          <h2><?php echo $row['cl_name']?></h2> 
          <h3 class="img1">Teacher: <?php echo $row['tc_name']?></h3>
          <div class="img1">
            <img src="images/<?php echo $row['cl_photo']?>" alt="Real Image" class="realimg" />
			<table class="table" ; width="70%">
				<tr class="c_up">
					<th width="50%">Age Range</th>
					<th width="50%">Time</th>
				</tr>
				<tr class="c_down">
				<td><?php echo $row['cl_agegroup']?></td>
				<td><?php echo $row['cl_time']?></td>
				</tr>
			</table>
          </div>
        </div>
    
  
      </div>
    </div>
</div>    
       <?php 
       }   
?>

<?php include('footer.php');?> 
</body>

</html>
