<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<h2>
<?php
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    // printf("You entered %s %s as your name.<p>",$first,$last);
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "Bughound");
    $top = "'";
    $bot = "'";
    $query = 'SELECT * FROM employees where Username = '.$top.''.$user_name.''.$bot.' AND Password = '.$top.''.$password.''.$bot.'';
    $result = mysqli_query($con, $query);
    
    
    $row=mysqli_fetch_row($result);
    
        if($row[0] != 0)
        {
            header( 'Location: http://localhost:8080/bughound/main.php/?level='.$row[5].'');
            exit();
        }
        // else
        // {
        //     $message = "Invaild username or password";
        //     echo "<script type='text/javascript'>alert('$message');</script>";
            
        // }
    header( 'Location: http://localhost:8080/bughound/index.php?error=1');
    exit();
    ?>

<p>
<!-- <input type="button" value="Return" id=button1 name=button1 onclick="go_home()"> -->
</h2>
<!-- <script language=Javascript>
function go_home(){
    window.location.replace("index.php");
}
</script> -->

</body>
</html>
