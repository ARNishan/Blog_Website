<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                 <?php 
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $fb = mysqli_real_escape_string($db->link,$_POST['fb']);
                        $tw = mysqli_real_escape_string($db->link,$_POST['tw']);
                        $ln = mysqli_real_escape_string($db->link,$_POST['ln']);
                        $gp = mysqli_real_escape_string($db->link,$_POST['gp']);
                        if($fb == ""|| $tw == ""|| $ln == ""|| $gp == ""){
                            echo "<span class='error'>Field Must Not Empty!</span>";
                        }else{
                         $query = " UPDATE dbl_social
                                 SET 
                                 fb = '$fb' ,
                                 tw = '$tw',
                                 ln = '$ln',
                                 gp = '$gp'
                                ";

                                $updated_rows = $db->update($query);
                                if ($updated_rows) {
                                 echo "<span class='success'>Social Link Updated Successfully !!</span>";
                                }else {
                                 echo "<span class='error'>Social Link Not Updated !</span>";
                                }
                           }
                        }

                       $query = "select * from dbl_social";
                        $Social = $db->select($query);
                        if($Social){
                        while($result = $Social->fetch_assoc()){
                     
                        ?>
                <div class="block">               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" Value ="<?php echo $result['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" Value ="<?php echo $result['tw'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" Value ="<?php echo $result['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" Value ="<?php echo $result['gp'];?>" class="medium" />
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
                </div>
            <?php }}?>
            </div>
        </div>
<?php include 'inc/afooter.php';?>