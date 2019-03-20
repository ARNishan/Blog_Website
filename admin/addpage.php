<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
                  <?php
                           if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $pagename = mysqli_real_escape_string($db->link,$_POST['name']);    
                        $pagebody = mysqli_real_escape_string($db->link,$_POST['body']);
                        if( $pagename == "" || $pagebody == ""){

                             echo "<span class='error'>Field Must Not Empty!</span>";
                        } else{
                                $query = "INSERT INTO tbi_pages(name,body) VALUES('$pagename','$pagebody')";
                                $inserted_rows = $db->insert($query);
                                if ($inserted_rows) {
                                 echo "<span class='success'>Page Created Successfully !</span>";
                                }else {
                                 echo "<span class='error'>Page Not Created !</span>";
                                }
                              }
                          }
                    ?>
                <div class="block">               
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name= "name" placeholder="Enter Page Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
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
 
