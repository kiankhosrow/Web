<!DOCTYPE html>
<html lang="fa" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php

$title="امتحان مشاوره رشته کانکور";
require_once("header.php");

?>
</head>
<!-- END HEAD -->
<?php

if(isset($_POST['submit'])){
	$faculty_id = $_POST['faculty_id'];
	$category_id = $_POST['category_id'];
	$crud=new crud();
	$crud->insert("category_faculties","categories_id, faculties_id","$category_id, $faculty_id");
	unset($crud);
	header("location:department_faculty.php");
	exit();
	
}

if(isset($_POST['update'])){
	$category_id = $_POST['category_id'];
	$faculty_id = $_POST['faculty_id'];
	$id=$_POST['id'];
	$crud=new crud();
	$crud->update("category_faculties","categories_id = '$category_id', faculties_id = $faculty_id","id='$id'");
	unset($crud);
	header("location:department_faculty.php");
	exit();
	
}

if(isset($_GET['edit'])){
	
	$editid=$_GET['edit'];
    $crud=new crud();
	$rs=$crud->select("category_faculties","*","id = '$editid'");
	$faculty_id = $rs[0]['faculties_id'];
	$category_id = $rs[0]['categories_id'];
	$id=$rs[0]['id'];
	unset($crud);
	
}

if(isset($_GET['delid'])){

	$delid=$_GET['delid'];
    $crud=new crud();
	$rs=$crud->delete("category_faculties","id='$delid'");
	header("location:department_faculty.php");
	exit();	
	
}

?>
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
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
		$parent_menu="students";
		$sub_menu="advising_kankor";
		require_once("sidebar.php");
		
		if($_SESSION['type'] == "student"){
			$students_id_answer = $_SESSION['id_u'];
		}else if(isset($_GET['id'])){
			$students_id_answer = $_GET['id'];
		}
		?>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<div class="page-bar ">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-gear"></i>
						<a href="student_score.php">مدیریت</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="student_score.php">ربط فاکولته به بخش</a>
					</li>
				</ul>
			</div>
			
			<div class="row margin-top-20">
				<div class="col-md-12">
					<div class="portlet box blue" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> سوالات
							</div>
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="submit_form" method="POST">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<?php
												$crud=new crud();
												$rs=$crud->select("categories","*","deleted!='deleted'");
												$tab = 1;
												for($i = 0; $i < sizeof($rs); $i++){
													echo "<li>
															<a href='#tab$tab' data-toggle='tab' class='step'>
															<span class='number'>
															$tab </span>
															<br>
															<span class='desc'>
															<i class='fa fa-check'></i> ".$rs[$i]['title']." </span>
															</a>
														</li>";
													$tab++;
												}
											?>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											
											
											<?php
												$crud=new crud();
												$rs = $crud->select("categories","*","deleted!='deleted'");
												$tab = 1;
												$count = 1;
												for($i = 0; $i < sizeof($rs); $i++){
													$categories_id = $rs[$i]['id'];
														if($tab == 1){
															$class = "active";
														}else{
															$class = "";
														}
													echo "<div class='tab-pane $class' id='tab$tab'>
															<h3 class='block'></h3>";
					$rs_questions = $crud->select("logic_questions, category_faculties","logic_questions.*","logic_questions.deleted!='deleted' and category_faculties.deleted != 'deleted'
															and logic_questions.faculties_id = category_faculties.faculties_id
															and categories_id = $categories_id");
								for($p = 0; $p < sizeof($rs_questions); $p++){
																$question_id = $rs_questions[$p]['id'];
															echo "<div class='form-group'>
																		<label for='faculty' class='col-md-2 control-label'>$count.</label>
																		<label for='faculty' class='col-md-10 control-label' style = 'text-align:right;'>".$rs_questions[$p]['question']."</label>
																		
																</div>
																<div class='form-group'>
																		<label for='faculty' class='col-md-2 control-label'></label>
																		<label class='radio-inline'>
																			<input type='radio' name='answer$p' id='answer' onclick = 'answer_question($question_id, this.value, $students_id_answer)' value='بلی' > بلی </label>
																			<label class='radio-inline'>
																			<input type='radio' name='answer$p' id='answer' onclick = 'answer_question($question_id, this.value, $students_id_answer)' value='نخیر'> نخیر </label>
																		
																</div>";
															$count++;
															}
															echo "</div>";
													$tab++;
												}
											?>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> بازگشت </a>
												<a href="javascript:;" class="btn blue button-next">
												ادامه <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<a href="test.php" class="btn green button-submit">
												ختم <i class="m-icon-swapright m-icon-white"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
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
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/form-wizard.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   FormWizard.init();
});
function answer_question(question_id, answer, student_id){
	string_data = "question_id="+question_id+"&answer="+answer+"&student_id="+student_id;
	$.ajax({
 type:"POST",
 url:"exam_answer.php",
 data:string_data,
 cache:false,
 success:function(html){
 $("#studentinfo").html('');
 $("#studentinfo").html(html);
 }
 });
}
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>