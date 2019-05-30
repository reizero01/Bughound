<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bughound</title>
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
            $message = "Invaild username or password";
            if(isset($_GET['error']))
            {
                echo "<script>
                alert('Please check your username and password');
                window.location.href='index.php';
                </script>";
                
                
            }
            
        ?>

        <div>
            <h1>Login Page</h1>
            <form action="verify_user.php" method="post" onsubmit="return validate(this)">
                <table>
                    <tr><td>User Name:</td><td><input type="Text" name="user_name" id="user_name"></td></tr>     
                    <tr><td>Password:</td><td><input type="password" name="password" id="password"></td>
                        <td><input type="checkbox" onclick="showPw()">Show Password</td></tr>
                </table>
                <input type="submit" name="submit" value="Submit">
                <input type="submit" name="cancel" value="Cancel">
            </form>
        </div>
        <p>
        <h3>
        <!-- <A href="verify_user.php"><span class=\"linkline\">View Names</span></a> -->
        </h3>
        </p>
        

        <script language=Javascript>
            function validate(theform) {
                if(theform.user_name.value === ""){
                    alert ("User name field must contain characters");
                    return false;
                }
                if(theform.password.value === ""){
                    alert ("Password field must contain characters");
                    return false;
                }
                // if(theform.user_name.value && theform.password.value)
                // {

                // }
                return true;
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
