<?php include('config.php');
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

<head></head>
<body>
    


</body>
 
    </html>