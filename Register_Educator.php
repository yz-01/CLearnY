<!DOCTYPE html>
<html>
  <head>
	<title>Educator register Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
		
		*{
		  margin: 0;
		  padding: 0;
		  box-sizing: border-box;
		  font-family: 'Poppins', sans-serif;
		}
		
		body{
			min-height: 100vh;
			background: url('src/b2.jpg') center no-repeat;
			background-size: cover;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
		
		.content{
			display:grid;
			grid-template-columns: 1fr 1fr;
			align-content:center;
			width:70%;
			background-color:#fff;
			box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.2);
			border-radius:12px;
			margin:auto;
			margin-top:20px;
		}
		
		.contentImg{
			display:grid;
			align-content:center;
		}
		
		.contentDetails{
			padding:20px;
		}
		
		.topnav {
		  overflow: hidden;
		  background-color: #C0C0C0;
		  border-radius: 12px;
		  width: 100%;
		}

		.topnav a {
		  float: left;
		  color: white;
		  text-align: center;
		  padding: 10px 10px;
		  text-decoration: none;
		  font-size: 17px;
		  box-sizing: border-box;
		  width: 50%;
		}

		.topnav a:hover {
		  background-color: #FF5A5F;
		  color: white;
		  text-decoration: none;
		}
		
		.educator{
			background-color: #FF5A5F ;
		}
		
		
		.contentDetailsTitle{
			text-align:center;
			padding-top:20px;
			padding-bottom:20px;
			font-size:25px;
		}
		
		#message {
		  display:none;
		  color: #000;
		  position: relative;
		  padding:10px;
		  padding-left: 20px;
		}

		#message p {
		  padding: 10px 35px;
		  font-size: 15px;
		}

		/* Add a green text color and a checkmark when the requirements are right */
		
		.valid {
		  color: green;
		}

		.valid:before {
		  position: relative;
		  left: -35px;
		  content: "✔";
		}

		/* Add a red text color and an "x" when the requirements are wrong */
		
		.invalid {
		  color: red;
		}

		.invalid:before {
		  position: relative;
		  left: -35px;
		  content: "✖";
		}
		

		
		.form-input{
		  position: relative;
		}

		.form-input input{
		  width: 100%;
		  height: 45px;
		  padding-left: 40px;
		  margin-bottom: 20px;
		  box-sizing: border-box;
		  box-shadow: none;
		  border: 1px solid #00000020;
		  border-radius: 50px;
		  outline: none;
		  background: transparent;
		}

		.form-input span{
		  position: absolute;
		  top: 10px;
		  padding-left: 15px;
		  color: #FF5A5F ;
		}

		.form-input input::placeholder{
		  color: black;
		  padding-left: 0px;
		}

		.form-input input:focus, .form-input input:valid{
		  border: 2px solid #FF5A5F ;
		}

		.form-input input:focus::placeholder{
		  color: #454b69;
		}
		
		.form-registerButton{
			background-color:#FF7478;
			color:#fff;
			border:none;
			outline:none;
			padding:10px;
			width:100%;
			border-radius:50px;
			cursor:pointer;
			font-weight:bold;
		}
		
		.form-registerButton:hover{
			background-color:#FF5A5F;
		}
		
		.form-registerButton:active{
			background-color:#ff4146 ;
		}
		
		.loginHere{
			text-align:center;
		}
		
		.loginLink{
			color:#FF5A5F   ;
			font-weight:bold;
			text-decoration:none;
		}
		
		.loginLink:hover{
			color:#FF5A5F  ;
		}
		
		.loginLink:active{
			color:#ff4146  ;
		}
	</style>
    <meta charset="utf-8">

  </head>
  <body>
		
        <form method="POST">
			<div class="content">
				<div class="contentImg">
					<img src="src/cutelogo.png" alt="C-learnY's Logo" style="width:100%;">
				</div>
				<div class="contentDetails">
					<div class="topnav">
						<a href="Register_Learner.php" class="learner">Learner</a>
						<a href="Register_Educator.php" class="educator">Educator</a>		
					</div>
					
					<div class="contentDetailsTitle">
						Create a learner account
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-user"></i></span>
						<input type="text" name="name" placeholder="Username" maxlength="30" required>
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" id="password" name="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<span><i class="fa fa-eye" id="eye" style="position:absolute; right:35px; top:5px;" onclick="check_password()"></i></span>
						<div id="message">
						  <h3>Password must contain the following:</h3>
						  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
						  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
						  <p id="number" class="invalid">A <b>number</b></p>
						  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
						</div>
					</div>
					<script>
						var state = false;
						function check_password()
						{
							if(state)
							{
								document.getElementById("password").setAttribute("type", "password");
								state = false;
							}
							else
							{
								document.getElementById("password").setAttribute("type", "text");
								state = true;
							}
						}
					</script>
					
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" id="cpassword" name="conp" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<span><i class="fa fa-eye" id="eye" style="position:absolute; right:35px; top:5px;" onclick="check_passwords()"></i></span>
					</div>	
					<script>
						var state = false;
						function check_passwords()
						{
							if(state)
							{
								document.getElementById("cpassword").setAttribute("type", "password");
								state = false;
							}
							else
							{
								document.getElementById("cpassword").setAttribute("type", "text");
								state = true;
							}
						}
					</script>
						
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
						<input type="email" name="email" placeholder="Email Address" required>
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-phone"></i></span>
						<input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{3}[0-9]{7}" title="Enter phone number like 0127685376" required>
					</div>
					
					
					<div class="form-register">
						<button type="submit" class="form-registerButton" name="reg">
							Register
						</button>
					</div>
					
					<div style="margin:20px;">
					</div>
					
					<hr style="width:90%; margin:auto; color:#D3D3D3;">

					<div style="margin:20px;">
					</div>
					
					<div class="loginHere">
					  Already have an account?
					  <a href="Login_Educator.php" class="loginLink">
						Login here
					  </a>
					</div>
					
					
				</div>
			</div>
			
		</form>
	
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<?php
include("dataconnection.php");
if(isset($_POST["reg"])) 	
{
	$name = $_POST["name"];
	$pass = $_POST["pass"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$conp = $_POST["conp"];
	
	$result_email = mysqli_query($connect,"SELECT * FROM educator where educator_email = '$email'");
	$count_email = mysqli_num_rows($result_email);
	$result_phone = mysqli_query($connect,"SELECT * FROM educator where educator_phone_number = '$phone'");
	$count_phone = mysqli_num_rows($result_phone);
	if($conp == $pass)
	{
		if($count_email != 0 || $count_phone != 0 || strlen($_POST["phone"]) < 10)
		{
			if($count_email != 0)
			{
			?>
			<script>
				swal(
                {
                    title: "Oh No!",
                    text: "Email had been used, please enter other Email!",
                    icon: "warning",
                    button: "Continue"
                });
			</script>
			<?php
			}
			else if(strlen($_POST["phone"]) < 10)
			{
			?>
			<script>
				swal(
                {
                    title: "Oh No!",
                    text: "Invalid phone number!",
                    icon: "warning",
                    button: "Continue"
                });
			</script>
			<?php
			}
			else
			{			
			?>
			<script>
				swal(
                {
                    title: "Oh No!",
                    text: "Phone Number had been used, please enter other Phone Number!",
                    icon: "warning",
                    button: "Continue"
                });
			</script>
			<?php
			}
		}
		else
		{
			mysqli_query($connect,"INSERT INTO educator(educator_name,educator_password,educator_phone_number,educator_email,state)
			VALUES('$name','$pass','$phone','$email','ACTIVE')");
			$wallet = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM educator where educator_email = '$email'"));
			$wallet_insert = mysqli_query($connect,"INSERT INTO wallet(educator_id)VALUES('$wallet[educator_id]')");
			
			$subject = "Your C-learnY account has been created ";
			$body = "Congratulations, ".$name."<br>Thanks for creating an account on C-learnY as a educator";
			$headers='From: C-learnY'."\r\n".
						'MINE-Version: 1.0'."\r\n".
						'Content-Type: text/html; charset=utf-8';

			mail($email, $subject, $body, $headers);
			{
			?>
			<script>
				swal(
					{
						title: "Congratulations!",
						text: "Register Successfully!",
						icon: "success",
						button: "Continue"
					}
					).then(function()
					{
						window.location.href = "Login_Educator.php";
					});
			</script>
			<?php
			}
		}
	}
	else
	{
		?>
		<script>
			swal(
                {
                    title: "Oh No!",
                    text: "Confirmation password incorrect!",
                    icon: "warning",
                    button: "Continue"
                });
		</script>
		<?php
	}
}																																																																																																										
?>
</body>
</html>
