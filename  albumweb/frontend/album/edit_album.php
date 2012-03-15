<?php
include_once('dbconnect.php');
?>
<style>
div#photo-item
{
    width:120px;
    height:120px;
    float:left;
}
img#image{
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
<div id="photo-item">
<div id="photo-image"><img id="image" src="upload/<?php echo $userid;?>/<?php echo $row['album_id'];?>/<?php echo $row['image'];?>" /></div>
<div><?php echo $row['photo_name'];?></div>
</div>
<?}
 ?>
 </div>
 
 
 <h1>test</h1>
 
<script type="text/javascript">
    $(document).ready(function() 
    { 
        $('#photoimg').live('change', function()	
        { 
            $("#preview").html('');
            $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
            $("#imageform").ajaxForm(
            {
            target: '#preview'
            }).submit();
        });
    }); 
</script>
    
 <?php
include('db.php');
session_start();
$session_id='1'; // User login session value
?>

<form id="imageform" method="post" enctype="multipart/form-data" action='frontend/album/ajaximage.php'>
Upload image <input type="file" name="photoimg" id="photoimg" />
<input type="hidden" name="albumid" id="albumid" value="<?php echo $id?>;" />
</form>
<div id='preview'>
</div>