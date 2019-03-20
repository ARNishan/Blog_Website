<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
<style>
.body{ height:132px;
    width: 530px;
}
</style>
<?php
  if(!isset($_GET['viewid']) || $_GET['viewid'] == NULL)
  {
    header('Location:postlist.php');
  } else{
    $viewid = $_GET['viewid'];
  }

?>      

        <div class="grid_10">

		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                  <?php
                           if($_SERVER['REQUEST_METHOD'] == 'POST'){
                             echo "<script>window.location ='postlist.php';</script>";
                      }
                    ?>
                <div class="block"> 
                <?php 
                $q1 = "SELECT * FROM post WHERE id ='$viewid' ";
                $edit = $db->select($q1);
                if($edit){
                    while($data = $edit->fetch_assoc()){

                ?>              
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name= "title" value="<?php echo $data['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Catagory</option>
                        <?php 
                                $query = "select * from tbl_category";
                                $cat = $db->select($query);
                                if($cat){
                                while($result = $cat->fetch_assoc()){

                         ?>
                                    <option 
                                <?php 
                                  if($data['cat'] == $result['id']){?>
                                    selected = "selected"
                                <?php }?>
                                  value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                            <?php }}?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Post Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $data['image'];?>" height = "80px" width = "200px" /><br/>
      
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="body" name="body"><?php echo $data['body'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name= "tags" value="<?php echo $data['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <input type="text" name= "author" value="<?php echo $data['author'];?>" class="medium" />
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
                <?php }
            }?>
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
 
