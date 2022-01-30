<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <style>
            body {
    padding-top:100px;
}
fieldset {
    border: thin solid #ccc; 
    border-radius: 4px;
    padding: 20%;
    padding-left: 20%;
    background: #fbfbfb;
}
legend {
   color: #678;
}
.form-control {
    width: 95%;
}
label small {
    color: #678 !important;
}
span.req {
    color:maroon;
    font-size: 112%;
}
@media only screen and (min-width: 991px) {
    #box
    {
        padding-left: 17%; 
        padding-right: 17%;
    }
}


        </style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="/styles/navbar.css" type="text/css" rel="stylesheet" />
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
    
<div class="container" >
<legend class="text-center">Valid information is required to register. <span class="req"><small> required *</small></span></legend>
	<div class="row" id = "box" style ="">
        <div class="col-md-12">
            <form action="" method="post" id="fileForm" role="form">
            <fieldset>


            <div class = "row">
                <div class = "col-md-6">
                <div class="form-group"> 	 
                <label for="name"><span class="req">* </span> Full name: </label>
                    <input class="form-control" type="text" name="name" id = "txt" onkeyup = "Validate(this)" required /> 
                        <div id="errFirst"></div>    
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="username"><span class="req">* </span> User name:  <small>This will be your login user name</small> </label> 
                    <input class="form-control" type="text" name="username" id = "txt" onkeyup = "Validate(this)" placeholder="minimum 6 letters" required />  
                        <div id="errusername"></div>
            </div>
                </div>
            </div>
    
            <div class="form-group">
                <label for="email"><span class="req">* </span> Email Address: </label> 
                    <input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />   
                        <div class="status" id="status"></div>
            </div>

            <div class="form-group">
            <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
                    <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="9876543210"/> 
                    <div id="phoneerr"></div>
            </div>

            <div class="row">
                <div class="col-md-6">
            <div class="form-group">
                <label for="password"><span class="req">* </span> Password: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>
            </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="password"><span class="req">* </span> Password Confirm: </label>
                    <input required name="password2" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
                        <span id="confirmMessage" class="confirmMessage"></span>
            </div>
                </div>
            </div>

            <div class="form-group">

                <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
            </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
            </div>
 
            </fieldset>
            </form><!-- ends register form -->

<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
        </div><!-- ends col-6 -->
   

	</div>
</div>
<script>
    function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 

// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}

function validatephone(phone) 
{
    var maintainplus = '';
    var numval = phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    phone.focus;
}

// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML	= "<span class='valid'>Thanks, you have entered a valid Email address!</span>";	
    }
}

$("#fileForm").submit(function (event) {
            event.preventDefault();
            var datatopost = $("#fileForm").serializeArray();
                     $.ajax({
                     url: "/adduser.php",
                     type: "POST",
                     data: datatopost,
                     success: function (data) {
                        if(data == 'passwordsdidnotmatch')
                        {
                            var message = document.getElementById('confirmMessage');
                            var badColor = "#ff6666";
                            pass2.style.backgroundColor = badColor;
                            message.style.color = badColor;
                            message.innerHTML = "Passwords Do Not Match!";
                        }
                        if(data == "usernameexists")
                        {
                            document.getElementById("errusername").innerHTML	= "<span class='valid'>This username already exists</span>";	
                            document.getElementById('confirmMessage').innerHTML = "";
                            document.getElementById("status").innerHTML	= "";
                            document.getElementById("phoneerr").innerHTML	= "";
                        }
                        if(data == "toosmall")
                        {
                            document.getElementById("errusername").innerHTML	= "<span class='valid'>Username too small</span>";	
                            document.getElementById('confirmMessage').innerHTML = "";
                            document.getElementById("status").innerHTML	= "";
                            document.getElementById("phoneerr").innerHTML	= "";
                        }
                        if(data == "emailexists")
                        {
                            document.getElementById("status").innerHTML	= "<span class='valid'>This email already exists</span>";
                            document.getElementById("phoneerr").innerHTML = "";	
                            document.getElementById("errusername").innerHTML = "";
                            document.getElementById('confirmMessage').innerHTML = "";
                        }
                        if(data == "contactexists")
                        {
                            document.getElementById("status").innerHTML	= "";
                            document.getElementById("phoneerr").innerHTML	= "<span class='valid'>This contact number already exists</span>";
                            document.getElementById("errusername").innerHTML = "";
                            document.getElementById('confirmMessage').innerHTML = "";
                        }
                        if(data == "toosmallcontact")
                        {
                            document.getElementById("status").innerHTML	= "";
                            document.getElementById("phoneerr").innerHTML	= "<span class='valid'>Contact number should have 10 digits</span>";
                            document.getElementById("errusername").innerHTML = "";
                            document.getElementById('confirmMessage').innerHTML = "";
                        }
                        if(data == "success")
                        {
                            location.href = '/index.php';
                        }
    },
    error: function () {
            alert("Can't register right now. Plz try Later");
    },
             })
    })


</script>
</body>
</html>