 <?php include'inc/header.php';?>
  <?php
                      if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL)
                      {
                        header("Location:404.php");
                      } else{
                        $pageid = $_GET['pageid'];  
                      }

                    ?>
                    	<?php    
                        $query1 = "select * from tbi_pages where id = '$pageid' ";
                        $page = $db->select($query1);
                        if($page){
                        while($result = $page->fetch_assoc()){?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				       <h2><?php echo $result['name'];?></h2>
				       <p><?php echo $result['body'];?></p>
	          
	 </div>

</div>
<?php } }else{
   header("Location:404.php");	
}
 
?>

<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php'; ?>