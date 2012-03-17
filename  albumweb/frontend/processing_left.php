<?php	
        include_once("menu/menuleft.php");        
		if($_SESSION['user']!=null || isset($_SESSION['user']))
        {
            if($_GET['param']=="detail_album" || $_GET['param']=="edit_album")
        	   {		
                include_once("frontend/album/album_info.php");  
                return;      
        	   } 
        }

?>