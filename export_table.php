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

$Table = $_POST['Table'];

$con = mysqli_connect("localhost","root");
mysqli_select_db($con, "Bughound");

$query = 'SELECT * FROM '.$Table.'';

$dom   = new DOMDocument( '1.0', 'utf-8' );
$dom   ->formatOutput = True;

$root  = $dom->createElement( $Table );
$dom   ->appendChild( $root );

$result = mysqli_query($con, $query);
while( $row = $result->fetch_assoc() )
{
    $node = $dom->createElement( $Table );
    foreach( $row as $key => $val )
    {
        $child = $dom->createElement( $key );
        $child ->appendChild( $dom->createCDATASection( $val) );
        $node  ->appendChild( $child );
    }
    $root->appendChild( $node );
}

$dom->save( '/opt/lampp/htdocs/bughound/xml/'.$Table.'.xml' );

$path = '/opt/lampp/htdocs/bughound/xml/'.$Table.'.xml';

// header( 'Content-type: text/xml' );
// echo $dom->saveXML();
// exit;

echo '<pre>';
echo htmlentities( $dom->saveXML() );
echo '</pre>';

echo '<td><a href="download_attachment.php?path='.$path.'"</a>Download Xml file</td>';
echo '<br/><br/>';
// echo $Table;
// $return_var = NULL;
// $output = NULL;
// $targetdir = './xml/';
// $now = date("M,d,Yh:i:sA") . "/";
// $dir = $targetdir.$now."temp.sql";
// // $targetfile = $targetdir.$now.$_FILES['Attached']['name'];
// // $command = "/usr/bin/mysqldump -u mysql-user -h 123.145.167.189 -pmysql-pass ".$Table."> /path-to-export/file.sql";
// $command = "mysqldump -u root --xml Bughound ".$Table." > /opt/lampp/htdocs/bughound/xml/dump4.xml";
// echo $command;
// $output = exec($command, $out);
// // move_uploaded_file($out, '/opt/lampp/htdocs/bughound/xml/dump4.xml');
// // echo "<pre>$output</pre>";
// // exec($command, $output, $return_var);

// // move_uploaded_file($output, $dir);

?>

<A href='main.php?level=<?php echo $level; ?>'><span class=\"linkline\">Go Back to main page</span></a>