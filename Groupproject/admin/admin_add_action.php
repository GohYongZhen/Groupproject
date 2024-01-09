<?php
session_start();
include("../config.php");
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pre-School enrollment system | Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>

<body>
<?php
//STEP 1: Form data handling using mysqli_real_escape_string function to escape special characters for use in an SQL query,
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$admin_username = mysqli_real_escape_string($conn, $_POST['admin_username']);
    $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
    $admin_contact = mysqli_real_escape_string($conn, $_POST['admin_contact']);
    $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
    $admin_pwd = mysqli_real_escape_string($conn, $_POST['admin_pwd']);
    $confirm_pwd = mysqli_real_escape_string($conn, $_POST['confirm_pwd']);

    //Validate pwd and confrimPwd
    if ($admin_pwd !== $confirm_pwd) {
        die("Password and confirm password do not match.");
    }

    //STEP 2: Check if userEmail already exist
	$sql = "SELECT * FROM admin WHERE admin_username='$admin_username' or admin_email='$admin_email' LIMIT 1";	
	$result = mysqli_query($conn, $sql);
	
    if (mysqli_num_rows($result) == 1) {
		echo "<p ><b>Error: </b> User exist, please register a new user</p>";		
	} else {		
		$hash_pwd = trim(password_hash($_POST['admin_pwd'], PASSWORD_DEFAULT)); 
		//echo $pwdHash;
		$sql = "INSERT INTO admin (admin_username, password, admin_name, admin_contact, admin_email ) 
                VALUES ('$admin_username','$hash_pwd', '$admin_name', '$admin_contact', '$admin_email')";

		if (mysqli_query($conn, $sql)) {
			echo "<p>New user record created successfully.";			
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	
	}
}

mysqli_close($conn);

?>
<p><a href="admin.php"> | Back |</a></p>
</body>
</html>