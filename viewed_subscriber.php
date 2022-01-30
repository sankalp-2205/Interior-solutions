<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include('connection.php');
$subscriber_id = $_POST['subscriber'];
$name = "";
$tid = 1;
$sql = "SELECT * FROM subscribers WHERE subscriber_id = '$subscriber_id'";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $name = $rows['subscriber_name'];
    }
}
$scid = $_POST['scid'];
$cid = $_POST['cid'];
$username = $_SESSION['username'];
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO `viewed` (`view_id`, `viewed_of`, `viewed_by`, `tid`, `scid`, `cid`, `time`) VALUES (NULL, '".$name."', '".$username."', '0', '".$scid."', '".$cid."', '".$date."')";
if(!$result = $link ->query($sql))
{
    echo "failure";
    exit;
}
?>