<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View-Edit-Update Employee</title>
    </head>

    <style>
        div {
            border-color: black;
            border-style: solid;
            padding: 20px;
        }
    </style>

    <body>
        
        <div>
            <h1>View-Edit-Update Employee <?php echo  htmlspecialchars($_GET["id"]) ; ?></h1>
            <?php
                //MISSING connect to the database
                //MISSING select the database
                //MISSING construct query string for all the contents of people
                //MISSING execute the query
                
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

                $id = htmlspecialchars($_GET["id"]) ;
                $con = mysqli_connect("localhost","root");
                mysqli_select_db($con, "Bughound");
                $query = "SELECT * FROM employees WHERE ID = $id ";
                //echo $query;
                $result = mysqli_query($con, $query);
                
                // echo "<table border=1 ><th>Emp ID</th><th>Name</th>\n";
                $none = 0;
                while($row=mysqli_fetch_row($result)) {
                    $none=1;
                    if($row[0] == $id)
                    {
                        $first = $row[1];
                        $last = $row[2];
                        $user_name = $row[3];
                        $password = $row[4];
                        $user_level = $row[5];
                    }
                    // printf("<tr><td>%d</td><td>%s</td></tr>\n",$row[0],$row[1]);
                    // echo '<tr><td><a href="profile.php?id=' . $row[0] . '"</a>'. $row[0] .'</td>';
                    // echo '<td>'. $row[1] . '</td></tr>';
                    // echo '<td>'. $row[2] . '</td></tr>';
                }
            
            ?>
            <form action="page4.php?level=<?php echo $level; ?>&id=<?php echo htmlspecialchars($id); ?>" method="post" onsubmit="return validate(this)">
                <table>
                    <tr><td>First Name:</td><td><input type="Text" name="first" value="<?php echo htmlspecialchars($first); ?>"</td></tr>
                    <tr><td>Last Name:</td><td><input type="Text" name="last" value="<?php echo htmlspecialchars($last); ?>"</td></tr>
                    <tr><td>User Name:</td><td><input type="Text" name="user_name" value="<?php echo htmlspecialchars($user_name); ?>"</td></tr>     
                    <tr><td>Password:</td><td><input type="Text" name="password" value="<?php echo htmlspecialchars($password); ?>"</td></tr>
                    <tr><td>User Level:</td><td><input type="number" name="myNumber" id="myNumber" value="<?php echo htmlspecialchars($user_level); ?>"</td></tr>
                </table>
                <input type="submit" name="submit" value="Submit">
                <input type="button" name="cancel" value="Cancel" onclick="history.back(-1)">
            </form>
            
        </div>
        <p>
        <h3>
        <A href="page3.php?level=<?php echo $level; ?>"><span class=\"linkline\">View Names</span></a>
        </h3>
        </p>


        <script language=Javascript>
            function validate(theform) {
                if(theform.first.value === ""){
                    alert ("Name field must contain characters");
                    return false;
                }
                if(theform.last.value === ""){
                    alert ("Name field must contain characters");
                    return false;
                }
                if(theform.user_name.value === ""){
                    alert ("User name field must contain characters");
                    return false;
                }
                if(theform.password.value === ""){
                    alert ("Password field must contain characters");
                    return false;
                }
                if(theform.myNumber.value === ""){
                    alert ("Number field must contain digit");
                    return false;
                }
                return true;
            }

            function myFunction() {
                 document.getElementById("myNumber").stepUp();
            }  
        </script>
    </body>
</html>
