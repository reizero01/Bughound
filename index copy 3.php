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
        
        <div>
            <h1>Add an employee</h1>
            <form action="page2.php" method="post" onsubmit="return validate(this)">
                <table>
                    <tr><td>First Name:</td><td><input type="Text" name="first"</td></tr>
                    <tr><td>Last Name:</td><td><input type="Text" name="last"</td></tr>
                    <tr><td>User Name:</td><td><input type="Text" name="user_name"</td></tr>     
                    <tr><td>Password:</td><td><input type="password" name="password" id="password"</td>
                        <td><input type="checkbox" onclick="showPw()">Show Password</td></tr>
                    <tr><td>User Level:</td><td><input type="number" name="myNumber" id="myNumber"</td></tr>
                </table>
                <input type="submit" name="submit" value="Submit">
                <input type="submit" name="cancel" value="Cancel">
            </form>
        </div>
        <p>
        <h3>
        <A href="page3.php"><span class=\"linkline\">View Names</span></a>
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
