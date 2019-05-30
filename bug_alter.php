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
if(isset($_GET['id']))
{
    $id = htmlspecialchars($_GET["id"]);
    
    
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
    $Attached = $_FILES["Attached"];
    $Attached_Count = count($_FILES["Attached"]["name"]);

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
    // $Attach_Status = "0";
    // $last_attachment_ID = NULL;
    // if(!empty($Attached))
    // {
    //     $query = "SELECT ID FROM bugs ORDER  BY ID DESC LIMIT 1";
    //     $last_bugs = mysqli_query($con, $query);
    //     $row = mysqli_fetch_row($last_bugs);
    //     $last_bugs_ID = $row[0] + 1;
    //     $path = './attachments/'.$last_bugs_ID.'.jpg';
    //     echo $path;
    //     // move_uploaded_file($_FILES["Attached"]["tmp_name"], $path);
    //     file_put_contents($path, $Attached);
        
    //     $info = './attachments/'.$last_bugs_ID.'.jpg';
    //     $query = "INSERT INTO attachments (Program_ID, Attachment_info, bugs_ID) VALUES ('".$Program_ID."', '".$info."','".$last_bugs_ID."')";
    //     mysqli_query($con, $query);
    //     $query = "SELECT LAST_INSERT_ID() FROM attachments";
    //     $last_attachment_ID = mysqli_query($con, $query);
    //     $row = mysqli_fetch_row($last_attachment_ID);
    //     $last_attachment_ID = $row[0];
    //     $Attach_Status = "1";

    // }
    $Problem_summary = mysqli_real_escape_string($con, $Problem_summary);
    $Problem = mysqli_real_escape_string($con, $Problem);
    $Suggest_fix = mysqli_real_escape_string($con, $Suggest_fix);
    $Comment = mysqli_real_escape_string($con, $Comment);
    $Resolution_version = mysqli_real_escape_string($con, $Resolution_version);

    // $targetdir = './attachments/';
    // $now = date("M,d,Yh:i:sA") . "/";
    // $dir = $targetdir.$now;
    // $targetfile = $targetdir.$now.$_FILES['Attached']['name'];

    
    // $counter = 0;
    // foreach($Attached as $value)
    // {
    //     $counter = $counter + 1;
    //     echo $Attached['name'];
    // }
    // echo $Attached_Count;
    // if($Attached_Count)
    // {
    //     for($i = 0; $i < $Attached_Count; $i++)
    //     {
    //         $targetdir = './attachments/';
    //         $now = date("M,d,Yh:i:sA") . "/";
    //         $dir = $targetdir.$now;
    //         if (!file_exists($dir)) {
    //             mkdir($dir, 0777, true);
    //         }
    //         if($_FILES['Attached']['tmp_name'][$i])
    //         {
    //             echo $_FILES['Attached']['tmp_name'][$i];
    //             $targetfile = $dir.$_FILES['Attached']['tmp_name'][$i];
    //         }
    //         if (move_uploaded_file($_FILES['Attached']['tmp_name'][$i], $targetfile)) {
            
    //             // $query = "SELECT ID FROM bugs ORDER  BY ID DESC LIMIT 1";
    //             // $last_bugs = mysqli_query($con, $query);
    //             // $row = mysqli_fetch_row($last_bugs);
    //             // $last_bugs_ID = $row[0] + 1;
    //             $query = "INSERT INTO attachments (Program_ID, Attachment_info, file_name, bugs_ID) VALUES ('".$Program_ID."', '".$targetfile."', '".$_FILES['Attached']['name'][$i]."', '".$id."')";
    //             echo $query;
    //             mysqli_query($con, $query);
    //             $query = "SELECT LAST_INSERT_ID() FROM attachments";
    //             $last_attachment_ID = mysqli_query($con, $query);
    //             $row = mysqli_fetch_row($last_attachment_ID);
    //             $last_attachment_ID = $row[0];
    //             $Attach_Status = "1";
                        
    //         } else {
    //             echo "upload not success"; 
    //             // echo "<script>
    //             //         alert('Fail to attach attachment');
    //             //         window.location.href='index.php';
    //             //     </script>";
    //         }

    //     }
    // }
    // echo "counter = ".$counter;
    // foreach($_FILES["Attached"] as $target)
    // {
    //     $targetfile = $targetdir.$now.$target['name'];
    //     if (move_uploaded_file($_FILES['Attached']['tmp_name'], $targetfile)) {
            
    //         // $query = "SELECT ID FROM bugs ORDER  BY ID DESC LIMIT 1";
    //         // $last_bugs = mysqli_query($con, $query);
    //         // $row = mysqli_fetch_row($last_bugs);
    //         // $last_bugs_ID = $row[0] + 1;
    //         $query = "INSERT INTO attachments (Program_ID, Attachment_info, file_name, bugs_ID) VALUES ('".$Program_ID."', '".$targetfile."', '".$_FILES['Attached']['name']."', '".$id."')";
    //         echo $query;
    //         mysqli_query($con, $query);
    //         $query = "SELECT LAST_INSERT_ID() FROM attachments";
    //         $last_attachment_ID = mysqli_query($con, $query);
    //         $row = mysqli_fetch_row($last_attachment_ID);
    //         $last_attachment_ID = $row[0];
    //         $Attach_Status = "1";
            
    //     } else {
    //         echo "upload not success"; 
    //         // echo "<script>
    //         //         alert('Fail to attach attachment');
    //         //         window.location.href='index.php';
    //         //     </script>";
    //     }

    // }
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
            $query = "INSERT INTO attachments (Program_ID, Attachment_info, file_name, bugs_ID) VALUES ('".$Program_ID."', '".$targetfile."', '".$_FILES['Attached']['name']."', '".$id."')";
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
    
    $query = "UPDATE bugs SET Program_ID = '".$Program_ID."', Report_Type = '".$Report_Type."', Severity = '".$Severity."', Attached = '".$Attach_Status."', Problem_summary = '".$Problem_summary."', Reproducible = '".$Reproducible."', Problem = '".$Problem."', Suggest_fix = '".$Suggest_fix."', Report_Employee_ID = '".$Report_Employee_ID."', Report_date = '".$Report_date."', Area_ID = '".$Area_ID."', Assign_Employee_ID = '".$Assign_Employee_ID."', Comment = '".$Comment."', Status = '".$Status."', Priority = '".$Priority."', Resolution = '".$Resolution."', Resolution_Version = '".$Resolution_version."', Resolved_Employee_ID = '".$Resolved_Employee_ID."', Resolved_Date = '".$Resolved_Date."', Tested_Employee_ID = '".$Tested_Employee_ID."', Tested_Date = '".$Tested_Date."', Deferred = '".$Deferred."'
                where ID =  '".$id."'";
    
        
    echo $query;
    mysqli_query($con, $query);
    header( 'Location: http://localhost:8080/bughound/main.php?level='.$level.'');
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
