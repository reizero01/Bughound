<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bughound Main Page</title>
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
            <h1>Select function</h1>
            <?php
                if(isset($_GET['level']))
                {
                    $level = htmlspecialchars($_GET["level"]);
                    if($level > 2)
                    {
                        echo '<a href="http://localhost:8080/bughound/add_employee.php?level=3">Add new employee</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/page3.php?level=3">Edit current employee</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/export.php?level=3">Export Table XML</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/export_json.php?level=3">Export Table Json</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/bugsearch.php?level=3">Bug search</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/newbug.php?level=3">Report new bug</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/add_area.php?level=3">Add area</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/search_area.php?level=3">Edit area</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/add_program.php?level=3">Add program</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/edit_program1.php?level=3">Edit program</a>';
                    }
                    elseif($level == 2)
                    {
                        echo '<a href="http://localhost:8080/bughound/export.php?level=2">Export Table</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/bugsearch.php?level=2">Bug search</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/newbug.php?level=2">Report new bug</a>';
                    }
                    else{
                        // echo '<a href="http://localhost:8080/bughound/export.php?level=1">Export Table</a>';
                        // echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/bugsearch.php?level=1">Bug search</a>';
                        echo '<br/>';
                        echo '<a href="http://localhost:8080/bughound/newbug.php?level=1">Report new bug</a>';
                    }
                    
                    
                }
                else
                {
                        echo "<script>
                        alert('Please login first');
                        window.location.href='index.php';
                        </script>";
                }
                
            ?>
            <br/><br/>
            <!-- <input type="button" name="cancel" value="Log out" onclick="history.back(-1)"> -->
            <form action="http://localhost:8080/bughound">
                <input type="submit" value="Log out" />
            </form>
        </div>
        <p>
        <h3>
        <!-- <A href="index.php"><span class=\"linkline\">Log out</span></a> -->
        </h3>
        </p>


        <script language=Javascript>
            function validate(theform) {
                if(theform.name.first === ""){
                    alert ("Name field must contain characters");
                    return false;
                }
                if(theform.name.last === ""){
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
            function showPw() {
                var pw = document.getElementById("password");
                if (pw.type === "password") {
                    pw.type = "text";
                } else {
                    pw.type = "password";
                }
            }
        </script>
    </body>
</html>
