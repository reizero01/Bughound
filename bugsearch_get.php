<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>CECS 544 </title>
</head>
<style>

table, td, th {
  width: 20px;
}

td {
  height: 50px;
  /* vertical-align: bottom; */
}

</style>
<body>
<h2>
<?php

    error_reporting(0);

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
    
    $query = "SELECT * FROM bugs";
    if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date
        ||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority||$Resolution||$Resolution_version||$Resolved_Employee_ID||$Resolved_Date||$Tested_Employee_ID||$Tested_Date||$Deferred )
    {
        $query = ''.$query.' where ';
    }
    if(!empty($Program_ID))
    {
        $query = ''.$query.' Program_ID = '.$Program_ID.' ';
    }
    if(!empty($Report_Type))
    {
        if(!empty($Program_ID))
        {
          $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Report_Type = '.$Report_Type.'';
    }
    if(!empty($Severity))
    {
        if($Program_ID||$Report_Type)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Severity = '.$Severity.'';
    }
    if(!empty($Problem_summary))
    {
        if($Program_ID||$Report_Type||$Severity)
        {
            $query = ''.$query.' AND ';  
        }
        $top = "'%";
        $bot = "%'";
        $query = ''.$query.'Problem_summary LIKE '.$top.''.$Problem_summary.''.$bot.'';
    }

    if(!empty($Reproducible))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Reproducible = 1 ';
    }
    // else
    // {
    //     if($Program_ID||$Report_Type||$Severity||$Problem_summary)
    //     {
    //         $query = ''.$query.'AND ';  
    //     }
    //     $query = ''.$query.'Reproducible = 0';
    // }

    if(!empty($Problem))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible)
        {
            $query = ''.$query.' AND '; 
        }
        $top = "'%";
        $bot = "%'";
        $query = ''.$query.'Problem LIKE '.$top.''.$Problem.''.$bot.'';
    }
    if(!empty($Suggest_fix))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem)
        {
            $query = ''.$query.' AND ';  
        }
        $top = "'%";
        $bot = "%'";
        $query = ''.$query.'Suggest_fix LIKE '.$top.''.$Suggest_fix.''.$bot.'';
    }
    if(!empty($Report_Employee_ID))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Report_Employee_ID = '.$Report_Employee_ID.'';
    }
    if(!empty($Report_date))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Report_date = '.$Report_date.'';
    }
    if(!empty($Area_ID))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Area_ID = '.$Area_ID.'';
    }
    if(!empty($Assign_Employee_ID))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Assign_Employee_ID = '.$Assign_Employee_ID.'';
    }
    if(!empty($Comment))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID)
        {
            $query = ''.$query.' AND ';  
        }
        $top = "'%";
        $bot = "%'";
        $query = ''.$query.'Comment LIKE '.$top.''.$Comment.''.$bot.'';
    }
    if(!empty($Status))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Status = '.$Status.'';
    }
    if(!empty($Priority))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Priority = '.$Priority.'';
    }
    if(!empty($Resolution))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Resolution = '.$Resolution.'';
    }
    if(!empty($Resolution_version))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority||$Resolution)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Resolution_version = '.$Resolution_version.'';
    }
    if(!empty($Resolved_Employee_ID))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority||$Resolution||$Resolution_version)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Resolved_Employee_ID = '.$Resolved_Employee_ID.'';
    }
    if(!empty($Resolved_Date))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority||$Resolution||$Resolution_version||$Resolved_Employee_ID)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Resolved_Date = '.$Resolved_Date.'';
    }
    if(!empty($Tested_Employee_ID))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority||$Resolution||$Resolution_version||$Resolved_Employee_ID||$Resolved_Date)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Tested_Employee_ID = '.$Tested_Employee_ID.'';
    }
    if(!empty($Tested_Date))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority||$Resolution||$Resolution_version||$Resolved_Employee_ID||$Resolved_Date||$Tested_Employee_ID)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Tested_Date = '.$Tested_Date.'';
    }
    if(!empty($Deferred))
    {
        if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority||$Resolution||$Resolution_version||$Resolved_Employee_ID||$Resolved_Date||$Tested_Employee_ID||$Tested_Date)
        {
            $query = ''.$query.' AND ';  
        }
        $query = ''.$query.'Deferred = 1';
    }
    // else
    // {
    //     if($Program_ID||$Report_Type||$Severity||$Problem_summary||$Reproducible||$Problem||$Suggest_fix||$Report_Employee_ID||$Report_date||$Area_ID||$Assign_Employee_ID||$Comment||$Status||$Priority||$Resolution||$Resolution_version||$Resolved_Employee_ID||$Resolved_Date||$Tested_Employee_ID||$Tested_Date)
    //     {
    //         $query = ''.$query.'AND ';  
    //     }
    //     $query = ''.$query.'Deferred = 0';
    // }
    

    // printf("You entered %s %s as your name.<p>",$first,$last);
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "Bughound");
    // echo $query;
    
    $result = mysqli_query($con, $query);
    
    echo "<table border=1 ><th>Bug_ID</th><th>Report type</th><th>Severity</th><th>Problem summary</th><th>Reproducible</th><th>Problem</th><th>Suggest fix</th><th>Reporter</th><th>Report date</th><th>Program</th><th>Area</th><th>Assign empolyee</th><th>Comment</th><th>Priority</th><th>Resolution</th><th>Resolution version</th><th>Resolved employee</th><th>Resolve date</th><th>Tested employee</th><th>Tested date</th><th>Deferred</th><th>attachment</th>\n";
    $none = 0;
    while($row=mysqli_fetch_row($result)) {
        $none=1;
        // printf("<tr><td>%d</td><td>%s</td></tr>\n",$row[0],$row[1]);
        echo '<tr><td><a href="bug_edit.php?level='.$level.'&id='.$row[0].'"</a>'. $row[0] .'</td>';
        if($row[2])
        {
            if($row[2] == 1)
            {
                echo '<td>Codeing error</td>';
            }
            if($row[2] == 2)
            {
                echo '<td>Design issue</td>';
            }
            if($row[2] == 3)
            {
                echo '<td>Sugesstion</td>';
            }
            if($row[2] == 4)
            {
                echo '<td>Documemtation</td>';
            }
            if($row[2] == 5)
            {
                echo '<td>Hardware</td>';
            }
            if($row[2] == 6)
            {
                echo '<td>Query</td>';
            }
            
        }
        else{
            echo '<td>'. $row[2] . '</td>';
        }
        if($row[3])
        {
            if($row[3] == 1)
            {
                echo '<td>Fatal</td>';
            }
            if($row[3] == 2)
            {
                echo '<td>Serious</td>';
            }
            if($row[3] == 3)
            {
                echo '<td>Minor</td>';
            }
        }
        else{
            echo '<td>'. $row[3] . '</td>';
        }
        echo '<td>'. $row[5] . '</td>';
        if($row[6])
        {
            echo '<td>Y</td>';
        }
        else
        {
            echo '<td>N</td>';
        }
        echo '<td>'. $row[7] . '</td>';
        echo '<td>'. $row[8] . '</td>';
        if($row[9])
        {
            $reporter = 'SELECT * from employees where ID = '.$row[9].'';
            $reporter1 = mysqli_query($con, $reporter);
            while($re=mysqli_fetch_row($reporter1))
            {
                echo '<td>'. $re[1] . ' '. $re[2] .'</td>';
            }

        }
        else
        {
            echo '<td>'. $row[9] . '</td>';
        }
        echo '<td>'. $row[10] . '</td>';

        if($row[1])
        {
            $reporter = 'SELECT * from programs where ID = '.$row[1].'';
            $reporter1 = mysqli_query($con, $reporter);
            while($re=mysqli_fetch_row($reporter1))
            {
                echo '<td>'. $re[1] . ' date: '. $re[2] .' version: '.$re[3].'</td>';
            }

        }
        else
        {
            echo '<td>'. $row[1] . '</td>';
        }   
        
        if($row[11])
        {
            $reporter = 'SELECT * from areas where ID = '.$row[11].'';
            $reporter1 = mysqli_query($con, $reporter);
            while($re=mysqli_fetch_row($reporter1))
            {
                echo '<td>'. $re[1] .'</td>';
            }

        }
        else
        {
            echo '<td>'. $row[11] . '</td>';
        }    

        if($row[12])
        {
            $reporter = 'SELECT * from employees where ID = '.$row[12].'';
            $reporter1 = mysqli_query($con, $reporter);
            while($re=mysqli_fetch_row($reporter1))
            {
                echo '<td>'. $re[1] . ' '. $re[2] .'</td>';
            }

        }
        else
        {
            echo '<td>'. $row[12] . '</td>';
        }

        echo '<td>'. $row[13] . '</td>';

        if($row[15])
        {
            if($row[15] == 1)
            {
                echo '<td>Fix immediately</td>';
            }
            if($row[15] == 2)
            {
                echo '<td>Fix as soon as possible</td>';
            }
            if($row[15] == 3)
            {
                echo '<td>Fix before next milestone</td>';
            }
            if($row[15] == 4)
            {
                echo '<td>Fix before release</td>';
            }
            if($row[15] == 5)
            {
                echo '<td>Fix if possible</td>';
            }
            if($row[15] == 6)
            {
                echo '<td>Optional</td>';
            }
            
        }
        else{
            echo '<td>'. $row[15] . '</td>';
        }

        if($row[16])
        {
            if($row[16] == 1)
            {
                echo '<td>Pending</td>';
            }
            if($row[16] == 2)
            {
                echo '<td>Fixed</td>';
            }
            if($row[16] == 3)
            {
                echo '<td>Irreproducible</td>';
            }
            if($row[16] == 4)
            {
                echo '<td>Deferred</td>';
            }
            if($row[16] == 5)
            {
                echo '<td>As designed</td>';
            }
            if($row[16] == 6)
            {
                echo '<td>Withdrawn by reporter</td>';
            }
            if($row[16] == 7)
            {
                echo '<td>Need more info</td>';
            }
            if($row[16] == 8)
            {
                echo '<td>Disagree with suggestion</td>';
            }
            if($row[16] == 9)
            {
                echo '<td>Duplicate</td>';
            }
        }
        else{
            echo '<td>'. $row[16] . '</td>';
        }
        echo '<td>'. $row[17] . '</td>';
        
        // if($row[18])
        // {
        //     if($row[18] == 1)
        //     {
        //         echo '<td>Pending</td>';
        //     }
        //     if($row[18] == 2)
        //     {
        //         echo '<td>Fixed</td>';
        //     }
        //     if($row[18] == 3)
        //     {
        //         echo '<td>Irreproducible</td>';
        //     }
        //     if($row[18] == 4)
        //     {
        //         echo '<td>Deferred</td>';
        //     }
        //     if($row[18] == 5)
        //     {
        //         echo '<td>As designed</td>';
        //     }
        //     if($row[18] == 6)
        //     {
        //         echo '<td>Withdrawn by reporter</td>';
        //     }
        //     if($row[18] == 7)
        //     {
        //         echo '<td>Need more info</td>';
        //     }
        //     if($row[18] == 8)
        //     {
        //         echo '<td>Disagree with suggestion</td>';
        //     }
        //     if($row[18] == 9)
        //     {
        //         echo '<td>Duplicate</td>';
        //     }
        // }
        // else{
        //     echo '<td>'. $row[18] . '</td>';
        // }

        if($row[18])
        {
            $reporter = 'SELECT * from employees where ID = '.$row[18].'';
            $reporter1 = mysqli_query($con, $reporter);
            while($re=mysqli_fetch_row($reporter1))
            {
                echo '<td>'. $re[1] . ' '. $re[2] .'</td>';
            }

        }
        else
        {
            echo '<td>'. $row[18] . '</td>';
        }

        echo '<td>'. $row[19] . '</td>';

        if($row[20])
        {
            $reporter = 'SELECT * from employees where ID = '.$row[20].'';
            $reporter1 = mysqli_query($con, $reporter);
            while($re=mysqli_fetch_row($reporter1))
            {
                echo '<td>'. $re[1] . ' '. $re[2] .'</td>';
            }

        }
        else
        {
            echo '<td>'. $row[20] . '</td>';
        }

        echo '<td>'. $row[21] . '</td>';

        echo '<td>'. $row[22] . '</td>';        

        if($row[4])
        {
            $att = 'SELECT * from attachments where bugs_ID = '.$row[0].'';
            $att1 = mysqli_query($con, $att);
            while($attment=mysqli_fetch_row($att1))
            {
                // echo '<td><a href="file://192.168.64.2/opt/lampp/htdocs/bughound'.$attment[2].'"</a>'. $attment[3] .'</td>';
                echo '<td><a href="download_attachment.php?path='.$attment[2].'"</a>'. $attment[3] .'</td>';
            }
        }
        else{
            echo '<td>'. $row[4] . '</td>';
        }
        // $query1 = 'SELECT * FROM employees where ID = '.$row[10].'';
        // $employee = mysqli_query($con, $query1);
        // $employee = 
        // echo '<td>'.$employee[1].' '.$employee[2].'';
    }

    if($none==0)
    {
        Echo "<h3>No matching records found.</h3>\n";
    }
    // mysqli_query($con, $query);

    // $Attach_Status = "N";
    // $last_attachment_ID = NULL;
    // if(!empty($Attached))
    // {
    //     $query = "SELECT LAST_INSERT_ID() FROM bugs";
    //     $last_bugs = mysqli_query($con, $query);
    //     $row = mysqli_fetch_row($last_bugs);
    //     $last_bugs_ID = $row[0] + 1;
    //     $path = './attachments/'.$last_bugs_ID.'.jpg';
    //     echo $path;
    //     // move_uploaded_file($_FILES["Attached"]["tmp_name"], $path);
    //     file_put_contents($path, $Attached);
        
    //     $info = './attachments/'.$last_attachment_ID.'';
    //     $query = "INSERT INTO attachments (Program_ID, Attachment_info, bugs_ID) VALUES ('".$Program_ID."', '".$info."','".$last_bugs_ID."')";
    //     mysqli_query($con, $query);
    //     $query = "SELECT LAST_INSERT_ID() FROM attachments";
    //     $last_attachment_ID = mysqli_query($con, $query);
    //     $row = mysqli_fetch_row($last_attachment_ID);
    //     $last_attachment_ID = $row[0];
    //     $Attach_Status = "Y";

    // }

    // $query = "INSERT INTO bugs (Program_ID, Report_Type, Severity, Attached, Attachment_ID, Problem_summary, Reproducible, Problem, Suggest_fix, Report_Employee_ID, Report_date, Area_ID, Assign_Employee_ID, Comment, Status, Priority, Resolution, Resolution_Version, Resolved_Employee_ID, Resolved_Date, Tested_Employee_ID, Tested_Date, Deferred) 
    //         VALUES ('".$Program_ID."', '".$Report_Type."','".$Severity."', '".$Attach_Status."', '".$last_attachment_ID."', '".$Problem_summary."', '".$Reproducible."', '".$Problem."', '".$Suggest_fix."', '".$Report_Employee_ID."', '".$Report_date."', '".$Area_ID."', '".$Assign_Employee_ID."','".$Comment."', '".$Status."', '".$Priority."', '".$Resolution."', '".$Resolution_version."', '".$Resolved_Employee_ID."', '".$Resolved_Date."', '".$Tested_Employee_ID."', '".$Tested_Date."', '".$Deferred."')";
    // echo $query;
    // mysqli_query($con, $query);
    // header( 'Location: http://localhost:8080/bughound/page3.php')
    ?>
</table>
<p>
<!-- <input type="button" value="Return" id=button1 name=button1 onclick="go_home()"> -->
</h2>
<!-- <script language=Javascript>
function go_home(){
    window.location.replace("index.php");
}
</script> -->
<p><INPUT type="button" value="Back to main page" id=button1 name=button1 onclick="go_home()">
<script language=Javascript>

function go_home() {

    window.location.replace('main.php?level=<?php echo $level; ?>');
}

</script>
</body>
</html>
