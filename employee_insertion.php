<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>CECS 544 Lab 4 Page 2</title>
</head>
<body>
<h2>
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

    $first = $_POST['first'];
    $last = $_POST['last'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $number = $_POST['myNumber'];

    

    // printf("You entered %s %s as your name.<p>",$first,$last);
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "Bughound");

    
    $first = mysqli_real_escape_string($con, $first);
    $last = mysqli_real_escape_string($con, $last);
    $user_name = mysqli_real_escape_string($con, $user_name);
    $password = mysqli_real_escape_string($con, $password);
    

    $query = "INSERT INTO employees (first, last, username, password, user_level) VALUES ('".$first."', '".$last."','".$user_name."','".$password."','".$number."')";
    echo $query;
    mysqli_query($con, $query);
    header( 'Location: http://localhost:8080/bughound/add_employee.php?level='.$level.'');
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
