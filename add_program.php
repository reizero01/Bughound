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
            $con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "Bughound");
            $query = "SELECT * FROM program;";
            // echo $query;
            $row = mysqli_query($con, $query);
        ?>

        <div>
            <h1>Add a program</h1>
            <form action="program_insert.php?level=<?php echo $level; ?>" method="post" onsubmit="return validate(this)">
                <table>
                    <tr><td>Program Name:</td><td><input type="Text" name="program"</td></tr>
                    <tr><td>Release Date:</td><td><input type="Text" name="date"</td></tr>
                    <tr><td>Version:</td><td><input type="Text" name="version"</td></tr>     
                    
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
                if(theform.program.value.trim() === ""){
                    alert ("Program field must contain characters");
                    return false;
                }
                if(theform.date.value.trim() === ""){
                    alert ("Release date field must contain characters");
                    return false;
                }
                if(theform.version.value.trim() === ""){
                    alert ("Version field must contain characters");
                    return false;
                }
                
                
                return true;
            }

           
        </script>
    </body>
</html>
