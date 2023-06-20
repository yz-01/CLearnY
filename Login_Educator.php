<?php
session_start();
include("dataconnection.php");
$error="";
?>
<!DOCTYPE html>
<html>
  <head>
	<title>Educator login page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="edu.css">	
    <meta charset="utf-8">

  </head>
  <body>
		
        <form class="form-box px-3" name="educatorloginform">
			<div class="content">
				<div class="contentImg">
					<img src="src/cutelogo.png" alt="C-learnY's Logo" style="width:80%;">
				</div>
				<div class="contentDetails">
					<div class="topnav">
						<a href="Login_Learner.php" class="learner">Learner</a>
						<a href="Login_Educator.php" class="educator">Educator</a>		
					</div>
					
					<div class="contentDetailsTitle">
						Login into educator account
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
						<input type="email" name="eemail" placeholder="Email Address" required>
					</div>
					
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" id="cpassword" name="epassword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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

					
					<div class="form-register">
						<button type="submit" class="form-registerButton" name="login">
							Login
						</button>
					</div>
					
					<div class="form-forget">
					    <a href="Login_Forget_Educator.php" class="forgetLink">
							Forget Password?
					    </a>
					</div>
					
					<div style="margin:20px;">
					</div>
					
					<hr style="width:90%; margin:auto; color:#D3D3D3;">

					<div style="margin:20px;">
					</div>
					
					<div class="loginHere">
					  Don't have an account?
					  <a href="Register_Educator.php" class="loginLink">
						Register here
					  </a>
					</div>
					
					
				</div>
			</div>
			
		</form>
	
  </body>
</html>
<?php
if(isset($_GET["login"]))
{
	if(empty($_GET["eemail"])|| empty($_GET["epassword"]))
	{
		$error = "Email or password is empty!";
	}
	else
	{
		$email= $_GET["eemail"];
		$pass= $_GET["epassword"];
		
		$email = mysqli_real_escape_string($connect,$email);
		$pass = mysqli_real_escape_string($connect,$pass);
		//escape some special characters such as \n or quotation marks
		
		// Matching
		$result = mysqli_query($connect,"SELECT * from educator where educator_email= '$email'");
		$row = mysqli_fetch_array($result);
		//or
		//$sql= "SELECT * from user where user_name= '$name AND user_pass= '$pass'";
		//mysqli_query($connect,$sql);
		$c_email = mysqli_query($connect,"SELECT educator_id FROM educator where educator_email = '$email'");
		$count = mysqli_num_rows($c_email);
		if($count != 1)
		{
						?>
				<script>
					swal(
					{
						title: "Oh No!",
						text: "Could not found your account!",
						icon: "warning",
						button: "Continue"
					});
				</script>
			<?php
		}
		else
		{
			if($row['state'] == "INACTIVE")
			{
				?>
					<script>
						swal(
						{
							title: "Oh No!",
							text: "Your account is INACTIVE!",
							icon: "warning",
							button: "Continue"
						});
					</script>
				<?php
			}
			else
			{
				$result = mysqli_query($connect,"SELECT * from educator where educator_email= '$email' AND educator_password= '$pass'");
				$count= mysqli_num_rows($result); //If username and password is match, it will return 1.
				if($count== 1)
				{
					//$_SESSION["name"]= $name; //store the user name into session variables 
					$row= mysqli_fetch_assoc($result);
					$_SESSION['eid']= $row["educator_id"];
					$_SESSION["ename"]= $row["educator_name"]; // retrieve result from database
					$_SESSION["epass"]= $row["educator_password"];
					$_SESSION["ephone"]= $row["educator_phone_number"];
					$_SESSION["eemail"]= $row["educator_email"];// retrieve result from database
					header("location: educator homepage.php"); // redirect user to homepage
				}
				else
				{
				?>
					<script>
						swal(
						{
							title: "Oh No!",
							text: "Email or Password something went wrong!",
							icon: "warning",
							button: "Continue"
						});
					</script>
				<?php
				}
			}
		}
	}
	
mysqli_close($connect);
}

?>
