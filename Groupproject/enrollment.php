<?php
include('config.php');

if(isset($_POST['submit'])){
    $father_name = $_POST["father_name"];
    $mother_name = $_POST["mother_name"];
    $parent_contact = $_POST["parent_contact"];
    $parent_email = $_POST["parent_email"];
    $child_name = $_POST["child_name"];
    $age = $_POST["age"];
    $program = $_POST["program"];
    $message = $_POST["message"];

    $query = "INSERT INTO enrollment (father_name, mother_name, parent_contact, parent_email, child_name, age, program, message) VALUES ('$father_name', '$mother_name', '$parent_contact', '$parent_email', '$child_name', '$age', '$program', '$message')";

    $result = mysqli_query($conn, $query);
    
    if($result){
        echo "<script>alert('Enrollment Details sent successfully.');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
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

<div class="py-5 page-header">
            <div class="py-5">
                <h1>Child Enrollment</h1>
            </div>
        </div>
        
        
    <div class="fill">
        <form method="post">
            <br>
            <h2>Start your Child’s Early Education</h2>
            <input type="text" class="box" id="fathername" name="father_name" placeholder="Father Name" required>
            <input type="text" class="box" id="mothername" name="mother_name" placeholder="Mother Name" required>
            <br>
            <br>
            <input type="text" class="box" id="parentmobno" name="parent_contact" placeholder="Parents Mobile No." required> 
            <input type="email" class="box" id="parentemail" name="parent_email" placeholder="Parents Email" required>
            <br>
            <br>
            <input type="text" class="box" id="cname" name="child_name" placeholder="Child Name" required>
            <select class="box" id="agegroup" name="age"  required>
                <option value="">Select</option>
                <option value="18 Month-3 Year">18 Month-2 Year</option>
                <option value="2-3 Year">2-3 Year</option>
                <option value="3-4 Year">3-4 Year</option>
                <option value="4-5 Year">4-5 Year</option>
                <option value="5-6 Year">5-6 Year</option>
            </select>
            <br>
            <br>
            <select class="box2" id="erollprogram" name="program"  required>
                <option value="">Select a Program*</option>
                <option value="PlayGroup-1.8 to 3 years">PlayGroup-1.8 to 3 years</option>
                <option value="Nursery-2.5 to 4 years">Nursery-2.5 to 4 years</option>
                <option value="Junior KG- 3.5 to 5 years">Junior KG-3.5 to 5 years</option>
                <option value="Senior KG- 4.5 to 6 years">Senior KG- 4.5 to 6 years</option>
            </select>
            <br>
            <br>
            <textarea class="box2" placeholder="Leave a message here" id="message" style="height: 100px" name="message" required></textarea>
            <br>
            <br>
            <button class="box2 button" type="submit" name="submit">Submit</button>
            <br>
            <br>
            <img class ="pic" src="images/pic.jpg">
    </form>
</div>


<?php include('footer.php');?> 
</body>

</html>
