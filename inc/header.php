<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'helpers/format.php';?>
<?php 
   $db = new Database();
   $fm = new format();
?>         
<!DOCTYPE html>
<html>
<head>
	<?php               
	               if(isset($_GET['pageid']))
                        { $pagetitle = $_GET['pageid'];  
                        $query = "select * from tbi_pages where id ='$pagetitle' ";
                        $page = $db->select($query);
                        if($page){
                        while($result = $page->fetch_assoc()){?>
	        <title><?php echo $result['name'].' | '.TITLE; ?></title>
	   <?php } } }
	            elseif(isset($_GET['id']))
                        { $postid = $_GET['id'];  
                        $query = "select * from post where id ='$postid' ";
                        $post = $db->select($query);
                        if($post){
                        while($result = $post->fetch_assoc()){?>
	        <title><?php echo $result['title'].' | '.TITLE; ?></title>
	   <?php } } }
	              elseif(isset($_GET['category']))
                        { $categoryid = $_GET['category'];  
                        $query = "select * from tbl_category where id ='$categoryid' ";
                        $category = $db->select($query);
                        if($category){
                        while($result = $category->fetch_assoc()){?>
	        <title><?php echo $result['name'].' | '.TITLE; ?></title>
	   <?php } } }

	   else{?>
		    <title><?php echo $fm->title().' | '.TITLE; ?></title>
	   <?php } ?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<?php include "script/css.php"; ?>
	<?php include "script/js.php"; ?>
	
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<?php  $query = "select *from title_slogan where id ='1' ";
                        $title_slogan = $db->select($query);
                        if($title_slogan){
                        while($result = $title_slogan->fetch_assoc()){?>
				<img src="admin/<?php echo $result['logo']; ?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p><?php echo $result['slogan'];?></p>
			<?php } }?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php  
				 $query = "select * from dbl_social";
                        $Social = $db->select($query);
                        if($Social){
                        while($result = $Social->fetch_assoc()){
                     
                        ?>
				<a href="<?php echo $result['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php }}?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="post">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<?php 
   			$path = $_SERVER['SCRIPT_FILENAME'];
			$current_page = basename($path,'.php');
	?>
	<ul>
		<li><a <?php if($current_page == 'index'){echo "id='active'";}?> 
             href="index.php">Home</a></li>
		<?php    
                        $query = "select * from tbi_pages";
                        $addpage = $db->select($query);
                        if($addpage){
                        while($result = $addpage->fetch_assoc()){?>
                        
                        <li>
                        	<a 
                        	<?php
                           if(isset($_GET['pageid']) && $_GET['pageid'] == $result['id'] ){
                        	echo "id='active'";
                        	} 
                            ?> 

                        	href="page.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a> </li>
                        <?php  } }?>	
		<li><a <?php 
		if($current_page == 'contact_us'){echo "id='active'";}?> href="contact_us.php">Contact</a></li>
	</ul>
</div>
