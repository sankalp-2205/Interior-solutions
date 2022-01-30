
<?php
    include('../connection.php');
    $cid =  $_POST['cid'];
    $sql = "DELETE FROM replies WHERE category_id ='$cid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM topics WHERE category_id ='$cid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM viewed WHERE cid ='$cid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM subscribers WHERE category_id ='$cid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM subcategories WHERE parent_id ='$cid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    $sql = "DELETE FROM categories WHERE cat_id ='$cid'";
    if(!$result = $link ->query($sql))
    {
        echo "failure";
        exit;
    }
    echo "success";
?>