<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CECS 544</title>
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
            $con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
            $query = "SELECT * FROM programs;";
            // echo $query;
            $tables = mysqli_query($con, $query);
        ?>

        <div>
            <h1>Choose program to search area</h1>
            <form action="edit_area1.php?level=<?php echo $level; ?>" method="post" onsubmit="return validate(this)">
                <table>
                <tr><td>Program:</td><td>
                        <?php
                            echo "<select name='Program'>";
                            while ($row = mysqli_fetch_row($tables)) {
                                // unset($program_name);
                                // $program_name = $row['program_name']; 
                                 				 
                                echo '<option value="'.$row[0].'">'.$row[1].' date: '.$row[2].' version '.$row[3].'</option>';
                        }
                            echo "</select>";
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
                if(theform.Table.value.trim() === ""){
                    alert ("Program field must contain characters");
                    return false;
                }
                return true;
            }

           
        </script>
    </body>
</html>
