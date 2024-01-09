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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body onload="makeTableScroll();">
    <?php include('../admin_header.php');?>
    
    <div class="admin_container">
        <h1>Admin List</h1> 

        <div class="search">
            <form action="admin_search.php" method="post">
                <input type="text" placeholder="Search.." name="search">
                <input type="submit" value="Search">
            </form>
        </div>
        
        <div class="scrolling_table" >
            <table id="admin_table" class="admin_table" >
            <thead>
                <th style="width:5%">No.</th>
                <th style="width:20%">Username</th>
                <th style="width:20%">Name</th>
                <th style="width:20%">Contact</th>
                <th style="width:20%">Email</th>
                <th style="width:15%">Action</th>
            </thead>
            
                <?php
                    $sql =  "SELECT * FROM admin";
                    $result = mysqli_query($conn, $sql);
                    $numrow=0;
                    if(mysqli_num_rows($result) > 0){
                        //output data of each row
                        $numrow=1;
                        while($row =mysqli_fetch_assoc($result)){
                            echo "<tr>"; 
                            echo "<td>" . $numrow . "</td>
                            <td>". $row["admin_username"] . "</td>
                            <td>" . $row["admin_name"] . "</td>
                            <td>" . $row["admin_contact"] . "</td>
                            <td>" . $row["admin_email"] . "</td>";
                            echo '<td class="admin_button_action"> <a href="admin_edit.php?id=' . $row["admin_id"] . '">Edit</a>&nbsp;&nbsp;'; 
                            echo '<a href="admin_delete.php?id=' . $row["admin_id"] . '" onClick="return confirm(\'Delete selected admin?\');">Delete</a> </td>'; 
                            echo "</tr>" . "\n\t\t"; 
                            $numrow++;
                        }
                    }
                    else{
                        echo '<div class="container">
                            <tr>
                                <td colspan="6" style="text-align:center;">0 result </td>           
                            </tr>
                            </div>';
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>
        <table class="admin_table">
            <tr class="button_row">
                <td colspan="6"><a href="admin_add.php"><button class="add_button">Add</button></a></td>  
            </tr>
        </table>

        <br> 
    </div>

    <?php include("admin_script.php");?>

    </body>
</html>