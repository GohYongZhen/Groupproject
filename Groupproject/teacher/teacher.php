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
    <link rel="stylesheet" href="../css/teacher_admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body onload="makeTableScroll()">
    <?php include('../admin_header.php');?>
    
    <div class="container">
        <h1>Teachers</h1> 

        <div class="search">
            <form action="teacher_add.php" mehod="post">
                <input type="submit" value="Add teacher">
            </form>
            <form action="teacher_search.php" method="post">
                <input type="text" placeholder="Search.." name="search">
                <input type="submit" value="Search">
            </form>
        </div>
        
        <div class="scrolling_table" >
        <table id="teacher_table" class="teacher_table">
            <thead>
                <th style="width:30%">Teacher</th>
                <th style="width:45%">Desc</th>
                <th style="width:15%">Email</th>
                <th style="width:10%">Action</th>
                <label for="tc_name"></label>
            </thead>
                <?php
                    $sql =  "SELECT * FROM teacher";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        //output data of each row
                        while($row =mysqli_fetch_assoc($result)){
                            echo'<tr>
                            <td>
                                <div class="teacher_pic_div"">
                                    <img src="img/'. $row["tc_pic"].'" alt="Teacher Image">
                                    <label for="tc_name">'.$row["tc_name"]. '</label>
                                </div>
                            </td>
                            <td>'.$row["tc_desc"].'</td>
                            <td>'.$row["tc_email"].'</td>';
                            echo '<td class="teacher_button_action"> <a href="teacher_edit.php?id=' . $row["teacher_id"] . '">Edit</a>&nbsp;&nbsp;'; 
                            echo '<a href="teacher_delete.php?id=' . $row["teacher_id"] . '" onClick="return confirm(\'Delete selected Teacher?\');">Delete</a> </td>'; 
                            echo "</tr>" . "\n\t\t"; 

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

    <script type="text/javascript">   
        function makeTableScroll() {
            var maxRows = 2;

            var table = document.getElementById("teacher_table");
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