<?php
    include('../connection.php');
    $tid =  $_POST['tid'];
    $sql = "DELETE FROM replies WHERE topic_id ='$tid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM viewed WHERE tid ='$tid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM topics WHERE topic_id ='$tid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    echo "success";
?>