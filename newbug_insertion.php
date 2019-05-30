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

    $Program_ID = $_POST['Program'];
    $Report_Type = $_POST['Report_Type'];
    $Severity = $_POST['Severity'];
    $Problem_summary = $_POST['Problem_summary'];
    $Reproducible = $_POST['Reproducible'];
    $Problem = $_POST['Problem'];
    $Suggest_fix = $_POST['Suggest_fix'];
    $Report_Employee_ID = $_POST['Report_Employee_ID'];
    $Report_date = $_POST['Report_date'];
    $Area_ID = $_POST['Area_ID'];
    $Assign_Employee_ID = $_POST['Assign_Employee_ID'];
    $Comment = $_POST['Comment'];
    $Status = $_POST['Status'];
    $Priority = $_POST['Priority'];
    $Resolution = $_POST['Resolution'];
    $Resolution_version = $_POST['Resolution_version'];
    $Resolved_Employee_ID = $_POST['Resolved_Employee_ID'];
    $Resolved_Date = $_POST['Resolved_Date'];
    $Tested_Employee_ID = $_POST['Tested_Employee_ID'];
    $Tested_Date = $_POST['Tested_Date'];
    $Deferred = $_POST['Deferred'];
    $Attached = $_FILES['Attached']['name'];

    if(!empty($Reproducible))
    {
        $Reproducible = 1;
    }
    else
    {
        $Reproducible = 0;
    }

    if(!empty($Deferred))
    {
        $Deferred = 1;
    }
    else
    {
        $Deferred = 0;
    }
    // printf("You entered %s %s as your name.<p>",$first,$last);
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "Bughound");

    $Problem_summary = mysqli_real_escape_string($con, $Problem_summary);
    $Problem = mysqli_real_escape_string($con, $Problem);
    $Suggest_fix = mysqli_real_escape_string($con, $Suggest_fix);
    $Comment = mysqli_real_escape_string($con, $Comment);
    $Resolution_version = mysqli_real_escape_string($con, $Resolution_version);

    $Attach_Status = "0";
    $last_attachment_ID = NULL;
    if(!empty($Attached))
    {
        
        // $path = './attachments/'.$last_bugs_ID.'.jpg';
        // echo $path;
        // move_uploaded_file($_FILES["Attached"]["tmp_name"], $path);
        // file_put_contents($path, $Attached);
        
        // $info = './attachments/'.$last_bugs_ID.'.jpg';
        

        $targetdir = './attachments/';
        $now = date("M,d,Yh:i:sA") . "/";
        $dir = $targetdir.$now;
        $targetfile = $targetdir.$now.$_FILES['Attached']['name'];

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['Attached']['tmp_name'], $targetfile)) {
           
            $query = "SELECT ID FROM bugs ORDER  BY ID DESC LIMIT 1";
            $last_bugs = mysqli_query($con, $query);
            $row = mysqli_fetch_row($last_bugs);
            $last_bugs_ID = $row[0] + 1;
            $query = "INSERT INTO attachments (Program_ID, Attachment_info, file_name, bugs_ID) VALUES ('".$Program_ID."', '".$targetfile."', '".$_FILES['Attached']['name']."', '".$last_bugs_ID."')";
            mysqli_query($con, $query);
            $query = "SELECT LAST_INSERT_ID() FROM attachments";
            $last_attachment_ID = mysqli_query($con, $query);
            $row = mysqli_fetch_row($last_attachment_ID);
            $last_attachment_ID = $row[0];
            $Attach_Status = "1";
            
        } else { 
            echo "<script>
                    alert('Fail to attach attachment');
                    window.location.href='index.php';
                </script>";
        }
        

    }

    $query = "INSERT INTO bugs (Program_ID, Report_Type, Severity, Attached,  Problem_summary, Reproducible, Problem, Suggest_fix, Report_Employee_ID, Report_date, Area_ID, Assign_Employee_ID, Comment, Status, Priority, Resolution, Resolution_Version, Resolved_Employee_ID, Resolved_Date, Tested_Employee_ID, Tested_Date, Deferred) 
            VALUES ('".$Program_ID."', '".$Report_Type."','".$Severity."', '".$Attach_Status."', '".$Problem_summary."', '".$Reproducible."', '".$Problem."', '".$Suggest_fix."', '".$Report_Employee_ID."', '".$Report_date."', '".$Area_ID."', '".$Assign_Employee_ID."','".$Comment."', '".$Status."', '".$Priority."', '".$Resolution."', '".$Resolution_version."', '".$Resolved_Employee_ID."', '".$Resolved_Date."', '".$Tested_Employee_ID."', '".$Tested_Date."', '".$Deferred."')";
    echo $query;
    mysqli_query($con, $query);
    header( 'Location: http://localhost:8080/bughound/newbug.php?level='.$level.'');
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
