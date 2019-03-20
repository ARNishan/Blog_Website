<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
<?php
  if(!isset($_GET['catid']) || $_GET['catid'] == NULL)
  {
    header('Location:catlist.php');
  } else{
    $catid = $_GET['catid'];
  }

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Catagory</h2>
               <div class="block copyblock"> 
                <?php
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $catname = $_POST['catname'];
             $catname = mysqli_real_escape_string($db->link,$catname);
             if(empty($catname)){
                echo "<span class='error'>Field must not be empty!</span>";
             }else{
                $query = "UPDATE tbl_category
                 SET name = '$catname'
                 WHERE id = '$catid' ";
                $catupdate = $db->update($query);
                if($catupdate){
                    echo "<span class='success'>Category Updated Successfuly!</span>";
                }else{
                    echo "<span class='error'>Category Not Updated!</span>";
                }
             }
        }?>
        <?php
                      $query = "select * from tbl_category where id ='$catid' order by id desc";
                      $post = $db->select($query);
                      while($result = $post->fetch_assoc()){
        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catname" Value ="<?php echo $result['name'];?>"  class="medium" />
                            </td>
                        </tr>
						            <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }?>
                </div>
            </div>
        </div>
<?php include 'inc/afooter.php';?>
