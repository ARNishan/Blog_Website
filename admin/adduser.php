<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
 <?php
      $userrole = Session::get('userrole');
      if($userrole != '0'){
        echo "<script>window.location ='index.php';</script>";
      }?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
                <?php
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $fm->validate($_POST['username']);
            $userpass = $fm->validate(md5($_POST['userpass']));
            $email = $fm->validate($_POST['email']);
            $role = $fm->validate($_POST['role']);
            $username = mysqli_real_escape_string($db->link,$username);
            $userpass = mysqli_real_escape_string($db->link,$userpass);
            $email = mysqli_real_escape_string($db->link,$email);
            $role = mysqli_real_escape_string($db->link,$role);
             if(empty($username) ||empty($userpass) ||empty($role) || empty($email) ){
                echo "<span class='error'>Field must not be empty!</span>";
             }
             else{
                $q1 = "SELECT * FROM tbl_user WHERE email ='$email' limit 1";
                $mail = $db->select($q1);
                if($mail != false){
                    echo "<span class='error'>Email already exist!</span>";
                }else{
                    $query = "INSERT INTO tbl_user(username,password,email,role) VALUES('$username','$userpass','$email','$role') ";
                    $userinsert = $db->insert($query);
                    if($userinsert){
                        echo "<span class='success'>User Created Successfuly!</span>";
                    }else{
                        echo "<span class='error'>User Not Created!</span>";
                    }
               }
             }
        }?>
 <form action="" method="post">
    <table class="form">					
        <tr>
            <td>
                <label>User Name :</label>
            </td>
            <td>
                <input type="text" name ="username" placeholder="Enter username..." class="medium" />
            </td>
        </tr>
        <tr>
            <td>
                <label>User Password :</label>
            </td>
            <td>
                <input type="text" name ="userpass" placeholder="Enter userpassword..." class="medium" />
            </td>
        </tr>
         <tr>
            <td>
                <label>User Email :</label>
            </td>
            <td>
                <input type="text" name ="email" placeholder="Enter email..." class="medium" />
            </td>
        </tr>
        <tr>
            <td>
                <label>User Role :</label>
            </td>
            <td>
                <select id="select" name="role">
                    <option>Select User Role</option>
                    <option value="0">Admin</option>
                    <option value="1">Author</option>
                    <option value="2">Editor</option>
                </select>
            </td>
        </tr>
		<tr><td></td> 
            <td>
                <input type="submit" name="submit" Value="Create" />
            </td>
        </tr>
    </table>
    </form>
                </div>
            </div>
        </div>
<?php include 'inc/afooter.php';?>
