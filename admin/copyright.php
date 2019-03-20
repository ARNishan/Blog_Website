<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock">
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $footervalue = mysqli_real_escape_string($db->link,$_POST['copyright']);
                        if($footervalue == ""){
                            echo "<span class='error'>Field Must Not Empty!</span>";
                        }else{
                         $query = " UPDATE tbl_footer
                                 SET 
                                 body = '$footervalue' 
                                 where id = '1'
                                ";

                                $updated_rows = $db->update($query);
                                if ($updated_rows) {
                                 echo "<span class='success'>Copyright Text Updated Successfully !!</span>";
                                }else {
                                 echo "<span class='error'>Copyright Text Not Updated !</span>";
                                }
                           }
                        }


                       $query = "select * from tbl_footer where id = '1' ";
                        $footer = $db->select($query);
                        if($footer){
                        while($result = $footer->fetch_assoc()){
                     
                        ?> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" Value ="<?php echo $result['body'];?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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
<?php include 'inc/afooter.php';?>
