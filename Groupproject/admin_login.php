<?php
include('config.php');
session_start();
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
    <link href="css/admin_login.css" rel="stylesheet">
</head>

<body>
<?php include('header.php');?>

<?php
$userName = $_POST['userName'];
$password = $_POST['password'];
$sql = "SELECT * FROM admin WHERE admin_username='$userName' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
        
    //check password hash
    $row = mysqli_fetch_assoc($result);
    if (password_verify($_POST['password'],$row['password'])) {
        $_SESSION["UID"] = $row["admin_id"];//the first record set, bind to admin_id
        $_SESSION["userName"] = $row["matricNo"];
        //set logged in time
        $_SESSION['loggedin_time'] = time();
        header("location: admin/admin_dashboard.php");
    } else {
        echo '<script>alert("Username or password is incorrect.");</script>';
    }
}

mysqli_close($conn);
?>


<div class="py-5 page-header">
            <div class="py-5">
                <h1>Admin</h1>
            </div>
        </div>
        <form method="POST" action = "">
            <div class="container">
                <table>
                    <tr>
                        <th><label for="uname"><b>Username</b></label></th>
                        <th><input type="text" placeholder="Username" name="userName"required></th>
                    </tr>
                    <tr>
                        <th><label for="psw"><b>Password</b></label></th>
                        <th><input type="password" placeholder="Enter Password"name="password" required></th>
                    </tr>
                </table>
                <br></br>
		        	<button type="submit">Login</button>
		        </div>
        <form>

<?php include('footer.php');?> 
</body>

</html>