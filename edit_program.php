<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CECS 544 Lab 4</title>
    </head>

    <style>
        div {
            border-color: black;
            border-style: solid;
            padding: 20px;
        }
    </style>

    <body>
        <?php
        if(isset($_GET['level']))
            {
                $level = htmlspecialchars($_GET["level"]);
                
                
            }
            else{
                echo "<script>
                alert('Please login first');
                window.location.href='index.php';
                </script>";
            }
        ?>

        <?php
            $id = htmlspecialchars($_GET["id"]);
            $con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
            $query = 'SELECT * FROM programs where ID ='.$id.' ';
            // echo $query;
            $program = mysqli_query($con, $query);
        ?>

        <div>
            <h1>Edit a program</h1>
            <form action="program_update.php?level=<?php echo $level; ?>&id=<?php echo $id; ?>" method="post" onsubmit="return validate(this)">
                <table>
                <tr><td>Program:</td><td>
                        <?php
                         
                            while ($row = mysqli_fetch_row($program)) {
                                // unset($program_name);
                                // $program_name = $row['program_name']; 
                                 				 
                                echo '<input type="Text" name="Program_Name" value="'.$row[1].'">';
                                echo '<input type="Text" name="Release_date" value='.$row[2].'>';
                                echo '<input type="Text" name="Version" value='.$row[3].'>';

                        }
                           
                            
                        ?>
                        </td></tr>
                        
                    
                </table>
                <input type="submit" name="submit" value="Submit">
                <input type="button" name="cancel" value="Cancel" onclick="history.back(-1)">
            </form>
        </div>
        <p>
        <h3>
        <A href='main.php?level=<?php echo $level; ?>'><span class=\"linkline\">Go Back to main page</span></a>
        </h3>
        </p>


        <script language=Javascript>
            function validate(theform) {
                if(theform.Program.value.trim() === ""){
                    alert ("Program field must contain characters");
                    return false;
                }
                if(theform.area.value.trim() === ""){
                    alert ("Area field must contain characters");
                    return false;
                }
                return true;
            }

           
        </script>
    </body>
</html>
