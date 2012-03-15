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
</style>
<script>
$(document).ready(function(){
    $('#create_album').click(function(){
        $('#mess_success').html('');
        //alert('alflaf');
        //var user="<?php echo $_SESSION['user']['id'];?>";
        var user=1;
        var albumname=document.getElementById('album_name').value;
        var avatar=document.getElementById('album_avatar').value;
       // alert(albumname+'user:'+user+'image:'+avatar);
        if(!checkAlbumName(albumname)){
            $('#mess_success').html('Album name is not empty!');
            return false;
            }
       /*     
       $.ajax({
            url: 'frontend/functions/album/create_new_album.php',
            type: 'POST',
            cache: false,
            data: {'albumname':albumname,'user':user,'file':avatar},
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
        */
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
            url: 'frontend/functions/album/validate_album.php',
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
$id=$_SESSION['user']['id']; 
$query="select * from album where owner=$id";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
    <div id="album-item">
    <div><a><img src="<?php //echo $row['avatar'];?>" /></a></div>
    <div><a><?php echo $row['album_name'];?></a></div>
    <div><a href="?param=edit_album&id=<?php echo $row['album_id'];?>">Edit</a> | <a href="?param=detail_album&id=<?php echo $row['album_id'];?>">View</a></div>
    </div>
<?php 
}
?>
<div>Creat New Album</div>
<div>
<form id="new_album_form" action="frontend/functions/album/create_new_album.php" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>Album name:</td><td id="td_create"><input type="text" id="album_name" name="album_name" /><span id="mess_success"></span></td>
<tr><td>Avatar:</td><td><input type="file" name="file" id="file" /></td></tr>
<tr><td><input type="submit" id="create_album" name="create_album" value="Create" /></td></tr>
</tr>
</table>
</form>
</div>