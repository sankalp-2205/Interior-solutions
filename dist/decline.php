<?php
include('../connection.php');
$id = $_POST['id'];
$sql = "DELETE FROM subscribers WHERE subscriber_id = '$id'"; 
if($result = $link ->query($sql))
{
    echo "success";
    exit;
}
echo "failure";
   
?>