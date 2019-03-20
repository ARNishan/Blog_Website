<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Delete Page</h2>
               <div class="block copyblock"> 
           <?php
                if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
                    echo "<script>window.location ='sliderlist.php';</script>";
                }
                    else{
                    $delid = $_GET['delid'];
                    $getquery ="SELECT * FROM tbl_slider where id = '$delid' ";
                    $get = $db->select($getquery);
                    if($get){
                    while ($getimage = $get->fetch_assoc()) {
                            $dellink = $getimage['image'];
                            unlink($dellink);
                            # code...
                        }

                    }
                    $delquery ="delete from tbl_slider where id = '$delid' ";
                    $del = $db->delete($delquery);
                    if($del){
                        echo "<span class='success'>Slider Deleted Successfuly!</span>";

                    }else{
                        echo "<span class='error'>Slider Not Deleted!</span>";

                    }
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        echo "<script>window.location ='sliderlist.php';</script>";
                    } 
                    ?>
                    <form action="" method="post">
                        <table>
                         <tr><td></td> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                         </tr>
                        </table>
                    </form>


<?php }?>
                </div>
            </div>
        </div>
<?php include 'inc/afooter.php';?>
