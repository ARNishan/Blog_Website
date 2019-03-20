<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
<?php
  if(!isset($_GET['editid']) || $_GET['editid'] == NULL)
  {
    header('Location:postlist.php');
  } else{
    $editid = $_GET['editid'];
  }

?>      

        <div class="grid_10">

		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                  <?php
                           if($_SERVER['REQUEST_METHOD'] == 'POST'){
                             
                        $posttitle = mysqli_real_escape_string($db->link,$_POST['title']);
                        $postcat = mysqli_real_escape_string($db->link,$_POST['cat']);
                        $postbody = mysqli_real_escape_string($db->link,$_POST['body']);
                        $posttags = mysqli_real_escape_string($db->link,$_POST['tags']);
                        $postauthor = mysqli_real_escape_string($db->link,$_POST['author']);
                        $userid = mysqli_real_escape_string($db->link,$_POST['userid']);

                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "upload/".$unique_image;
                        if( $posttitle == ""|| $postcat == ""|| $postbody == ""|| $posttags == ""|| $postauthor == ""){

                             echo "<span class='error'>Field Must Not Empty!</span>";
                        }
                        else{
                        if(!empty($file_name)){
                        if ($file_size >1048567) {
                         echo "<span class='error'>Image Size should be less then 1MB!</span>";
                        }
                        elseif (in_array($file_ext, $permited) === false) {
                         echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                        } else{
                                move_uploaded_file($file_temp, $uploaded_image);
                                $query = "UPDATE post
                                 SET 
                                 cat = '$postcat' ,
                                 title = '$posttitle' ,
                                 body = '$postbody' ,
                                 image = '$uploaded_image' ,
                                 author = '$postauthor' ,
                                 tags = '$posttags',
                                 userid = '$userid'
                                 WHERE id = '$editid' 
                                ";

                                $updated_rows = $db->update($query);
                                if ($updated_rows) {
                                 echo "<span class='success'>Post Updated Successfully !!</span>";
                                }else {
                                 echo "<span class='error'>Post Not Updated !</span>";
                                }
                              }
                          }else{
                               $query = "UPDATE post
                                 SET 
                                 cat = '$postcat' ,
                                 title = '$posttitle' ,
                                 body = '$postbody' ,
                                 author = '$postauthor' ,
                                 tags = '$posttags',
                                 userid = '$userid'
                                 WHERE id = '$editid' 
                                ";

                                $updated_rows = $db->update($query);
                                if ($updated_rows) {
                                 echo "<span class='success'>Post Updated Successfully !!</span>";
                                }else {
                                 echo "<span class='error'>Post Not Updated !</span>";
                                }

                          }
                        }
                      }
                    ?>
                <div class="block"> 
                <?php 
                $q1 = "SELECT * FROM post WHERE id ='$editid' ";
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
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $data['image'];?>" height = "80px" width = "200px" /><br/>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $data['body'];?></textarea>
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
                                <input type="hidden" name= "userid" value="<?php echo Session::get('userid');?>" class="medium" />
                            </td>
                        </tr>


						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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
 
