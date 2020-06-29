	<ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
				
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start <?php if($parent_menu == "homepage"){echo "active";}?> open">
					<a href="homepage.php">
					<i class="icon-home"></i>
					<span class="title">صفحه اصلی</span>
	   <span class="<?php if($parent_menu=="homepage"){echo "selected";}?>" ></span>
					</a>
				</li>
				<?php
					if($_SESSION['type'] == "admin" || $_SESSION['type'] == "teacher"){
				?>
				<li class="start <?php if($parent_menu == "administrative"){echo "active";}?> open">
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title">مدیریت</span>
	   <span class="<?php if($parent_menu=="administrative"){echo "selected";}?>" ></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li  class="<?php if($sub_menu=="add_province"){echo "active";}?>">
							<a href="add_province.php">
							<i class="icon-bar-chart"></i>
							اضافه نمودن ولایت</a>
						</li>	
						
						<li  class="<?php if($sub_menu=="add_university"){echo "active";}?>">
							<a href="add_university.php">
							<i class="icon-bar-chart"></i>
							اضافه نمودن پوهنتون</a>
						</li>
						<li class="<?php if($sub_menu=="add_faculty"){echo "active";}?>">
							<a href="add_faculty.php">
							<i class="icon-bulb"></i>
							اضافه نمودن فاکولته</a>
						</li>
				         <li class="<?php if($sub_menu=="add_category"){echo "active";}?>">
							<a href="add_category.php">
							<i class="icon-diamond"></i>
							اضافه نمودن بخش</a>
						</li>    
					
						<li class="<?php if($sub_menu=="add_subject"){echo "active";}?>">
							<a href="add_subject.php">
							<i class="icon-briefcase"></i>
							اضافه نمودن مضامین</a>
						</li>	
						
						<li class="<?php if($sub_menu=="add_faculty_scores"){echo "active";}?>">
							<a href="add_faculty_scores.php">
							<i class="icon-briefcase"></i>
							بلندترین/پایین ترین نمرات </a>
						</li>	
						
						<li class="<?php if($sub_menu=="add_questions"){echo "active";}?>">
							<a href="add_questions.php">
							<i class="icon-briefcase"></i>
							اضافه نمودن سوالات</a>
						</li>
						
						
						<li class="<?php if($sub_menu=="private_kankor_setting"){echo "active";}?>">
							<a href="private_kankor_setting.php">
							<i class="icon-briefcase"></i>
							تنظیمات کانکور اختصاصی</a>
						</li>
					
						<li class="<?php if($sub_menu=="add_user"){echo "active";}?>">
							<a href="add_user.php">
							<i class="icon-user"></i>
							اضافه نمودن کاربران</a>
						</li>
				
						
					</ul>
				</li>
				
				<li class="start <?php if($parent_menu == "students_exam"){echo "active";}?> open">
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">امتحانات</span>
					<span class="<?php if($parent_menu=="students_exam"){echo "selected";}?>" ></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
					
						<li class="<?php if($sub_menu=="publickankor_exam"){echo "active";}?>">
							<a href="publickankor_exam.php">
							<i class="icon-settings"></i>
							امتحان کانکور عمومی</a>
						</li>
						<li class="<?php if($sub_menu=="privatekankor_exam"){echo "active";}?>">
							<a href="privatekankor_exam.php">
							<i class="icon-folder"></i>
							امتحان اختصاصی</a>
						</li>

					</ul>
				
				</li>
				<?php
					}else if ($_SESSION['type'] == "student"){
				?>
				<li class="start <?php if($parent_menu == "students_exam"){echo "active";}?> open">
					<a href="javascript:;">
					<i class="icon-user"></i>
					<span class="title">امتحانات</span>
					<span class="<?php if($parent_menu=="students_exam"){echo "selected";}?>" ></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
					
						<li class="<?php if($sub_menu=="publickankor_exam"){echo "active";}?>">
							<a href="publickankor_exam.php">
							<i class="icon-settings"></i>
							امتحان کانکور عمومی</a>
						</li>
						<li class="<?php if($sub_menu=="privatekankor_exam"){echo "active";}?>">
							<a href="privatekankor_exam.php">
							<i class="icon-folder"></i>
							امتحان اختصاصی</a>
						</li>

					</ul>
				
				</li>
				<?php
					}
				?>
					</ul>
				</li>
			</ul>
			