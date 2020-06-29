<!DOCTYPE html>
<html lang="fa" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php

$title="امتحان کانکور عمومی";
require_once("header.php");

?>
<link href="assets/timer/timeTo.css" type="text/css" rel="stylesheet"/>

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
  });
</script>
<script type="text/javascript" src="assets/js/mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
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
    	$parent_menu="students_exam";
		$sub_menu="privatekankor_exam";
		require_once("sidebar.php");
		
		
		if(isset($_POST['save'])){
			
		$now = new DateTime();	
	    $time_stamp=$now->format('Y-m-d H:i:s');
		$crud=new crud();
		$uid=$_SESSION['id_u'];
		$crud->insert("student_exams","students_id,created_at,exam_type","'$uid','$time_stamp','private'");
		
		$rs=$crud->select_latest("student_exams","id");
		$idexam=$rs['id'];
		$fid=$_POST['faculty_choose'];
		$crud->insert("student_faculty_choices","faculties_id,student_exams_id","$fid,$idexam");
		unset($crud);
		header("location:show_private_exam.php?fid=$fid");
		
		}
		
		if(isset($_POST['submit'])){
	
		$crud=new crud();
		$rs=$crud->select_latest("student_exams","id");
		$idexam=$rs['id'];
		
		for($i=0;$i<sizeof($_POST['idq']);$i++){
			$idq=$_POST['idq'][$i];
			$ansid=$_POST["q$idq"];
		$now = new DateTime();	
	    $time_stamp=$now->format('Y-m-d H:i:s');	
		$crud->insert("student_questions","questions_id,student_exams_id,answers_id,response_time",
		"'$idq','$idexam','$ansid','$time_stamp'");	
		}

		header("location:show_result_private.php");
	
		}
		
		

		
		?>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper" >
		<div class="page-content">

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="homepage.php">مدیریت سیستم</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">امتحان کانکور اختصاصی</a>
					</li>
				</ul>
		
			</div>
			
		
				<!-- END TAB PORTLET-->
					<!-- BEGIN ACCORDION PORTLET-->
		<div style="direction: ltr;">	
		<div id="countdown" >
		</div></div>
		
					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>سوالات
							</div>
						
						</div>
						
							
							<div class="portlet-body">
	  <form action="show_private_exam.php" method="post" id="form_sample_1">	
			    <div class="form-wizard">
				<div class="form-body">
				<ul class="nav nav-pills nav-justified steps">
				<?php
		$fid=$_GET['fid'];
		
		?>
				
									<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">
										سوالات</a>
										</h4>
									</div>
									<div id="collapse_4" class="panel-collapse in">
										<div class="panel-body" style="height:1000px; overflow-y:auto;direction:rtl; ">
											<p>
				
					   <?php
					   $count=1;
					$crud=new crud();   
                    $rsqs=$crud->select("questions","*,questions.title as title,questions.id as id ","
					type='private' and faculties_id='$fid' limit $_SESSION[number_question]
					");
					for($j=0;$j<sizeof($rsqs);$j++){
				    
					$qid=$rsqs[$j]['id'];
					
						
				   echo "<input type='hidden' name='idq[]' value='$qid'/>";		
					
					$rs_p=$crud->select("answers","*","questions_id='".$rsqs[$j]['id']."'");
					
               echo "<p>
			   	<div class='well'>
						
								<p>	<span class='badge badge-info'>$count</span>".$rsqs[$j]['title']."
								</p>
								<p>
								<div class='md-radio-inline'>
	
								<div class='md-radio'>
								<input type='radio' id='radio".$rs_p[0]['id']."'
								value='".$rs_p[0]['id']."' name='q$qid' 
								class='md-radiobtn'/>
									<label for='radio".$rs_p[0]['id']."'>
											<span></span>
											<span class='check'></span>
											<span class='box'></span>
											".$rs_p[0]['title']."
											</label>				
								</div>		
								
								<div class='md-radio'>
								<input type='radio' id='radio".$rs_p[1]['id']."' 
								value='".$rs_p[1]['id']."' name='q$qid' 
								class='md-radiobtn'/>
									<label for='radio".$rs_p[1]['id']."'>
											<span></span>
											<span class='check'></span>
											<span class='box'></span>
											".$rs_p[1]['title']."
											</label>				
								</div>	
										
								<div class='md-radio'>
								<input type='radio' id='radio".$rs_p[2]['id']."'
								value='".$rs_p[2]['id']."' name='q$qid' 
								class='md-radiobtn'/>
									<label for='radio".$rs_p[2]['id']."'>
											<span></span>
											<span class='check'></span>
											<span class='box'></span>
											".$rs_p[2]['title']."
											</label>				
								</div>	

								<div class='md-radio'>
								<input type='radio' id='radio".$rs_p[3]['id']."' 
								value='".$rs_p[3]['id']."' name='q$qid' 
								class='md-radiobtn'/>
									<label for='radio".$rs_p[3]['id']."'>
											<span></span>
											<span class='check'></span>
											<span class='box'></span>
											".$rs_p[3]['title']."
											</label>				
								</div>	
								
								
							
								</div>
								</p>
								
							</div>
							
			   ";
			   $count++;
			 				

					
					}
						
						
						?>	
										
					   
											
							<center>
				<button type="submit" name="submit" class="btn btn-lg red m-icon-big">
					ختم امتحان<i class="m-icon-big-swapright"></i>
															</button>
			                                   </center>
											 </p>  
										</div>
									</div>
								
								
								
								</div>
						
	
											 </p>  
										</div>
									</div>
								
								
								
								</div>
						</div>		
	</form>								
									
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
 <script src="assets/timer/jquery-1.11.2.min.js"></script>
  <script src="assets/timer/jquery.timeTo.js"></script>
    <script>
	
	
	
	
	jQuery(document).ready(function() {    
	  $('#countdown').timeTo({
    seconds:<?php  echo $_SESSION['response_time']*60;?>,
    displayHours:true
},function(){
	
	$("#collapse_4").find("*").prop("disabled", true);

	
	
}); 



	});
	</script>
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