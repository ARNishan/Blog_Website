<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width ="5%">No</th>
							<th width ="15%">Post Title</th>
							<th width ="15%">Description</th>
							<th width ="10%">Category</th>
							<th width ="10%">Image</th>
							<th width ="10%">Author</th>
							<th width ="10%">Tage</th>
							<th width ="10%">Date</th>
							<th width ="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT post.*, tbl_category.name FROM post INNER JOIN tbl_category ON 
						     post.cat = tbl_category.id
						     ORDER BY post.title";
						     $post = $db->select($query);
						     if($post){
						     	$i = 0;
						     while($result = $post->fetch_assoc()){
						     		$i++; ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><a href="editpost.php?editid=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></td>
							<td><?php echo $fm->textShorten($result['body'],100);?></td>
							<td><?php echo $result['name'];?></td>
							<td><img src="<?php echo $result['image']; ?>" height ="40px" width ="60px" /></td>
							<td><?php echo $result['author'];?></td>
							<td><?php echo $result['tags'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
							<?php
                                if($result['userid'] == Session::get('userid') || Session::get('userrole') == '0' ){ 
                                ?>
								<a href="editpost.php?editid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete?');" href="delpost.php?delid=<?php echo $result['id'];?>">Delete</a>
							<?php }else {?>
								<a href="viewpost.php?viewid=<?php echo $result['id'];?>">View</a>
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
    