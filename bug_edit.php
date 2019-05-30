<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bughound - Bug Edit Page -</title>
    </head>

    <style>
        div1 {
            border-color: black;
            border-style: solid;
            padding: 20px;
        }
        
        .right {
            margin-left: 20px;
        }

        .right1 {
            margin-left: 8px;
        }

        body {
            background-image: url("foxhound-logo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        a1 {
            color: #DAA520;
        }
        
    </style>

    <body>

        <?php
        //MISSING connect to the database
        //MISSING select the database
        //MISSING construct query string for all the contents of people
        //MISSING execute the query
        
        if(isset($_GET['level']))
        {
            $level = htmlspecialchars($_GET["level"]);
            // echo $level;
            
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
            alert('No bug has been selected');
            window.location.href='index.php';
            </script>";
        }
        // if($level <= 2)
        // {
        //     echo "<script>
        //     alert('Do not have access permission level');
        //     window.location.href='main.php?level=$level';
        //     </script>";
        // }

        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con, "Bughound");
        $query = "SELECT * FROM employees";
        //echo $query;
        $result = mysqli_query($con, $query);
        $program_query = "SELECT * FROM programs";
        $program = mysqli_query($con, $program_query);
        $program_query1 = "SELECT * FROM programs where id = ";
        $program1 = mysqli_query($con, $program_query1);
        $QA_query = "SELECT * FROM employees";
        $QA = mysqli_query($con, $QA_query);
        $QA1 = mysqli_query($con, $QA_query);
        $area_query = "SELECT * FROM areas";
        $area = mysqli_query($con, $area_query);
        $swe_query = "SELECT * FROM employees";
        $swe = mysqli_query($con, $swe_query);
        $swe1 = mysqli_query($con, $swe_query);
        // echo "<table border=1 ><th>Emp ID</th><th>Name</th>\n";
        $none = 0;
        $current_bug_query = "SELECT * from bugs where id = $id";
        $current_bug = mysqli_query($con, $current_bug_query);
        // echo $current_bug_query;
        while($row=mysqli_fetch_row($current_bug)) {
            if($row[0] == $id)
            {
                $Program_ID = $row[1];
                $Report_Type = $row[2];
                $Severity = $row[3];
                $Problem_summary = $row[5];
                $Reproducible = $row[6];
                $Problem = $row[7];
                $Suggest_fix = $row[8];
                $Report_Employee_ID = $row[9];
                $Report_date = $row[10];
                $Area_ID = $row[11];
                $Assign_Employee_ID = $row[12];
                $Comment = $row[13];
                $Status = $row[14];
                $Priority = $row[15];
                $Resolution = $row[16];
                $Resolution_version = $row[17];
                $Resolved_Employee_ID = $row[18];
                $Resolved_Date = $row[19];
                $Tested_Employee_ID = $row[20];
                $Tested_Date = $row[21];
                $Deferred = $row[22];
            }
            // echo $Suggest_fix;
        }
        // while($row=mysqli_fetch_row($result)) {
        //     $none=1;
        //     // printf("<tr><td>%d</td><td>%s</td></tr>\n",$row[0],$row[1]);
        //     echo '<tr><td><a href="profile.php?id=' . $row[0] . '"</a>'. $row[0] .'</td>';
        //     echo '<td>'. $row[1] . '</td></tr>';
        //     // echo '<td>'. $row[2] . '</td></tr>';
        // }
        
        ?>
        
        <div>
            <h1>Edit Bug Page</h1>
            <form action='bug_alter.php?level=<?php echo $level; ?>&id=<?php echo htmlspecialchars($id); ?>' method="post" onsubmit="return validate(this)" enctype="multipart/form-data">
                
                    <tr><td>Program:</td><td>
                        <?php
                            echo "<select name='Program'>";
                            echo '<option value=" '.htmlspecialchars($Program_ID).'">Current</option>';
                            while ($row = mysqli_fetch_row($program)) {
                                // unset($program_name);
                                // $program_name = $row['program_name']; 
                                 				 
                                echo '<option value=" '.$row[0].'">'.$row[1].'</option>';
                        }
                            echo "</select>";
                        ?>
                        </td></tr>
                    <tr><td>Report Type:</td><td>
                        <select name='Report_Type'>
                            <option value="<?php echo htmlspecialchars($Report_Type); ?>">Current</option>
                            <option value="1">Codeing error</option>
                            <option value="2">Design issue</option>
                            <option value="3">Sugesstion</option>
                            <option value="4">Documemtation</option>
                            <option value="5">Hardware</option>
                            <option value="6">Query</option>
                        </select>
                    </td></tr>   
                    <tr><td>Severity:</td><td>
                        <select name='Severity'>
                            <option value="<?php echo htmlspecialchars($Severity); ?>">Current</option>
                            <option value="1">Fatal</option>
                            <option value="2">Serious</option>
                            <option value="3">Minor</option>
                        </select>
                    </td></tr><br />
                    <br/>
                    <tr><td>Problem Summary:</td><td><input type="Text" name="Problem_summary" size="55"  value="<?php echo htmlspecialchars($Problem_summary); ?>"></td></tr>
                    <?php
                        if($Reproducible)
                        {
                            echo '<tr><td>Reproducible?</td><td><input type="Checkbox" name="Reproducible" value="1" id="Reproducible" checked></td></tr>';
                        }
                        else{
                            echo '<tr><td>Reproducible?</td><td><input type="Checkbox" name="Reproducible" value="1" id="Reproducible"></td></tr>';
                        
                        }
                    ?>
                    
                    <br/><br/>
                    Problem: <span class="right"></span><textarea name="Problem" id="Problem" rows="2" cols="55" ><?php echo htmlspecialchars($Problem); ?></textarea>
                    <br/><br/>
                    Suggest Fix: <textarea name="Suggest_fix" id="Suggest_fix" rows="2" cols="55" ><?php echo htmlspecialchars($Suggest_fix); ?></textarea>
                    <br/><br/>
                    Reported By: 
                        <?php
                                echo "<select name='Report_Employee_ID'>";
                                echo '<option value=" '.htmlspecialchars($Report_Employee_ID).'">Current</option>';
                                while ($row = mysqli_fetch_row($QA)) {
                                    // unset($program_name);
                                    // $program_name = $row['program_name']; 
                                                    
                                    echo '<option value=" '.$row[0].'">'.$row[1].' '.$row[2].'</option>';
                            }
                                echo "</select>";
                        ?>
                    Date: <input type="Date" name="Report_date" value="<?php echo htmlspecialchars($Report_date); ?>">
                    <br/><br/><hr><br/><br/>
                    Functional Area: 
                        <?php
                                echo "<select name='Area_ID'>";
                                echo '<option value=" '.htmlspecialchars($Area_ID).'">Current</option>';
                                while ($row = mysqli_fetch_row($area)) {
                                    // unset($program_name);
                                    // $program_name = $row['program_name']; 
                                                    
                                    echo '<option value=" '.$row[0].'">'.$row[1].'</option>';
                            }
                                echo "</select>";
                        ?>
                    Assigned To: 
                        <?php
                                echo "<select name='Assign_Employee_ID'>";
                                echo '<option value=" '.htmlspecialchars($Assign_Employee_ID).'">Current</option>';
                                while ($row = mysqli_fetch_row($swe)) {
                                    // unset($program_name);
                                    // $program_name = $row['program_name']; 
                                                    
                                    echo '<option value=" '.$row[0].'">'.$row[1].' '.$row[2].'</option>';
                            }
                                echo "</select>";
                        ?>
                    <br/><br/>
                    Comments: <span class="right1"><textarea name="Comment" id="Comment" rows="2" cols="55" value="<?php echo htmlspecialchars($Comment); ?>"></textarea>
                    <br/><br/>
                    Status:
                        <select name='Status'>
                            <option value="<?php echo htmlspecialchars($Status); ?>">Current</option>
                            <option value="1">Open</option>
                            <option value="2">Closed</option>
                            <option value="3">Resolved</option>
                        </select>
                    Priority: 
                        <select name='Priority'>
                            <option value="<?php echo htmlspecialchars($Priority); ?>">Current</option>
                            <option value="1">Fix immediately</option>
                            <option value="2">Fix as soon as possible</option>
                            <option value="3">Fix before next milestone</option>
                            <option value="4">Fix before release</option>
                            <option value="5">Fix if possible</option>
                            <option value="6">Optional</option>
                        </select>
                    <a1>Resolution:</a1>
                        <select name='Resolution'>
                            <option value="<?php echo htmlspecialchars($Resolution); ?>">Current</option>
                            <option value="1">Pending</option>
                            <option value="2">Fixed</option>
                            <option value="3">Irreproducible</option>
                            <option value="4">Deferred</option>
                            <option value="5">As designed</option>
                            <option value="6">Can't be fixed</option>
                            <option value="7">Withdrawn by reporter</option>
                            <option value="8">Need more info</option>
                            <option value="9">Disgree with suggestion</option>
                        </select>
                    <a1>Resolution version:</a1><td><input type="Text" name="Resolution_version" id="Resolution_version"></td>
                    
                    <br/><br/>
                    Resolved by:
                        <?php
                                echo "<select name='Resolved_Employee_ID'>";
                               
                                echo '<option value=" '.htmlspecialchars($Resolved_Employee_ID).'">Current</option>';
                                while ($row = mysqli_fetch_row($swe1)) {
                                    // unset($program_name);
                                    // $program_name = $row['program_name']; 
                                                    
                                    echo '<option value=" '.$row[0].'">'.$row[1].' '.$row[2].'</option>';
                            }
                                echo "</select>";
                        ?>
                    Date: <input type="Date" name="Resolved_Date" value="<?php echo htmlspecialchars($Resolved_Date); ?>" >
                    Tested by:
                        <?php
                                echo "<select name='Tested_Employee_ID'>";
                               
                                echo '<option value=" '.htmlspecialchars($Tested_Employee_ID).'">Current</option>';
                                while ($row = mysqli_fetch_row($QA1)) {
                                    // unset($program_name);
                                    // $program_name = $row['program_name']; 
                                                    
                                    echo '<option value=" '.$row[0].'">'.$row[1].' '.$row[2].'</option>';
                            }
                                echo "</select>";
                        ?>    
                    <a1>Date:</a1> <input type="Date" name="Tested_Date" value="<?php echo htmlspecialchars($Tested_Date); ?>">
                    <a1>Treat as deferred?</a1> 
                    <?php
                        if($Deferred)
                        {
                            echo '<input type="Checkbox" name="Deferred" value="1" id="Deferred" checked>';
                        }
                        else{
                            echo '<input type="Checkbox" name="Deferred" value="1" id="Deferred">';
                        
                        }
                    ?>
                    
                    <br/><br/>
                Attachment: <input type="file" name="Attached" id="Attached" multiple="multiple">
                <br/><br/>
                <input type="submit" name="submit" value="Submit">
                <button type="reset" value="Reset">Reset</button>
                <input type="button" name="cancel" value="Cancel" onclick="history.back(-1)">
            </form>
        </div>
        <p>
        <h3>
        <A href='main.php?level=<?php echo $level; ?>'><span class=\"linkline\">Go Back to main page</span></a>
        </h3>
        </p>


        <script language=Javascript>
            function validate(theform) {
                if(theform.Program.value.trim() === ""){
                    alert ("Program field must contain characters");
                    return false;
                }
                if(theform.Report_Type.value.trim() === ""){
                    alert ("Report type must contain characters");
                    return false;
                }
                if(theform.Severity.value.trim() === ""){
                    alert ("Severity field must contain characters");
                    return false;
                }
                if(theform.Report_Employee_ID.value.trim() === ""){
                    alert ("Reporter field must contain characters");
                    return false;
                }
                if(theform.Report_date.value === ""){
                    alert ("Please enter a vaild report date");
                    return false;
                }
                if(theform.Area_ID.value === ""){
                    alert ("Please enter a vaild area");
                    return false;
                }
                if(theform.Assign_Employee_ID.value.trim() === ""){
                    alert ("Assigned employee field must contain characters");
                    return false;
                }
                if(theform.Status.value.trim() === ""){
                    alert ("Status field must contain characters");
                    return false;
                }
                if(theform.Priority.value.trim() === ""){
                    alert ("Priority field must contain characters");
                    return false;
                }
                if(theform.Resolution.value.trim() === ""){
                    alert ("Resolution field must contain characters");
                    return false;
                }
                
                // if(theform.Resolved_Employee_ID.value === ""){
                //     alert ("Please enter a vaild resolved date");
                //     return false;
                // }
                return true;
            }

            // function myFunction() {
            //      document.getElementById("myNumber").stepUp();
            // }  
            // function showPw() {
            //     var pw = document.getElementById("password");
            //     if (pw.type === "password") {
            //         pw.type = "text";
            //     } else {
            //         pw.type = "password";
            //     }
            // }
        </script>
    </body>
</html>
