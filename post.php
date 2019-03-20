<?php include'inc/header.php';?>
<?php
if(!isset($_GET['id']) || $_GET['id'] == NULL)
{
	header("Location: 404.php");
}else{
	$id = $_GET['id'];
}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear"> 
			<div class="about">
<?php 
            $query = "select *from post where id = $id";
			$post = $db->select($query);
			if($post){
			 while($result = $post->fetch_assoc())
			    {?>
				        <h2><a href="post.php?id=<?php echo $result['id'] ;?>"><?php echo $result['title'] ;?></a></h2>
						<h4><?php echo $fm->formatdate($result['date']) ;?>,By <a href="#"><?php echo $result['author'] ;?></a></h4>
						 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
						<?php echo ($result['body']) ;?>

				
							
					<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
					$catid = $result['cat'];
					$querycat = "select * from post where cat = '$catid'";
					$related_post = $db->select($querycat);
					if($related_post)
					{
							while ($rpost = $related_post->fetch_assoc() ) 
							{?>
								<a href="post.php?id=<?php echo $rpost['id'];?>"><img src="admin/<?php echo $rpost['image']; ?>" alt="post image"/></a>
							<?php } 
					} else { echo "No Related Post Available"; }?>
								
							</div>
		  <?php } ?>
		     <?php } else {header("Location:404.php");}?> 
	  </div>

</div>
<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php'; ?>
		