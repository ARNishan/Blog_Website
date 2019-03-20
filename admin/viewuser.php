<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
<style>
.body{ height:132px;
    width: 530px;
}
    
</style>
<?php
 if(!isset($_GET['userid']) || $_GET['userid'] == null){
  echo "<script>window.location ='userlist.php';</script>";
}else{
   $userid = $_GET['userid'];
}
?>
<div class="grid_10">
<div class="box round first grid">
 <h2>User Profile</h2>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<script>window.location ='userlist.php';</script>";
      }
    
  
?>
<div class="block"> 
<?php 
$q1 = "SELECT * FROM tbl_user WHERE id ='$userid'";
$user = $db->select($q1);
if($user){
while($data = $user->fetch_assoc()){

?>              
<form action="" method="post">
<table class="form">
  <tr>
      <td>
          <label>User Name</label>
      </td>
      <td>
          <input type="text" readonly  value="<?php echo $data['username'];?>" class="medium" />
      </td>
  </tr>
    <tr>
      <td>
          <label>Name</label>
      </td>
      <td>
          <input type="text" readonly  value="<?php echo $data['name'];?>" class="medium" />
      </td>
  </tr>
   <tr>
      <td>
          <label>User Email</label>
      </td>
      <td>
          <input type="text" readonly  value="<?php echo $data['email'];?>" class="medium" />
      </td>
  </tr>
<tr>
  <td style="vertical-align: top; padding-top: 9px;">
      <label>Details</label>
  </td>
  <td>
      <textarea class="body" readonly ><?php echo $data['detail'];?></textarea>
  </td>
</tr>
<tr>
  <td></td>
  <td>
      <input type="submit" name="submit" Value="Ok" />
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
 
