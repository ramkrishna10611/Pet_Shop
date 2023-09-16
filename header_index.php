<!DOCTYPE html>
<html>
<head>
<style>
*{margin:0%;}
#header{background-image: url(paw.jpg);width:100%;height:150px;box-shadow: 3px 3px 3px #000;}
#header img{width:160px;height:150px;border-radius:5px;}
#header h1{text-align:center;margin-top:-150px;color:#000;padding-right: 997px;}
#header ul li{float:right;margin-right:40px;font-size:24px;color:black;list-style-type:circle;margin-top:-20px;list-style: none;}
#header ul li a{color:#ffff;text-decoration:none;background-color: #544a7d;padding:10px 10px 10px 10px;border-radius: 5px;}
</style>
</head>
<body>
<div id="header">
	<a href="index.php"><img src="logo.jpg" style="border:1px solid #000;"></a>
	<h1>PET HOUSE</h1>
	
	
	
	<ul><?php 
	include("db.php");
						
				
	if(!isset($_COOKIE['usernameget']))
				{
					echo"<li><a href='home.html'>Home</a></li>
					<li><a href='login_pet.php'>Login</a></li>
					<li><a href='newuser.php'>New user</a></li>";
				}
				
				if(isset($_COOKIE['usernameget']))
				{
					
					$query=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
						$query->execute();
				
						$row=$query->fetch();
						
						$query21=$con->prepare("select *from addcart where  user_id='".$row['id']."' order by 1 desc");
						$query21->execute();
						$rcount=$query21->rowCount();
					echo"<li><a href='logout.php'>Logout</a></li>
						<li><a href='myaccount.php'>Account</a></li>
							<li><a href='carttable.php'>Cart (<b style='color:yellow;'>$rcount</b>)</a></li>";
				}
				
				?>
				
	</ul>
	<?php
	if(isset($_COOKIE['usernameget']))
				{
						echo"<h2 style='border-radius:4px;padding:10px;margin-left: 174px;float:left;margin-top:35px;color:#111365;;border:1px solid blue;font-size: 30px;'>WELCOME ".$_COOKIE['usernameget']."</h2>";
				}?>
				<form method="post">
		<input type="text" name="search1" required style="margin-left:1101px;margin-top:32px;width:300px;height:40px;border-radius:4px;border:1px solid #425298;">
		<input type="submit" name="search" value="Search" style="position:relative;margin-left:1405px;margin-top:-40px;width:70px;height:40px;border-radius:4px;border:1px solid #425298;background:#fff;color:#425298;">
	</form>
</div>
</body>
</html>
<?php

	if(isset($_POST['search']))
	{
		$keyword=$_POST['search1'];
		header("location:search.php?keyword=$keyword");
	}


?>