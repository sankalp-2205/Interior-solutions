<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include('connection.php');
$author = $_POST['author'];
$scid = $_POST['scid'];
$cid = $_POST['cid'];
$tid = $_POST['tid'];
$username = $_SESSION['username'];
$date = date('Y-m-d H:i:s');
echo $date;
$sql = "INSERT INTO viewed (viewed_of,viewed_by,tid,scid,cid,time) VALUES ('$author','$username','$tid','$scid','$cid', '$date')";
if(!$result = $link ->query($sql))
{
    echo "failure";
    exit;
}


?>