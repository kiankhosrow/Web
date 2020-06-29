<?php
	class uploads{
	
	
	   
	   function upload($file_name,$newfile_name,$temp_file,$id,$des){

	 
	$file_ext = substr($file_name, strripos($file_name, '.'));
   
	$destination1= $des.$newfile_name."".$file_ext;
	
	  move_uploaded_file($temp_file,$destination1);
	return $file_ext; 
	
	
	   }


	}	
?>