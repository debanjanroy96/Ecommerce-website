<?php
$page_name= basename($_SERVER['PHP_SELF'], ".php");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Ecommer Website</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php if($page_name=="wallet"){echo "active"; } ?>">
				<a class="nav-link" href="wallet.php">Account<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item <?php if($page_name=="product-list"){echo "active"; } ?>">
				<a class="nav-link" href="product-list.php">Product List</a>
			</li>
			<li class="nav-item <?php if($page_name=="registration"){echo "active"; } ?>">
				<a class="nav-link" href="registration.php">Registration</a>
			</li>
			<?php if(!isset($_SESSION['USER_ID']))
				  {
			?>
			<li class="nav-item <?php if($page_name=="login.php"){echo "active"; } ?>">
				<a class="nav-link" href="login.php">Login</a>
			</li>
			<?php 
				}
				else
				{
			?>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
			<?php
				}
			?>
			<li class="nav-item">
				<a class="nav-link" href="controller/login.php">Admin Login</a>
			</li>
		</ul>
	</div>
</nav>