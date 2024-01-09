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
    <title>DETAILSS
	</title>
    <link rel="stylesheet" href="css/admin_header.css">

</head>
<body>

<?php include('admin_header.php');?>
<h2>Details Of Enrollment</h2> 
      

<?php 
            $id=null;
				$father_name="";
				$mother_name="";
				$parent_contact="";
				$child_name="";
				$age="";
				$program="";
				$message="";
				$child_birthday="";
				$time="";
				$photo="";
				$status="";

            if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
                $sql = "SELECT * FROM enrollment WHERE enrol_id=" . $_GET["id"];

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row["enrol_id"];
					$father_name = $row["father_name"];
					$mother_name = $row["mother_name"];
					$parent_contact = $row["parent_contact"];
					$parent_email = $row["parent_email"];
					$child_name = $row["child_name"];
					$age = $row["age"];
					$program = $row["program"];
					$message = $row["message"];
					$child_birthday = $row["child_birthday"];
					$time=$row["enrol_time"];
					$photo=$row["child_photo"];
					$status=$row["enrol_status"];
					
            
                }  
           }  
            
        ?> 
   

   
   		<div class="content" style="padding:0 10px;">
			<div style="text-align: right; padding:10px;">
				
			</div>
			<table border="1" width="100%" id="projectable">
				
				<?php
					$sql = "SELECT * FROM enrollment WHERE enrol_id=" . $_GET["id"];

					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) > 0){
						//output data of each row
						$numrow=1;
						while($row =mysqli_fetch_assoc($result)){
							echo "<tr>"; 

							echo "
							<tr>
							<th>No</th> 
							<td>" . $numrow . "</td>
							</tr>

							<tr>
							<th>Father Name</th> 
							<td>". $row["father_name"] . "</td>
							</tr>

							<tr>
							<th>Mother Name</th> 
							<td>". $row["mother_name"] . "</td>
							</tr>

							<tr>
							<th>Parent Contact</th>
                            <td> " . $row["parent_contact"]. "</td>
							</tr>

							<tr>
							<th>Parent Email</th>
							<td>" . $row["parent_email"] . "</td>
							</tr>


							<tr>
							<th>Child Name</th>
							<td>". $row["child_name"] . "</td>
							</tr>

							<tr>
							<th>Age</th>
                            <td>" . $row["age"] . "</td>
							</tr>

							<tr>
							<th>Birthday</th>
							<td>" . $row["child_birthday"] . "</td>
							</tr>

							<tr>
							<th>Program</th>
							<td>" . $row["program"] . "</td>
							</tr>

							<tr>
							<th>Message</th>

							<td>" . $row["message"] . "</td>
							</tr>

							<tr>
							<th>Time</th>
                            <td>" . $row["enrol_time"] . "</td>
							</tr>
							
							
							<tr>
							<th>Status</th>
                            <td>" . $row["enrol_status"] . "</td>
							</tr>";

							echo'<tr>
							<th>Photo</th>
                            <td>
                                <div class="teacher_pic_div">
								<img src="enrol/'.$row["child_photo"].'">
									<label for="child_photo">'.$row["child_photo"]. '</label>
                                </div>
								<p></p>
                            </td>';

							
							echo '<td> <a href="enrollment_list.php?id=' . $row["enrol_id"] . '">Back</a>&nbsp;|&nbsp;'; 
							
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
    <form style="padding:0 10px;" method="POST" action="enrollment_list_action.php" enctype="multipart/form-data"  onsubmit="return validateForm()" id="myForm">
                <!--hidden value: id to be submitted to action page--> 
                <div class="form-container">
                <input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"> 
				<th>STATUS:</th>
				<td>
							<input type="radio" name="status" value="accept" >Accept
							<input type="radio" name="status" value="reject"> Reject
						</td>
					<button type=submit name=submit>CHECK</button>
					<p></p>
					<button type="button" class="btn" onclick="goBack()">Back</button>

				</form>
        </div>
				</div>
        
           <script>
        /function show_AddEntry() {
			var x = document.getElementById("challengeDiv");
			x.style.display = 'block';
			var firstField = document.getElementById('sem');
			firstField.focus();
		}

		function goBack() {
                // Use the history object to navigate back
                window.history.back();
                }
		</script>
    
</body>
</html>