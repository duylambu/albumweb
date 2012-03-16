
<?php
if($_SESSION['user']!=null || isset($_SESSION['user']))
{?>
    <style>
    img#avatar-user{
        width:100px;
        height: 100px;
    }
    </style>
    
    <div>
    <form>
    <div>WELCOME:<?php echo $_SESSION['user']['username'];?></div>
    <div><img id="avatar-user" src="upload/<?php echo $_SESSION['user']['id'];?>/avatar/<?php  echo $_SESSION['user']['avatar'];?>" id="avatar" name="avarta" /></div>
    <div id="info-container">
    </div>
    </form>
    </div>  
<?php
} 
?>
