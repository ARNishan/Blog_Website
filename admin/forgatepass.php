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
<title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
		   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		   	$email = $fm->validate($_POST['email']);
		   	$email = mysqli_real_escape_string($db->link,$email);
		    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
             	echo "<span style='color:Red'>Invalid Email Address!</span>";
         }else{
           $q1 = "SELECT * FROM tbl_user WHERE email ='$email' limit 1";
                $mail = $db->select($q1);
          if($mail != false){
		   	   while ($value = $mail->fetch_assoc()) {
		   	      $userid = $value['id'];
		   	      $username = $value['username'];
		   	      }
		   	      $txt = substr($email, 0, 3);
		   	      $rand = rand(10000,99999);
		   	      $newpass = "$txt$rand";
		   	      $password = md5($newpass); 
		   	      $query = "UPDATE tbl_user
	                 SET 
	                 password = '$password'
	                 WHERE id = '$userid' ";
                 $passupdate = $db->update($query);
                 $to = "$email";
                 $from = "nishan@gmail.com";
                 $headers = "From: $from\n";
                 $headers.= 'MIME-Version: 1.0';
                 $headers.= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                 $subject = "Recovery Password";
                 $message = "Your user name is ".$username." and Your Password is ".$newpass." Please visit website to login.
                     Have a nice day. Thanks.";
                 $sentmail = mail($to,$subject, $message,$headers);
                 if($sentmail){
                 echo "<span style = 'color:green'>Please Check Your Email for new Password.</span>";
                 }
                 else{
                 	echo "<span style = 'color:red'>Something is wrong.Please try again.</span>";
                 }

		   	   }	
		   	 else{
		   		echo "<span style = 'color:red'>Email Not Exist.</span>";
		   	}
		   }

		 } 

		?>
		<form action="" method="post">
			<h1>Password Recovery</h1>
			<div>
				<input type="text" placeholder="User Email Address" required="" name="email"/>
			</div>
			<div>
				<input type="submit" value="Sent Mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Log in</a>
		</div>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>