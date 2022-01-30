<?php
    include('../connection.php');
    $scid =  $_POST['scid'];
    $sql = "SELECT * FROM subcategories WHERE subcat_id = '$scid'";
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $cid = $rows['parent_id'];
        }
    }
    else
    {
        echo "failure";
        exit;
    }

    $sql = "DELETE FROM replies WHERE subcategory_id ='$scid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM topics WHERE subcategory_id ='$scid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM viewed WHERE scid ='$scid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM subscribers WHERE subcategory_id ='$scid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM subcategories WHERE subcat_id ='$scid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "SELECT * FROM subcategories WHERE parent_id = '$cid'";
    if($result = $link ->query($sql))
    {
       if($result ->num_rows == 0)
       {
        $sql2 = "DELETE FROM categories WHERE cat_id ='$cid'";
        if(!$result2 = $link ->query($sql2))
        {
            echo "failure";
            exit;
        }

       }
    }

    echo "success";
?>