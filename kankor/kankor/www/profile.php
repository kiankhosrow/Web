<!DOCTYPE html>
<html lang="fa" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php

$title="پروفایل";


require_once("header.php");
$crud=new crud();
?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/jquery-tags-input/jquery.tagsinput-rtl.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/typeahead/typeahead.css">

<link href="assets/admin/pages/css/profile-rtl.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->

</head>
<!-- END HEAD -->

<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-cont page-container-bg-solid">
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
		$sub_menu = "profile";
		
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
						<i class="fa fa-user"></i>
						<a>شاگردان</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a>پروفایل</a>
					</li>
				</ul>
			</div>
			
			<?php
				if($_SESSION['type'] == "student"){
					$student_edit = $crud -> select("students", "*", "id = $_SESSION[id_u]");
				}else if(isset($_GET['id'])){
					$student_edit = $crud -> select("students", "*", "id = $_GET[id]");
				}
				
				if(count($student_edit) > 0){
					$photo = $student_edit[0]['photo'];
					$gender = $student_edit[0]['gender'];
					$ids = $student_edit[0]['id'];
					$first_name = $student_edit[0]['first_name'];
					$last_name = $student_edit[0]['last_name'];
					$father_name = $student_edit[0]['father_name'];
					$grand_father_name = $student_edit[0]['grand_father_name'];
					$school_name = $student_edit[0]['school_name'];
					$about = $student_edit[0]['about'];
					$contact = $student_edit[0]['contact'];
					$email = $student_edit[0]['email'];
					$bcid = $student_edit[0]['bcid'];
					$bccover = $student_edit[0]['bccover'];
					$bcpage = $student_edit[0]['bcpage'];
					$bcnumber = $student_edit[0]['bcnumber'];
					$graduated_year = $student_edit[0]['graduated_year'];
					$current_provinces_id = $student_edit[0]['current_provinces_id'];
					$permanent_provinces_id = $student_edit[0]['permanent_provinces_id'];
					$school_name = $student_edit[0]['school_name'];
					$contact = $student_edit[0]['contact'];
					$email = $student_edit[0]['email'];
					$language = $student_edit[0]['language'];
					$old_password = $student_edit[0]['password'];
					
					$href_photo = "";
					if($photo){
						$href_photo = "<img src = 'uploads/students/$ids/$photo' class='img-responsive' alt=''/>";
					}else{
						if($gender == "male"){
							$href_photo = "<img src = 'uploads/avatar/avatar-men.png' class='img-responsive' alt=''/>";
						}else{
							$href_photo = "<img src = 'uploads/avatar/avatar-women.png' class='img-responsive' alt=''/>";
						}
					}					
				}
			?>
				
				
				<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box blue-madison">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-book"></i> پروفایل
							</div>
						</div>
						<div class="portlet-body">
							<form class="form-inline" role="form" method = "post" action = "profile.php">
								<?php
							
							
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
									header("Location:profile.php?id=$_POST[student]");
									exit();
								}
							?>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
			<!-- BEGIN PAGE CONTENT-->
			<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light">
							<!-- STAT -->
							<div class="row list-separated profile-stat">
								<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<?php 
									echo $href_photo;
								?>	
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									<?php
										echo ucfirst($first_name). " ". ucfirst($last_name);
									?>
								</div>
								<div class="profile-usertitle-job">
									  مکتب : <?php echo $school_name;?>
								</div>
							</div>
							</div>
							<!-- END STAT -->
							<div>
								<span class="profile-desc-text"> <?php echo $about;?> </span>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-phone"></i>
										<?php echo $contact;?>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-envelope"></i>
									<a href="mailto:<?php echo $email;?>" target = "_blank"><?php echo $email;?></a>
								</div>
							</div>
						</div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">حساب پروفایل</span>
										</div>
										<ul class="nav nav-tabs">
											<li <?php if(!isset($_GET['tab'])){echo "class = 'active'";}?>>
												<a href="#tab_1_1" data-toggle="tab">معلومات شخصی</a>
											</li>
											<li <?php if($_GET['tab'] == 2){echo "class = 'active'";}?>>
												<a href="#tab_1_2" data-toggle="tab">عکس پروفایل</a>
											</li>
											<li <?php if($_GET['tab'] == 3){echo "class = 'active'";}?>>
												<a href="#tab_1_3" data-toggle="tab">تغیر رمز عبور</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane <?php if(!isset($_GET['tab'])){echo "active";}?>" id="tab_1_1">
												<form role="form" action="profile.php" method = "post">
													<?php
														echo "<input type = 'hidden' name = 'stid' id = 'stid' value = '$ids'>";
													?>
													<div class="form-group">
														<label class="control-label">درباره خود</label>
														<textarea class="form-control" rows="3" name = "about" id = "about"><?php echo $about;?></textarea>
													</div>
													<div class="form-group">
														<label class="control-label">نام</label>
														<input type="text" class="form-control" name = "first_name" id = "first_name" value = "<?php echo $first_name;?>"/>
													</div>
													<div class="form-group">
														<label class="control-label">تخلص</label>
														<input type="text" name = "last_name" id = "last_name" value = "<?php echo $last_name;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">نام پدر</label>
														<input type="text" name = "father_name" id = "father_name" value = "<?php echo $father_name;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">نام پدر کلان</label>
														<input type="text" name = "grand_father_name" id = "grand_father_name" value = "<?php echo $grand_father_name;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">جنسیت</label>
														<div class="radio-list">
															<label class="radio-inline">
															<input type="radio" name="gender" id="gender" value="male" <?php if($gender == "male"){echo "checked";}?>> مرد </label>
															<label class="radio-inline">
															<input type="radio" name="gender" id="gender" value="female" <?php if($gender == "female"){echo "checked";}?>> زن </label>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label">نمبر تذکره</label>
														<input type="text" name = "bcid" id = "bcid" value = "<?php echo $bcid;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">صحفه تذکره</label>
														<input type="text" name = "bcpage" id = "bcpage" value = "<?php echo $bcpage;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">جلد تذکره</label>
														<input type="text" name = "bccover" id = "bccover" value = "<?php echo $bccover;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">نمبر عمومی تذکره</label>
														<input type="text" name = "bcnumber" id = "bcnumber" value = "<?php echo $bcnumber;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">سال فراغت</label>
														<select name="graduated_year" id = "graduated_year" class="form-control select2me" >
															<option value="">انتخاب</option>
															<?php
																for($i = 1300; $i < 1400; $i++){
																	if($i == $graduated_year){
																		echo "<option value = '$i' selected>$i</option>";
																	}else{
																		echo "<option value = '$i'>$i</option>";
																	}
																	
																}
															?>
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">زبان</label>
														<select name="language" id = "language" class="form-control select2me" >
															<option value="">انتخاب</option>
															<option value="دری" <?php if($language == "دری"){echo "selected";}?>>دری </option>
															<option value="پشتو" <?php if($language == "پشتو"){echo "selected";}?>>پشتو </option>
															
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">ولایت فعلی</label>
														<select name="current_province" id = "current_province" class="form-control select2me" required>
															<option value="">انتخاب</option>
															<?php
																		
																		$rs=$crud->select("provinces","*","");
																		for($i=0;$i<sizeof($rs);$i++){
																			
																		if($current_provinces_id==$rs[$i]['id']){
																		echo "<option selected value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";	
																		}else{	
																		echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";
																		}
																			
																		}
																		?>
																		
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">ولایت اصلی</label>
														<select name="permanent_province" id = "permanent_province" class="form-control select2me" required>
															<option value="">انتخاب</option>
															<?php
																		$rs=$crud->select("provinces","*","");
																		for($i=0;$i<sizeof($rs);$i++){
																			
																		if($permanent_provinces_id==$rs[$i]['id']){
																		echo "<option selected value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";	
																		}else{	
																		echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";
																		}
																			
																		}
																		?>
																		
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">مکتب</label>
														<input type="text" name = "school_name" id = "school_name" value = "<?php echo $school_name;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">شماره تماس</label>
														<input type="text" name = "contact" id = "contact" value = "<?php echo $contact;?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">ایمل</label>
														<input type="text" name = "email" id = "email" value = "<?php echo $email;?>" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<button type="submit" name="save_persoanl_info" id = "save_persoanl_info" class="btn blue-madison">ذخیره تغیرات</button>
													</div>
												</form>
												<?php 
													if(isset($_POST['save_persoanl_info'])){
														$first_name =  $_POST['first_name'];
														$last_name =  $_POST['last_name'];
														$father_name =  $_POST['father_name'];
														$grand_father_name =  $_POST['grand_father_name'];
														$gender =  $_POST['gender'];
														$bcid =  $_POST['bcid'];
														$bcpage =  $_POST['bcpage'];
														$bccover =  $_POST['bccover'];
														$bcnumber =  $_POST['bcnumber'];
														$graduated_year =  $_POST['graduated_year'];
														$language =  $_POST['language'];
														$current_province =  $_POST['current_province'];
														$permanent_province =  $_POST['permanent_province'];
														$school =  $_POST['school_name'];
														$contact =  $_POST['contact'];
														$email_st =  $_POST['email'];
														$stid =  $_POST['stid'];
														$about =  $_POST['about'];
														$up_student = $crud -> update("students","first_name = '$first_name', last_name = '$last_name', father_name = '$father_name',
														grand_father_name = '$grand_father_name', gender = '$gender', bcid = '$bcid', bcpage = '$bcpage',
														bccover = '$bccover', bcnumber = '$bcnumber', graduated_year = '$graduated_year', language = '$language',
														current_provinces_id = '$current_province', permanent_provinces_id = '$permanent_province', 
														school_name = '$school', contact = '$contact', email = '$email_st', about = '$about'", "id = '$stid'");
														if($_SESSION['type'] == "student"){
															header("Location:profile.php");
															exit();
														}else{
															header("Location:profile.php?id=$stid");
															exit();
														}
													}
												?>
											</div>
											<!-- END PERSONAL INFO TAB -->
											<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane <?php if($_GET['tab'] == 2){echo "active";}?>" id="tab_1_2">
												<p>
												برای تغیر عکس پروفایل تان یک تصویر را انتخاب نموده و دکمه تایید را کلیک نمایید.
												</p>
												<form action="profile.php" method = "post" role="form" enctype = "multipart/form-data">
													<?php
														echo "<input type = 'hidden' name = 'stid' id = 'stid' value = '$ids'>";
													?>
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<?php echo $href_photo;?>
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													انتخاب عکس </span>
													<span class="fileinput-exists">
													تغیر </span>
													<input type="file" name="attachment" id = "attachment">
													</span>
													<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
													حذف </a>
												</div>
											</div>
													<!--
														<div class="clearfix margin-top-10">
															<span class="label label-danger"> </span>
															<span> </span>
														</div>
														-->
													</div>
													<div class="margin-top-10">
														<button type="submit" name="photo_change" id = "photo_change" class="btn blue-madison">تایید</button>
													</div>
												</form>
												<?php 
													if(isset($_POST['photo_change'])){
														
														$id = $_POST['stid'];
														if($_FILES['attachment']['size'] > 0){
															$ext = substr($_FILES['attachment']['name'], strripos($_FILES['attachment']['name'], '.'));
															$file_name = $id."_photo".$ext;
															$destination = "uploads/students/$id/".$file_name;
															move_uploaded_file($_FILES['attachment']['tmp_name'],$destination);
															$crud -> update("students", "photo = '$file_name'", "id = '$id'");
															
															require_once('lib/image_resize.php');
															require_once('lib/php_image_magician.php');
															$magicianObj = new imageLib($destination);
															$magicianObj -> resizeImage(280, 280);
															$magicianObj -> saveImage($destination, 100);
														}
														if($_SESSION['type'] == "student"){
															header("Location:profile.php?tab=2");
															exit();
														}else{
															header("Location:profile.php?id=$id&tab=2");
															exit();
														}
													}
												?>
											</div>
											<!-- END CHANGE AVATAR TAB -->
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane <?php if($_GET['tab'] == 3){echo "active";}?>" id="tab_1_3">
												<form action="profile.php" method = "post" id="form_sample_1">
													<?php
														echo "<input type = 'hidden' name = 'stid' id = 'stid' value = '$ids'>";
														echo "<input type = 'hidden' name = 'old_password' id = 'old_password' value = '$old_password'>";
													?>
													<div class="form-group">
														<label class="control-label">رمز فعلی</label>
														<input type="password" name = "current_password" id = "current_password" class="form-control" required equalTo = "#old_password"/>
													</div>
													<div class="form-group">
														<label class="control-label">رمز جدید</label>
														<input type="password" name = "new_password" id = "new_password" class="form-control" required minlength = "6"/>
													</div>
													<div class="form-group">
														<label class="control-label">تکرار رمز جدید</label>
														<input type="password" name = "confirm_new_password" id = "confirm_new_password" class="form-control" required equalTo = "#new_password"/>
													</div>
													<div class="margin-top-10">
														<button type="submit" name="change_password" id = "change_password" class="btn blue-madison">تایید</button>
													</div>
												</form>
												<?php 
													if(isset($_POST['change_password'])){
														$new_password =  $_POST['new_password'];
														$stid =  $_POST['stid'];
														$up_student = $crud -> update("students",
														"password = '$new_password'", "id = '$stid'");
														if($_SESSION['type'] == "student"){
															header("Location:profile.php?tab=3");
															exit();
														}else{
															header("Location:profile.php?id=$stid&tab=3");
															exit();
														}
													}
												?>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
											<!-- PRIVACY SETTINGS TAB -->
											<div class="tab-pane" id="tab_1_4">
												<form action="#">
													<table class="table table-light table-hover">
													<tr>
														<td>
															 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
														</td>
														<td>
															<label class="uniform-inline">
															<input type="radio" name="optionsRadios1" value="option1"/>
															Yes </label>
															<label class="uniform-inline">
															<input type="radio" name="optionsRadios1" value="option2" checked/>
															No </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													</table>
													<!--end profile-settings-->
													<div class="margin-top-10">
														<a href="javascript:;" class="btn green-haze">
														Save Changes </a>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END PRIVACY SETTINGS TAB -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
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

<script src="assets/admin/pages/scripts/profile.js" type="text/javascript"></script>

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
   
   Profile.init(); // init page demo
     
});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'keenthemes.com');
  ga('send', 'pageview');
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>