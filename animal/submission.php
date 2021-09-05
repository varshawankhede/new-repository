<?php 
include('dbconnection.php');
if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$life_expectancy = $_POST['life_expectancy'];
	
	
	$targetDir = "uploads/";
	$fileName = basename($_FILES["image"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);


	$query = mysqli_query($con,"insert into animal_details (name,category,image,description,life_expectancy)values('$name','$category','$fileName','$description','$life_expectancy')");

	if($query)
	{
		echo"<script>alert('Data inserted sucessfully');</script>";
		echo"<script type='text/javascript'>document.location='animals.php';</script>";
	}
	else
	{
		echo"<script>alert('something Went wrong');</script>";
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Animal Detail Submission form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
} 


/* COMPACT CAPTCHA */

.capbox {
	background-color: #BBBBBB;
	background-image: linear-gradient(#BBBBBB, #9E9E9E);
	border: #63738a  0px solid;
	border-width: 2px 2px 2px 20px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	display: inline-block;
	padding: 5px 8px 5px 8px;
	border-radius: 4px 4px 4px 4px;
	}

.capbox-inner {
	font: bold 12px arial, sans-serif;
	color: #000000;
	background-color: #E3E3E3;
	margin: 0px auto 0px auto;
	padding: 3px 10px 5px 10px;
	border-radius: 4px;
	display: inline-block;
	vertical-align: middle;
	}

#CaptchaDiv {
	color: #000000;
	font: normal 25px Impact, Charcoal, arial, sans-serif;
	font-style: italic;
	text-align: center;
	vertical-align: middle;
	background-color: #FFFFFF;
	user-select: none;
	display: inline-block;
	padding: 3px 14px 3px 8px;
	margin-right: 4px;
	border-radius: 4px;
	}

#CaptchaInput {
	border: #38B000 2px solid;
	margin: 3px 0px 1px 0px;
	width: 105px;
	}


</style>
</head>
<body>
	<div class="signup-form">
	    <form  method="POST" enctype="multipart/form-data"  onsubmit="return checkform(this);">
				<h2>Fill Animals Details</h2>
				<p class="hint-text">Fill below form.</p>
			    <div class="form-group">
					<input type="text" class="form-control" name="name" placeholder="Enter Animal Name" required="true">
			    </div>
			    <div class="form-group">
			        <select type="text" class="form-control" name="category" required="true">
			        	<option>---- Select Category ----</option>
			        	<option>Herbivores</option>
			        	<option>Carnivores</option>
			        	<option>Omnivores</option>
			        </select>
			    </div>
			    <div class="form-group">
			        <input type="file" class="form-control" name="image"  required="true">
			    </div>
			    <div class="form-group">
			      <textarea class="form-control" name="description" placeholder="Enter your description" required="true"></textarea> 
			    </div>
				<div class="form-group">
			        <select class="form-control" name="life_expectancy" required="true">
			        	<option>-- Select Life Expectancy --</option>
			        	<option>0-1years</option>
			        	<option>1-5years</option>
			        	<option>5-10years</option>
			        	<option>10+years</option>
			        </select>
			     </div>
			     <div class="form-group">
				     <div class="capbox" style="width:390px;">
						<div id="CaptchaDiv"></div>
						<div class="capbox-inner">
							Type the number:<br>
							<input type="hidden" id="txtCaptcha">
							<input type="text" name="CaptchaInput" id="CaptchaInput" size="15">
						</div>
					</div>
				</div>
				<div class="form-group">
			          <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
			     </div>
		</form>
		<div class="text-center">View Aready Inserted Data!!<a href="animals.php">View</a></div>
	</div>
</body>
</html>
<script type="text/javascript">

// Captcha Script

function checkform(theform){
		var why = "";

		if(theform.CaptchaInput.value == ""){
			why += "- Please Enter CAPTCHA Code.\n";
			}
			if(theform.CaptchaInput.value != ""){
				if(ValidCaptcha(theform.CaptchaInput.value) == false){
				why += "- The CAPTCHA Code Does Not Match.\n";
			}
		}
		if(why != ""){
		alert(why);
		return false;
		}
}

var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("CaptchaDiv").innerHTML = code;

// Validate input against the generated number
function ValidCaptcha(){
	var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
		var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
		if (str1 == str2)
		{
			return true;
		}
		else
		{
		return false;
		}
}

	// Remove the spaces from the entered and generated code
	function removeSpaces(string){
	return string.split(' ').join('');
	}
</script>