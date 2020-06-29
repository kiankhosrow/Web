<?php
require_once("../lib/db.php");
require_once("../lib/crud.php");



?>

		<div class="form-group">
						<label for="faculty" class="col-md-2 control-label">پوهنحی</label>	
							<div class="col-md-4">
							<select name="faculty" class="form-control select2me">
							<option value="">انتخاب فاکولته</option>
							<?php
							
							$crud=new crud();
							$rs=$crud->select("faculties,universities","faculties.id as id,universities.name as uname,faculties.name as fname","universities.id=faculties.universities_id");
							for($i=0;$i<sizeof($rs);$i++){
								
							if($provinces_id==$rs[$i]['id']){
							echo "<option selected value='".$rs[$i]['id']."'>
							".$rs[$i]['fname']."(".$rs[$i]['uname'].")</option>";	
							}else{	
							echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['fname']."(".$rs[$i]['uname'].")</option>";
							}
								
							}
							?>
							
							</select>
							</div>

                            </div>			
					   