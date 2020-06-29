<!DOCTYPE html>
<html lang="fa" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php

$title="ربط مضامین به فاکولته";
require_once("header.php");

?>
</head>
<!-- END HEAD -->
<?php

if(isset($_POST['submit'])){
	$faculty = $_POST['faculty'];
	$subject = $_POST['subject'];
	$score = $_POST['score'];
	$crud=new crud();
	$crud->insert("faculty_subject_scores","score, faculties_id, subjects_id","'$score', $faculty, $subject");
	unset($crud);
	header("location:faculty_subject_score.php");
	exit();
	
}

if(isset($_POST['update'])){
	$score = $_POST['score'];
	$subject = $_POST['subject'];
	$faculty = $_POST['faculty'];
	$id = $_POST['id'];
	$crud=new crud();
	$crud->update("faculty_subject_scores","score = '$score', subjects_id = '$subject', faculties_id = '$faculty'","id='$id'");
	unset($crud);
	header("location:faculty_subject_score.php");
	exit();
	
}

if(isset($_GET['edit'])){
	
	$editid=$_GET['edit'];
    $crud=new crud();
	$rs=$crud->select("faculty_subject_scores","*","id='$editid'");
	$score = $rs[0]['score'];
	$subject = $rs[0]['subjects_id'];
	$faculty = $rs[0]['faculties_id'];
	$id = $rs[0]['id'];
	unset($crud);
	
}

if(isset($_GET['delid'])){

	$delid=$_GET['delid'];
    $crud=new crud();
	$rs=$crud->delete("faculty_subject_scores","id='$delid'");
	header("location:faculty_subject_score.php");
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
		$sub_menu="faculty_subject_score";
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
						<a >مدیریت</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a >ربط مضامین به فاکولته</a>
					</li>
				</ul>
			</div>
							<form class="form-horizontal" role="form" id="form_sample_1"
							action="faculty_subject_score.php" method="post"
							>
								
								
								
							<div class="form-group">
						<label for="subject" class="col-md-2 control-label">مضمون</label>	
							<div class="col-md-4">
							<select name="subject" class="form-control select2me" required>
							<option value=""></option>
							<?php
							$crud=new crud();
							$rs=$crud->select("subjects","*","");
							for($i=0;$i<sizeof($rs);$i++){
								if($subject == $rs[$i]['id']){
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
						<label for="faculty" class="col-md-2 control-label">فاکولته</label>	
							<div class="col-md-4">
							<select name="faculty" class="form-control select2me" required>
							<option value=""></option>
							<?php
							$crud=new crud();
							$rs=$crud->select("faculties","*","deleted!='deleted'");
							for($i=0;$i<sizeof($rs);$i++){
								if($faculty == $rs[$i]['id']){
									echo "<option selected value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";
								}else{	
									echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";
								}
							}
							?>
							
							</select>
							</div>

                            </div>		

							<div class="form-group">
									<label for="score" class="col-md-2 control-label">ضریب</label>
							<div class="col-md-4">
							<div class="input-icon">
							<i class="fa fa-book"></i>
							<input type="number" class="form-control" id="score" name="score" required placeholder="ضریب"
								value="<?php if(isset($score)){echo $score;}?>">
							</div>
							</div>
							</div>
						
						
						<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
									<input type='hidden' name="id" value="<?php echo $id;?>"/>
		      <button type="submit"
				name="<?php if(isset($editid)){echo "update";}else{echo"submit";} ?>" class="btn blue-madison"><?php if(isset($editid)){echo "ویرایش";}else{echo"ذخیره";} ?></button>
									</div>
								</div>
						</form>
							
							<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-book"></i>ربط مضامین به فاکولته
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
									 مضمون
								</th>
								<th>
									فاکولته
								</th>
								<th>
									 ضریب
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
							$rs=$crud->select("faculty_subject_scores","*","deleted != 'deleted'");
							for($i=0;$i<sizeof($rs);$i++){
								
							$subjects_id = $rs[$i]['subjects_id'];
							
							$rs_subjects = $crud->select("subjects","*","id='$subjects_id'");
							
							$faculties_id = $rs[$i]['faculties_id'];
							
							$rs_faculties = $crud->select("faculties","*","id = '$faculties_id'");
							
							echo "<tr>
							<td>".($i+1)."</td>
							<td>".$rs_subjects[0]['title']."</td>
							<td>".$rs_faculties[0]['name']."</td>
							<td>".$rs[$i]['score']."</td>
							<td><a href='faculty_subject_score.php?edit=".$rs[$i]['id']."'><i class='fa fa-pencil-square-o'></i></a></td>
							<td>
							<a href='faculty_subject_score.php?delid=".$rs[$i]['id']."'
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

<!-- END PAGE LEVEL SCRIPTS -->


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