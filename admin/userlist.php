<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <?php
                if(isset($_GET['deluser'])){
                	$delid = $_GET['deluser'];
                    $delquery ="delete from tbl_user where id = '$delid' ";
                    $del = $db->delete($delquery);
                    if($del){
                    	echo "<span class='success'>User Deleted Successfuly!</span>";

                    }else{
                    	echo "<span class='error'>User Not Deleted!</span>";

                    }
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width ="5%">No</th>
							<th width ="20%">Name</th>
							<th width ="15%">User Name</th>
                            <th width ="20%" >Email</th>
                            <th width ="18%">Details</th>
                            <th width ="10%">User Role</th>
                            <th width ="12%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query = "select *from tbl_user";
						$User = $db->select($query);
						if($User){
							$i = 0;
						while($result = $User->fetch_assoc()){
                             $i++;

					     ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
                            <td><?php echo $result['username'];?></td>
                            <td><?php echo $result['email'];?></td>
                            <td><?php echo $fm->textShorten($result['detail'],50);?></td>
                            <td><?php 
                             if($result['role'] == '0'){
                               echo "Admin";
                             }else if($result['role'] == '1'){
                                echo "Author";
                             }else if($result['role'] == '2'){
                                echo "Editor";
                             }
                            ?></td>
							<td><a href="viewuser.php?userid= <?php echo $result['id'];?>">View</a>
                             <?php
                              $userrole = Session::get('userrole');
                              if($userrole == '0'){?>
                             || <a onclick="return confirm('Are you sure to Delete?');" href="?deluser=<?php echo $result['id'];?>">Delete</a> <?php } ?></td>
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

