<?php
	include ('layout_manager.php');
	include ('content_function.php');
?>
<html>
<head><title>Forum</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"/>
	<link href="/styles/navbar.css" type="text/css" rel="stylesheet" />
	<link href="/styles/login.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>


</head>
<style>


#success_message{ display: none;}
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
                                    <h2><b>Welcome to our forum</b></h2>
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
					echo 
					"<div class='container' style = 'margin-top : 50px;'>
    <form class=' form-horizontal' action='/addnewtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."' method='POST'  id='post_form'>
	<fieldset>
	
	<!-- Form Name -->
	<legend>Post Your Topic</legend>
	
	<!-- Text input-->
	
	<div class='form-group'>
	  <label class='col-md-4 control-label'>Title</label>  
	  <div class='col-md-4 inputGroupContainer'>
	  <div class='input-group'>
	  <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
	  <input  name='topic' placeholder='Title' class='form-control' id = 'title' type='text'>
		</div>
	  </div>
	</div>
	
	
		   
	<div class='form-group'>
	  <label class='col-md-4 control-label'>Phone </label>  
		<div class='col-md-4 inputGroupContainer'>
		<div class='input-group'>
			<span class='input-group-addon'><i class='glyphicon glyphicon-earphone'></i></span>
	  <input name='phone'  pattern='[1-9]{1}[0-9]{9}' placeholder='9876543210' class='form-control' type='text'>
		</div>
	  </div>
	</div>
	   
	<div class='form-group'> 
	  <label class='col-md-4 control-label'>City</label>
		<div class='col-md-4 selectContainer'>
		<div class='input-group'>
			<span class='input-group-addon'><i class='glyphicon glyphicon-list'></i></span>
		<select name='city' class='form-control selectpicker' >
		 <option value=' ' selected>Please select your city</option>
		  <option>Adilabad</option>
		  <option>Agra</option>
		  <option>Ahmedabad</option>
		  <option>Ahmednagar</option>
		  <option>Aizawl</option>
		  <option>Ajitgarh (Mohali)</option>
		  <option>Ajmer</option>
		  <option>Akola</option>
		  <option>Alappuzha</option>
		  <option>Aligarh</option>
		  <option>Alirajpur</option>
		  <option>Allahabad</option>
		  <option>Almora</option>
		  <option>Alwar</option>
		  <option>Ambala</option>
		  <option>Ambedkar Nagar</option>
		  <option>Amravati</option>
		  <option>Amreli district</option>
		  <option>Amritsar</option>
		  <option>Anand</option>
		  <option>Anantapur</option>
		  <option>Anantnag</option>
		  <option>Angul</option>
		  <option>Anjaw</option>
		  <option>Anuppur</option>
		  <option>Araria</option>
		  <option>Ariyalur</option>
		  <option>Arwal</option>
		  <option>Ashok Nagar</option>
		  <option>Auraiya</option>
		  <option>Aurangabad</option>
		  <option>Aurangabad</option>
		  <option>Azamgarh</option>
		  <option>Badgam</option>
		  <option>Bagalkot</option>
		  <option>Bageshwar</option>
		  <option>Bagpat</option>
		  <option>Bahraich</option>
		  <option>Baksa</option>
		  <option>Balaghat</option>
		  <option>Balangir</option>
		  <option>Balasore</option>
		  <option>Ballia</option>
		  <option>Balrampur</option>
		  <option>Banaskantha</option>
		  <option>Banda</option>
		  <option>Bandipora</option>
		  <option>Bangalore Rural</option>
		  <option>Bangalore Urban</option>
		  <option>Banka</option>
		  <option>Bankura</option>
		  <option>Banswara</option>
		  <option>Barabanki</option>
		  <option>Baramulla</option>
		  <option>Baran</option>
		  <option>Bardhaman</option>
		  <option>Bareilly</option>
		  <option>Bargarh (Baragarh)</option>
		  <option>Barmer</option>
		  <option>Barnala</option>
		  <option>Barpeta</option>
		  <option>Barwani</option>
		  <option>Bastar</option>
		  <option>Basti</option>
		  <option>Bathinda</option>
		  <option>Beed</option>
		  <option>Begusarai</option>
		  <option>Belgaum</option>
		  <option>Bellary</option>
		  <option>Betul</option>
		  <option>Bhadrak</option>
		  <option>Bhagalpur</option>
		  <option>Bhandara</option>
		  <option>Bharatpur</option>
		  <option>Bharuch</option>
		  <option>Bhavnagar</option>
		  <option>Bhilwara</option>
		  <option>Bhind</option>
		  <option>Bhiwani</option>
		  <option>Bhojpur</option>
		  <option>Bhopal</option>
		  <option>Bidar</option>
		  <option>Bijapur</option>
		  <option>Bijapur</option>
		  <option>Bijnor</option>
		  <option>Bikaner</option>
		  <option>Bilaspur</option>
		  <option>Bilaspur</option>
		  <option>Birbhum</option>
		  <option>Bishnupur</option>
		  <option>Bokaro</option>
		  <option>Bongaigaon</option>
		  <option>Boudh (Bauda)</option>
		  <option>Budaun</option>
		  <option>Bulandshahr<option></option>
		  <option>Buldhana<option>
		  <option>Bundi<option>
		  <option>Burhanpur<option>
		  <option>Buxar<option>
		  <option>Cachar<option>
		  <option>Central Delhi</option>
		  <option>Chamarajnagar</option>
		  <option>Chamba</option>
		  <option>Chamoli</option>
		  <option>Champawat</option>
		  <option>Champhai</option>
		  <option>Chandauli</option>
		  <option>Chandel</option>
		  <option>Chandigarh</option>
		  <option>Chandrapur</option>
		  <option>Changlang</option>
		  <option>Chatra</option>
		  <option>Chennai</option>
		  <option>Chhatarpur</option>
		  <option>Chhatrapati Shahuji Maharaj Nagar </option>
		  <option>Chhindwara</option>
		  <option>Chikkaballapur</option>
		  <option>Chikkamagaluru</option>
		  <option>Chirang</option>
		  <option>Chitradurga</option>
		  <option>Chitrakoot</option>
		  <option>Chittoor</option>
		  <option>Chittorgarh</option>
		  <option>Churachandpur</option>
		  <option>Churu</option>
		  <option>Coimbatore</option>
		  <option>Cooch Behar</option>
		  <option>Cuddalore</option>
		  <option>Cuttack</option>
		  <option>Dadra and Nagar Haveli</option>
		  <option>Dahod</option>
		  <option>Dakshin Dinajpur</option>
		  <option>Dakshina Kannada</option>
		  <option>Daman</option>
		  <option>Damoh</option>
		  <option>Dantewada</option>
		  <option>Darbhanga</option>
		  <option>Darjeeling</option>
		  <option>Darrang</option>
		  <option>Datia</option>
		  <option>Dausa</option>
		  <option>Davanagere</option>
		  <option>Debagarh (Deogarh)</option>
		  <option>Dehradun</option>
		  <option>Deoghar</option>
		  <option>Deoria</option>
		  <option>Dewas</option>
		  <option>Dhalai</option>
		  <option>Dhamtari</option>
		  <option>Dhanbad</option>
		  <option>Dhar</option>
		  <option>Dharmapu</option>ri
		  <option>Dharwad</option>
		  <option>Dhemaji</option>
		  <option>Dhenkanal</option>
		  <option>Dholpur</option>
		  <option>Dhubri</option>
		  <option>Dhule</option>
		  <option>Dibang Valley</option>
		  <option>Dibrugarh</option>
		  <option>Dima Hasao</option>
		  <option>Dimapur</option>
		  <option>Dindigul</option>
		  <option>Dindori</option>
		  <option>Diu</option>
		  <option>Doda</option>
		  <option>Dumka</option>
		  <option>Dungapur</option>
		  <option>Durg</option>
		  <option>East Champaran</option>
		  <option>East Delhi</option>
		  <option>East Garo Hills</option>
		  <option>East Khasi Hills</option>
		  <option>East Siang</option>
		  <option>East Sikkim</option>
		  <option>East Singhbhum</option>
		  <option>Eluru</option>
		  <option>Ernakulam</option>
		  <option>Erode</option>
		  <option>Etah</option>
		  <option>Etawah</option>
		  <option>Faizabad</option>
		  <option>Faridabad</option>
		  <option>Faridkot</option>
		  <option>Farrukhabad</option>
		  <option>Fatehabad</option>
		  <option>Fatehgarh Sahib</option>
		  <option>Fatehpur</option>
		  <option>Fazilka</option>
		  <option>Firozabad</option>
		  <option>Firozpur</option>
		  <option>Gadag</option>
		  <option>Gadchiroli</option>
		  <option>Gajapati</option>
		  <option>Ganderbal</option>
		  <option>Gandhinagar</option>
		  <option>Ganganagar</option>
		  <option>Ganjam</option>
		  <option>Garhwa</option>
		  <option>Gautam Buddh Nagar</option>
		  <option>Gaya</option>
		  <option>Ghaziabad</option>
		  <option>Ghazipur</option>
		  <option>Giridih</option>
		  <option>Goalpara</option>
		  <option>Godda</option>
		  <option>Golaghat</option>
		  <option>Gonda</option>
		  <option>Gondia</option>
		  <option>Gopalganj</option>
		  <option>Gorakhpur</option>
		  <option>Gulbarga</option>
		  <option>Gumla</option>
		  <option>Guna</option>
		  <option>Guntur</option>
		  <option>Gurdaspur</option>
		  <option>Gurgaon</option>
		  <option>Gwalior</option>
		  <option>Hailakandi</option>
		  <option>Hamirpur</option>
		  <option>Hamirpur</option>
		  <option>Hanumangarh</option>
		  <option>Harda</option>
		  <option>Hardoi</option>
		  <option>Haridwar</option>
		  <option>Hassan</option>
		  <option>Haveri district</option>
		  <option>Hazaribag</option>
		  <option>Hingoli</option>
		  <option>Hissar</option>
		  <option>Hooghly</option>
		  <option>Hoshangabad</option>
		  <option>Hoshiarpur</option>
		  <option>Howrah</option>
		  <option>Hyderabad</option>
		  <option>Hyderabad</option>
		  <option>Idukki</option>
		  <option>Imphal East</option>
		  <option>Imphal West</option>
		  <option>Indore</option>
		  <option>Jabalpur</option>
		  <option>Jagatsinghpur</option>
		  <option>Jaintia Hills</option>
		  <option>Jaipur</option>
		  <option>Jaisalmer</option>
		  <option>Jajpur</option>
		  <option>Jalandhar</option>
		  <option>Jalaun</option>
		  <option>Jalgaon</option>
		  <option>Jalna</option>
		  <option>Jalore</option>
		  <option>Jalpaiguri</option>
		  <option>Jammu</option>
		  <option>Jamnagar</option>
		  <option>Jamtara</option>
		  <option>Jamui</option>
		  <option>Janjgir-Champa</option>
		  <option>Jashpur</option>
		  <option>Jaunpur district</option>
		  <option>Jehanabad</option>
		  <option>Jhabua</option>
		  <option>Jhajjar</option>
		  <option>Jhalawar</option>
		  <option>Jhansi</option>
		  <option>Jharsuguda</option>
		  <option>Jhunjhunu</option>
		  <option>Jind</option>
		  <option>Jodhpur</option>
		  <option>Jorhat</option>
		  <option>Junagadh</option>
		  <option>Jyotiba Phule Nagar</option>
		  <option>Kabirdham (formerly Kawardha)</option> 
		  <option>Kadapa</option>
		  <option>Kaimur</option>
		  <option>Kaithal</option>
		  <option>Kakinada</option>
		  <option>Kalahandi</option>
		  <option>Kamrup</option>
		  <option>Kamrup Metropolitan</option>
		  <option>Kanchipuram</option>
		  <option>Kandhamal</option>
		  <option>Kangra</option>
		  <option>Kanker</option>
		  <option>Kannauj</option>
		  <option>Kannur</option>
		  <option>Kanpur</option>
		  <option>Kanshi Ram Nagar</option>
		  <option>Kanyakumari</option>
		  <option>Kapurthala</option>
		  <option>Karaikal</option>
		  <option>Karauli</option>
		  <option>Karbi Anglong</option>
		  <option>Kargil</option>
		  <option>Karimganj</option>
		  <option>Karimnagar</option>
		  <option>Karnal</option>
		  <option>Karur</option>
		  <option>Kasaragod</option>
		  <option>Kathua</option>
		  <option>Katihar</option>
		  <option>Katni</option>
		  <option>Kaushambi</option>
		  <option>Kendrapara</option>
		  <option>Kendujhar (Keonjhar)</option>
		  <option>Khagaria</option>
		  <option>Khammam</option>
		  <option>Khandwa (East Nimar)</option>
		  <option>Khargone (West Nimar)</option>
		  <option>Kheda</option>
		  <option>Khordha</option>
		  <option>Khowai</option>
		  <option>Khunti</option>
		  <option>Kinnaur</option>
		  <option>Kishanganj</option>
		  <option>Kishtwar</option>
		  <option>Kodagu</option>
		  <option>Koderma</option>
		  <option>Kohima</option>
		  <option>Kokrajhar</option>
		  <option>Kolar</option>
		  <option>Kolasib</option>
		  <option>Kolhapur</option>
		  <option>Kolkata</option>
		  <option>Kollam</option>
		  <option>Koppal</option>
		  <option>Koraput</option>
		  <option>Korbav</option>
		  <option>Koriyav</option>
		  <option>Kota</option>
		  <option>Kottayam</option>
		  <option>Kozhikode</option>
		  <option>Krishna</option>
		  <option>Kulgam</option>
		  <option>Kullu</option>
		  <option>Kupwara</option>
		  <option>Kurnool</option>
		  <option>Kurukshetra</option>
		  <option>Kurung Kumey</option>
		  <option>Kushinagar</option>
		  <option>Kutch</option>
		  <option>Lahaul and Spiti</option>
		  <option>Lakhimpur</option>
		  <option>Lakhimpur Kheri</option>
		  <option>Lakhisarai</option>
		  <option>Lalitpur</option>
		  <option>Latehar</option>
		  <option>Latur</option>
		  <option>Lawngtlai</option>
		  <option>Leh</option>
		  <option>Lohardaga</option>
		  <option>Lohit</option>
		  <option>Lower Dibang Valley</option>
		  <option>Lower Subansiri</option>
		  <option>Lucknow</option>
		  <option>Ludhiana</option>
		  <option>Lunglei</option>
		  <option>Madhepura</option>
		  <option>Madhubani</option>
		  <option>Madurai</option>
		  <option>Mahamaya Nagar</option>
		  <option>Maharajganj</option>
		  <option>Mahasamund</option>
		  <option>Mahbubnagar</option>
		  <option>Mahe</option>
		  <option>Mahendragarh</option>
		  <option>Mahoba</option>
		  <option>Mainpuri</option>
		  <option>Malappuram</option>
		  <option>Maldah</option>
		  <option>Malkangiri</option>
		  <option>Mamit</option>
		  <option>Mandi</option>
		  <option>Mandla</option>
		  <option>Mandsaur</option>
		  <option>Mandya</option>
		  <option>Mansa</option>
		  <option>Marigaon</option>
		  <option>Mathura</option>
		  <option>Mau</option>
		  <option>Mayurbhanj</option>
		  <option>Medak</option>
		  <option>Meerut</option>
		  <option>Mehsana</option>
		  <option>Mewat</option>
		  <option>Mirzapur</option>
		  <option>Moga</option>
		  <option>Mokokchung</option>
		  <option>Mon</option>
		  <option>Moradabad</option>
		  <option>Morena</option>
		  <option>Mumbai City</option>
		  <option>Mumbai suburban</option>
		  <option>Munger</option>
		  <option>Murshidabad</option>
		  <option>Muzaffarnagar</option>
		  <option>Muzaffarpur</option>
		  <option>Mysore</option>
		  <option>Nabarangpur</option>
		  <option>Nadia</option>
		  <option>Nagaon</option>
		  <option>Nagapattinam</option>
		  <option>Nagaur</option>
		  <option>Nagpur</option>
		  <option>Nainital</option>
		  <option>Nalanda</option>
		  <option>Nalbari</option>
		  <option>Nalgonda</option>
		  <option>Namakkal</option>
		  <option>Nanded</option>
		  <option>Nandurbar</option>
		  <option>Narayanpur</option>
		  <option>Narmada</option>
		  <option>Narsinghpur</option>
		  <option>Nashik</option>
		  <option>Navsari</option>
		  <option>Nawada</option>
		  <option>Nawanshahr</option>
		  <option>Nayagarh</option>
		  <option>Neemuch</option>
		  <option>Nellore</option>
		  <option>New Delhi</option>
		  <option>Nilgiris</option>
		  <option>Nizamabad</option>
		  <option>North 24 Parganas</option>
		  <option>North Delhi</option>
		  <option>North East Delhi</option>
		  <option>North Goa</option>
		  <option>North Sikkim</option>
		  <option>North Tripura</option>
		  <option>North West Delhi</option>
		  <option>Nuapada</option>
		  <option>Ongole</option>
		  <option>Osmanabad</option>
		  <option>Pakur</option>
		  <option>Palakkad</option>
		  <option>Palamu</option>
		  <option>Pali</option>
		  <option>Palwal</option>
		  <option>Panchkula</option>
		  <option>Panchmahal</option>
		  <option>Panchsheel Nagar district (Hapur)</option>
		  <option>Panipat</option>
		  <option>Panna</option>
		  <option>Papum Pare</option>
		  <option>Parbhani</option>
		  <option>Paschim Medinipur</option>
		  <option>Patan</option>
		  <option>Pathanamthitta</option>
		  <option>Pathankot</option>
		  <option>Patiala</option>
		  <option>Patna</option>
		  <option>Pauri Garhwal</option>
		  <option>Perambalur</option>
		  <option>Phek</option>
		  <option>Pilibhit</option>
		  <option>Pithoragarh</option>
		  <option>Pondicherry</option>
		  <option>Poonch</option>
		  <option>Porbandar</option>
		  <option>Pratapgarh</option>
		  <option>Pratapgarh</option>
		  <option>Pudukkottai</option>
		  <option>Pulwama</option>
		  <option>Pune</option>
		  <option>Purba Medinipur</option>
		  <option>Puri</option>
		  <option>Purnia</option>
		  <option>Purulia</option>
		  <option>Raebareli</option>
		  <option>Raichur</option>
		  <option>Raigad</option>
		  <option>Raigarh</option>
		  <option>Raipur</option>
		  <option>Raisen</option>
		  <option>Rajauri</option>
		  <option>Rajgarh</option>
		  <option>Rajkot</option>
		  <option>Rajnandgaon</option>
		  <option>Rajsamand</option>
		  <option>Ramabai Nagar (Kanpur Dehat)</option>
		  <option>Ramanagara</option>
		  <option>Ramanathapuram</option>
		  <option>Ramban</option>
		  <option>Ramgarh</option>
		  <option>Rampur</option>
		  <option>Ranchi</option>
		  <option>Ratlam</option>
		  <option>Ratnagiri</option>
		  <option>Rayagada</option>
		  <option>Reasi</option>
		  <option>Rewa</option>
		  <option>Rewari</option>
		  <option>Ri Bhoi</option>
		  <option>Rohtak</option>
		  <option>Rohtas</option>
		  <option>Rudraprayag</option>
		  <option>Rupnagar</option>
		  <option>Sabarkantha</option>
		  <option>Sagar</option>
		  <option>Saharanpur</option>
		  <option>Saharsa</option>
		  <option>Sahibganj</option>
		  <option>Saiha</option>
		  <option>Salem</option>
		  <option>Samastipur</option>
		  <option>Samba</option>
		  <option>Sambalpur</option>
		  <option>Sangli</option>
		  <option>Sangrur</option>
		  <option>Sant Kabir Nagar</option>
		  <option>Sant Ravidas Nagar</option>
		  <option>Saran</option>
		  <option>Satara</option>
		  <option>Satna</option>
		  <option>Sawai Madhopur</option>
		  <option>Sehore</option>
		  <option>Senapati</option>
		  <option>Seoni</option>
		  <option>Seraikela Kharsawan</option>
		  <option>Serchhip</option>
		  <option>Shahdol</option>
		  <option>Shahjahanpur</option>
		  <option>Shajapur</option>
		  <option>Shamli</option>
		  <option>Sheikhpura</option>
		  <option>Sheohar</option>
		  <option>Sheopur</option>
		  <option>Shimla</option>
		  <option>Shimoga</option>
		  <option>Shivpuri</option>
		  <option>Shopian</option>
		  <option>Shravasti</option>
		  <option>Sibsagar</option>
		  <option>Siddharthnagar</option>
		  <option>Sidhi</option>
		  <option>Sikar</option>
		  <option>Simdega</option>
		  <option>Sindhudurg</option>
		  <option>Singrauli</option>
		  <option>Sirmaur</option>
		  <option>Sirohi</option>
		  <option>Sirsa</option>
		  <option>Sitamarhi</option>
		  <option>Sitapur</option>
		  <option>Sivaganga</option>
		  <option>Siwan</option>
		  <option>Solan</option>
		  <option>Solapur</option>
		  <option>Sonbhadra</option>
		  <option>Sonipat</option>
		  <option>Sonitpur</option>
		  <option>South 24 Parganas</option>
		  <option>South Delhi</option>
		  <option>South Garo Hills</option>
		  <option>South Goa</option>
		  <option>South Sikkim</option>
		  <option>South Tripura</option>
		  <option>South West Delhi</option>
		  <option>Sri Muktsar Sahib</option>
		  <option>Srikakulam</option>
		  <option>Srinagar</option>
		  <option>Subarnapur (Sonepur)</option>
		  <option>Sultanpur</option>
		  <option>Sundergarh</option>
		  <option>Supaul</option>
		  <option>Surat</option>
		  <option>Surendranagar</option>
		  <option>Surguja</option>
		  <option>Tamenglong</option>
		  <option>Tarn Taran</option>
		  <option>Tawang</option>
		  <option>Tehri Garhwal</option>
		  <option>Thane</option>
		  <option>Thanjavur</option>
		  <option>The Dangs</option>
		  <option>Theni</option>
		  <option>Thiruvananthapuram</option>
		  <option>Thoothukudi</option>
		  <option>Thoubal</option>
		  <option>Thrissur</option>
		  <option>Tikamgarh</option>
		  <option>Tinsukia</option>
		  <option>Tirap</option>
		  <option>Tiruchirappalli</option>
		  <option>Tirunelveli</option>
		  <option>Tirupur</option>
		  <option>Tiruvallur</option>
		  <option>Tiruvannamalai</option>
		  <option>Tiruvarur</option>
		  <option>Tonk</option>
		  <option>Tuensang</option>
		  <option>Tumkur</option>
		  <option>Udaipur</option>
		  <option>Udalguri</option>
		  <option>Udham Singh Nagar</option>
		  <option>Udhampur</option>
		  <option>Udupi</option>
		  <option>Ujjain</option>
		  <option>Ukhrul</option>
		  <option>Umaria</option>
		  <option>Una</option>
		  <option>Unnao</option>
		  <option>Upper Siang</option>
		  <option>Upper Subansiri</option>
		  <option>Uttar Dinajpur</option>
		  <option>Uttara Kannada</option>
		  <option>Uttarkashi</option>
		  <option>Vadodara</option>
		  <option>Vaishali</option>
		  <option>Valsad</option>
		  <option>Varanasi</option>
		  <option>Vellore</option>
		  <option>Vidisha</option>
		  <option>Viluppuram</option>
		  <option>Virudhunagar</option>
		  <option>Visakhapatnam</option>
		  <option>Vizianagaram</option>
		  <option>Vyara</option>
		  <option>Warangal</option>
		  <option>Wardha</option>
		  <option>Washim</option>
		  <option>Wayanad</option>
		  <option>West Champaran</option>
		  <option>West Delhi</option>
		  <option>West Garo Hills</option>
		  <option>West Kameng</option>
		  <option>West Khasi Hills</option>
		  <option>West Siang</option>
		  <option>West Sikkim</option>
		  <option>West Singhbhum</option>
		  <option>West Tripura</option>
		  <option>Wokha</option>
		  <option>Yadgir</option>
		  <option>Yamuna Nagar</option>
		  <option>Yanam</option>
		  <option>Yavatmal</option>
		  <option>Zunheboto</option>
		</select>
	  </div>
	</div>
	</div>
	  
	<div class='form-group'>
	  <label class='col-md-4 control-label'>Topic Description</label>
		<div class='col-md-4 inputGroupContainer'>
		<div class='input-group'>
			<span class='input-group-addon'><i class='glyphicon glyphicon-pencil'></i></span>
				<textarea class='form-control' name='content' placeholder='Topic Description'></textarea>
	  </div>
	  </div>
	</div>

	<div class='alert alert-success' role='alert' id='success_message'>Success <i class='glyphicon glyphicon-thumbs-up'></i> Thanks for posting your topic.</div>
	

	<div class='form-group'>
	  <label class='col-md-4 control-label'></label>
	  <div class='col-md-4'>
		<button type='submit' class='btn btn-warning' >POST <span class='glyphicon glyphicon-send'></span></button>
	  </div>
	</div>
	
	</fieldset>
	</form>
	</div>";
				} else {
					echo "<p>please login first or <a href='/registration.php'>click here</a> to register  to add a topic.</p>";
				}
			?>
	 	</div>

	 
    </div><!-- /.container -->
	<script src = "/login.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>

	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>

	 <script>
		 $(document).ready(function() {
    $('#post_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            topic: {
                validators: {
                        stringLength: {
                        min: 5,
                    },
                        notEmpty: {
                        message: 'Please provide the title'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                }
            },

            city: {
                validators: {
                    notEmpty: {
                        message: 'Please select your city'
                    }
                }
            },
            content: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your topic'
                    }
                    }
                }
            }
        })
});


	 </script>
</body>
</html>