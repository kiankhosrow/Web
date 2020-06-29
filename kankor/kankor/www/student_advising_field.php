<!DOCTYPE html>
<html lang="fa" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php

$title="نمرات نظر به بخش ها";


require_once("header.php");
$crud=new crud();
?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/jquery-tags-input/jquery.tagsinput-rtl.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/typeahead/typeahead.css">
<!-- END PAGE LEVEL STYLES -->

</head>
<!-- END HEAD -->

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
		$parent_menu = "students";
		$sub_menu = "student_advising_field";
		
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
						<a href="student_advising_field.php">شاگردان</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="student_advising_field.php">نمرات نظر به بخش ها</a>
					</li>
				</ul>
			</div>
				
				
				<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> نمرات نظر به بخش ها
							</div>
						</div>
						<div class="portlet-body">
							<form class="form-inline" role="form" method = "post" action = "student_advising_field.php">
								<?php
							if($_SESSION['type'] == "student"){
								$student_edit = $crud -> select("student_scores", "*", "students_id = $_SESSION[id_u]");
							}else if(isset($_GET['id'])){
								$student_edit = $crud -> select("student_scores", "*", "students_id = $_GET[id]");
							}
							
							if($_SESSION['type'] == "admin" || $_SESSION['type'] == "teacher"){
						?>
							<div class="form-group">
								<select name="student" id = "student" class="form-control select2me" style = "width:300px">
									<option value="">انتخاب شاگرد</option>
									<?php
									$crud=new crud();
									$rs=$crud->select("students","*","status = 'approved'");
									for($i=0;$i<sizeof($rs);$i++){
								
										if($_GET['id'] ==$rs[$i]['id']){
											echo "<option selected value='".$rs[$i]['id']."'>".$rs[$i]['first_name']." ".$rs[$i]['last_name']."</option>";	
										}else{	
											echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['first_name']." ".$rs[$i]['last_name']."</option>";
										}
								
									}
									?>
							
							</select>
							</div>
							<button type="submit" class="btn btn-default" name = "search" id = "search">جستجو</button>

						<?php
							}
						?>
							</form>
							<?php
								if(isset($_POST['search'])){
									header("Location:student_advising_field.php?id=$_POST[student]");
									exit();
								}
							?>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
				
				
							<form class="form-horizontal" role="form" action="student_advising_field.php" method="post" enctype = "multipart/form-data">
						<?php
						
							$rs_categories = $crud->select("categories","*","deleted != 'deleted'");
							for($z = 0; $z < sizeof($rs_categories); $z++){
							echo "<div class='page-bar'>
									<ul class='page-breadcrumb'>
										<li>
											<i class='fa fa-home'></i>
											<a href='student_advising_field.php'>".$rs_categories[$z]['title']."</a>
										</li>
									</ul>
								</div>";
							$rs_classes = $crud->select("classes","*","deleted != 'deleted'");
							for($p = 0; $p < sizeof($rs_classes); $p++){
						?>
						
							<div class="portlet box green-haze">
						<div class="portlet-title"><h6></h6>
							<div class="caption">
								<i class="fa fa-globe"></i>لیست مضامین صنف <?php echo $rs_classes[$p]['name'];?>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover sample_1_class" id="">
							<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									 مضمون
								</th>
								<th>
									 چهارنیم ماهه
								</th>								
								<th>
									سالانه
								</th>
								<th>
									کارخانگی
								</th>
								<th>
									فعالیت صنفی
								</th>
								<th>
									مجموع
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$class_id = $rs_classes[$p]['id'];
							$rs=$crud->select("subjects, class_subjects","*","deleted != 'deleted' and classes_id = '$class_id' and subjects_id = subjects.id and categories_id = ".$rs_categories[$z]['id']."");
							$total = 0;
							for($i=0;$i<sizeof($rs);$i++){
							$id = $rs[$i]['id'];
							$rs_scores = "";
							if(isset($student_edit[0]['students_id'])){
								$rs_scores=$crud->select("student_scores","*","classes_id = '$class_id' and students_id = '".$student_edit[0]['students_id']."' and subjects_id = '$id'");
								$mid_term = $rs_scores[0]['mid_term'];
								$final = $rs_scores[0]['final'];
								$homework = $rs_scores[0]['homework'];
								$class_activity = $rs_scores[0]['class_activity'];
								$score = $rs_scores[0]['score'];
							}else{
								$mid_term = 0.00;
								$final = 0.00;
								$homework = 0.00;
								$class_activity = 0.00;
								$score = 0.00;
							}
							if($_SESSION['type'] == "student"){
								$stid = $_SESSION['id_u'];
							}else{
								$stid = $_GET['id'];
							}
							echo "<tr>
							<td>".($i+1)."</td>
							<td>".$rs[$i]['title']."</td>
							<td>".$mid_term."</td>
							<td>".$final."</td>
							<td>".$homework."</td>
							<td>".$class_activity."</td>
							<td>".$score."</td>
							</tr>";
							$total += $score;
							}
							
							echo "<tr><td colspan = '6' style = 'text-align:center;'>مجموع </td><td style = 'color:red;'>$total</td></tr>";
							?>
							
						
							</tbody>
							</table>
						</div>
					</div>
					<?php
							}
							}
					?>
					
						</form>
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


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-markdown/lib/markdown.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    

  // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c){
        window.Location = $("a").attr("href");
      }else{
        return false;
      }
    });
	
	
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