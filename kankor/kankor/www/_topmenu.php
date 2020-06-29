<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
			
				<!-- BEGIN TODO DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the 
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<?php
						if($_SESSION['photo']){
							$id = $_SESSION['id_u'];
							$photo = $_SESSION['photo'];
							if($_SESSION['type'] == "student"){
								echo "<img alt='' class='img-circle' src = 'uploads/students/$id/$photo'/>";
							}else if($_SESSION['type'] == "admin" || $_SESSION['type'] == "teacher"){
								echo "<img alt='' class='img-circle' src = 'uploads/users/$id/$photo'/>";
							}
						}
					?>
					<span class="username username-hide-on-mobile">
					<?php echo $_SESSION['first_name']." ".$_SESSION['last_name'];?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="profile.php">
							<i class="icon-user"></i>نمایه</a>
						</li>
						<li class="divider">
						</li>
				
						<li>
							<a href="logout.php">
							<i class="icon-key"></i>خروج از سیستم</a>
						</li>
					</ul>
				</li>
			
			</ul>
		</div>