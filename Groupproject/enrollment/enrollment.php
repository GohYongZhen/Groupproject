
<?php
session_start();
//database connection
include("config.php");
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
    <link href="css/enrollment.css" rel="stylesheet">
</head>

<body>
<?php include('header.php');?>

<div class="page-header">
            <div>
                <h1>Child Enrollment</h1>
            </div>
        </div>
        
        
<div class="fill">
  <div class="form-container">
    <form method="POST" action="enrollment_action.php" onsubmit="return validateForm()" enctype="multipart/form-data">
           <h2>Start your Child’s Early Education</h2>
            <input type="text" class="box1" id="fathername" name="father_name" placeholder="Father Name" required>
            <input type="text" class="box1" id="mothername" name="mother_name" placeholder="Mother Name" required>
            <br>
            <br>
            <input type="text" class="box1" id="parentmobno" name="parent_contact" placeholder="Parents Mobile No." required> 
            <input type="email" class="box1" id="parentemail" name="parent_email" placeholder="Parents Email" required>
            <br>
            <br>
            <input type="text" class="box1" id="cname" name="child_name" placeholder="Child Name" required>
            <select class="box1" id="agegroup" name="age"  required>
                <option value="">Select</option>
                <option value="18 Month-3 Year">18 Month-2 Year</option>
                <option value="2-3 Year">2-3 Year</option>
                <option value="3-4 Year">3-4 Year</option>
                <option value="4-5 Year">4-5 Year</option>
                <option value="5-6 Year">5-6 Year</option>
            </select>
            <br>
            <br>
            <input type="text" class="box1" id="child_birthday" name="child_birthday" placeholder="Child Birthday" onfocus="this.type='date'">
            <select class="box1" id="erollprogram" name="program"  required>
                <option value="">Select a Program*</option>
                <option value="PlayGroup-1.8 to 3 years">PlayGroup-1.8 to 3 years</option>
                <option value="Nursery-2.5 to 4 years">Nursery-2.5 to 4 years</option>
                <option value="Junior KG- 3.5 to 5 years">Junior KG-3.5 to 5 years</option>
                <option value="Senior KG- 4.5 to 6 years">Senior KG- 4.5 to 6 years</option>
            </select>
            <br>
      <div class="form-group">
        <label for="child_photo" >Child Photo</label>
        <input type="file" class="photoupload" name="child_photo" id="fileToUpload" accept=".jpg, .jpeg, .png">
      </div>
      <!-- More form inputs go here -->
      <div class="message-leave">
        <textarea class="box3" placeholder="Leave a message here" id="message" style="height: 100px" name="message" required></textarea>
      </div>
      <div>
        <button class="boxbut button" type="submit" name="submit">Submit</button>
            <br>

            <br>
      </div>
    </form>
  </div>
  <div class="photo-container">
    <img class="photo" src="images/pic.jpg">
  </div>
</div>

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