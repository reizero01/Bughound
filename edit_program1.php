<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>View Names</title>
</head>
<body>
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
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "Bughound");
    $query = "SELECT * FROM programs";
    //echo $query;
    $result = mysqli_query($con, $query);
    
    echo "<table border=1 ><th>ID</th><th>Program name</th><th>Release Date</th><th>Version</th>\n";
    $none = 0;
    while($row=mysqli_fetch_row($result)) {
        $none=1;
        // printf("<tr><td>%d</td><td>%s</td></tr>\n",$row[0],$row[1]);
        echo '<tr><td><a href="edit_program.php?level='.$level.'&id=' . $row[0] . '"</a>'. $row[0] .'</td>';
        echo '<td>'. $row[1] . '</td>';
        echo '<td>'. $row[2] . '</td>';
        echo '<td>'. $row[3] . '</td>';
       

        // echo '<td>'. $row[2] . '</td></tr>';
    }
    
    ?>
</table>
<?php
    if($none==0)
    Echo "<h3>No matching records found.</h3>\n";
    ?>
<p><INPUT type="button" value="Back to main page" id=button1 name=button1 onclick="go_home()">
<script language=Javascript>

function go_home() {

    window.location.replace('main.php?level=<?php echo $level; ?>');
}

</script>
</body>
</html>
