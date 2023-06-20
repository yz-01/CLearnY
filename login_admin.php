<?php
session_start();
include("dataconnection.php");
$error="";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="style_new.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row px-3">
	  <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
		<div class="img-left d-none d-md-flex"></div>
        <div class="card-body">
		
	
	
	  
          <h4 class="title text-center mt-4">
            Login into admin account
          </h4>
          <form class="form-box px-3" name="learnerloginform" method="get">
            <div class="form-input">
              <span><i class="fa fa-envelope"></i></span>
              <input type="text" name="aemail" placeholder="Email" maxlength="30" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-lock"></i></span>
              <input type="password" id="password" name="apassword" placeholder="Password" maxlength="30" required>
			  <span><i class="fa fa-eye" id="eye" style="position:absolute; right:35px; top:5px;" onclick="check_password()"></i></span>
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


            <div class="mb-3">
              <button type="submit" class="btn btn-block" name="login">
                Login
              </button>
            </div>
         

          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
if(isset($_GET["login"]))
{
	if(empty($_GET["aemail"])|| empty($_GET["apassword"]))
	{
		$error = "Email or password is empty!";
	}
	else
	{
		$email= $_GET["aemail"];
		$pass= $_GET["apassword"];
		
		$email = mysqli_real_escape_string($connect,$email);
		$pass = mysqli_real_escape_string($connect,$pass);
		//escape some special characters such as \n or quotation marks
		
		// Matching
		$result = mysqli_query($connect,"SELECT * from admin where admin_email= '$email'");
		$row = mysqli_fetch_array($result);
		//or
		//$sql= "SELECT * from user where user_name= '$name AND user_pass= '$pass'";
		//mysqli_query($connect,$sql);
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
			$result = mysqli_query($connect,"SELECT * from admin where admin_email= '$email' AND admin_password= '$pass'");
			$count= mysqli_num_rows($result); //If username and password is match, it will return 1.
			if($count== 1)
			{
				//$_SESSION["name"]= $name; //store the user name into session variables 
				$row= mysqli_fetch_assoc($result);
				$_SESSION['id']= $row["admin_id"];
				$_SESSION["name"]= $row["admin_name"]; // retrieve result from database
				$_SESSION["pass"]= $row["admin_password"];
				$_SESSION["phone"]= $row["admin_phone_number"];
				$_SESSION["email"]= $row["admin_email"];// retrieve result from database
				header("location: adminHomopage.php"); // redirect user to homepage
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
	
mysqli_close($connect);
}

?>