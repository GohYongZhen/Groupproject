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
    <h2 style="margin-left: 25%;">Edit INFO</h2> 
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
    <div class="edit_container">
        <form style="padding:0 10px;" method="POST" action="application_edit_action.php" enctype="multipart/form-data"  onsubmit="return validateForm()" id="myForm">
                <!--hidden value: id to be submitted to action page--> 
    <div class="form-container">
                <input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"> 
                
            <tr>
            <div class="input_row">
                <span class="custom-label">Name:</span>
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
                <span class="custom-label">Contact:</span>
                
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
                    
             
            </div>
            </tr>
         


         <tr>
    <div class="input_row">     
         <span class="custom-label">Email:</span>
         
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
        </div>
         </tr>        

            <tr>
            <div class="input_row">     
            <span class="custom-label">Birthday:</span>
            
            <td>
                <input type="date" name="birthday"  value="<?php echo $birthday;?>">
            </td>                            
                <span class="custom-label">Satus:</span>
                
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
            </div>              
            </tr>


            <tr>
            <div class="input_row">                                                                                         
                <span class="custom-label">Nationalities:</span>
                
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
                
                <span class="custom-label">Uploaded File:</span>
                <td>:</td> 
                <td>
                <input type="text" disabled value="<?=$resume;?>">
                </td> 
            </div>        
            </tr> 

            <tr >
            <span class="custom-label">New File To Upload:</span>
                <input type="file" name="file" id="file" >

                <button type="submit" value="Submit" class="btn">Update </button>  
                
                <button type="reset" value="Reset" class="btn" onclick="resetForm()" >Reset </button>  
                
                <button type="button" value="Clear" class="btn" onclick="resetForm()">Clear </button>  
                
                <button type="button" class="btn" onclick="goBack()">Go Back</button>
            </tr>
                            
                            
            <div class="input_row">                    

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

            //scrollable table
            function makeTableScroll() {
                // Constant retrieved from server-side via JSP
                var maxRows = 15;

                var table = document.getElementById("admin_table");
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
</body>
</html>