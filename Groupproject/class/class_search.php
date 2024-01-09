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
    <link rel="stylesheet" href="../css/class_admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body onload="makeTableScroll()">
    <?php include('../admin_header.php');?>
    
    <div class="container">
        <h1>Classes</h1> 

        <?php
            //get search
            $search = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $search = $_POST["search"];
            }
        ?>

        <div class="search">
            <form action="class_add.php" mehod="post">
                <input type="submit" value="Add class">
            </form>
            <form action="class_search.php" method="post">
                <input type="text" placeholder="Search.." name="search">
                <input type="submit" value="Search">
            </form>
        </div>
        
        <div class="scrolling_table" >
        <table id="class_table" class="class_table">
            <thead>
                <th style="width:25%">Image</th>
                <th style="width:55%">Information</th>
                <th style="width:20%">Action</th>
                <label for="tc_name"></label>
            </thead>
                
                <?php
                   if($search!=""){
                    $search = $_POST["search"];

                    // Split the search string into individual words
                    $keywords = explode(" ", $search);

                    // Prepare the SQL query with multiple LIKE conditions
                    $sql = "SELECT * FROM class INNER JOIN teacher ON class.teacher_id = teacher.teacher_id WHERE (";

                    // Build the conditions dynamically for single keyword
                    $conditions = [];
                    foreach ($keywords as $index => $keyword) {
                        $conditions[] = "tc_name LIKE UPPER('%" . $keyword . "%')
                                        OR cl_name LIKE UPPER('%" . $keyword . "%')
                                        OR cl_agegroup LIKE UPPER('%" . $keyword . "%')
                                        OR cl_time LIKE UPPER('%" . $keyword . "%')
                                        ";
                    }

                    // Combine
                    $sql .= implode(" OR ", $conditions);

                    $sql .= ");";
                    $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            //output data of each row
                            while($row =mysqli_fetch_assoc($result)){
                                echo'
                                <tr>
                                    <td><img src="img/'.$row["cl_photo"].'"> </td>
                                    <td style="padding:0px">
                                        <div class="information_div">
                                            <div class="info_row">
                                                <label for="teacher" style="width:18%">Teacher</label>
                                                <label for=":" style="width:2%">:</label>
                                                <label for="data" style="width:80%">'.$row["tc_name"].'</label>
                                            </div>
                                            <div class="info_row">
                                                <label for="class" style="width:18%">Class</label>
                                                <label for=":" style="width:2%">:</label>
                                                <label for="data" style="width:80%">'.$row["cl_name"].'</label>
                                            </div>
                                            <div class="info_row">
                                                <label for="age_grp" style="width:18%">Age Group</label>
                                                <label for=":" style="width:2%">:</label>
                                                <label for="data" style="width:80%">'.$row["cl_agegroup"].'</label>
                                            </div>
                                            <div class="info_row">
                                                <label for="class_time" style="width:18%">Class Time</label>
                                                <label for=":" style="width:2%">:</label>
                                                <label for="data" style="width:80%">'.$row["cl_time"].'</label>
                                            </div>
                                        </div></td>
                                    <td class="class_button_action"> 
                                        <a href="class_edit.php?id=' . $row["class_id"] . '">Edit</a>&nbsp;&nbsp; 
                                        <a href="class_delete.php?id=' . $row["class_id"] . '" onClick="return confirm(\'Delete selected class?\');">Delete</a> 
                                    </td>
                                </tr>';                            
                            }
                        }
                        else{
                            echo '
                                <tr>
                                    <td colspan="5" style="text-align:center;">0 result </td>           
                                </tr>';
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
        <br> 
    </div> 
    
    <div class="class_button">
        <a href="class.php"><button>Back</button></a>
    </div>

    <script type="text/javascript">   
        function makeTableScroll() {
            var maxRows = 2;

            var table = document.getElementById("class_table");
            var wrapper = table.parentNode;
            var rowsInTable = table.rows.length;
            var height = 0;
            if (rowsInTable > maxRows) {
                for (var i = 0; i < maxRows; i++) { 
                    height += table.rows[i].clientHeight;
                }
                wrapper.style.height = height + "px";
            }
        }
    </script>

    </body>
</html>