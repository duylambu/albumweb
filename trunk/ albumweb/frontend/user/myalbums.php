<?php
if($_SESSION['user']==null || !isset($_SESSION['user']))
{?>
  <script>
    window.location="?param=admin";
    </script> 
<?php
}?>	
<?php
include_once('dbconnect.php');
?>

<script>
function checkAlbumName(albumname)
{
    if(albumname.length>0) return true;
    else return false;
}
</script>
<style>
span#mess_success{
    color:red;font-size:11px;font-style:italic;
}
div#list-albums{
    width:100%;
    float:left;
}
div.album-item{
    width:150px;
    height:150px;
    float:left;
}
img.avatar{
    width:100px;
    height:100px;   
     
}
</style>
<div id="list-albums">
<?php
$id=$_SESSION['user']['id']; 
$query="select * from album where owner=$id";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
    <div class="album-item">
    <div><a><img class="avatar" src="upload/<?php echo $id;?>/<?php echo $row['album_id'];?>/avatar/<?php echo $row['avatar'];?>" /></a></div>
    <div><a><?php echo $row['album_name'];?></a></div>
    <div><a href="?param=edit_album&id=<?php echo $row['album_id'];?>">Edit</a> | <a href="?param=detail_album&id=<?php echo $row['album_id'];?>">View</a></div>
    </div>
<?php 
}
?>
</div>

<div>Creat New Album</div>
<script type="text/javascript">
    $(document).ready(function() 
    { 
        $('#createalbum').click(function()	
        {
            var albumname=document.getElementById('album_name').value;
            if(!checkAlbumName(albumname)){
            $('#mess_success').html('Album name is not empty!');
            return false;
            }
            
            $("#preview").html('');
            $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
            $("#newalbum").ajaxForm(
            {
            //target: '#preview'
            success:function(string){
              $('#list-albums').append(string); 
              $("#preview").html(''); 
            }
            }).submit();
        });
        $('#album_name').focusout(function(){
        $('#mess_success').html('');
        //var user="<?php echo $_SESSION['user']['id'];?>";
        var user=1;
        var albumname=document.getElementById('album_name').value;        
        if(!checkAlbumName(albumname)){
            $('#mess_success').html('Album name is not empty!');
            return false;
            }
       $.ajax({
            url: 'frontend/album/validate_album.php',
            type: 'POST',
            cache: false,
            data: {'albumname':albumname,'user':user},
            success: function(string){
                var getData = $.parseJSON(string);
                if(getData.value>0)
                {                    
                }
                else
                {                    
                }
                $('#mess_success').html(getData.mess);
            },
            error: function (){
                alert('Error');               
            }
        });
    });
    }); 
</script>
    
 <?php
session_start();
?>
<div id='preview'>
</div>
<form id="newalbum" method="post" enctype="multipart/form-data" action='frontend/album/new_album.php'>
<table>
<tr><td>Album name:</td><td><input type="text" id="album_name" name="album_name" /><span id="mess_success"></span></td></tr>
<tr><td>Share?</td><td><select name="share">
<option value="0">Private</option>
<option value="1">Public</option>
</select></td></tr>
<tr><td>Avatar:</td><td><input type="file" name="file" id="file" /></td></tr>
<input type="hidden" name="uid" id="uid" value="<?php echo $id;?>" />
<tr><td><input type="button" name="createalbum" id="createalbum" value="Create"/></td></tr>
</table>
</form>
