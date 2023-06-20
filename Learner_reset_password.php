<?php
include("dataconnection.php");
?>
<html>
  <head>
	<title>Learner Forget password</title>
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
			height: 100vh;
			background: url('src/b2.jpg') center no-repeat;
			background-size: cover;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
		
		.content{
			display:grid;
			grid-template-columns: 0.8fr 1fr;
			align-content:center;
			width:50%;
			background-color:#fff;
			box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.2);
			border-radius:12px;
			margin:auto;
			margin-top:20px;
		}
		
		.contentImg{
			display:grid;
			align-content:center;
			padding-left:20px;
		}
		
		.contentDetails{
			padding:40px;
		}
		

		
		.contentDetailsTitle{
			text-align:center;
			padding-bottom:20px;
			font-size:25px;
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
		  color: #007bff;
		}

		.form-input input::placeholder{
		  color: black;
		  padding-left: 0px;
		}

		.form-input input:focus, .form-input input:valid{
		  border: 2px solid #007bff ;
		}

		.form-input input:focus::placeholder{
		  color: #454b69;
		}
		
		.form-registerButton{
			background-color:#0084ff;
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
			background-color:#007BFF;
		}
		
		.form-registerButton:active{
			background-color:#006aff ;
		}
		



		
	</style>
    <meta charset="utf-8">

  </head>
  <body>
	<?php
		if(isset($_GET["buy"]))
		{
			$id = $_GET["id"];
			$learner = mysqli_query($connect, "SELECT * FROM learner WHERE learner_id = '$id'");
			$row_learner = mysqli_fetch_assoc($learner);
		}
	?>
        <form method="POST">
			<div class="content">
				<div class="contentImg">
					<img src="src/cutelogo.png" alt="C-learnY's Logo" style="width:100%;">
				</div>
				<div class="contentDetails">
					
					<div class="contentDetailsTitle">
						Reset your password
					</div>
					<div style="padding:10px;">Please enter your New Password</div>
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
						<input type="password" id="npassword" name="newp" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<span><i class="fa fa-eye" id="eye" style="position:absolute; right:35px; top:5px;" onclick="check_password()"></i></span>
					</div>	
					<script>
						var state = false;
						function check_password()
						{
							if(state)
							{
								document.getElementById("npassword").setAttribute("type", "password");
								state = false;
							}
							else
							{
								document.getElementById("npassword").setAttribute("type", "text");
								state = true;
							}
						}
					</script>
					
					<div class="form-input">
						<span><i class="fa fa-envelope"></i></span>
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
					
				
					<div class="form-register">
						<button type="submit" class="form-registerButton" name="submit">
							Send
						</button>
					</div>
				
				</div>
			</div>
			
		</form>
<?php
if(isset($_POST["submit"])) 	
{
	$newp = $_POST["newp"];
	$conp = $_POST["conp"];
	if($newp == $conp)
	{
		mysqli_query($connect,"UPDATE learner SET learner_password='$newp' where learner_id='$row_learner[learner_id]'");
		?>
		<script>
			swal(
                {
                    title: "Congratulations",
                    text: "Your password have been reset!",
                    icon: "success",
                    button: "Continue"
                }).then(function()
					{
						window.location.href = "Login_Learner.php";
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
                    text: "Please enter the correct confirmation password!",
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
