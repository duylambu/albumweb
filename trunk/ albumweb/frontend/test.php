<?php
include_once('dbconnect.php');
?>
<style>
span#mess_success{
    color:red;font-size:11px;font-style:italic;
}
</style>
<script>
$(document).ready(function(){
    $('#create_sdfalbum').click(function(){
        //$('#mess_success').html('');
        alert('afaf');
        var avatar=document.getElementById('album_avatar').value;
       $.ajax({
            url: 'frontend/testupload.php',
            type: 'POST',
            cache: false,
            data: {'file':avatar},
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

<div>Creat New Album</div>
<div>
<form id="newalbumform" name="newalbumform" action="frontend/testupload.php" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>Album name:</td><td id="td_create"><input type="text" id="album_name" name="album_name" /><span id="mess_success"></span></td>
<tr><td>Avatar:</td><td><input type="file" name="album_avatar" id="album_avatar" /></td></tr>
<tr><td><input type="submit" id="create_album" name="create_album" value="Create" /></td></tr>
</tr>
</table>
</form>
</div>