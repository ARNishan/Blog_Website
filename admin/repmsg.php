<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
<style>
.body{ height:132px;
    width: 550px;
}
    
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
<?php
                 if(!isset($_GET['repid']) || $_GET['repid'] == NULL)
                {
                    echo "<script>window.location ='inbox.php';</script>";
                 } else{
                  $repid = $_GET['repid'];
                 }
                 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     $to = $fm->validate($_POST['to']);
                     $from = $fm->validate($_POST['from']);
                     $subject = $fm->validate($_POST['subject']);
                     $body = $fm->validate($_POST['body']);
                     $sendmail = mail($to,$subject,$subject,$from);
                     if($sendmail){
                         echo "<span class='success'>Message Sent Successfuly!</span>";
                     }else{
                        echo "<span class='error'>Something went wrong!!</span>";
                     }

                   }

?>

                <div class="block"> 
                <?php    
                        $query = "select * from tbl_contuct_us where id ='$repid' ";
                        $message = $db->select($query);
                        if($message){
                        while($result = $message->fetch_assoc()){
                            ?>              
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" name= "to" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name= "from"  placeholder="Your Email Address" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name= "subject" placeholder="Subject"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea  name="body"class="body" placeholder="Your Message"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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
 
