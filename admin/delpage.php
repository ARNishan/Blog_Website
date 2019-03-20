<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Delete Page</h2>
               <div class="block copyblock"> 
                  <?php
                if(isset($_GET['delpage'])){
                    $delpage = $_GET['delpage'];
                    $delquery ="delete from tbi_pages where id = '$delpage' ";
                    $del = $db->delete($delquery);
                    if($del){
                        echo "<span class='success'>Page Deleted Successfuly!</span>";

                    }else{
                        echo "<span class='error'>Page Not Deleted!</span>";

                    }
                    
                }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/afooter.php';?>
