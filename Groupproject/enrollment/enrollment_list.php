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
    <title>Enrollment List</title>
    <link rel="stylesheet" href="css/application_admin_header.css">

</head>
<body>
   
<?php include('admin_header.php');?>
    <h2>LIST OF STUDENT ENROLLMENT</h2> 
      
        

        <div class="content" style="padding:0 10px;">
			<div style="text-align: right; padding:10px;">
				
			</div>
			<table border="1" width="100%" id="projectable">
				<tr>
					<th width="3%">No</th> 
					<th width="10%">Child Name</th> 
					<th width="3%">Age</th> 
					<th width="8%">Birthday</th>
					<th width="10%">Program</th> 
                    <th width="8%">Time</th>
					<th width="10%">Photo</th> 
					<th width="15%">Status</th> 
					<th width="10%">Action</th> 
				</tr>
				<?php
					$sql =  "SELECT * FROM enrollment ";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) > 0){
						//output data of each row
						$numrow=1;
						while($row =mysqli_fetch_assoc($result)){
							echo "<tr>"; 
							echo "<td>" . $numrow . "</td>
							<td>". $row["child_name"] . "</td>
                            <td>" . $row["age"] . "</td>
							<td>" . $row["child_birthday"] . "</td>
							<td>" . $row["program"] . "</td>
                            <td>" . $row["enrol_time"] . "</td>";
							echo'<td>
							<div class="teacher_pic_div">
							<img src="enrol/'.$row["child_photo"].'">
							<label for="child_photo">'.$row["child_photo"]. '</label>
						</div>
						</td>';
						echo"
						<td>" . $row["enrol_status"] . "</td>";

							echo 
							'<td> <a href="enrollment_detail.php?id=' . $row["enrol_id"] . '">View</a>&nbsp;|&nbsp;
							<a href="enrollment_edit.php?id=' . $row["enrol_id"] . '">Edit</a>&nbsp;|&nbsp; 
							<a href="enrollment_delete.php?id=' . $row["enrol_id"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>'; 
							echo "</tr>" . "\n\t\t"; 
							$numrow++;
						}
					}
					else{
						echo '<tr><td colspan="7">0 results</td></tr>';
					}

					mysqli_close($conn);
				?>
			
			</table>
		<div>
			<form method="POST" action="enrollment_list_action.php"  enctype="multipart/form-data">
					<button type=submit name=submit>SEND</button>
				</form>
		</div>
        
           <script>
        /function show_AddEntry() {
			var x = document.getElementById("challengeDiv");
			x.style.display = 'block';
			var firstField = document.getElementById('sem');
			firstField.focus();
		}
		</script>
    
</body>
</html>