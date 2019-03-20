<?php include 'inc/aheader.php';?>
<?php include 'inc/asidebar.php';?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Update Catagory</h2>
               <div class="block copyblock"> 
                <?php
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $theme = $_POST['theme'];
             $theme = mysqli_real_escape_string($db->link,$theme);
                $query = "UPDATE tbl_themes
                 SET theme = '$theme'
                 WHERE id = '1' ";
                $themeupdate = $db->update($query);
                if($themeupdate){
                    echo "<span class='success'>Theme Updated Successfuly!</span>";
                }else{
                    echo "<span class='error'>Theme Not Updated!</span>";
                }
             }
        ?>
<?php
              $themequery = "select * from tbl_themes where id ='1' ";
              $themes = $db->select($themequery);
              while($result = $themes->fetch_assoc()){
?>
<form action="" method="post">
<table class="form">                    
    <tr>
        <td>
            <input <?php if($result['theme'] == 'default' ){echo "checked";} ?> type="radio" name="theme" Value ="default"/> Default
        </td>
    </tr>
    <tr>
        <td>
            <input <?php if($result['theme'] == 'green' ){echo "checked";} ?> type="radio" name="theme" Value ="green"/> Green
        </td>
    </tr>
    <tr> 
        <td>
            <input type="submit" name="submit" Value="Change" />
        </td>
    </tr>
</table>
</form>
<?php }?>
                </div>
            </div>
        </div>
<?php include 'inc/afooter.php';?>
