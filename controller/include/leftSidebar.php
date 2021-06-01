<?php
$breachcrumb="";
$page_name= basename($_SERVER['PHP_SELF'], ".php");
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">

	<!-- Brand Logo -->
	
	<div href="#" class="brand-link my-link"> <img src="photo/default_profile.jpg" id="side_bar_prof_img" alt="AdminLTE Logo" class="brand-image ss-prof-image" style="opacity: 1;">
		<div class="prof-cont">
			<div class="prof-name-cont">
				<div class="prof-name"><?php echo "Debanjan Roy"?></div>
				<button class="ss-lock"><i class="fa fa-lock" aria-hidden="true"></i></button>
			</div>
			<div class="progress" style="height:4px;">
				<div class="progress-bar" style="width:40%;background:#fff;"></div>
			</div>
			<a href="#" class="edit-profile text-xs"><i class="fas fa-wrench"></i> &nbsp;Edit Profile</a> </div>
	</div>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<ul class="nav nav-pills nav-fill nav-justified ss-nav-ul">
			<li class="nav-item"> <a class="nav-link active" href="#"><i class="far fa-clone"></i></a> </li>
			<li class="nav-item dropdown"> <a class="nav-link" href="#"><i class="fas fa-user"></i></a> </li>
		</ul>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item"> <a href="dashboard.php" class="nav-link <?php if($page_name=="dashboard") { ?> active <?php } ?>"> <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="ss-li-head"> Dashboard </p>
                        </a> </li>
				<li class="nav-item has-treeview <?php if($page_name=="add-product" || $page_name=="list-product") { ?> menu-open <?php } ?>"> <a href="#" class="nav-link <?php if($page_name=="add-product" || $page_name=="list-product") { ?> active <?php } ?>"> <i class="nav-icon fas fa-users"></i>
                        <p class="ss-li-head">Manage Product <i class="right fas fa-angle-left"></i> </p>
                        </a>
					<ul class="nav nav-treeview">
						<li class="nav-item"> <a href="add-product.php" class="nav-link <?php if($page_name=="add-product") { ?> active <?php } ?>"> <i class="fas fa-user-plus nav-icon"></i>
                                <p class="ss-li-head">Add Product</p>
                                </a> </li>
						<li class="nav-item"> <a href="list-product.php" class="nav-link <?php if($page_name=="list-product") { ?> active <?php } ?>"> <i class="fas fa-user-plus nav-icon"></i>
                                <p class="ss-li-head">List Product</p>
                                </a> </li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if($page_name=="list-client") { ?> menu-open <?php } ?>"> <a href="#" class="nav-link <?php if($page_name=="list-client") { ?> active <?php } ?>"> <i class="nav-icon fas fa-users"></i>
                        <p class="ss-li-head">Manage Client <i class="right fas fa-angle-left"></i> </p>
                        </a>
					<ul class="nav nav-treeview">
						
						<li class="nav-item"> <a href="list-client.php" class="nav-link <?php if($page_name=="list-client") { ?> active <?php } ?>"> <i class="fas fa-user-plus nav-icon"></i>
                                <p class="ss-li-head">List Client</p>
                                </a> </li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?php if($page_name=="offer") { ?> menu-open <?php } ?>"> <a href="#" class="nav-link <?php if($page_name=="offer") { ?> active <?php } ?>"> <i class="nav-icon fas fa-users"></i>
                        <p class="ss-li-head">Manage Offer <i class="right fas fa-angle-left"></i> </p>
                        </a>
					<ul class="nav nav-treeview">
						
						<li class="nav-item"> <a href="offer.php" class="nav-link <?php if($page_name=="offer") { ?> active <?php } ?>"> <i class="fas fa-user-plus nav-icon"></i>
                                <p class="ss-li-head">Add Offer</p>
                                </a> </li>
					</ul>
				</li>
				<li class="nav-item"> <a href="logout.php" class="nav-link logout"> <i class="nav-icon fas fa-power-off"></i>
                        <p class="ss-li-head"> Log out </p>
                        </a> </li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>