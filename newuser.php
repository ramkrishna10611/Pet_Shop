<html>
<head>
<title>new user</title>
			<style>
			
			
			body
	
	{
	
		margin:0 auto;
background-image:url("12.jpg");
		background-repeat:no-repeat;
		background-size: 100% 680px;
		
	}
		.container-signup
		{
		width:530px;
		height: auto;
		text-align: center;
		background-image:url("dee.jpg");
		border-radius: 4px;
		margin:0 auto;
		margin-top:20px;
		
		
		transition:width 0.4s ease-in-out;
		}
	
		.container-signup img
	{
		width:188px;
		/* height: 100px; */
		margin-top:20px;
		margin-bottom:20px;
		border-radius:60px;
		border:none;
		
	
	}
	
	.btn-signup
	{
		border-radius: 4px;
		padding:5px 15px;
		font-weight:bold;
		margin-top:10px;
		cursor:pointer;
		color:#00FFFF;
		margin-bottom:3px;
		}
	
	
	
	
	
				input[type="text"],input[type="password"],input[type="email"]
	{
		width:300px;
		height: 33px;
		border:none;
		border-radius:4px;
		font-size:15px;
		margin-bottom:15px;
		background-color:#fff;
		padding-left:3px;
		
		transition:width 0.4s ease-in-out;
		
	}
	.btn-signup
	{
		border-radius: 4px;
		padding:5px 15px;
		font-weight:bold;
		margin-top:10px;
		
		cursor:pointer;
		color:#400040;
		
		
		border:1px solid aquamarine;;
		background-color:#fff;
	}
	.btn-signup:hover
	{
		color:#fff;
		background:#400040;
	}
	input[type="password"]:focus
			{
				width:50%;
				border:2px solid aquamarine;
				background-color:#E9967A;
			}	
			
			
			input[type="email"]:focus
			{
				width:50%;
				border:2px solid aquamarine;
				background-color:#E9967A;
			}	
			
			
			input[type="text"]:focus
			{
				width:50%;
				border:2px solid aquamarine;
				background-color:#E9967A;
			}	
			
			
			input[type="submit"]:focus
			{
				width:20%;
				border:2px solid aquamarine;
				background-color:#0000CD;
			}
	
				
			</style>
</head>
<body>


	<div class="container-signup">
		<img src="logo.jpg">
		<form  method="post" enctype="multipart/form-data">
			
			
			<center>
			
			
		<br><b style="color: #1c2668;">	Username:</b>	 <input type="text" name="name" required placeholder="Enter Username">
		
			
		
	<br><b style="color: #1c2668;">	PhoneNo:</b>	<input type="text" name="phoneno" required pattern="[7-9]{1}[0-9]{9}" placeholder="Enter Phone Number" style="margin-left:10px;">
		
			
			
			<br><b style="color: #1c2668;">	Address:</b> <input type="text" name="address" required placeholder="Enter Address" style="margin-left:15px;">
			
		<br><b style="color: #1c2668;">	City:</b>	 <input type="text" name="city" required placeholder="Enter City" style="margin-left:40px;">
		<br><b style="color: #1c2668;">	Pincode:</b>	  <input type="text" name="pincode" required pattern="[0-9]{6}" placeholder="Enter Pincode" style="margin-left:15px;">
	
		<br><b style="color: #1c2668;">	Email:</b><input type="email" name="email" required placeholder="Enter Email" style="margin-left:30px;">
		

		<br><b style="color: #1c2668;">	Password:</b><input type="password" name="password" required placeholder="Enter Password" id="password_id"><br>
			 	<b style="color: #1c2668;">Show password:</b><input type="checkbox" onclick="myfunction()" value="Show password" style="color:#fff;"><br>	
			<br>
			<input type="file" name="pro_img1" style="color: #1c2668;" />
			
			<br>
		
			<input type="submit" name="submit" value="submit" class="btn-signup">
			
			
			</center>
			
			
		</div>	
	</form>
	<script>
	function myfunction()
		{
			var x=document.getElementById("password_id");
			if(x.type =="password")
			{
				x.type="text";
			}
			else
			{
				x.type="password";
			}
		}
		</script>
</body>
</html>
<?php


if(isset($_POST['submit']))
{
	include("db.php");
	
	$username=$_POST['name'];
	$phone=$_POST['phoneno'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$pincode=$_POST['pincode'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	
			$pro_img1=$_FILES['pro_img1']['name'];
			$pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];
	
			move_uploaded_file($pro_img1_tmp,"userphotos/$pro_img1");	
	
	
	
	$pdoResult=$con->prepare("INSERT INTO newuser(username,phoneno,address,city,pincode,email,password,user_img) VALUES ('$username','$phone','$address','$city','$pincode','$email','$password','$pro_img1')");
		
	
	
	if($pdoResult->execute())
	{
		echo"<script>alert('Register succefully')</script>";
				 echo"<script>window.open('login_pet.php','_self')</script>";
	}
	else
	{
		echo "data not inserted";
	}
}




?>