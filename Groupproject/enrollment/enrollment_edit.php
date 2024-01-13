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
    <title>UPDATE JA Form</title>
    <link rel="stylesheet" href="../css/application_admin_header.css">
    <link rel="stylesheet" href="../css/admin_header.css">

</head>
<body>
    <?php include('../admin_header.php');?>
    
    <h2 style="margin-left:25%">Edit INFO</h2> 
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
 <div class="edit_container">
<form style="padding:0 10px;" method="POST" action="enrollment_edit_action.php" enctype="multipart/form-data"  onsubmit="return validateForm()" id="myForm">
 <div class="form-container">   
<!--hidden value: id to be submitted to action page--> 
                <input type="text" id="id" name="id" value="<?=$_GET['id']?>"hidden>
               
                    <tr>
                        <div class="input_row">
                        <span>FATHER NAME</span>
                                <td> 
                                <?php 
                            if($father_name!=""){ 
                                echo '<input type="text" name="father_name" size="5" value="' . $father_name . '" required>'; 
                            } 
                            else { 
                            ?> 
                                <input type="text" name="father_name" size="5" required> 
                            <?php 
                                } 
                            ?> 
                        </td> 
                        
                        <span>MOTHER NAME</span>
                                <td> 
                                <?php 
                            if($mother_name!=""){ 
                                echo '<input type="text" name="mother_name" size="5" value="' . $mother_name . '" required>'; 
                            } 
                            else { 
                            ?> 
                                <input type="text" name="mother_name" size="5" required> 
                            <?php 
                                } 
                            ?> 
                        </td> 
                        
                        </div>
                    </tr>


                    <tr>
                         <div class="input_row">
                        <span>CONTACT</span>
                                <td> 
                                <?php 
                            if($parent_contact!=""){ 
                                echo '<input type="text" name="parent_contact" size="5" value="' . $parent_contact . '" required>'; 
                            } 
                            else { 
                            ?> 
                                <input type="text" name="parent_contact" size="5" required> 
                            <?php 
                                } 
                            ?> 
                        </td> 
                        

                        <span>EMAIL</span>
                                <td> 
                                <?php 
                            if($parent_email!=""){ 
                                echo '<input type="text" name="parent_email" size="5" value="' . $parent_email . '" required>'; 
                            } 
                            else { 
                            ?> 
                                <input type="text" name="parent_email" size="5" required> 
                            <?php 
                                } 
                            ?> 
                        </td> 
                        
                         </div>
                    </tr>

                    <tr>
                         <div class="input_row">
                        <span>CHILDREN NAME</span>
                                <td> 
                                <?php 
                            if($child_name!=""){ 
                                echo '<input type="text" name="child_name" size="5" value="' . $child_name . '" required>'; 
                            } 
                            else { 
                            ?> 
                                <input type="text" name="child_name" size="5" required> 
                            <?php 
                                } 
                            ?> 
                        </td> 
                        
       
                        <span>PROGRAM</span>
                                <td> 
                                <select size="1" name="program" required> 
                        <option value=""><?php echo $program;?></option> 
                        <?php 
                                    if($program=="PlayGroup-1.8 to 3 years") 
                                        echo '<option value="PlayGroup-1.8 to 3 years" selected>PlayGroup-1.8 to 3 years</option>'; 
                                    else 
                                        echo '<option value="PlayGroup-1.8 to 3 years">PlayGroup-1.8 to 3 years</option>';

                                    if($program=="Nursery-2.5 to 4 years") 
                                        echo '<option value="Nursery-2.5 to 4 years" selected>Nursery-2.5 to 4 years</option>'; 
                                    else 
                                        echo '<option value="Nursery-2.5 to 4 years">Nursery-2.5 to 4 years</option>';

                                        if($program=="Junior KG- 3.5 to 5 years") 
                                        echo '<option value="Junior KG- 3.5 to 5 years" selected>Junior KG- 3.5 to 5 years</option>'; 
                                    else 
                                        echo '<option value="Junior KG- 3.5 to 5 years">Junior KG- 3.5 to 5 years</option>';

                                        if($program=="Senior KG- 4.5 to 6 years") 
                                        echo '<option value="Senior KG- 4.5 to 6 years" selected>Senior KG- 4.5 to 6 years</option>'; 
                                    else 
                                        echo '<option value="Senior KG- 4.5 to 6 years">Senior KG- 4.5 to 6 years</option>';


                                    

                            ?> 
		                        </select> 
                        </td> 
                        
                         </div>
                    </tr>

                    <tr>
                         <div class="input_row">
                        <span>MESSAGE</span> 
                        
                        <td>
                           
                        <textarea rows="4" name="message" cols="20" rows="7"><?php echo $message;?></textarea> 
                        </td> 
                        

                        <span>AGE</span>
                       <td> 
                                <select size="1" name="age" required> 
                        <option value=""><?php echo $age;?></option> 
                                <?php 
                            if($age=="18 Month-3 Year") 
                                        echo '<option value="18 Month-3 Year" selected>18 Month-3 Year</option>'; 
                                    else 
                                        echo '<option value="18 Month-3 Year">18 Month-3 Year</option>';
                                    
                            if($age=="2-3 Year") 
                                        echo '<option value="2-3 Year" selected>2-3 Year</option>'; 
                                    else 
                                        echo '<option value="2-3 Year">2-3 Year</option>';

                             if($age=="3-4 Year") 
                                        echo '<option value="3-4 Year" selected>3-4 Year</option>'; 
                                    else 
                                        echo '<option value="3-4 Year">3-4 Year</option>';

                            if($age=="4-5 Year") 
                                        echo '<option value="4-5 Year" selected>4-5 Year</option>'; 
                                    else 
                                        echo '<option value="4-5 Year">4-5 Year</option>';

                             if($age=="5-6 Year") 
                                        echo '<option value="5-6 Year" selected>5-6 Year</option>'; 
                                    else 
                                        echo '<option value="5-6 Year">5-6 Year</option>';


                            ?> 
                            </select>
                        </td> 
                         </div>
                    </tr>

                      



                    <tr>
                        <div class="input_row">
                        <span>BIRTHDAY</span>
                                <td> 
                                <input type="date" name="child_birthday"  value="<?php echo $child_birthday;?>">
                        </td> 
                        

                        <span>UPLOADED PHOTO</span>
                        <td>:</td> 
                            <td>
                            <input type="text" disabled value="<?=$photo;?>">
                            </td> 
                        
                        </div>
                    </tr>

                    <tr>
                         <div class="input_row">
                        <span>NEW PHOTO TO UPLOAD</span>
                        <td>:</td> 
                        <input type="file" name="file" id="file" >
                            
                            
                        
                        
                            <button type="submit" value="Submit" class="btn">Update </button>  
                            
                            <button type="reset" value="Reset" class="btn" onclick="resetForm()" >Reset </button>  
                           
                            <button type="button" class="btn" onclick="goBack()">Go Back</button>
                         </div>
                    </tr>

               
 </div> 
    </form>
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


                    