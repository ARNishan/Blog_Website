<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
<style>
.body{ height:132px;
    width: 530px;
}
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
<?php
                 if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL)
                {
                    echo "<script>window.location ='inbox.php';</script>";
                 } else{
                  $msgid = $_GET['msgid'];
                 }
                 
                   if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     echo "<script>window.location ='inbox.php';</script>";
                   }

?>

                <div class="block"> 
                <?php   
                        $update = "UPDATE tbl_contuct_us 
                        SET 
                        status = '1'
                        WHERE id = '$msgid'
                        ";
                        $update_query = $db->update($update); 
                        $query = "select * from tbl_contuct_us where id ='$msgid' ";
                        $message = $db->select($query);
                        if($message){
                        while($result = $message->fetch_assoc()){
                            ?>              
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name= "name" readonly value="<?php echo $result['firstname']." ".$result['lastname'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email Adress</label>
                            </td>
                            <td>
                                <input type="text" name= "name" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea readonly class="body" name="body"><?php echo $result['message'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" name= "name" readonly  value="<?php echo $fm->formatDate($result['date']);?>" class="medium" />
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
                    <?php } }?>
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
 
