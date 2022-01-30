<?php
	include ('layout_manager.php');
	include ('content_function.php');
?>
<html>
<head><title>Inki's PHP Forum Tutorial</title></head>
<link href="/styles/style2.css" type="text/css" rel="stylesheet" />
<link href="/styles/popup.css" type="text/css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link href="/styles/testimonial.css" type="text/css" rel="stylesheet" />
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<style>

   #list
    {
        background-color: black;
        float: right;
    }

    .navbar-custom
    {
        background-color: white;
    }
    #element
    {
        color : gray;
        font-size: 18px;
        padding-top: 25px;
        padding-bottom: 25px; 
        padding-left:20px; 
        padding-right:20px;
        
    }
    @media screen and (max-width: 765px){
    .navbar-collapse{
        margin-top: 25px;
        background-color : #f9f9f9;
    }
    
    #list
        {
            float: none;
            background-color: #f9f9f9;
        } 
        #element
    {
        color : gray;
        font-size: 15px;
        padding-top: 10px;
        padding-bottom: 10px; 
        padding-left:20px; 
        padding-right:20px;
        font-family: sans-serif;
        letter-spacing: 1.5px;
        
    }
}

</style>
<body>
<nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
    <li><a href="#">INTERIOR DESIGNING FORUM</a></li>
  </ul>
  <!-- <p class="navbar-text">Some text</p> -->
</nav>
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
			if (isset($_SESSION['username'])) {
				echo "<div class='content'><p><a class='button' style = 'color: black; float:right;' href='/newtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'>
					  Add New Topic</a></p></div>";
			}
		?>

	


				
                 

		<div class = "container mt-5">
		<h2><b>Topics</b></h2>
		<table id="topics" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
                <th>Topic</th>
                <th>Author</th>
                <th>Date -Posted</th>
                <th>Views</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
		<?php disptopics($_GET['cid'], $_GET['scid']); ?>
        </tbody>
        <tfoot>
            <tr>
				<th>Topic</th>
                <th>Author</th>
                <th>Date -Posted</th>
                <th>Views</th>
                <th>City</th>
            </tr>
        </tfoot>
    </table>
	</div>
			
	</div>
		</div>
		</div>
		<br><br>
		<!-- <h2><b>Our Subscribers</b></h2>

<div class="container">
<div class="row">
<div class="col-md-12">
	<div id="testimonial-slider" class="owl-carousel">
	<?php dispbanner($_GET['cid'], $_GET['scid']); ?>
	</div>
</div>
</div>
</div> -->
		</div>
		</div>
		</div>




		<!-- <footer id="footer" style = "background-color : #f6f4f8 ; margin-top: 60px;" >
		<div class="container">
            <div class="row">
				<div style = "padding-top: 10px;" class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<h4>Copyright © 2020 findinteriordesign | Powered By findinteriordesign</h4>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02">Home</a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02">About Us</a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02">Properties</a></li>
						<li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02">Agents</a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02">FAQ's</a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02">Contact</a></li>
					</ul>
				</div>
				<hr>
			</div>	
		</div>
	</footer> -->
	
	<script src="/login.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script>
			            $(document).ready(function() {
    				$('#topics').DataTable();
					} );


// <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
// <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
// <script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
});

$('body').on('click', '#subscriber_contact', function() {
	var name = this.name;
	var value = name.split('_');
	var subscriber = value[2];
	const scid = <?php echo $_GET['scid']; ?>;
	const cid = <?php echo $_GET['cid']; ?>;
	$.ajax({
            url: "/viewed_subscriber.php",
            type: "POST",
			data: {subscriber: subscriber,scid: scid, cid: cid},
            success: function (data) {
            console.log(data);
    },
    error: function () {
            alert("Something went wrong. Please try again later");
    },
             })
});

</script>
		</script>
</body>
</html>