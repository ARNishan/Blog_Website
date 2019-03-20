<?php include'inc/header.php';?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
			<?php	 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
		   	$firstname = $fm->validate($_POST['firstname']);
		   	$lastname =$fm->validate(($_POST['lastname']));
		   	$email =$fm->validate(($_POST['email']));
		   	$message =$fm->validate(($_POST['message']));

		   	$firstname = mysqli_real_escape_string($db->link,$firstname);
		   	$lastname = mysqli_real_escape_string($db->link,$lastname);
		   	$email = mysqli_real_escape_string($db->link,$email);
		   	$message = mysqli_real_escape_string($db->link,$message);
		   	if($firstname == ""|| $lastname == ""|| $email == ""|| $message == ""){
                            echo "<span style='color:Red'>Field Must Not Empty!</span>";
             }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
             	echo "<span style='color:Red'>Invalid Email Address!</span>";

                }else{

                	$query = "INSERT INTO tbl_contuct_us(firstname,lastname,email,message) VALUES('$firstname','$lastname','$email','$message') ";
		                $cominsert = $db->insert($query);
		                if($cominsert){
		                    echo "<span style='color:green'>Message Sent Successfuly!</span>";
		                }else{
		                    echo "<span style='color:Red'>Message Not Sent!</span>";
                         }

                    } 
             }
		   	?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	 <form>				
  </div>
</div>
<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php'; ?>
		