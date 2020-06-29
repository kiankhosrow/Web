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
		$sub_menu="publickankor_exam";
		require_once("sidebar.php");
		
		
		
		
	
		?>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper" style="font-family:myFirstFont">
		<div class="page-content">
		<?php
		  $crud=new crud();  
		  if($_SESSION['type']=="setudent"){
			$rs=$crud->select("students","*","id='$_SESSION[id_u]' and deleted!='deleted'");  
		  }else{
	       $rs=$crud->select("users","*","id='$_SESSION[id_u]' and deleted!='deleted'");
		  }
		  $count_true=0;
		  $count_false=0;
		  
		  $rs_exam=$crud->select_limit("student_exams","id,created_at","order by id desc limit 1");
		  $idexam=$rs_exam[0]['id'];
		  $created_at=$rs_exam[0]['created_at'];
		  
		  $result=0;
		  
		  
		  
		  $rs_answer=$crud->select("student_questions","*","student_exams_id='$idexam'");
		  for($i=0;$i<sizeof($rs_answer);$i++){
			$questions_id=$rs_answer[$i]['questions_id'];
			$answers_id=$rs_answer[$i]['answers_id'];
			$response_time=$rs_answer[$i]['response_time'];
			
			$rscheck=$crud->select("answers","id","questions_id='$questions_id' and `right`=1");
			$trueanswer=$rscheck[0]['id'];
			
			$rs_score=$crud->select("categories,subjects,questions","score","questions.id='$questions_id' and subjects.id=questions.subjects_id and categories.id=categories_id");
			$score=$rs_score[0]['score'];
			if($trueanswer==$answers_id){
				$result+=$score;
				$count_true++;
			}else{
			$count_false++;
			}
		  }
		  
		  $rs_faculies=$crud->select("student_faculty_choices","faculties_id as fid","student_exams_id='$idexam'");
		  $result_faculty=0;
		 for($i=0;$i<sizeof($rs_faculies);$i++){
			$fid=$rs_faculies[$i]['fid'];
			$rs_score=$crud->select("faculties_scores","lowest_score as ls","faculties_id='$fid'");
			$lowscore=$rs_score[0]['ls'];
			
			if($result>$lowscore and $fid>0){
			$result_faculty=$fid;	
		
			}
		 
		 
		 }
		  $crud->update("student_exams","student_examscore='$result'","id='$idexam'");
		 if($result_faculty){
		  $rs_faculies=$crud->select("faculties,universities","faculties.name as fname,universities.name as uname","faculties.id='$result_faculty' and universities.id=faculties.universities_id");
		  $selec_faculty=$rs_faculies[0]['uname']." (".$rs_faculies[0]['fname'].")";
		  
		  $crud->update("student_faculty_choices","selected=1","student_exams_id='$idexam' and faculties_id='$result_faculty'");

		 
		  
		 }else{
			 
			$selec_faculty="بی نتیجه"; 
		 }
		  
	


  
 $now = new DateTime($created_at);
$ref = new DateTime($response_time);
$diff = $now->diff($ref);

  
		?>

		
	
		

			
			<center>
				<div class="col-md-12">
					<!-- BEGIN Portlet PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>نتیجه
							</div>

						</div>
						<div class="portlet-body">
						<table class="table">
						<thead>
						<tR>
						<th>تعداد سوالات</th>
						<th>تعداد سوالات درست شما</th>
						<th>تعداد سوالات غلط شما</th>
						<th>نمره</th>
						<th>فاکولته کامیاب شده</th>
						<th>زمان امتحان</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						<td><?php echo $_SESSION['number_question']; ?></td>
						<td>
						<?php echo $count_true; ?>
						</td>	
						<td>
						<?php echo $count_false; ?>
						</td>
						<td>
						
						<?php echo $result; ?>
						</td>
					
						<td>
						<?php echo $selec_faculty; ?>
						</td><td>
						<?php echo $diff->i; ?> دقیقه
						</td>
						<td></td>
						</tr>
						</tbody>
						</table>
						
						</div>
					</div>
					<!-- END Portlet PORTLET-->
					
					<?php
					
					$crud=new crud();
			 
			
				    $rs_categories=$crud->select("categories","id,title","deleted!='deleted'");
					for($i=0;$i<sizeof($rs_categories);$i++){
						
					$title=$rs_categories[$i]['title'];	
					$id=$rs_categories[$i]['id'];
					
					
					
		
			 $cnt_true=0;
			 $cnt_false=0;
			 $cnt_score=0;
			$rs_qs=$crud->select("categories,subjects,questions,student_questions","questions_id,answers_id,score"," subjects.id=questions.subjects_id and categories.id=categories_id
			and categories.id=$id and student_questions.questions_id=questions.id
			and student_exams_id = '$idexam'
			");
		   	for($j=0;$j<sizeof($rs_qs);$j++){
			   $questions_id=$rs_qs[$j]['questions_id'];
			   
			   	$answers_id=$rs_qs[$j]['answers_id'];
			   	$score=$rs_qs[$j]['score'];
				
			$rscheck=$crud->select("answers","id","questions_id='$questions_id' and `right`=1");
			$trueanswer=$rscheck[0]['id'];
			
			if($trueanswer==$answers_id){
				$cnt_true++;
				$cnt_score+=$score;
			}else{
				$cnt_false++;
			}
			
			   
		   }
					
					 $content.="
				<div class='col-md-3'>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class='portlet box red'>
						<div class='portlet-title'>
							<div class='caption'>
								<i class='fa fa-cogs'></i>$title
							</div>
						</div>
						<div class='portlet-body'>
						
							<div class='table-scrollable'>
							
								<table class='table table-hover'>
								<thead>
								<tr>
									<th>
										سوالات درست
									</th>
									<th>
										سوالات غلط
									</th>	
									<th>
										مجموع
									</th>
									
									
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										 $cnt_true
									</td>
									<td>
										 $cnt_false
									</td>
									
									<td>
										 $cnt_score
									</td>
									
								</tr>
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
					";				
					

					
					}
			echo $content;
					?>
					
				</div>
			</center>

	
	
					<!-- END EXAMPLE TABLE PORTLET-->
					
		
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
    seconds:11400,
    displayHours:true
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