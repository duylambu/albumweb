<?php
include_once('dbconnect.php');
?>
<style>
div#detail-album{
    float:left;
    margin-bottom:30px;
}
div.photo-item
{
    width:120px;
    height:120px;
    float:left;
}
img.image{
    width:100px;
    height:100px;
}
</style>
<h2>EDIT ALBUM</h2>
<div id="album-item">
<div></div>
</div>
<div id="detail-album">
<?php
$userid=$_SESSION['user']['id'];
$id=$_GET['id'];
$query="select * from photo where album_id=$id";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div class="photo-item">
<div class="photo-image"><img class="image" src="upload/<?php echo $userid;?>/<?php echo $row['album_id'];?>/<?php echo $row['image'];?>" /></div>
<div class="photo-name"><?php echo $row['photo_name'];?></div>
</div>
<?}
 ?>
 </div> 
 
<script type="text/javascript">
    $(document).ready(function() 
    { 
        $('#photoimg').live('change', function()	
        { 
            $("#preview").html('');
            $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
            $("#imageform").ajaxForm(
            {
            //target: '#preview',
            success:function(string){
              $('#detail-album').append(string);  
              $("#preview").html('');
              $('#photoimg').val('');
            }
            }).submit();
        });
    }); 
</script>
    
 <?php
session_start();
$session_id='1'; // User login session value
?>
<div id="add-photo">
<form id="imageform" method="post" enctype="multipart/form-data" action='frontend/album/ajaximage.php'>
Upload image <input type="file" name="photoimg" id="photoimg" />
<input type="hidden" name="albumid" id="albumid" value="<?php echo $id?>" />
<input type="hidden" name="uid" id="uid" value="<?php echo $userid;?>" />
</form>
</div>
<div id='preview'>
</div>