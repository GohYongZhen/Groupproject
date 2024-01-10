<?php
session_start();
//database connection
include("config.php");
?>



<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JOB APPLICATION</title>
    <link rel="stylesheet"  href="css/careerstyle.css">

    <script>
        function showPopup(message) {
            alert(message);
        }
    </script>
    <?php include('header.php'); ?>
</head>
  <body>
        

        <hr></hr>
        
        <div class="content" >
            <h1>WELCOME ! <br> <span style="color: #20bcd0;">JOIN OUR TEAM NOW.</span></h1>
            
            </div>
        
        <div>
    <form style="padding:0 10px;" method="POST" action="application_action.php" enctype="multipart/form-data"  onsubmit="return validateForm()" id="myForm">
       
             <div class="form-container">
      
                    <tr>
                        <span class="custom-label">Name:</span>
                        <p></p>
                        <input type="text" name="ja_name" id="ja_name">
                        <p></p>
                    </tr>

        

                    <tr>
            
                        <span class="custom-label">Email:</span>
                        <p></p>
                        <input type="text" name="email" id="email">
                        <p></p>
                        <span class="custom-label">Contact:  </span> 
                        <p>*Please PUT +6 In front Of Contact</p>
                        <p></p>
                    <input type="text" name="contact" id="contact">
                    <p></p>
        
            
                    </tr>
      

                    <tr>
                            <span class="custom-label">Age:</span>
                            <p></p>
                            <input type="number" name="age" >
                            <p></p>
                    </tr>

                    <tr>
                        <span class="custom-label">Birthday:</span>
                        <p></p>
                        <input type="date" name="birthday">
                        <p></p>
                    </tr>


       
                    <tr>
                        <span class="custom-label">Status:</span>
                        <p></p>
                        <select name="status" id="status">
                        <option value="" disabled selected>---</option>
                        <?php
                        // Array of status (you can expand this list)
                                $status = array(
                                "Single",
                                "Married",
                                "Divorced",
                                
                                );

                        // Loop through the status array to generate options
                        foreach ($status as $status) {
                            echo "<option value=\"$status\">$status</option>";
                        }
                        ?>
                        </select>
                        <br>
        
                    </tr>
            
      
           
                        <tr>
                            <p></p>
                            <span class="custom-label">Nationalities:</span>
                            <p></p>
                                <select name="nationality" id="nationality">
                                <option value="" disabled selected>---</option>
                                    <?php
                                    // Array of nationalities (you can expand this list)
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
        

    
                        <tr >
                            <span class="custom-label">UploadYourResume</span>
                            <p></p>
                            <input type="file" name="file" id="file" required>
                            <br>
                            <p></p>
                            <button type="submit" value="Submit" class="btn">Send </button>     
                        </tr>

                                </form>

           
                 </div>
         </div>
                                </dvi>
    
                               
                        

<script>
    function validateForm() {
        // For example, checking email format
        var emailInput = document.getElementById('email').value;
        if (!isValidEmail(emailInput)) {
            showPopup('Invalid Email Format');
            return false; // Prevent form submission
        }

        // Similar validation for phone number
        var phoneInput = document.getElementById('contact').value;
        if (!isValidPhoneNumber(phoneInput)) {
            showPopup('Invalid Phone Number Format');
            return false; // Prevent form submission
        }

      
        return true; // Allow form submission if all validations pass
    }

    function isValidEmail(email) {
        // Use a regular expression for basic email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidPhoneNumber(contact) {
        // Use a regular expression for phone number validation
        var phoneRegex = /^\+60\d{9,10}$/;
        return phoneRegex.test(contact);
    }
</script>



        <?php include('footer.php');?>
</body>
</html>
