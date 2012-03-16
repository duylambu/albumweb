<?php
if($_SESSION['user']==null || !isset($_SESSION['user']))
{?>
    <script>
    window.location="?param=log_in";
    </script>    
<?php
} 
?>
<?php
include_once('dbconnect.php');
?>


 
 
 <style>
#fade { /*--Transparent background layer--*/
        display: none; /*--hidden by default--*/
        background: #000;
        position: fixed; left: 0; top: 0;
        width: 100%; height: 100%;
        opacity: .80;
        z-index: 9999;
}
.popup_block{
        display: none; /*--hidden by default--*/
        background: #fff;
        padding: 20px;
        border: 20px solid #ddd;
        float: left;
        font-size: 1.2em;
        position: fixed;
        top: 50%; left: 50%;
        z-index: 99999;
        /*--CSS3 Box Shadows--*/
        -webkit-box-shadow: 0px 0px 20px #000;
        -moz-box-shadow: 0px 0px 20px #000;
        box-shadow: 0px 0px 20px #000;
        /*--CSS3 Rounded Corners--*/
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
}
div#popup_name{
    overflow: auto;
}
img.btn_close {
        float: right;
        margin: -55px -55px 0 0;
}
/*--Making IE6 Understand Fixed Positioning--*/
*html #fade {
        position: absolute;
}
*html .popup_block {
        position: absolute;
}
</style>

<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){                                                                      
        //When you click on a link with class of poplight and the href starts with a # 
        $('a.poplight[href^=#]').click(function() {
                var popID = $(this).attr('rel'); //Get Popup Name
                var popURL = $(this).attr('href'); //Get Popup href to define size
                                
                //Pull Query & Variables from href URL
                var query= popURL.split('?');
                var dim= query[1].split('&');
                var popWidth = dim[0].split('=')[1]; //Gets the first query string value
                var param_id=query[1].split('&')[1];
                var aid=param_id.split('=')[1];
                
                var param_photoid=query[1].split('&')[2];
                var photoid=param_photoid.split('=')[1];
                
                //Fade in the Popup and add close button
                $('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>');
                
                //Define margin for center alignment (vertical + horizontal) - we add 80 to the height/width to accomodate for the padding + border width defined in the css
                var popMargTop = ($('#' + popID).height() + 80) / 2;
                var popMargLeft = ($('#' + popID).width() + 80) / 2;
                
                //Apply Margin to Popup
                $('#' + popID).css({ 
                        'margin-top' : -popMargTop,
                        'margin-left' : -popMargLeft
                });
                
                //Fade in Background
                $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
                $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer 
                
                $('#popup_name').load('frontend/album/view_photo.php?id='+photoid+'&aid='+aid);
                
                return false;
        });
        
        
        //Close Popups and Fade Layer
        $('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
                  $('#fade , .popup_block').fadeOut(function() {
                        $('#fade, a.close').remove();  
        }); //fade them both out
                
                return false;
        });
 
        
});
</script> 




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
<h2>VIEW ALBUM</h2>
<div id="detail-album">
<?php
$uid=$_GET['uid'];
$id=$_GET['id'];
$query="select * from photo where album_id=$id";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div id="photo-item">
<div id="photo-image"><a rel="popup_name" class="poplight" href="#?w=600&aid=<?php echo $row['album_id'] ?>&photoid=<?php echo $row['photo_id']?>"><img id="image" src="upload/<?php echo $uid;?>/<?php echo $row['album_id'];?>/<?php echo $row['image'];?>"/></a></div>
<div><?php echo $row['photo_name'];?></div>
</div>
<?}
 ?>
 </div>
 
  
<div id="popup_name" class="popup_block">    
</div>  