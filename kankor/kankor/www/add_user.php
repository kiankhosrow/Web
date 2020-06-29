<!DOCTYPE html>
<html lang="fa" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php

$title="اضافه نمودن کاربر";


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
<!-- END HEAD -->
<?php

if(isset($_POST['submit'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user_type = $_POST['user_type'];
	$gender = $_POST['gender'];
	$crud=new crud();
	$crud->insert("users","first_name,last_name,username,password,user_types_id, gender, status","'$first_name','$last_name','$username','$password',$user_type, '$gender', 'approved'");
	
	$rs_last = $crud -> select_latest("users", "id");
	$id = $rs_last['id'];
	mkdir("uploads/users/$id");
	if($_FILES['attachment']['size'] > 0){
		$ext = substr($_FILES['attachment']['name'], strripos($_FILES['attachment']['name'], '.'));
		$file_name = $rs_last['id']."_photo".$ext;
		$destination = "uploads/users/$id/".$file_name;
		move_uploaded_file($_FILES['attachment']['tmp_name'],$destination);
		$crud -> update("users", "photo = '$file_name'", "id = '$id'");
		
		require_once('lib/image_resize.php');
		require_once('lib/php_image_magician.php');
		$magicianObj = new imageLib($destination);
		$magicianObj -> resizeImage(200, 150);
		$magicianObj -> saveImage($destination, 100);
	}
	
				
	unset($crud);
	header("location:add_user.php");
	exit();
	
}

if(isset($_POST['update'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user_type = $_POST['user_type'];
	$gender = $_POST['gender'];
	
	$ide=$_POST['id'];
	$crud=new crud();
	
	
	$crud->update("users","first_name='$first_name',last_name='$last_name',
	username = '$username',
	password = '$password',
	user_types_id = $user_type,
	gender = '$gender'",
	"id='$ide'");
	
	if($_FILES['attachment']['size'] > 0){
		

		$ext = substr($_FILES['attachment']['name'], strripos($_FILES['attachment']['name'], '.'));
		$file_name = $ide."_photo".$ext;
	
		$destination = "uploads/users/$ide/".$file_name;
		move_uploaded_file($_FILES['attachment']['tmp_name'],$destination);
		$crud -> update("users", "photo = '$file_name'", "id = '$ide'");
		
		require_once('../lib/image_resize.php');
		require_once('../lib/php_image_magician.php');
		$magicianObj = new imageLib($destination);
		$magicianObj -> resizeImage(200, 150);
		$magicianObj -> saveImage($destination, 100);
	}
	
	unset($crud);
	header("location:add_user.php");
	exit();
	
}

if(isset($_GET['edit'])){
	
	$editid=(int)$_GET['edit'];
    $crud=new crud();
	$rs=$crud->select("users","*","id = '$editid'");
	extract($rs[0]);
	$first_name = $first_name;
	$last_name = $last_name;
	$username = $username;
	$password = $password;
	$user_types_id = $user_types_id;
	$gender = $gender;
	$photo = $photo;
	$ids = $id;
	$href_edit = "";
	if($photo){
		$href_edit = "<img src = 'uploads/users/$ids/$photo'/>";
	}else{
		$href_edit = "No Photo";
	}
	
	unset($crud);
	
}

if(isset($_GET['delid'])){

	$delid=$_GET['delid'];
    $crud=new crud();
	$rs=$crud->update("users","deleted='deleted'","id='$delid'");
	header("location:add_user.php");
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
		$sub_menu="add_user";
		
		require_once("sidebar.php");
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
						<a >مدیریت</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a>اضافه نمودن کاربران</a>
					</li>
				</ul>
			</div>
							<form class="form-horizontal" role="form" action="add_user.php" id="form_sample_1" method="post" enctype = "multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $ids;?>" />
					<div class="form-group">
					<label for="first_name" class="col-md-2 control-label">نام</label>
									
					<div class="col-md-4">
					<div class="input-icon">
					<i class="fa fa-book"></i>
					<input type="text" class="form-control" id="first_name" name="first_name" required placeholder="نام" value="<?php if(isset($first_name)){echo $first_name;}?>" />
					</div>
					</div>	
					</div>
									
					<div class="form-group">
                  <label for="last_name" class="col-md-2 control-label">تخصل</label>					
					<div class="col-md-4">
					<div class="input-icon">
					<i class="fa fa-book"></i>					
					<input type="text" class="form-control" id="last_name" name="last_name" required placeholder="تخلص" value="<?php if(isset($last_name)){echo $last_name;}?>" />
					</div>
					</div>	
					</div>		

					<div class="form-group">
					<label for="username" class="col-md-2 control-label"> نام کاربری</label>					
					<div class="col-md-4">
					<div class="input-icon">	
					<i class="fa fa-book"></i>
					<input type="text" class="form-control" id="username" name="username" required placeholder="نام کاربری" value="<?php if(isset($username)){echo $username;}?>" />
					</div>
					</div>	
					</div>	
					<div class="form-group">
					<label for="password" class="col-md-2 control-label">رمز ورود</label>					
					<div class="col-md-4">
					<div class="input-icon">		
					<i class="fa fa-book"></i>
					<input type="password" class="form-control" id="password" name="password" required placeholder="رمز ورود" value="<?php if(isset($password)){echo $password;}?>" />
					</div>
					</div>	
					</div>		
					
					<div class="form-group">
						<label for="user_type1" class="col-md-2 control-label">نوع کاربر</label>	
							<div class="col-md-4">
							<select name="user_type" id = "user_type" class="form-control select2me" required>
							<option value="">انتخاب</option>
							<?php
							$crud=new crud();
							$rs=$crud->select("user_types","*","");
							for($i=0;$i<sizeof($rs);$i++){
								
							if($user_types_id==$rs[$i]['id']){
							echo "<option selected value='".$rs[$i]['id']."'>".$rs[$i]['type']."</option>";	
							}else{	
							echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['type']."</option>";
							}
								
							}
							?>
							
							</select>
							</div>

                    </div>	
					
					
					
					<div class="form-group">
						<label for="gender1" class="col-md-2 control-label">جنسیت</label>	
							<div class="col-md-4">
							<select name="gender" id = "gender" class="form-control select2me" required>
							<option value="">انتخاب</option>
							<?php
							if($gender == "مرد"){
								echo "<option selected value='مرد'>مرد</option>";	
							}else{	
								echo "<option value='مرد'>مرد</option>";	
							}
							
							if($gender == "زن"){
								echo "<option selected value='زن'>زن</option>";	
							}else{	
								echo "<option value='زن'>زن</option>";	
							}
							?>
							
							</select>
							</div>

                    </div>	
					
					
					<div class="form-group">
						<label for="attachment" class="col-md-2 control-label">عکس</label>	
							<div class="col-md-4">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<?php echo $href_edit;?>
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													انتخاب عکس </span>
													<span class="fileinput-exists">
													تغییر </span>
													<input type="file" name="attachment" id = "attachment">
													</span>
													<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
													حذف </a>
												</div>
											</div>
										</div>
					</div>					
						
						
						<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
										<button type="submit"

				name="<?php if(isset($ids)){echo "update";}else{echo"submit";} ?>" class="btn blue-madison"><?php if(isset($ids)){echo "ویرایش";}else{echo"ذخیره";}?></button>
									</div>
								</div>
						</form>
							
							<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-book"></i>لیست کاربران
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
								</th>
								<th>
									 نام
								</th>
								<th>
									 تخلص
								</th>								
								<th>
									نام کاربری
								</th>
								<th>
									رمز ورود
								</th>
								<th>
									نوع کاربر
								</th>
								<th>
									جنسیت
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
							$rs=$crud->select("users","*","deleted != 'deleted' and status = 'approved' order by id desc");
							for($i=0;$i<sizeof($rs);$i++){
							$id = $rs[$i]['id'];
							$photo = $rs[$i]['photo'];
							$href = "";
							if($rs[$i]['photo']){
								$href = "<img src = 'uploads/users/$id/$photo'/>";
							}else{
								$href = "No Photo";
							}
							echo "<tr>
							<td>".($i+1)."</td>
							<td>$href</td>
							<td>".$rs[$i]['first_name']."</td>
							<td>".$rs[$i]['last_name']."</td>
							<td>".$rs[$i]['username']."</td>
							<td>".$rs[$i]['password']."</td>
							<td>".$rs[$i]['gender']."</td>
							<td>".$rs[$i]['gender']."</td>
							<td><a href='add_user.php?edit=".$rs[$i]['id']."'><i class='fa fa-pencil-square-o'></i></a></td>
							<td>
							<a href='add_user.php?delid=".$rs[$i]['id']."'
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