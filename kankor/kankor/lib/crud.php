<?php
// include db
require_once("db.php");


class crud{
	
	//insert function
	function insert($table, $column, $value){
	
		$sql="Insert Into $table ($column) values($value)";
	  //echo "<h3>".$sql."</h3>";
		$rs=mysqli_query($GLOBALS['DB'], $sql)or die(mysqli_error());
		return $rs;
		
	}


	//delete function
	function delete($table , $condition){
	
		if($condition == ""){
			$sql ="delete  from $table";
		}else{
			$sql ="delete  from $table where $condition";
		}
		//$sql=substr($sql,0,strlen($sql)-5);
		$rs=mysqli_query($GLOBALS['DB'],$sql) or die(mysqli_error());
		
		return $rs;
	
	}
	
	// update
	function update($table, $value, $condition){
	
		if($condition == ""){
			$sql = "update $table set $value";
		}else{
			$sql = "update $table set $value where $condition";
		}
	    //echo "<h3>$sql</h3>";	
		$rs = mysqli_query($GLOBALS['DB'], $sql) or die(mysqli_error());
		
		return $rs;
		
	}


	// select query with three parameter table , column and condition

	function select($table,$column,$condition){
             
		if($condition == ""){
			$sql  = "select $column from $table";
        }else{
			$sql  = "select $column from $table where $condition";
		}
		
		//echo "<h5>".$sql."<br></h5>";
		
		$rs=mysqli_query($GLOBALS['DB'], $sql) or die(mysqli_error());
		$rows;
		
		while($row = mysqli_fetch_assoc($rs)){
			$rows[] = $row;
		}	
		
		return $rows;
		
  
	}
	
	//select query with limit
	function select_limit($table,$column,$limit){
	
		$sql  = "select $column from $table $limit";
	//	echo $sql;
		$rs=mysqli_query($GLOBALS['DB'], $sql) or die(mysqli_error());
		$rows;
		
		while($row = mysqli_fetch_assoc($rs)){
		if(mysqli_num_rows($rs)>0){
			$rows[] = $row;
		}		
		}	
		
		return $rows;
		
  
	}
	
	//select latest record
	function select_latest($table, $column){

		$sql  = "select $column from $table order by id desc limit 1";
	//	echo "<br/><h1>".$sql."</h1>";
		$rs=mysqli_query($GLOBALS['DB'], $sql) or die(mysqli_error());
		$row = mysqli_fetch_assoc($rs);
		return $row;
  
	}
	
		//select latest record
	function select_latest_manual($table, $column,$limit){

		$sql  = "select $column from $table $limit";
		//echo $sql;
		$rs=mysqli_query($GLOBALS['DB'], $sql) or die(mysqli_error());
		$row = mysqli_fetch_assoc($rs);
		return $row;
  
	}
	
	
	
  
}

?>