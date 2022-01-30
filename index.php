<?php
	include ('layout_manager.php');
	include ('content_function.php');
?>
<html>
<head>
<!-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<style>
      df-messenger {
        --df-messenger-bot-message: #e9ebee;
        --df-messenger-font-color: black;
        --df-messenger-user-message: #42a5f5;
        --df-messenger-chat-background-color: #fafafa;
        --df-messenger-send-icon: white;
        --df-messenger-button-titlebar-color: black;
      }
    
     .list li
        {
            margin-left: 20px;
            list-style-type: disc;
            
        }
</style>
<df-messenger
  intent="WELCOME"
  chat-title="Interior_Solutions"
  agent-id="4c3b265f-aad2-4075-8f8b-1f163cb0735b"
  language-code="en"
></df-messenger> -->
<title>Forum</title>
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
    
    
    @media screen and (max-width: 992px){
        #recent_comments
        {
            margin-top: 80px;
        }
}
    
    
    
</style>
<link href="/styles/style2.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
    <li><a href="#">INTERIOR DESIGNING FORUM</a></li>
  </ul>
  <!-- <p class="navbar-text">Some text</p> -->
</nav>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
                        
        <div class="ibox-content forum-container"> 
        <div class='forum-item active'>
        <div class="row">
        <div class = "col-md-6">                
			<div class='row'>
               <h3> <b>Recent Topics</b></h3>
                <br>

				<div class='col-xs-12'>
                   <?php display_recent_topics() ?>                 
				</div>
			</div>
		</div>
        <div class = "col-md-6">
			<div class='row'>
                <h3 id = "recent_comments"><b>Recent Comments</b></h3>
                <br>
				    <div class='col-xs-12'>
                        <?php display_recent_comments() ?>
				</div>
			</div>
		</div>
        </div>
        </div>
        </div>
            
                        
                        
						<div class="ibox-content forum-container">
                        <h3> <b>Categories</b></h3>
                        <?php dispcategories() ?>
						</div>
					</div>
				</div>
			</div>
			</div>
    
    <section id="footer" style = "background-color : #f6f4f8" >
		<div class="container">
            <div class="row">
				<div style = "padding-top: 10px;" class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<h5>Software Construction PBL Project</h5>
				</div>
				<hr>
			</div>	
			<div class="row">
				<hr>
			</div>	
		</div>
	</section>


  <script>
      $("#login").click(function(event){
    event.preventDefault();
    var datatopost = $("#loginform").serializeArray();
    console.log(datatopost);
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
                    if(data == "nologinusername")
                    {
                      $("#loginusernameerror").text("Please enter the username");
                      $("#loginusernameerror").show();
                      $("#loginpassworderror").text("");
                    }
                    else if(data == "nologinpassword")
                    {
                      $("#loginusernameerror").text("");
                      $("#loginpassworderror").text("Please enter the password");
                      $("#loginpassworderror").show();
                    }
                    else if(data == "success")
                        {
                            location.reload(true)
                        }
                    else
                        {
                            $("#loginmessage").html(data);
                            $("#loginmessage").hide();
                            $("#loginmessage").fadeIn();
                            $("#loginusername").val("");
                            $("#loginpassword").val("");
                            $("#loginusernameerror").text("");
                            $("#loginpassworderror").text("");
                        }
        },
        error: function(){
            $("#loginmessage").html("<div class = 'alert alert-danger'>Issue with ajax call.Plz try later </div>");
            $("#loginmessage").hide();
            $("#loginmessage").fadeIn();
        }
    });
});
  </script>
</body>
</html>