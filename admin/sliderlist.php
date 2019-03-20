<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No</th>
							<th>Slider Title</th>
					        <th>Slider Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM tbl_slider";
						     $Slider = $db->select($query);
						     if($Slider){
						     	$i = 0;
						     while($result = $Slider->fetch_assoc()){
						     		$i++; ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></a></td>
						    <td><img src="<?php echo $result['image']; ?>" height ="40px" width ="60px" /></td>
							
							<td>
							<?php
                                if($result['userid'] == Session::get('userid') || Session::get('userrole') == '0' ){ 
                                ?>
								<a href="editslider.php?sliderid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete?');" href="delslider.php?delid=<?php echo $result['id'];?>">Delete</a>
							<?php }else {?>
								<a href="#">No Action</a>
							<?php }?>

								</td>

						</tr>
					<?php } }?>
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
    