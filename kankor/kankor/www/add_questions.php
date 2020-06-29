<!DOCTYPE html>
<html lang="fa" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
  });
</script>
<script type="text/javascript" src="assets/js/mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>


<?php

$title="اضافه نمودن سوالات";
require_once("header.php");

?>
</head>
<!-- END HEAD -->
<?php

if(isset($_POST['submit'])){
	$language=$_POST['language'];
	$subjects=$_POST['subjects'];
	$type=$_POST['type'];
	$faculty=$_POST['faculty'];
	$status=$_POST['status'];
	$question=$_POST['question'];
	$answer1=$_POST['answer1'];
	$answer2=$_POST['answer2'];
	$answer3=$_POST['answer3'];
	$answer4=$_POST['answer4'];
	
	
	$crud=new crud();
	$crud->insert("questions",
	"title,subjects_id,question_language,type,status,faculties_id",
	"'$question','$subjects','$language','$type','$status','$faculty'");
	$rs=$crud->select_latest("questions","id");
	$id=$rs['id'];
	
	
	if($_POST['right']=="1"){
		$right1=1;
	}else{
		$right1=0;
	}
	$crud->insert("answers","questions_id,title,`right`","$id,'$answer1','$right1'");
	
	if($_POST['right']=="2"){
		$right2=1;
	}else{
		$right2=0;
	}
	$crud->insert("answers","questions_id,title,`right`","$id,'$answer2','$right2'");
	
	if($_POST['right']=="3"){
		$right3=1;
	}else{
		$right3=0;
	}
	$crud->insert("answers","questions_id,title,`right`","$id,'$answer3','$right3'");
	
	if($_POST['right']=="4"){
		$right4=1;
	}else{
		$right4=0;
	}
	$crud->insert("answers","questions_id,title,`right`","$id,'$answer4','$right4'");
	
	unset($crud);
	header("location:add_questions.php");
	exit();
	
}

if(isset($_POST['update'])){
	$language=$_POST['language'];
	$subjects=$_POST['subjects'];
	$type=$_POST['type'];
	$faculty=$_POST['faculty'];
	$status=$_POST['status'];
	$question=$_POST['question'];
	$answer1=$_POST['answer1'];
	$answer2=$_POST['answer2'];
	$answer3=$_POST['answer3'];
	$answer4=$_POST['answer4'];
	$id=$_POST['id'];
	
	
	$crud=new crud();


	$crud->update("questions","title='$question',subjects_id='$subjects',question_language='$language',type='$type',status='$status',faculties_id='$faculty'","id=$id");
	
	
	
	
	if($_POST['right']=="1"){
		$right1=1;
	}else{
		$right1=0;
	}
	
	 $crud->update("answers","title='$answer1',`right`='$right1'","id='$_POST[id1]'");
	
	if($_POST['right']=="2"){
		$right2=1;
	}else{
		$right2=0;
	}
	 $crud->update("answers","title='$answer2',`right`='$right2'","id='$_POST[id2]'");
	
	if($_POST['right']=="3"){
		$right3=1;
	}else{
		$right3=0;
	}
   $crud->update("answers","title='$answer3',`right`='$right3'","id='$_POST[id3]'");
	
	if($_POST['right']=="4"){
		$right4=1;
	}else{
		$right4=0;
	}
	$crud->update("answers","title='$answer4',`right`='$right4'","id='$_POST[id4]'");

	unset($crud);
	header("location:add_questions.php");
	exit();
	
}

if(isset($_GET['edit'])){
	
	$editid=$_GET['edit'];
    $crud=new crud();
	$rs=$crud->select("questions","*","id='$editid'");
	$titles=$rs[0]['title'];
	$question_language=$rs[0]['question_language'];
	$subjects_id=$rs[0]['subjects_id'];
	$type=$rs[0]['type'];
	$status=$rs[0]['status'];
	$id=$rs[0]['id'];
	$rs=$crud->select("answers","*","questions_id='$editid'");
	$answer1=$rs[0]['title'];
	$answer2=$rs[1]['title'];
	$answer3=$rs[2]['title'];
	$answer4=$rs[3]['title'];
	
			if($rs[0]['right']==1){
			$right=1;	
			}
			if($rs[1]['right']==1){
			$right=2;	
			}
			if($rs[2]['right']==1){
			$right=3;	
			}
			if($rs[3]['right']==1){
			$right=4;	
			}
	$id1=$rs[0]['id'];
	$id2=$rs[1]['id'];
	$id3=$rs[2]['id'];
	$id4=$rs[3]['id'];
	
	unset($crud);
	
}

if(isset($_GET['delid'])){

	$delid=$_GET['delid'];
    $crud=new crud();
	$rs=$crud->delete("faculties","id='$delid'");
	header("location:add_questions.php");
	exit();	
	
}

?>
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo ">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
	<?php
	
	//logo of template 
	require_once("_logo.php");
	
	?>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<?php
		
		require_once("_topmenu.php");
		?>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<?php
		$parent_menu="administrative";
		$sub_menu="add_questions";
		require_once("sidebar.php");
		?>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">


			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="homepage.php">مدیریت سیستم</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">اضافه نمودن سوالات</a>
					</li>
				</ul>
		
			</div>
					
	                 <form class="form-horizontal" role="form"
							action="add_questions.php" method="post"
							id="form_sample_1"
							>
							
								
							<div class="form-group">
							
							<label for="university" class="col-md-2 control-label">انتخاب زبان</label>
							<div class="md-radio-inline">
							<div class="col-md-4">
								
								<div class="md-radio">
            <input type="radio" id="radio1" value="dari" name="language" 
                 <?php if($question_language=="dari"){echo "checked";} ?> class="md-radiobtn"
				 
				 >
											<label for="radio1">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											دری</label>	
										
										</div>
									
										<div class="md-radio">
											<input type="radio" id="radio2" name="language" class="md-radiobtn" value="pashto" <?php if($question_language=="pashto"){echo "checked";} ?> >
											<label for="radio2">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											پشتو</label>
										</div>	
										</div>
							</div>
							</div>
						
							
							
							
						
	                     <div class="form-group">
							
							<label for="type" class="col-md-2 control-label">انتخاب نوع کانکور</label>
							<div class="col-md-4">
							<div class="md-radio-inline">	
						<div class="md-radio">
						<input type="radio" id="radio3" value="public" name="type"
                          <?php if($type=="public"){echo "checked";} ?>
						class="md-radiobtn" >
											<label for="radio3">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											عمومی</label>	
										
										</div>
									
						<div class="md-radio">
						<input type="radio" id="radio4" name="type" class="md-radiobtn" value="private"  <?php if($type=="private"){echo "checked";} ?>>
											<label for="radio4">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											اختصاصی</label>
										</div>	
										</div>
										</div>
							</div>
														
					   <div class="form-group" id="faculty_id">
					   
					   </div>
					   
					   	<div class="form-group" id="subject">
						<label for="subjects" class="col-md-2 control-label">مضمون</label>	
							<div class="col-md-4">
							<select name="subjects" class="form-control select2me" >
							<option value="">انتخاب</option>
							<?php
							$crud=new crud();
							$rs=$crud->select("subjects","*","");
							for($i=0;$i<sizeof($rs);$i++){
								
							if($subjects_id==$rs[$i]['id']){
							echo "<option selected value='".$rs[$i]['id']."'>".$rs[$i]['title']."</option>";	
							}else{	
							echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['title']."</option>";
							}
								
							}
							?>
							
							</select>
							</div>

                            </div>
							

					   	<div class="form-group">
							
							<label for="university" class="col-md-2 control-label">حالت سوال</label>
							<div class="md-radio-inline">
						<div class="md-radio">
						<input type="radio" id="radio5" name="status" class="md-radiobtn"
						value="primary" <?php if($status=="primary"){echo "checked";} ?>
						>
						<label for="radio5">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						آسان</label>	
						</div>
									
						<div class="md-radio">
						<input type="radio" id="radio6" name="status" class="md-radiobtn"
						value="medium" <?php if($status=="medium"){echo "checked";} ?>>
											<label for="radio6">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											متوسط</label>
										</div>		
						<div class="md-radio">
						<input type="radio" id="radio7" name="status" class="md-radiobtn"
						value="advance" <?php if($status=="advance"){echo "checked";} ?>>
											<label for="radio7">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											سخت</label>
										</div>
							</div>
							</div>
						
							
					   
					   <div class="form-group">
						<label for="province" class="col-md-2 control-label">سوال</label>	
							<div class="col-md-8">
							<textarea name="question" id="editor"
							rows="5" cols="60"><?php echo $titles; ?></textarea>
							
						</div>
                          </div>	

						  <div class="form-group">
						 
						<label for="province" class="col-md-2 control-label">الف</label>
	                  
					  						
							<div class="col-md-3">
							 
						<input type="radio" id="radio8" name="right" class="md-radiobtn"
						value="1" <?php if($right=="1"){echo "checked";} ?>>
                         
					<textarea name="answer1" id="editor1"
							rows="5" cols="60"><?php echo $answer1; ?></textarea>
							
						</div>	
						<label for="province" class="col-md-2 control-label">ب</label>
						<div class="col-md-3">
						<input type="radio" id="radio8" name="right" class="md-radiobtn"
						value="2" <?php if($right=="2"){echo "checked";} ?>>
							<textarea name="answer2" id="editor2"
							rows="5" cols="60"><?php echo $answer2; ?></textarea>
							
						</div>
                          </div>	  
						  <div class="form-group">
						<label for="province" class="col-md-2 control-label">ج</label>	
							<div class="col-md-3">
							<input type="radio" id="radio8" name="right" class="md-radiobtn"
						value="3" <?php if($right=="3"){echo "checked";} ?>>
							<textarea name="answer3" id="editor3"
							rows="5" cols="60"><?php echo $answer3; ?></textarea>
							
						</div>	
						<label for="province" class="col-md-2 control-label">دال</label>
						<div class="col-md-3">
						<input type="radio" id="radio8" name="right" class="md-radiobtn"
						value="4" <?php if($right=="4"){echo "checked";} ?>>
							<textarea name="answer4" id="editor4"
							rows="5" cols="60"><?php echo $answer4; ?></textarea>
							
						</div>
                          </div>							
						
						
						<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
					<input type='hidden' name="id" value="<?php echo $editid;?>"/>
					<input type='hidden' name="id1" value="<?php echo $id1;?>"/>
					<input type='hidden' name="id2" value="<?php echo $id2;?>"/>
					<input type='hidden' name="id3" value="<?php echo $id3;?>"/>
					<input type='hidden' name="id4" value="<?php echo $id4;?>"/>
										<button type="submit"

				name="<?php if(isset($editid)){echo "update";}else{echo"submit";} ?>" class="btn blue-madison"><?php if(isset($editid)){echo "ویرایش";}else{echo"ذخیره";} ?></button>
									</div>
								</div>
						</form>
							
							<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-book"></i>لیست بلندترین/پایین ترین نمرات پوهنحی ها
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									 حالت سوال
								</th>
								<th>
									 سوال
								</th>								
								<th>
									الف
								</th>
								<th>
									 ب
								</th>
							   <th>
								ج
							   </th>
							   <th>
								دال
								</th>
								<th>
								جواب درست
								</th>
								<th>
									ویرایش
								</th> 
								<th>
									حذف
								</th>
							
							</tr>
							</thead>
							<tbody>
							<?php
							
							$crud=new crud();
							$rs=$crud->select_limit("questions","*","order by id desc");
							for($i=0;$i<sizeof($rs);$i++){
								
								
							$id=$rs[$i]['id'];
							
							
							$rs_p=$crud->select("answers","*","questions_id='$id'");
							$right="الف";
							if($rs_p[0]['right']==1){
							$right="الف";	
							}
							if($rs_p[1]['right']==1){
							$right="ب";	
							}
							if($rs_p[2]['right']==1){
							$right="ج";	
							}
							if($rs_p[3]['right']==1){
							$right="دال";	
							}
							
							if($rs[$i]['status']=="primary"){
								$status="آسان";
							}	if($rs[$i]['status']=="medium"){
								$status="متوسط";
							}	if($rs[$i]['status']=="advance"){
								$status="سخت";
							}
							
							
							echo "<tr>
							<td>".($i+1)."</td>
							<td>".$status."</td>
							<td>".$rs[$i]['title']."</td>
							
							<td>".$rs_p[0]['title']."</td>
							<td>".$rs_p[1]['title']."</td>
							<td>".$rs_p[2]['title']."</td>
							<td>".$rs_p[3]['title']."</td>
							<td>$right</tD>
							<td><a href='add_questions.php?edit=".$rs[$i]['id']."'><i class='fa fa-pencil-square-o'></i></a></td>
							<td>
							<a href='add_questions.php?delid=".$rs[$i]['id']."'
							class='delete-row'
							>
							<i class='fa fa-times'></i></a>
							</td>
							</tr>";
							
							}
							
							
							unset($crud);
	
							?>
							
						
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					
		</div>
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	

	</div>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
require_once("footer.php");
?>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

	<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>


<!-- validation and live search select -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/localization/messages_fa.js"></script>
<script>
jQuery(document).ready(function() {    
	FormValidation.init();
});
</script>
<!-- end validation and live search select -->


<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    


   jQuery("#radio3").click(function(){ 
     $("#faculty_id").html(" ");
	 $("#subject").show();
   });
   
   jQuery("#radio4").click(function(){
	   
	   
    	 var dataString = 'id=1';
					$.ajax({
					type: "POST",
					url: "show_faculty.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
	                $("#faculty_id").html(html);
					}
					});
					
	$("#subject").hide();
	
    });
  // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c){
        window.Location = $("a").attr("href");
      }else{
        return false;
      }
    });
	
		CKEDITOR.replace('editor',{contentsLangDirection: 'rtl'});
		CKEDITOR.replace('editor4',{height:'80px',contentsLangDirection: 'rtl'});
		CKEDITOR.replace('editor3',{height:'80px',contentsLangDirection: 'rtl'});
		CKEDITOR.replace('editor2',{height:'80px',contentsLangDirection: 'rtl'});
		CKEDITOR.replace('editor1',{height:'80px',contentsLangDirection: 'rtl'});
	
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   TableAdvanced.init();
   QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts

   Tasks.initDashboardWidget();
     
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>