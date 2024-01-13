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
</head>
  <body>
    <?php include('header.php'); ?>

    <h1 class="content">WELCOME ! <br> <span style="color: #20bcd0;">JOIN OUR TEAM NOW.</span></h1>    
        
    <form method="POST" action="application _action.php" enctype="multipart/form-data"  onsubmit="return validateForm()" id="myForm">

             <div class="form-container">
                <h2 style="margin:5px">Application Form</h2>
                <div class="input_row">
                    <tr>
                        <span class="custom-label">Name:</span>
                        <input type="text" name="ja_name" id="ja_name">

                        <span class="custom-label">Email:</span>
                        <input type="text" name="email" id="email">

                        <span class="custom-label">Age:</span>
                              <input type="number" name="age" >
            
                    </tr>    
                </div>

                <div class="input_row">
                    <tr>
                        <br>
                        <span class="custom-label">Birthday:</span>                        
                        <input type="date" name="birthday">

                        <span class="custom-label">Contact:  </span>                   
                        <input type="text" name="contact" id="contact" placeholder="+601X XXX XXXX">
                    
                        <span class="custom-label">Nationalities:</span>
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
                                </tr>
                </div>

    
                        <tr >
                            <span class="custom-label">UploadYourResume</span>
                            
                            <input type="file" name="file" id="file" required>
                            <br>
                            
                            <button type="submit" name="submit" class="btn">Send<i class="fas fa-paper-plane"></i></button>   
                        </tr>
             </div>
</form>
    
    
<?php include('footer.php');?>                             
                        

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




</body>
</html>
