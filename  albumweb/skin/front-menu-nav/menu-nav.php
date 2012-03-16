<ul>
	<li><a href="?param=index" id="current">Home</a></li>
    <?php
    if($_SESSION['user']!=null || isset($_SESSION['user']))
    {?>
      <li><a href="?param=myalbums" >My Albums</a>
    </li>  
    <?php
    }?>	
	
    <?php
    if($_SESSION['user']==null || !isset($_SESSION['user']))
    {?>
       <li><a href="?param=register">Register</a></li>
	<li><a href="?param=log_in">Login</a></li>  
    <?php
    }?>			                  
    
	<li><a href="?param=logout">Logout</a>           
    </li>		        
   	<li><a href="?param=view_user">View User</a>           
    </li>           
   </ul>