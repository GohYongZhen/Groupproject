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
    <title>UPDATE JA Form</title>
    <link rel="stylesheet" href="css/application_admin_header.css">

</head>
<body>
   
    
    <h2>Edit INFO</h2> 
        <?php 
            $id=null;
            $ja_name="";
            $contact="";
            $email="";
            $age="";
            $birthday="";
            $status="";
            $nationality="";
            $resume="";

            if(isset($_GET["id"]) && $_GET["id"] != ""){ ; 
                $sql = "SELECT * FROM application WHERE ja_id=" . $_GET["id"] . " ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row["ja_id"];
                    $ja_name = $row["ja_name"];
                    $email = $row["ja_email"];
                    $contact =$row["ja_contact"];
                    $age = $row["ja_age"];
                    $birthday= $row["ja_birthday"];
                    $status = $row["ja_status"];
                    $nationality = $row["ja_nationality"];
                    $resume = $row["ja_resume"];
            
                }  
           }  
            
        ?> 
        

        <div style="padding:0 10px;">
			<div style="text-align: right; padding:10px;" >
				
			</div>
			<table border="1" width="100%" id="projectable">
				<tr>
					
					<th width="10%">Name</th> 
                    <th width="10%">Contact</th> 
                    <th width="10%">Email</th> 
					<th width="10%">Age</th> 
					<th width="10%">Birthday</th> 
					<th width="15%">Status</th> 
                    <th width="15%">Nationalities</th> 
					<th width="10%">File</th> 
				</tr>
				<?php
					$sql =  "SELECT * FROM application WHERE ja_id=" . $_GET["id"] . " ";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) > 0){
						//output data of each row
						$numrow=1;
						while($row =mysqli_fetch_assoc($result)){
							echo "<tr>"; 
							echo 
							"
                            <td>". $row["ja_name"] . "</td>
                            <td> " . $row["ja_contact"]. "</td>
							<td>" . $row["ja_email"] . "</td>
                            <td>" . $row["ja_age"] . "</td>
							<td>" . $row["ja_birthday"] . "</td>
                            <td>" . $row["ja_status"] . "</td>
							<td>" . $row["ja_nationality"] . "</td>
							<td>" . $row["ja_resume"] . "</td>
                            "; 
							
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

        <div style="padding:0 10px;" id="careerDiv"> 
               
             <div>
    <form style="padding:0 10px;" method="POST" action="application_edit_action.php" enctype="multipart/form-data"  onsubmit="return validateForm()" id="myForm">
                <!--hidden value: id to be submitted to action page--> 
                <div class="form-container">
                <input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"> 
                
                

          

         <tr>
         <span class="custom-label">Name:</span>
         <p></p>
                        <td> 
                        <?php 
                    if($ja_name!=""){ 
                        echo '<input type="text" name="ja_name" size="5" value="' . $ja_name . '" required>'; 
                    } 
                    else { 
                    ?> 
                        <input type="text" name="ja_name" size="5" required> 
                    <?php 
                        } 
                    ?> 
                </td> 
         <p></p>
         </tr>

                        
         <tr> 
         <span class="custom-label">Contact:</span>
         <p></p>
                <td> 
                        <?php 
                    if($contact!=""){ 
                        echo '<input type="text" name="contact" size="5" value="' . $contact . '" required>'; 
                    } 
                    else { 
                    ?> 
                        <input type="text" name="contact" size="5" required> 
                    <?php 
                        } 
                    ?> 
                </td> 
                <p></p>
         </tr> 


         <tr> 
         <span class="custom-label">Email:</span>
         <p></p>
                <td> 
                        <?php 
                    if($email!=""){ 
                        echo '<input type="text" name="email" size="5" value="' . $email . '" required>'; 
                    } 
                    else { 
                    ?> 
                        <input type="text" name="contact" size="5" required> 
                    <?php 
                        } 
                    ?> 
                </td> 
                <p></p>
         </tr> 

         <tr> 
         <span class="custom-label">Age:</span>
         
                <td> 
                        <?php 
                    if($age!=""){ 
                        echo '<input type="number" name="age" size="5" value="' . $age . '" required>'; 
                    } 
                    else { 
                    ?> 
                        <input type="number" name="age" size="5" required> 
                    <?php 
                        } 
                    ?> 
                </td> 
                <p></p>
                    </tr> 

                    <tr>
                    <span class="custom-label">Birthday:</span>
                    
                    <td>
                    <input type="date" name="birthday"  value="<?php echo $birthday;?>">
                    </td> 
                    <p></p>
                    </tr> 


                    <tr>
                                    <p></p>
                                    <span class="custom-label">Satus:</span>
                                    <p></p>
                                    <select name="status" id="status" reuired>
                                        <option value="" ><?php echo $status;?></option>
                                        <?php
                                                 $status = array(
                                                    "Single",
                                                    "Married",
                                                    "Divorced",
                                                    );
                                        // Loop through the nationalities array to generate options
                                        foreach ($status as $status) {
                                            echo "<option value=\"$status\">$status</option>";
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <p></p>
                                </tr>


                    <tr>
                    <p></p>                                                                     
                    <span class="custom-label">Nationalities:</span>
                    <p></p>
                    <select name="nationality" id="nationality" required>
                        <option value="" ><?php echo $nationality;?></option>
                        <?php

                                    $nationality = array(
                                        "Afghan",
                                        "Albanian",
                                        "Algerian",
                                        "American",
                                        "Bahamian",
                                        "Bahraini",
                                        "Bangladeshi",
                                        "Barbadian",
                                        "Cambodian",
                                        "Cameroonian",
                                        "Canadian",
                                        "Cape Verdean",
                                        "Chinese",
                                        "Indian",
                                        "Indonesian",
                                        "Iranian",
                                        "Iraqi",
                                        "Israeli",
                                        "Japanese",
                                        "Jordanian",
                                        "Kazakhstani",
                                        "Kuwaiti",
                                        "Laotian",
                                        "Lebanese",
                                        "Malaysian",
                                        "Maldivian",
                                        "Mongolian",
                                        "Nepali",
                                        "North Korean",
                                        "Omani",
                                        "Pakistani",
                                        "Palestinian",
                                        "Qatari",
                                        "Saudi Arabian",
                                        "Singaporean",
                                        "South Korean",
                                        "Sri Lankan",
                                        "Syrian",
                                        "Taiwanese",
                                        "Tajikistani",
                                        "Thai",
                                        "Turkish",
                                        "Turkmen",
                                        "Emirati",
                                        "Uzbekistani",
                                        "Vietnamese",
                                        "Yemeni"
                                            // Add more nationalities as needed
                                        );
                        // Loop through the nationalities array to generate options
                        foreach ($nationality as $nationality) {
                            echo "<option value=\"$nationality\">$nationality</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <p></p>
                </tr>

                

                                   
                            <tr>
                            <span class="custom-label">Uploaded File:</span>
                            <td>:</td> 
                            <td>
                            <input type="text" disabled value="<?=$resume;?>">
                            </td> 
                            <p></p>
                        </tr> 

                     <tr >
                     <span class="custom-label">New File To Upload:</span>
                           
                            <input type="file" name="file" id="file" >
                            <br>
                            
                            <p></p>
                            <button type="submit" value="Submit" class="btn">Update </button>  
                            <p></p>
                            <button type="reset" value="Reset" class="btn" onclick="resetForm()" >Reset </button>  
                            <p></p>
                            <button type="button" value="Clear" class="btn" onclick="resetForm()">Clear </button>  
                            <p></p>
                            <button type="button" class="btn" onclick="goBack()">Go Back</button>
                            
                        </tr>

                        </form>
        </div>
                    </div>
           <script>
        //reset form after modification to a php echo to fields//

        function resetForm() { 
            document.getElementById("myForm").reset(); 
            } 
            
            //this clear form to empty the form for new data 
            function clearForm() { 
            var form = document.getElementById("myForm"); 
            
            if (form) { 
            var inputs = form.getElementsByTagName("input"); 
            var textareas = form.getElementsByTagName("textarea"); 
            
                //clear select 
                form.getElementsByTagName("select")[0].selectedIndex=0; 
                
            //clear all inputs 
                for (var i = 0; i < inputs.length; i++) { 
                if (inputs[i].type !== "button" && inputs[i].type !== "submit" && inputs[i].type !== "reset") {
                inputs[i].value = ""; 
                } 
            } 
            
            //clear all textareas 
            for (var i = 0; i < textareas.length; i++) {
            textareas[i].value = ""; 
            } 
            } else { 
            console.error("Form not found"); 
            } 
            } 

            function goBack() {
                // Use the history object to navigate back
                window.history.back();
                }
    </script>
</body>
</html>