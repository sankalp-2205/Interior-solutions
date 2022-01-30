<?php
	include ('layout_manager.php');
	include ('content_function.php');
	addview($_GET['cid'], $_GET['scid'], $_GET['tid']);
?>
<html>
<head><title>SE PROJECT - NKSS</title></head>
<link href="/styles/style2.css" type="text/css" rel="stylesheet" />
<link href="/styles/popup.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="wrapper wrapper-content animated fadeInRight">
			
						<div class="ibox-content m-b-sm border-bottom">
							<div class="p-xs">
								<div class="pull-left m-r-md">
									<i class="fa fa-globe text-navy mid-icon"></i>
                                </div>
                                    <h2>Welcome to our forum</h2>
                                <span>Feel free to choose topic you arere interested in.</span>
                                           <span style = "float:right; margin-top: -40px;">
			<?php			
				session_start();
				if (isset($_SESSION['username'])) {
					logout();
				} else {
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg_success') {
							echo "<h1 style='color: green;'>new user registered successfully!</h1>";
						} else if ($_GET['status'] == 'login_fail') {
							echo "<h1 style='color: red;'>invalid username and/or password!</h1>";
						}
					}
					loginform();
				}
			?></span>
							</div>
						</div>
			<?php
				replylink($_GET['cid'], $_GET['scid'], $_GET['tid']);
			?>
		<?php
			disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
			echo "<div class='comment-container row d-flex justify-content-center mt-50 mb-100' style = 'margin-left: 20%; margin-right: 20%;'>
			<div class='col-sm-12'>
				<div class='card'>
					<div class='card-body text-center'>
						<h4 class='card-title' style = 'float: left;'>All Replies (".countReplies($_GET['cid'], $_GET['scid'], $_GET['tid']).")</h4>
					</div>";
			dispreplies($_GET['cid'], $_GET['scid'], $_GET['tid']);
		?>
	</div>
			</div>
			</div>
			</div>
			</div>
			</div>
	<script src = "/login.js"></script>
	<script>
				const tid = <?php echo $_GET['tid']; ?>;
		 const scid = <?php echo $_GET['scid']; ?>;
		const cid = <?php echo $_GET['cid']; ?>;
		$('body').on('click', '#contact', function() {
			var name = this.name;
        values=name.split('_');
        author=values[1];
        $.ajax({
        url: '/view.php',
        type: 'POST',
		data: {author: author, tid: tid , scid: scid, cid: cid},
        success: function(data) {
			console.log(data);
			if(data == "failure")
			{
				alert("Something went wrong. Plz close the window");
			}
  },
  error: function() {
    alert("Something went wrong. Plz close the window");
  }
});  
		})

				
	
	</script>
</body>
</html>