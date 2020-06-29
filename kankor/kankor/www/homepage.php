<!DOCTYPE html>
<html lang="fa" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php

$title="آمار واحصاییه";


require_once("header.php");

?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/jquery-tags-input/jquery.tagsinput-rtl.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/typeahead/typeahead.css">
<!-- END PAGE LEVEL STYLES -->

</head>

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
		$parent_menu="homepage";
		$sub_menu="homepage";
		
		require_once("sidebar.php");
		
		
					$crud=new crud();
				    $rs_user=$crud->select("users","count(id) as cnt","deleted!='deleted' and user_types_id=1");
					$number_admin=$rs_user[0]['cnt'];
					//----- users 				  

					$rs_user=$crud->select("users","count(id) as cnt","deleted!='deleted' and user_types_id=2");
					$number_teacher=$rs_user[0]['cnt'];
					//----- teacher 

					$rs_user=$crud->select("students","count(id) as cnt","deleted!='deleted'");
					$number_student=$rs_user[0]['cnt'];
					//----- students  
					unset($crud);

					
							
		?>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
	
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
		
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			صفحه اصلی <small>آمار و احصاییه</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">صفحه اصلی</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">آمار واحصاییه</a>
					</li>
				</ul>
		
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<?php
			
			
			
			if($_SESSION['type']=="admin"){
			?>
			
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $number_student+$number_admin+$number_teacher;?>
							</div>
							<div class="desc">
								 کاربر
							</div>

						</div>
					   <a class="more" href="javascript:;">
						</a>
					</div>
				</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $number_student;?>
							</div>
							<div class="desc">
								 شاگردان
							</div>

						</div>
					   <a class="more" href="javascript:;">
						</a>
					</div>
				</div>	
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $number_teacher;?>
							</div>
							<div class="desc">
								 اساتید
							</div>

						</div>
					   <a class="more" href="javascript:;">
						</a>
					</div>
				</div>		
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $number_admin;?>
							</div>
							<div class="desc">
								 مدیر
							</div>

						</div>
					   <a class="more" href="javascript:;">
						</a>
					</div>
				</div>
			
			</div>
		
		
			<div class="row">
			
			<?php
				   $crud=new crud();
				    $rs_categories=$crud->select("categories","id,title","deleted!='deleted'");
					for($i=0;$i<sizeof($rs_categories);$i++){
						
					$title=$rs_categories[$i]['title'];	
					$id=$rs_categories[$i]['id'];
					
				$rs_count=$crud->select("subjects","id","categories_id='$id'");
				$count=0;
				$primary=0;
				$medium=0;
				$advance=0;
				
				for($j=0;$j<sizeof($rs_count);$j++){
				
				$subject_id=$rs_count[$j]['id'];	
				$rs_count_primary=$crud->select("questions","count(id)as cnt","subjects_id='$subject_id' and status='primary' and type='public'");
				$primary+=$rs_count_primary[0]['cnt'];
				
				$rs_count_medium=$crud->select("questions","count(id)as cnt","subjects_id='$subject_id' and status='medium' and type='public'");
				$medium+=$rs_count_medium[0]['cnt'];
				
				$rs_count_advance=$crud->select("questions","count(id)as cnt","subjects_id='$subject_id' and status='advance' and type='public'");
				$advance+=$rs_count_medium[0]['cnt'];
				
				$count=$primary+$medium+$advance;
				
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
										سخت
									</th>
									<th>
										متوسط
									</th>
									
									<th>
										آسان
									</th>	
									<th>
										مجموع
									</th>
									
									
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										 $advance
									</td>
									<td>
										 $medium
									</td>
									<td>
										 $primary
									</td>	
									<td>
										 $count
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
			
		   <?php			
			}
			?>
			<div class="col-md-12">

			<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>جدول امتحانات
							</div>
					
						</div>
						<div class="portlet-body">
							<div id="chart_5" style="height:180px;">
							</div>
							<div class="btn-toolbar">
								
								<div class="space5">
								</div>
								<div class="btn-group graphControls">
									<input type="button" class="btn" value="Bars"/>
									<input type="button" class="btn" value="Lines"/>
								</div>
							</div>
						</div>
					</div>
					<!-- END STACK CHART CONTROLS PORTLET-->
					
	
			</div>
			<div class="row">
				<!-- BEGIN STACK CHART CONTROLS PORTLET-->
					

			</div>
			
			
			
			
			<div class="clearfix">
			</div>
		
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
		</div>
	</div>

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php
					$crud=new crud();
				    $rs_user=$crud->select("student_exams","student_examscore","students_id='$_SESSION[id_u]' and exam_type='public'");
					$vals=array();
					for($i=0;$i<sizeof($rs_user);$i++){
					$vals[$i]=$rs_user[$i]['student_examscore'];
						
					}
					


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
<!-- END PAGE LEVEL SCRIPTS -->

<script src="assets/global/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="assets/global/plugins/flot/jquery.flot.crosshair.min.js"></script>

<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/charts-flotcharts.js"></script>

<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initMiniCharts();
   
   ChartsFlotcharts.init();
   ChartsFlotcharts.initCharts();
   ChartsFlotcharts.initBarCharts();
   
   
				var d1 =<?php echo json_encode($vals);?>;
				
				
				var d4=[];
				for (var i = 0; i <d1.length; i += 1){
                d4.push([i,d1[i]]);
				
				}
				
     				var stack = 0,
                    bars = true,
                    lines = false,
                    steps = false;
					
        function plotWithOptions() {
                    $.plot($("#chart_5"),

                        [{
                            label: "نتایج",
                            data: d4,
                            lines: {
                                lineWidth: 1,
                            },
                            shadowSize: 0
                        }
						]

                        , {
                            series: {
                                stack: stack,
                                lines: {
                                    show: lines,
                                    fill: true,
                                    steps: steps,
                                    lineWidth: 0, // in pixels
                                },
                                bars: {
                                    show: bars,
                                    barWidth: 0.5,
                                    lineWidth: 0, // in pixels
                                    shadowSize: 0,
                                    align: 'center'
                                }
                            },
                            grid: {
                                tickColor: "#eee",
                                borderColor: "#eee",
                                borderWidth: 1
                            }
                        }
                    );
                }

                $(".stackControls input").click(function(e) {
                    e.preventDefault();
                    stack = $(this).val() == "With stacking" ? true : null;
                    plotWithOptions();
                });

                $(".graphControls input").click(function(e) {
                    e.preventDefault();
                    bars = $(this).val().indexOf("Bars") != -1;
                    lines = $(this).val().indexOf("Lines") != -1;
                    steps = $(this).val().indexOf("steps") != -1;
                    plotWithOptions();
                });

                plotWithOptions();
					
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>