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
    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET["id"]);
        
        
    }
    else{
        echo "<script>
        alert('Error occurs, please try later');
        window.location.href='index.php';
        </script>";
    }
    
    
    $Program_Name = $_POST['Program_Name'];
    $Release_date = $_POST['Release_date'];
    $Version = $_POST['Version'];
    
    
    // printf("You entered %s %s as your name.<p>",$first,$last);
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "Bughound");
    
    $Program_Name = mysqli_real_escape_string($con, $Program_Name);
    $Version = mysqli_real_escape_string($con, $Version);

    $query = "UPDATE programs SET Program_Name = '".$Program_Name."', Release_date = '".$Release_date."', Version = '".$Version."' where programs.ID = '".$id."'";
    echo $query;
    mysqli_query($con, $query);
    header( 'Location: http://localhost:8080/bughound/main.php?level='.$level.'')
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
