<?php 
   include'../lib/Session.php';
   Session::checklogin();
?>
<?php include'../config/config.php';?>
<?php include'../lib/Database.php';?>
<?php include'../helpers/format.php';?>
<?php 
   $db = new Database();
   $fm = new format();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
		   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		   	$username = $fm->validate($_POST['username']);
		   	$userpass =$fm->validate(md5($_POST['password']));

		   	$username = mysqli_real_escape_string($db->link,$username);
		   	$userpass = mysqli_real_escape_string($db->link,$userpass);
		   	$query = "select * from tbl_user where username = '$username' and 	password = '$userpass' ";
		   	$result = $db->select($query);
		   	if($result != false)
		   	{
		   	   $value = mysqli_fetch_array($result);
		   	   $row = mysqli_num_rows($result);
		   	   if($row>0){
		   	   	Session::set('login',true);
		   	   	Session::set('username',$value['username']);
                Session::set('userid',$value['id']);
                Session::set('userrole',$value['role']); 
                header("Location:index.php");
		   	   }else{
		   	   	echo "<span style = 'color:red,font-size=18px;'>No Result Found.</span>";

		   	   }	
		   	} else{
		   		echo "<span style = 'color:red,font-size=18px;'>Username or Password not matched.</span>";
		   	}

		   } 

		?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgatepass.php">Forgate Password!</a>
		</div>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>