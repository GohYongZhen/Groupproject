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
    <link rel="stylesheet" href="../css/message.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
  <body onload="makeTableScroll();">
        <?php include('../admin_header.php');?>
     
        <div class="container">
            <h1>Messages Search Result</h1> 

            <?php
            //get search
                $search = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $search = $_POST["search"];
                }
            ?>
                        
            <div class="search">
                <form action="message_search.php" method="post">
                    <input type="text" placeholder="Search.." name="search">
                    <input type="submit" value="Search">
                </form>
            </div>

            <div class="scrolling_table" >
                <table class="message_table" id="message_table">
                    <thead>
                        <th style="width:10%">Read</th>
                        <th style="width:25%">Time</th>
                        <th style="width:25%">Name</th>
                        <th style="width:25%">Email</th>
                        <th style="width:10%">Action</th>
                    </thead>
                        <?php
                        if($search!=""){
                            $search = $_POST["search"];

                            // Split the search string into individual words
                            $keywords = explode(" ", $search);

                            // Prepare the SQL query with multiple LIKE conditions
                            $sql = "SELECT * FROM message WHERE (";

                            // Build the conditions dynamically for single keyword
                            $conditions = [];
                            foreach ($keywords as $index => $keyword) {
                                $conditions[] = "mess_time LIKE '%$keyword%' 
                                                OR mess_name LIKE UPPER('%" . $keyword . "%')
                                                OR mess_email LIKE UPPER('%" . $keyword . "%')
                                                ";
                            }

                            // Combine
                            $sql .= implode(" OR ", $conditions);

                            $sql .= ");";
                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result) > 0){
                                //output data of each row
                                while($row =mysqli_fetch_assoc($result)){
                                    echo '<tr data-href="read_message.php?id=' . $row["mess_id"] . '" class="message_row">'; 
                                        if($row["mess_status"]){
                                            echo "<td style='color: #009129; font-weight:900; font-size:20px'>&#10004;";
                                        }  
                                        else{
                                            echo "<td style='color: lightblue; font-weight:900; font-size:20px'>&#10004;";
                                        }
                                    
                                    echo "</td>
                                    <td>" . $row["mess_time"] . "</td>
                                    <td>". $row["mess_name"] . "</td>
                                    <td>" . $row["mess_email"] . "</td>";
                                    echo '<td class="message_button_action">
                                            <a href="message_delete.php?id=' . $row["mess_id"] . '" onclick="return confirm(\'Delete selected message?\');">Delete</a>';
                                    echo "</td></tr>"; 
                                }
                            }
                            else{
                                echo '<div class="container">
                                    <tr>
                                        <td colspan="5" style="text-align:center;">0 result </td>           
                                    </tr>
                                    </div>';
                            }
                        }
                        else{
                            echo "Search query is empty<br>";
                        }
                        mysqli_close($conn);   
                        ?>
                </table>
            </div>
            <div class="message_button">
                <a href="message.php"><button>Back</button></a>
            </div>
            
            <br>
        </div>

        <?php include("message_script.php");?>
    
    
</body>
</html>