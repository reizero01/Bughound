<?php

if(isset($_GET['path']))
{
    $file = htmlspecialchars($_GET["path"]);
}
// else{
//     echo "<script>
//     alert('Please login first');
//     window.location.href='index.php';
//     </script>";
// }
$path_parts = pathinfo($file);
if($path_parts['extension'] == "jpg")
{
    header("content-type: image/jpg");
    $page = file_get_contents($file);
    echo $page;
}
if($path_parts['extension'] == "png")
{
    header("content-type: image/png");
    $page = file_get_contents($file);
    echo $page;
}

    $page = file_get_contents($file);
    echo $page;



// if (file_exists($file)) {
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename="'.basename($file).'"');
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate');
//     header('Pragma: public');
//     header('Content-Length: ' . filesize($file));
//     readfile($file);
//     exit;
// }
?>