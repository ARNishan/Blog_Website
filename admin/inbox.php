<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
            <?php
                 if(isset($_GET['delid'])){
                  $delid = $_GET['delid'];
                  $delquery ="delete from tbl_contuct_us where id = '$delid' ";
                  $del = $db->delete($delquery);
                  if($del){
                    	echo "<span class='success'>Message Deleted Successfuly!</span>";
                    	echo "</br>";

                    }else{
                    	echo "<span class='error'>Message Not Deleted!</span>";

                    }
                   }
                   
                   
                  ?>
                  <?php    
                        $query1 = "select * from tbl_contuct_us";
                        $message1 = $db->select($query1);
                        if($message1){
                        	$j = 0;
                        while($result1 = $message1->fetch_assoc()){
                             if($result1['status'] == 0){
                              $j++;
                             }
                           }
                           echo "You have $j unread message";
                       }
                        	?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width ="5%">No.</th>
							<th width ="20%">Name</th>
							<th width ="20%">Email</th>
							<th width ="23%">Message</th>
							<th width ="20%">Date</th>
							<th width ="12%">Action</th>
						</tr>
					</thead>
					<tbody>		
						<?php    
                        $query = "select * from tbl_contuct_us order by date DESC";
                        $message = $db->select($query);
                        if($message){
                        	$i = 0;
                        while($result = $message->fetch_assoc()){
                             $i++;
                        	?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname']." ".$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShorten($result['message'],100);?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || <a href="repmsg.php?repid=<?php echo $result['id'];?>">Replay</a></td>
						</tr>
					<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
             <div class="box round first grid">
                       <h2>Seen</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width ="5%">No.</th>
							<th width ="20%">Name</th>
							<th width ="20%">Email</th>
							<th width ="25%">Message</th>
							<th width ="20%">Date</th>
							<th width ="10%">Action</th>
						</tr>
					</thead>
					<tbody>		
						<?php    
                        $query = "select * from tbl_contuct_us where status = '1'";
                        $message = $db->select($query);
                        if($message){
                        	$i = 0;
                        while($result = $message->fetch_assoc()){
                             $i++;
                        	?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname']." ".$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShorten($result['message'],100);?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><a onclick="return confirm('Are you sure to Delete?');" href="?delid=<?php echo $result['id'];?>">Delete</a></td>
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