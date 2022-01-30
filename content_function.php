<?php
	function dispcategories() {
		include ('dbconn.php');
		
		$select = mysqli_query($con, "SELECT * FROM categories");
		if (mysqli_num_rows($select) == 0)
		{
			echo "<p>Currently no categories available</p>";
		} 
		
		while ($row = mysqli_fetch_assoc($select)) {
			echo "<div class='forum-title'>
			<h3>".$row['category_title']."</h3>
			</div>";
			dispsubcategories($row['cat_id']);
		}
	}
	
	function dispsubcategories($parent_id) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT cat_id, subcat_id, subcategory_title, subcategory_desc FROM categories, subcategories 
									  WHERE ($parent_id = categories.cat_id) AND ($parent_id = subcategories.parent_id)");
        $add_topic_button = "";
		while ($row = mysqli_fetch_assoc($select)) {
                    if(array_key_exists("username",$_SESSION))
        {
            $add_topic_button = "<a href = '/newtopic.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."'>Add New Topic</a>";
        }
            else
            {
                $add_topic_button = "<a  href = '/newtopic.php/?cid=".$row['cat_id']."&scid=".$row['subcat_id']."' class='button'>Add New Topic</a>";
                
            }
			echo "
		<div class='forum-item active'>
			<div class='row'>
				<div class='col-xs-8'>
					<div class='forum-icon'>
						<i class='fa fa-star'></i>
					</div>
					<a href='/topics.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."' class='forum-item-title'>".$row['subcategory_title']."<br /></a>
					<div class='forum-sub-title'>".$row['subcategory_desc']."</div>
				</div>
				<div class='col-xs-1 forum-info'>
				<span class='views-number'>"
				.getnumtopics($parent_id, $row['subcat_id'])."
				</span>
				<div>
					<small>Topics</small>
				</div>
			</div>				<div class='col-xs-1 forum-info'>
			<span class='views-number'>"
			.getnumviews($parent_id, $row['subcat_id'])."
			</span>
			<div>
				<small>Views</small>
			</div>
		</div>
        <div class='col-xs-2 forum-info'>".$add_topic_button."
                
		</div>
			</div>
		</div>";
		}
	}
	
	function getnumtopics($cat_id, $subcat_id) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT category_id, subcategory_id FROM topics WHERE ".$cat_id." = category_id 
									  AND ".$subcat_id." = subcategory_id");
		return mysqli_num_rows($select);
	}

	function getnumviews($cat_id, $subcat_id) {
		include ('connection.php');
		$total_views = 0;
		$sql = "SELECT * FROM topics WHERE category_id = '$cat_id' AND subcategory_id = '$subcat_id'";
        if($result = $link ->query($sql))
        {
				while($rows = $result -> fetch_array(MYSQLI_ASSOC))
				{
					$total_views += $rows['views'];
				}
				return $total_views;			
		}
         else{
				return ("<div class='alert alert-danger'>Unable to return views</div>");
            }
		}
		
	function disptopics($cid, $scid) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT topic_id, author, title, date_posted, views,city FROM categories, subcategories, topics 
									  WHERE ($cid = topics.category_id) AND ($scid = topics.subcategory_id) AND ($cid = categories.cat_id)
									  AND ($scid = subcategories.subcat_id) ORDER BY topic_id DESC");
		if (mysqli_num_rows($select) != 0) {
			while ($row = mysqli_fetch_assoc($select)) {
				echo "<tr>
            <td><a href='/readtopic.php?cid=".$cid."&scid=".$scid."&tid=".$row['topic_id']."'>".$row['title']."</a></td>
            <td>".$row['author']."</td>
            <td>".$row['date_posted']."</td>
            <td>".$row['views']."</td> 
			<td>".$row['city']."</td>
			</tr>";
			}
		} else {
			echo "<p>this category has no topics yet!  <a href='/newtopic.php?cid=".$cid."&scid=".$scid."'>
				 add the very first topic like a boss!</a></p>";
		}
	}

	function dispbanner($cid , $scid)
	{
		include('connection.php');
		$sql = "SELECT * FROM categories WHERE cat_id = '$cid'";
		if($result = $link ->query($sql))
		{
			while($rows = $result->fetch_array(MYSQLI_ASSOC))
			{
				$category = $rows['category_title'];
			}
		}
		$sql = "SELECT * FROM subcategories WHERE subcat_id = '$scid'";
		if($result = $link ->query($sql))
		{
			while($rows = $result->fetch_array(MYSQLI_ASSOC))
			{
				$subcategory = $rows['subcategory_title'];
			}
		}
		$sql = "SELECT * FROM subscribers WHERE category_id = '$cid' AND subcategory_id = '$scid' AND status = 'active'";
		if($result = $link ->query($sql))
		{
			while($rows = $result->fetch_array(MYSQLI_ASSOC))
			{
				$id = $rows['subscriber_id'];
				echo "
				<div class='testimonial'>
					<h3 class='title'>".$rows['subscriber_name']."
						<span class='post'>- ".$rows['city']."</span>
					</h3>
					<p class='description'>";
					if(!array_key_exists("username",$_SESSION))
					{
    					echo "<p>Please Login To see the contact details</p>";
					}
					else
					{
						echo "
						<a class='button' id = 'subscriber_contact' name = 'suscriber_contact_".$id."' style = 'color: black' href='#popup_".$id."'>View Contact</a>
						<div id='popup_".$id."' class='overlay'>
 						<div class='popup'>
 						<h2>".$rows['subscriber_name']."</h2>
 					<a class='close' href='#'>×</a>
 					<div class='content'>
 					This subscriber deals with ".$subcategory."
 					<ul>
 					<li><b>Email : </b>". $rows['subscriber_email']."</li>
 					<li><b>Contact: </b>".$rows['subscriber_contact']."</li>
 					<li><b>City:</b>".$rows['city']."</li>
 					</ul>
 					</div>
 					</div>
					</div>";
					}
					echo "</p>
					</div>";
			}
		}
	}
	
	function disptopic($cid, $scid, $tid) {
		include ('dbconn.php');
		include('connection.php');
		$select = mysqli_query($con, "SELECT cat_id, subcat_id, topic_id, author, title, content,city,contact, date_posted FROM 
									  categories, subcategories, topics WHERE ($cid = categories.cat_id) AND
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id)");
		$row = mysqli_fetch_assoc($select);
		$author = $row['author'];
		$avatar = "";
		$sql = "SELECT * FROM users WHERE username = '$author'";
		if($result = $link ->query($sql))
		{
			while($rows = $result->fetch_array(MYSQLI_ASSOC))
			{
				$avatar = $rows['avatar'];
			}
		}
		echo "<div class='comment-container row' style = 'margin-left: 15%; margin-right: 15%;'>
		<div class='col-sm-12'>
			<div class='panel panel-default'>
				<div class='panel-body'>
				   <section class='post-heading'>
						<div class='row'>
							<div class='col-md-11'>
								<div class='media'>
								  <div class='media-left'>
									<a href='#'>
									  <img class='media-object photo-profile' src='/images/".$avatar.".jpg' width='40' height='40' alt='...'>
									</a>
								  </div>
								  <div class='media-body'>
									<a href='#' class='anchor-username'><h4 class='media-heading'>".$row['author']."</h4></a>";
									if(array_key_exists("username",$_SESSION))
									{
    									echo "<a  href='#aboutModal' data-toggle='modal' data-target='#myModal_".$row['author']."' class = 'btn btn-success btn-sm' id = 'contact' name = 'contact_".$row['author']."'>View Contact</a>";
									}
									echo "
									<span href='#' class='anchor-time'><b>".$row['date_posted']."</b></span>
								  </div>
								</div>
							</div>
						</div>             
				   </section>
				   <br>
				   <section class='post-body'>
					   <p>".$row['content']."</p>
				   </section>
				</div>
			</div>   
		</div>
	</div>
	<div class='modal fade' id='myModal_".$row['author']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
				<h4 class='modal-title' id='myModalLabel'>More About Author</h4>
				</div>
			<div class='modal-body'>
				<center>
				<h3 class='media-heading'>".$row['author']."- <small>".$row['city']."</small></h3>
				<span><strong>Contact: </strong></span>
					<span class='label label-warning'>".$row['contact']."</span>
				</center>
				<hr>
				<center>
				<p class='text-left'><strong>Requirement: </strong><br>
					".$row['content']."</p>
				<br>
				</center>
			</div>
			<div class='modal-footer'>
				<center>
				<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</center>
			</div>
		</div>
	</div>
</div>";
	}

	function disp_allsubscribers()
	{
		session_start();
		include('connection.php');
		$sql = "SELECT * FROM subscribers WHERE status = 'active'";
		if($result = $link ->query($sql))
		{
			$content = "";
			while($rows = $result->fetch_array(MYSQLI_ASSOC))
			{
				$content .="Here";
				$id = $rows['subscriber_id'];
				$name = $rows['subscriber_name'];
				$email = $rows['subscriber_email'];
				$contact = $rows['subscriber_contact'];
				// if($rows['link'] !== "")
				// {
				// 	$url = $rows['link'];
				// }
				// else
				// {
				// 	$url = "Not Available";
				// }
				
				$city = $rows['city'];
				$cid = $rows['category_id'];
				$scid = $rows['subcategory_id'];
				echo "";
				$sql2 = "SELECT * FROM subcategories WHERE subcat_id = '$scid'";
				if($result2 = $link ->query($sql2))
				{
					while($rows2 = $result2->fetch_array(MYSQLI_ASSOC))
					{
						$subcategory = $rows2['subcategory_title'];
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
				echo "<tr>
				<td>".$name."</td>
				<td>".$category."</td>
				<td>".$subcategory."</td>
				<td>".$city."</td> ";
				if(!array_key_exists("username",$_SESSION))
				{
					echo "<td><a data-toggle='modal' data-target='#login-modal'>Get Contact</a></td>";
				}
				else
				{
				echo "
				<td><a id = 'allsubscibers_contact' name = 'allsubscibers_contact_".$id."_".$cid."_".$scid."' data-toggle='modal' data-target='#allsubscribers_contact_".$id."'>Get Contact</a></td>";
				}
				echo"
				</tr>
				<div class='modal fade' id='allsubscribers_contact_".$id."' role='dialog'>
				<div class='modal-dialog'>
				
				  <div class='modal-content'>
					<div class='modal-header'>
					  <button type='button' class='close' data-dismiss='modal'>×</button>
					  <h4 class='modal-title'>".$name."</h4>
					</div>
					<div class='modal-body'>
					<ul>
					<li><b>Email: </b>".$email."</li>
					<li><b>Phone: </b>".$contact."</li>
					<li><b>City: </b>".$city."</li>
					<li><b>Deals with:</b>  ".$subcategory."</li>
					</ul>
					</div>
					<div class='modal-footer'>
					  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
					</div>
				  </div>
				  
				</div>
			  </div>";
			}
		}
	}
	
	function addview($cid, $scid, $tid) {
		include ('dbconn.php');
		$update = mysqli_query($con, "UPDATE topics SET views = views + 1 WHERE category_id = ".$cid." AND
									  subcategory_id = ".$scid." AND topic_id = ".$tid."");
	}
	
	function replylink($cid, $scid, $tid) {
		
		echo "<p><a style = 'color: black; margin-left: 20px;' class = 'button' href='/replyto.php?cid=".$cid."&scid=".$scid."&tid=".$tid."'>Reply to this post</a></p>";
	}
	
	function replytopost($cid, $scid, $tid) {
		include('connection.php');
		$avatar = "";
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM users WHERE username = '$username'";
		if($result = $link ->query($sql))
		{
			while($rows = $result->fetch_array(MYSQLI_ASSOC))
			{
				$avatar = $rows['avatar'];
			}
		}
		echo "<div class='containers px-10 py-10 mx-auto' style = 'margin-left: 20%; margin-right: 20%;'>
		<div class='row d-flex justify-content-center'>
			<div class='card-2 col-sm-12'>
				<div class='row px-3'> <img class='profile-pic mr-3' src='/images/".$avatar.".jpg'>
					<div class='flex-column'>
						<h3 class='mb-0 font-weight-normal'>".$_SESSION['username']."</h3> 
					</div>
				</div>
				<form action='/addreply.php' method='POST'>
				<input type = 'hidden' id='cid' name='cid' value='$cid' />
				<input type = 'hidden' id='scid' name='scid' value='$scid' />
				<input type = 'hidden' id='tid' name='tid' value='$tid' />
				<div class='row px-3 form-group'> <textarea name = 'comment' class='text-muted bg-light mt-4 mb-3' placeholder='Hi ".$_SESSION['username'].",what's on your mind today?'></textarea> </div>
				<div class='col-sm-12 px-3'>
					<div><input type = 'submit' class='btn btn-success ml-auto' value='Add Comment' /></div>
				</div>
				</form>
			</div>
		</div>
	</div>";
	}
	
	function dispreplies($cid, $scid, $tid) {
		include ('dbconn.php');
		include('connection.php');
		$select = mysqli_query($con, "SELECT replies.author, comment, replies.date_posted FROM categories, subcategories, 
									  topics, replies WHERE ($cid = replies.category_id) AND ($scid = replies.subcategory_id)
									  AND ($tid = replies.topic_id) AND ($cid = categories.cat_id) AND 
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id) ORDER BY reply_id");
		if (mysqli_num_rows($select) != 0) {
			while ($row = mysqli_fetch_assoc($select)) {
				$author = $row['author'];
				$avatar = "";
				$sql = "SELECT * FROM users WHERE username = '$author'";
				if($result = $link ->query($sql))
				{
					while($rows = $result->fetch_array(MYSQLI_ASSOC))
					{
						$avatar = $rows['avatar'];
					}
				}
			echo "
					<div class='comment-widgets' style = 'background-color: rgba(0, 0, 0, 0.05)'>
						<div class='d-flex flex-row comment-row'>
							<div class='p-2'><img src='/images/".$avatar.".jpg' alt='user' height = '30' width='40' class='rounded-circle'></div>
							<div class='comment-text w-100'>
								<h6 class='font-medium'>".$row['author']."</h6> <span class='m-b-15 d-block'>".$row['comment']."</span>
								<div class='comment-footer'> <span class='text-muted float-right'>".$row['date_posted']."</span> </div>
							</div>
						</div>
					</div>";
			}
			echo "</div>
			</div>
		</div>";
		}
	}
	
	function countReplies($cid, $scid, $tid) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT category_id, subcategory_id, topic_id FROM replies WHERE ".$cid." = category_id AND 
									  ".$scid." = subcategory_id AND ".$tid." = topic_id");
		return mysqli_num_rows($select);
	}

    function display_recent_topics()
    {
        include ('connection.php');
        $count = 0;
        $sql = "SELECT * FROM topics ORDER BY topic_id DESC";
        if($result = $link ->query($sql))
        {
			if($result -> num_rows == 0)
			{
				echo "<p>No recent topics available</p>";
			}
            while($rows = $result->fetch_array(MYSQLI_ASSOC))
            {
                $cat_id = $rows['category_id'];
                $subcat_id =   $rows['subcategory_id'];
                $topic_id = $rows['topic_id'];
                $topic = $rows['title'];
                $content = $rows['content'];
                $count++;
                if($count < 4)
                {
                echo "
                <div class='forum-icon'>
						<i class='fa fa-star'></i>
					</div>
					<a href='/readtopic.php?cid=".$cat_id."&scid=".$subcat_id."&tid=".$topic_id."' class='forum-item-title'>".$topic."<br /></a>
					<div class='forum-sub-title'>".$content."</div>
                    <hr>";
                
            }
        }         
    }
    }

        function display_recent_comments()
    {
        include ('connection.php');
        $count = 0;
        $sql = "SELECT * FROM replies ORDER BY reply_id DESC";
        if($result = $link ->query($sql))
        {
			if($result -> num_rows == 0)
			{
				echo "<p>No recent comments available</p>";
			}
            while($rows = $result->fetch_array(MYSQLI_ASSOC))
            {
                $subcat_id = $rows['subcategory_id'];
                $cat_id =   $rows['category_id'];
                $topic_id = $rows['topic_id'];
                $reply_id = $rows['reply_id'];
                $author = $rows['author'];
                $comment = $rows['comment'];
                $count++;
                if($count < 4)
                {
                echo "
				   <div class='forum-icon'>
						  <i class='fa fa-star'></i>
					   </div>
					<a href='/readtopic.php?cid=".$cat_id."&scid=".$subcat_id."&tid=".$topic_id."' class='forum-item-title'>".$comment."<br /></a>
					<div class='forum-sub-title'>".$author." - Pune</div>
                        <hr>";
                
            }
        }         
    }
	}
	
	function displayallcategories()
{
    include ('connection.php');
	 $sql = "SELECT * FROM categories";
	 $categories = "";
    if($result = $link ->query($sql))
    {
        while($rows = $result->fetch_array(MYSQLI_ASSOC))
        {
			$category = $rows['category_title'];
			$categories .= "<option>$category</option>";
		}
		echo $categories;
    }
    else
    {
        echo "Unable to run query";
    }
}


?>





















