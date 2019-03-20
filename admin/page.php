<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
 <?php
                      if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL)
                      {
                        header('Location:index.php');
                      } else{
                        $pageid = $_GET['pageid'];  
                      }

                    ?>  
<style>
.actiondel{margin-left: 10px;}   
.actiondel a{
border: 1px solid #ddd;
color: #444;
cursor: pointer;
font-size: 20px; padding: 2px 10px;
font-weight: normal;
background-color: #f0f0f0;
}
</style>
      <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Page</h2>
        <?php
               if($_SERVER['REQUEST_METHOD'] == 'POST'){
                 $pagename = $_POST['pagename'];
                 $pagebody = $_POST['pagebody'];
                 $pagename = mysqli_real_escape_string($db->link,$pagename);
                 $pagebody = mysqli_real_escape_string($db->link,$pagebody);
                 if($pagename == "" || $pagebody == "" ){
                    echo "<span class='error'>Field must not be empty!</span>";
                 }else{
                    $query = "UPDATE tbi_pages
                     SET name = '$pagename',
                         body = '$pagebody'
                     WHERE id = '$pageid' ";
                    $pageupdate = $db->update($query);
                    if($pageupdate){
                        echo "<span class='success'>Page Updated Successfuly!</span>";
                    }else{
                        echo "<span class='error'>Page Not Updated!</span>";
                    }
                 }
            }?>
                <div class="block">
                <?php    
                        $query1 = "select * from tbi_pages where id = '$pageid' ";
                        $page = $db->select($query1);
                        if($page){
                        while($result = $page->fetch_assoc()){?>             
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name= "pagename" Value ="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="pagebody"><?php echo $result['body'];?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="actiondel"><a
                                onclick="return confirm('Are you sure to Delete?');" href="delpage.php?delpage=<?php echo $result['id'];?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
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
 
