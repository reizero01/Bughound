<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">

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
    

    $program = $_POST['program'];
    $date = $_POST['date'];
    $version = $_POST['version'];
    
    // printf("You entered %s %s as your name.<p>",$first,$last);
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "Bughound");

    $program = mysqli_real_escape_string($con, $program);
    $version = mysqli_real_escape_string($con, $version);
    


    $query = "INSERT INTO programs (Program_Name, Release_date, Version) VALUES ('".$program."', '".$date."', '".$version."')";
    echo $query;
    mysqli_query($con, $query);
    header( 'Location: http://localhost:8080/bughound/add_program.php?level='.$level.'')
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
