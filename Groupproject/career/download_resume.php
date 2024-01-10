<?php
// download_resume.php

// Include your database connection file
include('../config.php');

if(isset($_GET['id'])) {
    $ja_id = $_GET['id'];

    // Fetch the resume file path from the database
    $sql = "SELECT ja_resume FROM application WHERE ja_id = $ja_id";
    $result = mysqli_query($conn, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $resumeFilePath = $row['ja_resume'];

        // Set headers for file download
        header("Content-Disposition: attachment; filename=" . basename($resumeFilePath));
        header("Content-Type: application/octet-stream");
        header("Content-Length: " . filesize($resumeFilePath));

        // Send the file content to the browser
        readfile($resumeFilePath);

        // Close the database connection
        mysqli_close($conn);

        exit;
    }
}

// Redirect to the main page if something goes wrong
header("Location: index.php"); // Adjust the location as needed
exit;
?>
