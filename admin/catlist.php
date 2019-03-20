<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                if(isset($_GET['delcat'])){
                	$delid = $_GET['delcat'];
                    $delquery ="delete from tbl_category where id = '$delid' ";
                    $del = $db->delete($delquery);
                    if($del){
                    	echo "<span class='success'>Category Deleted Successfuly!</span>";

                    }else{
                    	echo "<span class='error'>Category Not Deleted!</span>";

                    }
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query = "select *from tbl_category";
						$post = $db->select($query);
						if($post){
							$i = 0;
						while($result = $post->fetch_assoc()){
                             $i++;

					     ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete?');" href="?delcat=<?php echo $result['id'];?>">Delete</a></td>
						</tr> 
					<?php } }else{

					}?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
<?php include 'inc/afooter.php';?>

