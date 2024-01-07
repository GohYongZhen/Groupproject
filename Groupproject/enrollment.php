<?php include_once('config.php');
 if(isset($_POST['submit'])){
$fname=$_POST['fathername'];
$mname=$_POST['mothername'];
$pmobno=$_POST['parentmobno'];
$pemail=$_POST['parentemail'];
$cname=$_POST['cname'];
$agegroup=$_POST['agegroup'];
$erollprogram=$_POST['erollprogram'];
$message=$_POST['message'];
$enrollno=mt_rand(100000000,999999999);


$query=mysqli_query($con,"insert into tblenrollment(enrollmentNumber,fatherName,motherName,parentmobNo,parentEmail,childName,childAge,enrollProgram,message) values('$enrollno','$fname','$mname','$pmobno','$pemail','$cname','$agegroup','$erollprogram','$message')");
if($query){
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
            <br>
            <h2>Start your Child’s Early Education</h2>
            <input type="text" class="box" id="fathername" name="fathername" placeholder="Father Name" required>
            <input type="text" class="box" id="mothername" name="mothername" placeholder="Mother Name" required>
            <br>
            <br>
            <input type="text" class="box" id="parentmobno" name="parentmobno" placeholder="Parents Mobile No." required> 
            <input type="email" class="box" id="parentemail" name="parentemail" placeholder="Parents Email" required>
            <br>
            <br>
            <input type="text" class="box" id="cname" name="cname" placeholder="Child Name" required>
            <select class="box" id="agegroup" name="agegroup"  required>
                <option value="">Select</option>
                <option value="18 Month-3 Year">18 Month-2 Year</option>
                <option value="2-3 Year">2-3 Year</option>
                <option value="3-4 Year">3-4 Year</option>
                <option value="4-5 Year">4-5 Year</option>
                <option value="5-6 Year">5-6 Year</option>
            </select>
            <br>
            <br>
            <select class="box2" id="erollprogram" name="erollprogram"  required>
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
            <img class ="pic" src="pic.jpg">
</div>


<?php include('footer.php');?> 
</body>

</html>