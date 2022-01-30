<?php
include('../connection.php');
$id = $_POST['id'];
$sql = "UPDATE subscribers SET status = 'active' WHERE subscriber_id = '$id'"; 
if($result = $link ->query($sql))
{
    echo "success";
    exit;
}
echo "failure";
   
?>