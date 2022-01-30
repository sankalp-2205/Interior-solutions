<?php
function dispcomments()
{
    include ('../connection.php');
    $sql = "SELECT * FROM replies ORDER BY reply_id DESC";
if($result = $link ->query($sql))
{
    while($rows = $result->fetch_array(MYSQLI_ASSOC))
    {
        $cid = $rows['category_id'];
        $scid = $rows['subcategory_id'];
        $tid = $rows['topic_id'];
        $date_posted = $rows['date_posted'];
        $comment = $rows['comment'];
        $author = $rows['author'];
        $reply_id = $rows['reply_id'];
        $sql2 = "SELECT * FROM topics WHERE topic_id = '$tid'";
        if($result2 = $link ->query($sql2))
        {
            while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
            {
                $title = $rows2['title'];
            }
        }
        $sql2 = "SELECT * FROM categories WHERE cat_id = '$cid'";
        if($result2 = $link ->query($sql2))
        {
            while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
            {
                $category = $rows2['category_title'];
            }
        }
        $sql2 = "SELECT * FROM subcategories WHERE subcat_id = '$scid'";
        if($result2 = $link ->query($sql2))
        {
            while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
            {
                $subcategory = $rows2['subcategory_title'];
            }
        }

                echo "<tr>
                        <td>".$author."</td>
                        <td>".$category."</td>
                        <td>".$subcategory."</td>
                        <td>".$title."</td>
                        <td>".$comment."</td>
                        <td>".$date_posted."</td>
                      <td> <button name = delete_".$reply_id."type='button'> Delete </button></td>
                     </tr>";
            }
           }
    }


function displaycategories()
{
    include ('../connection.php');
    $categories = "";
     $sql = "SELECT * FROM categories";
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $category = $rows['category_title'];
            $categories.= "<option>".$category."</option>";
        }
        echo $categories;
    }
}

function display_subscribers()
{
    include ('../connection.php');
     $sql = "SELECT * FROM subscribers WHERE status = 'active'";
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $name = $rows['subscriber_name'];
            $email = $rows['subscriber_email'];
            $contact = $rows['subscriber_contact'];
            $category_id = $rows['category_id'];
            $subcategory_id = $rows['subcategory_id'];
            $sql2 = "SELECT * FROM categories WHERE cat_id = '$category_id'";
            if($result2 = $link ->query($sql2))
            {
                while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                {
                    $category = $rows2['category_title'];
                }
            }
            $sql2 = "SELECT * FROM subcategories WHERE subcat_id = '$subcategory_id'";
            if($result2 = $link ->query($sql2))
            {
                while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                {
                    $subcategory = $rows2['subcategory_title'];
                }
            }
        echo "<tr>
        <td>".$name."</td>
        <td>".$email."</td>
        <td>".$contact."</td>
        <td>".$category."</td>
        <td>".$subcategory."</td> 
        </tr>";
        }
    }
    else
    {
        echo "Unable to run query";
    }
}

function display_users()
{
    include ('../connection.php');
     $sql = "SELECT * FROM users";
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $name = $rows['name'];
            $username = $rows['username'];
            $email = $rows['email'];
            $contact = $rows['contact'];
        echo "<tr>
        <td>".$name."</td>
        <td>".$username."</td>
        <td>".$email."</td>
        <td>".$contact."</td> 
        </tr>";
        }
    }
    else
    {
        echo "Unable to run query";
    }
}


function displaycategoriesnum()
{
    include ('../connection.php');
     $sql = "SELECT * FROM categories";
    $count = 0;
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $count++;
        }
        echo $count;
    }
}

function display_requests()
{
    include ('../connection.php');
    $sql = "SELECT * FROM subscribers WHERE status = 'pending'";
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $id = $rows['subscriber_id'];
            $name = $rows['subscriber_name'];
            $email = $rows['subscriber_email'];
            $contact = $rows['subscriber_contact'];
            $category_id = $rows['category_id'];
            $subcategory_id = $rows['subcategory_id'];
            $city = $rows['city'];
            $sql2 = "SELECT * FROM categories WHERE cat_id = '$category_id'";
            if($result2 = $link ->query($sql2))
            {
                while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                {
                    $category = $rows2['category_title'];
                }
            }
            $sql2 = "SELECT * FROM subcategories WHERE subcat_id = '$subcategory_id'";
            if($result2 = $link ->query($sql2))
            {
                while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                {
                    $subcategory = $rows2['subcategory_title'];
                }
            }
            echo "<tr>
            <td>".$name."</td>
            <td>".$email."</td>
            <td>".$contact."</td>
            <td>".$category."</td>
            <td>".$subcategory."</td> 
            <td>".$city."</td> 
            <td><button id = 'approve' name = 'approve_".$id."' class = 'btn btn-success'>A</button> | | <button id = 'decline' name = 'decline_".$id."' class = 'btn btn-danger'>D</button></td> 
            </tr>";
        }

        }
    }

    function display_views()
    {
        include ('../connection.php');
        $sql = "SELECT * FROM viewed ORDER BY time DESC";
        if($result = $link ->query($sql))
        {
            while($rows = $result->fetch_array(MYSQLI_ASSOC))
            {
                $tid = $rows['tid'];
                $scid = $rows['scid'];
                $cid = $rows['cid'];
                $sql2 = "SELECT * FROM topics WHERE topic_id = '$tid'";
                if($result2 = $link ->query($sql2))
                {
                    while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                    {
                        $title = $rows2['title'];
                    }
                }
                $sql2 = "SELECT * FROM categories WHERE cat_id = '$cid'";
                if($result2 = $link ->query($sql2))
                {
                    while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                    {
                        $category = $rows2['category_title'];
                    }
                }
                $sql2 = "SELECT * FROM subcategories WHERE subcat_id = '$scid'";
                if($result2 = $link ->query($sql2))
                {
                    while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                    {
                        $subcategory = $rows2['subcategory_title'];
                    }
                }
                $viewed_by = $rows['viewed_by'];
                $viewed_of = $rows['viewed_of'];
                $subscriber = "<span style = 'color: green'><b>&nbsp;(SUBSCRIBER)</b></span>";
                if($tid == 0)
                {
                    $title = "N/A";
                    $viewed_of .= $subscriber; 
                }
                $time = $rows['time'];
                echo "<tr>
                <td>".$viewed_by."</td>
                <td>".$viewed_of."</td>
                <td>".$title."</td>
                <td>".$subcategory."</td>
                <td>".$category."</td> 
                <td>".$time."</td> 
                </tr>";
            }
        }
    }

function displaysubcategoriesnum()
{
    include ('../connection.php');
     $sql = "SELECT * FROM subcategories";
    $count = 0;
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $count++;
        }
        echo $count;
    }
}


function displaytopicsnum()
{
    include ('../connection.php');
     $sql = "SELECT * FROM topics";
    $count = 0;
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $count++;
        }
        echo $count;
    }
}

function displayaccordion()
{
    include ('../connection.php');
    $cat_acc = "";
    $sql = "SELECT * FROM categories";
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
            $category = $rows['category_title'];
            $cat_id = $rows['cat_id'];
            $cid = $rows['cat_id'];
            $catid = str_replace(' ', '_', $category);
            $sql2 = "SELECT * FROM subcategories WHERE parent_id = '$cat_id'";
                if($result2 = $link ->query($sql2))
                {
                    $subcat_acc = "";
                    while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
                    {
                        $subcategory = $rows2['subcategory_title'];
                        $subcat_id = $rows2['subcat_id'];
                        $scid = $rows2['subcat_id'];
                        $subcatid = str_replace(' ', '_', $subcategory);
                        $sql3 = "SELECT * FROM topics WHERE category_id = '$cat_id' AND subcategory_id = '$subcat_id'";
                        if($result3 = $link ->query($sql3))
                        {
                            $topic_acc = "";
                            while($rows3 = $result3->fetch_array(MYSQLI_ASSOC))
                            {
                                $topic = $rows3['title'];
                                $tid = $rows3['topic_id'];
                                $topicid = str_replace(' ', '_', $topic);
                                $topic_acc .= "$topic
                            <button id = 'delete_topic' name = 'delete_topic_".$tid."'  style ='float:right;'>Delete Topic</button>
                            <br><br>";
                            }
                        }
                        if($topic_acc == "")
                        {
                            $topic_acc .= "No topic in this subcategory yet";
                        }
                        $subcat_acc .= " <div class='card'>
                        <div class='card-header'>
                            <a href='#' data-toggle='collapse' data-target='#collapse_".$subcatid."'>$subcategory</a>
                            <button id = 'delete_subcat' name = 'delete_subcat_".$scid."' style ='float:right;'>Delete Sub-Category</button>
                        </div>
                        <div class='card-body collapse' data-parent='#child".$catid."' id='collapse_".$subcatid."'>
                            $topic_acc
                        </div>
                    </div>";
                    }
                }
            $cat_acc .= "<div class='card-header' id='headingOne'><h5 class='mb-0 d-inline'>
            <button class='btn btn-link' data-toggle='collapse' data-target='#collapse_".$catid."' aria-expanded='true' aria-controls='collapse_".$catid."'>
                        $category
                    </button>
                    <button id = 'delete_cat' name = 'delete_cat_".$cid."' style ='float:right;'>Delete Category</button></h5></div>
                           <div id='collapse_".$catid."' class='collapse' aria-labelledby='heading_".$catid."' data-parent='#accordion'>
                <div class='card-body' id='child".$catid."'>
                        $subcat_acc
                </div>
            </div>";
        }
    }
    echo "$cat_acc";
}
?>