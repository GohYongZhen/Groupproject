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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted and the keys are set
    if (isset($_POST['userName']) && isset($_POST['password'])) {
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM admin WHERE admin_username='$userName' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            // Check password hash
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION["UID"] = $row["admin_id"];
                $_SESSION["userName"] = $row["matricNo"];
                $_SESSION['loggedin_time'] = time();
                header("location: admin/admin_dashboard.php");
            } else {
                echo '<script>alert("Username or password is incorrect.");</script>';
            }
        }
        mysqli_close($conn);
    }
}
?>

<div class="page-header">
            <div>
                <h1>Admin</h1>
            </div>
        </div>
        <form method="POST" action="">
    <div class="container">
        <table>
            <tr>
                <th><label for="userName"><b>Username</b></label></th>
                <th><input type="text" placeholder="Username" id="userName" name="userName" required></th>
            </tr>
            <tr>
                <th><label for="password"><b>Password</b></label></th>
                <th><input type="password" placeholder="Enter Password" id="password" name="password" required></th>
            </tr>
        </table>
        <br></br>
        <button type="submit">Login</button>
    </div>
</form> 

<?php include('footer.php');?> 
</body>

</html>