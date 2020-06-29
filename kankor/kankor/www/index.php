<?php
	session_start();
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->

<?php
require_once("../lib/db.php");
require_once("../lib/crud.php");
$crud=new crud();
?>
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8"/>
<title>شبیه ساز کانکور|ورود به سیستم</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="assets/admin/pages/css/login-rtl.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/jquery-tags-input/jquery.tagsinput-rtl.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/typeahead/typeahead.css">
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components-md-rtl.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins-md-rtl.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout-rtl.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/blue-rtl.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom-rtl.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="assets/admin/layout4/img/logo-light1.png" style = "width:104px;height:104px;" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="index.php" method="post" id="form_sample_1">
		<h3 class="form-title">ورود به سیستم</h3>
		<div class="form-group">
		<?php
		if(isset($_POST['login'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$rs = $crud->select("students","*","status = 'approved' and user_name = '$username' and password = '$password'");
			$rs_user = $crud->select("users, user_types","users.*, user_types.type","status = 'approved' and username = '$username' and password = '$password' and user_types.id = user_types_id");
			if(count($rs) > 0){
				$_SESSION['id_u'] = $rs[0]['id'];
				$_SESSION['first_name'] = $rs[0]['first_name'];
				$_SESSION['last_name'] = $rs[0]['last_name'];
				$_SESSION['photo'] = $rs[0]['photo'];
				$_SESSION['type'] = "student";
				header("Location:homepage.php");
			}else if(count($rs_user) > 0){
				$_SESSION['id_u'] = $rs_user[0]['id'];
				$_SESSION['first_name'] = $rs_user[0]['first_name'];
				$_SESSION['last_name'] = $rs_user[0]['last_name'];
				$_SESSION['type'] = $rs_user[0]['type'];
				$_SESSION['photo'] = $rs_user[0]['photo'];
				header("Location:homepage.php");
			}else{
				echo "<div class='alert alert-danger'>
					<button class='close' data-close='alert'></button>
					<span>
						نام کاربری یا رمز عبور تان اشتباه است!</span>
					</div>";
			}
		}
		if($_GET['register']){
			echo "<div class='alert alert-success'>
					<button class='close' data-close='alert'></button>
					<span>
						شما موفقانه ثبت نام شدید حالا میتوانید وارد سیستم شوید!!!</span>
					</div>";
		}
	?>
	</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">نام کاربری</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="نام کاربری" name="username" id = "username" required/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">رمز ورود</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="رمز ورود" name="password" id = "password" required/>
		</div>
		
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase blue-madison" name = "login">ورود</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>بخاطر سپردن </label>
			<a href="javascript:;" id="forget-password" class="forget-password"></a>
		</div>
		<div class="create-account">
			<p>
				<a href="javascript:;" id="register-btn" class="uppercase">ساختن حساب جدید</a>
			</p>
		</div>
	</form>
	
	
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your .
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="index.php" method="post" enctype = "multipart/form-data"
	id="form_sample_2"
	>
		<h3 class="form-title">ثبت نام</h3>
		<p class="hint">
			 <h4 class="form-title">
			مشخصات شخصی تان را در ذیل وارد نمایید
			</h4>
		</p>
		<div class="row">
		<div class="col-md-9">
		<div class="form-group">
			<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													 <img src="assets/admin/layout4/img/no-image.png" alt=""/>
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
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">First Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="نام" name="first_name" id = "first_name" required/>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Last Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="تخلص" name="last_name" id = "last_name" required/>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Father Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="نام پدر" name="father_name" id = "father_name" required/>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Grand Father Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="نام پدر کلان" name="grand_father_name" id = "grand_father_name" required/>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label">جنسیت</label>
			<div class="radio-list">
				<label class="radio-inline">
				<input type="radio" name="gender" id="gender" value="male" > مرد </label>
				<label class="radio-inline">
				<input type="radio" name="gender" id="gender" value="female"> زن </label>
			</div>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">User Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="نام کاربری" name="username_st" id = "username_st" required minlength = "3"/>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="password" placeholder="رمز ورود" name="password_st" id = "password_st" required minlength = "6"/>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">User Name</label>
			<input class="form-control placeholder-no-fix" type="password" placeholder="تکرار رمز عبور" name="confirm_password" id = "confirm_password" equalTo = "#password_st" required/>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">User Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="نمبر تذکره" name="bcid" id = "bcid" required/>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="صفحه تذکره" name="bcpage" id = "bcpage"required/>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">User Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="جلد تذکره" name="bccover" id = "bccover" required/>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="نمبر عمومی" name="bcnumber" id = "bcnumber" required/>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">User Name</label>
			<select name="graduated_year" id = "graduated_year" class="form-control select2me" required>
				<option value="">سال فراغت</option>
				<?php
					for($i = 1300; $i < 1400; $i++){
						echo "<option value = '$i'>$i</option>";
					}
				?>
			</select>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">زبان</label>
			<select name="language" id = "language" class="form-control select2me" required>
				<option value="">زبان </option>
				<option value="دری">دری </option>
				<option value="پشتو">پشتو </option>
				
			</select>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<select name="current_province" id = "current_province" class="form-control select2me" required>
				<option value="">ولایت فعلی</option>
				<?php
							
							$rs=$crud->select("provinces","*","");
							for($i=0;$i<sizeof($rs);$i++){
								
							if($user_types_id==$rs[$i]['id']){
							echo "<option selected value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";	
							}else{	
							echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";
							}
								
							}
							?>
							
			</select>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<select name="permanent_province" id = "permanent_province" class="form-control select2me" required>
				<option value="">ولایت اصلی</option>
				<?php
							$rs=$crud->select("provinces","*","");
							for($i=0;$i<sizeof($rs);$i++){
								
							if($user_types_id==$rs[$i]['id']){
							echo "<option selected value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";	
							}else{	
							echo "<option value='".$rs[$i]['id']."'>".$rs[$i]['name']."</option>";
							}
								
							}
							?>
							
			</select>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">مکتب</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="مکتب" name="school" id = "school" required/>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">شماره تماس</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="شماره تماس" name="contact" id = "contact" required/>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">ایمیل</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="ایمیل" name="email_st" id = "email_st"/>
		</div>
		</div>
		</div>
		<div class="form-actions">
		<button type="submit" id="register-submit-btn" class="btn btn-success blue-madison" name = "register">ثبت</button>
		
			<button type="button" id="register-back-btn" class="btn btn-default uppercase pull-right ">بازگشت</button>
			
		</div>
	</form>
	<?php 
		if(isset($_POST['register'])){
			$first_name =  $_POST['first_name'];
			$last_name =  $_POST['last_name'];
			$father_name =  $_POST['father_name'];
			$grand_father_name =  $_POST['grand_father_name'];
			$gender =  $_POST['gender'];
			$username_st =  $_POST['username_st'];
			$password_st =  $_POST['password_st'];
			$bcid =  $_POST['bcid'];
			$bcpage =  $_POST['bcpage'];
			$bccover =  $_POST['bccover'];
			$bcnumber =  $_POST['bcnumber'];
			$graduated_year =  $_POST['graduated_year'];
			$language =  $_POST['language'];
			$current_province =  $_POST['current_province'];
			$permanent_province =  $_POST['permanent_province'];
			$school =  $_POST['school'];
			$contact =  $_POST['contact'];
			$email_st =  $_POST['email_st'];
			$crud -> insert("students","first_name, last_name, father_name, grand_father_name, gender, user_name, password, bcid, bcpage,
			bccover, bcnumber, graduated_year, language, current_provinces_id, permanent_provinces_id, school_name, contact, email, status",
			"'$first_name', '$last_name', '$father_name', '$grand_father_name', '$gender', '$username_st', '$password_st', '$bcid', '$bcpage',
			'$bccover', '$bcnumber', '$graduated_year', '$language', '$current_province', '$permanent_province', '$school', '$contact', 
			'$email_st', 'approved'");
			
			$rs_last = $crud -> select_latest("students", "id");
	$id = $rs_last['id'];
	mkdir("uploads/students/$id");
	if($_FILES['attachment']['size'] > 0){
		$ext = substr($_FILES['attachment']['name'], strripos($_FILES['attachment']['name'], '.'));
		$file_name = $rs_last['id']."_photo".$ext;
		$destination = "uploads/students/$id/".$file_name;
		move_uploaded_file($_FILES['attachment']['tmp_name'],$destination);
		$crud -> update("students", "photo = '$file_name'", "id = '$id'");
		
		require_once('lib/image_resize.php');
		require_once('lib/php_image_magician.php');
		$magicianObj = new imageLib($destination);
		$magicianObj -> resizeImage(200, 150);
		$magicianObj -> saveImage($destination, 100);
	}
	
			header("Location:index.php?register=1");
		}
	?>
	<!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
	طراح: خسروکیان
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

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


<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->



<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>

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
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>