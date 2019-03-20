<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
<style>
.body{ height:132px;
    width: 530px;
}
    
</style>
<?php
 $userid = Session::get('userid');
 $userrole = Session::get('userrole');
?>
<div class="grid_10">
<div class="box round first grid">
 <h2>User Profile</h2>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
                             
$username = mysqli_real_escape_string($db->link,$_POST['username']);
$name = mysqli_real_escape_string($db->link,$_POST['name']);
$email = mysqli_real_escape_string($db->link,$_POST['email']);
$detail = mysqli_real_escape_string($db->link,$_POST['detail']);
                     
           $query = "UPDATE tbl_user
             SET 
             username = '$username' ,
             name = '$name' ,
             email = '$email' ,
             detail = '$detail'
             WHERE id = '$userid'
            ";

            $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span class='success'>User Data Updated Successfully !!</span>";
            }else {
             echo "<span class='error'>User Data Not Updated !</span>";
            }

      }
    
  
?>
<div class="block"> 
<?php 
$q1 = "SELECT * FROM tbl_user WHERE id ='$userid' AND role='$userrole' ";
$user = $db->select($q1);
if($user){
while($data = $user->fetch_assoc()){

?>              
<form action="" method="post" enctype="multipart/form-data">
<table class="form">
  <tr>
      <td>
          <label>User Name</label>
      </td>
      <td>
          <input type="text" name= "username" value="<?php echo $data['username'];?>" class="medium" />
      </td>
  </tr>
    <tr>
      <td>
          <label>Name</label>
      </td>
      <td>
          <input type="text" name= "name" value="<?php echo $data['name'];?>" class="medium" />
      </td>
  </tr>
   <tr>
      <td>
          <label>User Email</label>
      </td>
      <td>
          <input type="text" name= "email" value="<?php echo $data['email'];?>" class="medium" />
      </td>
  </tr>
<tr>
  <td style="vertical-align: top; padding-top: 9px;">
      <label>Details</label>
  </td>
  <td>
      <textarea class="body" name="detail"><?php echo $data['detail'];?></textarea>
  </td>
</tr>
<tr>
  <td></td>
  <td>
      <input type="submit" name="submit" Value="Update" />
  </td>
</tr>
</table>
</form>
    <?php }}?>
                </div>
            </div>
        </div>
        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include 'inc/afooter.php';?>
 
