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
    <title>Pre-School enrollment system | teacher</title>
    <link rel="stylesheet" href="../css/teacher_admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
  <body onload="makeTableScroll();">
        <?php include('../admin_header.php');?>
     
        <div class="container">
            <h1>Facility Search Result</h1> 

            <?php
            //get search
                $search = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $search = $_POST["search"];
                }
            ?>
                        
            <div class="search">
                <form action="facility_add.php" mehod="post">
                    <input type="submit" value="Add Facility">
                </form>
                <form action="facility_search.php" method="post">
                    <input type="text" placeholder="Search.." name="search">
                    <input type="submit" value="Search">
                </form>
            </div>
        
            <div class="scrolling_table" >
            <table id="teacher_table" class="teacher_table">
                <thead>
                <th style="width:20%">Facilities</th>
                <th style="width:20%">Facility Name</th>
                <th style="width:50%">Facility Description</th>
                <th style="width:10%">Action</th>
             <label for="faci_name"></label>
                </thead>
                        <?php
                        if($search!=""){
                            $search = $_POST["search"];

                            // Split the search string into individual words
                            $keywords = explode(" ", $search);

                            // Prepare the SQL query with multiple LIKE conditions
                            $sql = "SELECT * FROM facilities WHERE (";

                            // Build the conditions dynamically for single keyword
                            $conditions = [];
                            foreach ($keywords as $index => $keyword) {
                                $conditions[] = "faci_name LIKE UPPER('%" . $keyword . "%')";
                            }

                            // Combine
                            $sql .= implode(" OR ", $conditions);

                            $sql .= ");";
                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result) > 0){
                                //output data of each row
                                while($row =mysqli_fetch_assoc($result)){
                                echo'<tr>
                            <td>
                                <div class="teacher_pic_div"">
                                    <img src="img/'. $row["faci_photo"].'" alt="Facility Image">
                                    
                                </div>
                            </td>
                            <td><label for="faci_name">'.$row["faci_name"]. '</label></td>
                            <td>'.$row["faci_desc"].'</td>';
                            echo '<td class="teacher_button_action"> <a href="facility_edit.php?id=' . $row["faci_id"] . '">Edit</a>&nbsp;&nbsp;'; 
                            echo '<a href="facility_delete.php?id=' . $row["faci_id"] . '" onClick="return confirm(\'Delete selected Teacher?\');">Delete</a> </td>'; 
                            echo "</tr>" . "\n\t\t"; 
 
        
                                }
                            }
                        }
                        else{
                            echo '
                                <tr>
                                    <td colspan="5" style="text-align:center;">0 result </td>           
                                </tr>';
                        }
                        mysqli_close($conn);   
                        ?>
                </table>
            </div>

            <div class="teacher_button">
                <a href="facility.php"><button>Back</button></a>
            </div>
            <br>
        </div>

        <?php include("facility_script.php");?>
    
    
</body>
</html>