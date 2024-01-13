<?php
session_start();
//database connection
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>JoBList</title>
    <link rel="stylesheet" href="../css/application_admin_header.css">
	    <link rel="stylesheet" href="../css/admin_header.css">

</head>
<body onload="makeTableScroll();">
   
    <?php include('../admin_header.php');?>
    <h2>LIST OF JOB APPLICATION</h2> 
        

        <div class="content" style="padding:0 10px;">
			<div style="text-align: right; padding:10px;">
				
			</div>
			<div class="scrolling_table">
			<table border="1" width="100%" id="projectable">
				<tr>
					<th width="3%">No</th> 
					<th width="10%">Name</th> 
                    <th width="10%">Contact</th> 
                    <th width="10%">Email</th> 
					<th width="3%">Age</th> 
					<th width="10%">Birthday</th> 
					<th width="10%">Status</th> 
                    <th width="8%">Nationalities</th>
                    <th width="8%">Time</th>
					<th width="10%">File</th> 
					<th width="10%" colspan="2">Action</th>
				</tr>
				<?php
					$sql =  "SELECT * FROM application ";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) > 0){
						//output data of each row
						$numrow=1;
						while($row =mysqli_fetch_assoc($result)){
							echo "<tr>"; 
							echo "<td>" . $numrow . "</td>
							<td>". $row["ja_name"] . "</td>
                            <td> " . $row["ja_contact"]. "</td>
							<td>" . $row["ja_email"] . "</td>
                            <td>" . $row["ja_age"] . "</td>
							<td>" . $row["ja_birthday"] . "</td>
                            <td>" . $row["ja_status"] . "</td>
							<td>" . $row["ja_nationality"] . "</td>
                            <td>" . $row["ja_updationDate"] . "</td>
							<td>" . $row["ja_resume"] . "</td>"; 
							echo "<td><a href='download_resume.php?id=" . $row["ja_id"] . "'>Download Resume</a></td>";
							echo '<td> <a href="application_edit.php?id=' . $row["ja_id"] . '">Edit</a>&nbsp;|&nbsp;'; 
							echo '<a href="application_delete.php?id=' . $row["ja_id"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>'; 
							echo "</tr>" . "\n\t\t"; 
							$numrow++;
						}
					}
					else{
						echo '<tr><td colspan="11">0 results</td></tr>';
					}

					mysqli_close($conn);
				?>
			</table>
			</div>
        
        
        <script>
        function makeTableScroll() {
        // Constant retrieved from server-side via JSP
			var maxRows = 7;

			var table = document.getElementById("projectable");
			var wrapper = table.parentNode;
			var rowsInTable = table.rows.length;
			var height = 0;
			if (rowsInTable > maxRows) {
				for (var i = 0; i < maxRows; i++) { 
					height += table.rows[i].clientHeight;
				}
				wrapper.style.height = height + "px";
			}
		}
		</script>
    </script>
</body>
</html>