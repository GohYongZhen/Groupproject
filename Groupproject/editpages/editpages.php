<?php
session_start();
//database connection
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pre-School enrollment system | Admin</title>
    <link rel="stylesheet" href="../css/editpages.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body onload="makeTableScroll();">
    <?php include('../admin_header.php');?>
    
    <div class="pages_container">
        <h1>Edit Static Pages</h1> 

        <div class="scrolling_table" >
            <table id="pages_table" class="pages_table" >

            <thead>
                <th style="width:5%">Page Title</th>
                <th style="width:5%" colspan="2">Title Description</th>
                <th style="width:85%" colspan="2">Page Description</th>
                <th style="width:5%">action</th>
            </thead>
            
                <?php
                    $sql =  "SELECT * FROM page where pagetype='homepage'";
                    $result = mysqli_query($conn, $sql);

                    while($row =mysqli_fetch_assoc($result)){
                        echo "<tr>"; 
                        echo "<td>" . $row["pageTitle"] . "</td>
                        <td colspan=2>" . $row["titleDescription"] . "</td>
                        <td colspan=2>" . $row["pageDescription"] . "</td>";

                        echo '<td class="pages_button_action"> <a href="homepage_edit.php?pagetype=homepage">Edit</a>&nbsp;&nbsp;';
                        echo "</tr>" . "\n\t\t"; 
                    }
                       
                ?>

            <thead>
                <th style="width:5%">Page Title</th>
                <th style="width:5%">Small Description</th>
                <th style="width:5%">Title Description</th>
                <th style="width:65%">Page Description</th>
                <th style="width:15%">Image</th>
                <th style="width:5%">action</th>
            </thead>
            
                <?php
                    $sql =  "SELECT * FROM page where pagetype='aboutus'";
                    $result = mysqli_query($conn, $sql);

                    while($row =mysqli_fetch_assoc($result)){
                        echo "<tr>"; 
                        echo "<td>" . $row["pageTitle"] . "</td>
                        <td>" . $row["smallDescription"] . "</td>
                        <td>" . $row["titleDescription"] . "</td>
                        <td>" . $row["pageDescription"] . "</td>";
                        echo '<td>
                        <div class="pages_pic_div">
                            <img src="../images/'. $row["img_path"]. '">
                        </div>                        
                        </td>';

                        echo '<td class="pages_button_action"> <a href="aboutus_edit.php?id=' . $row["page_id"] . '">Edit</a>&nbsp;&nbsp;'; 
                        echo "</tr>" . "\n\t\t"; 
                    }
                       
                ?>

            <thead>
                <th>Email</th>
                <th>Phone Number</th>
                <th colspan="3">Address</th>
                <th >action</th>
            </thead>
            
                <?php
                    $sqli =  "SELECT * FROM footer";
                    $data= mysqli_query($conn, $sqli);
                    while($row =mysqli_fetch_assoc($data)){
                        echo "<tr>"; 
                        echo "<td>". $row["email"] . "</td>
                        <td>" . $row["phoneNumber"] . "</td>
                        <td colspan=3>" . $row["address"] . "</td>";
                        echo '<td class="pages_button_action"> <a href="footer_edit.php?id=' . $row["ft_id"] . '">Edit</a>&nbsp;&nbsp;'; 
                        echo "</tr>" . "\n\t\t"; 
                    }
    mysqli_close($conn);
                ?>
            </table>
        </div>

        <br> 
    </div>

    <?php include("editpages_script.php");?>

    </body>
</html>