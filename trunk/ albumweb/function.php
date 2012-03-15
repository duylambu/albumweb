<?php
$upload='upload';
    function Check_Existed_Folder($path){
      if (!mkdir($path, 0, true)) {
        return 1; //existed
        }
        else return 0; //created succcessfully
    }
    function GetListFolder($path = '.', $level = 0)
    {
        $temp="";
         // Directories to ignore when listing output.	
        $ignore = array( '.', '..' ); 
        
        // Open the directory to the handle $dh
        $dh = @opendir( $path ); 
        
        // Loop through the directory 
        while( false !== ( $file = readdir( $dh ) ) ) 
        { 
        // Check that this file is not to be ignored 
        if( !in_array( $file, $ignore ) )
        { 
        // Indent spacing for better view
        $spaces = str_repeat( '&nbsp;', ( $level * 5 ) );
        
        // Show directories only
        //$a=arrray("gsg");
        
        if(is_dir( "$path/$file" ) )
        { 
        // Re-call this same function but on a new directory. 
        // this is what makes function recursive.          

        $temp=$temp.'*'.$file;
        //echo "$spaces<a href='$path/$file/index.php'>$file</a><br />";
        //getDirectory( "$path/$file", ($level+1) ); 
        } 
        } 
        }
        // Close the directory handle 
        closedir( $dh );    
        return $temp;    
    }
	function create_userFolder($userid)
    {
            
    }    
    function getDirectory( $path = '.', $level = 0 )
    { 
        // Directories to ignore when listing output.	
        $ignore = array( '.', '..' ); 
        
        // Open the directory to the handle $dh
        $dh = @opendir( $path ); 
        
        // Loop through the directory 
        while( false !== ( $file = readdir( $dh ) ) ) 
        { 
        // Check that this file is not to be ignored 
        if( !in_array( $file, $ignore ) )
        { 
        // Indent spacing for better view
        $spaces = str_repeat( '&nbsp;', ( $level * 5 ) );
        
        // Show directories only
        if(is_dir( "$path/$file" ) )
        { 
        // Re-call this same function but on a new directory. 
        // this is what makes function recursive.	
        echo "$spaces<a href='$path/$file/index.php'>$file</a><br />";
        getDirectory( "$path/$file", ($level+1) ); 
        } 
        } 
        }
        // Close the directory handle 
        closedir( $dh ); 
    } 

?>