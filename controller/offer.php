<?php
ob_start();
session_start();
require_once( "../common/dbconnect.php" );
require_once( "../common/function.php" );
if ( !isset( $_SESSION[ 'db2' ] ) )
	getdb2( $web_id );

$db2 = $_SESSION[ 'db2' ];
if(isset($_SESSION['ID']))
{
	$user_id=$_SESSION['ID'];
}
else
{
	header("location:login.php");
}
$list_product=listProduct();
?>
<!Doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--#============ Bootstrap CSS==================-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!--#============ Swiper Container ==================-->

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

	<!--#============ Font Lato Link ==================-->

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

	<!--#============ Simple Bar CSS ==================-->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.css">

	<!--#=========== Resource CSS & PLUGINS =============-->

	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="Resource/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="Resource/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

	<!-- Bootstrap Color Picker -->

	<link rel="stylesheet" href="Resource/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

	<!-- Tempusdominus Bbootstrap 4 -->

	<link rel="stylesheet" href="Resource/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

	<!-- Select2 -->

	<link rel="stylesheet" href="Resource/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="Resource/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<!-- Theme style -->

	<link rel="stylesheet" href="Resource/dist/css/adminlte.min.css">

	<!--#============ My CSS File==================-->

	<link rel="stylesheet" href="css/ss-custom-ac.css" type="text/css">
	<title>Smart Education Mantra</title>
	<style>
		.error {
			display: none;
			color: red;
			font-size: 15px;
			font-weight: 700;
		}
		
		.msg {
			display: none;
			color: #17CE90;
			font-size: 15px;
			font-weight: 700;
		}

	</style>
</head>
<!--#========================== Header ================================================= -->

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<?php require_once("include/header.php")?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php require_once("include/leftSidebar.php")?>

		<div class="content-wrapper ss-wrapper">
			<!-- Content Header (Page header) -->
			<?php require_once("include/breadCrumb.php")?>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row ss-row-2">
						<div class="col-12 p-0">
							<div class="card card-primary ss-card-main">
								<!-- /.card-header -->
								<div class="card-header ss-card-header">
									<h3 class="card-title">Add Offer</h3>
								</div>
								<div class="card-body" style="font-weight: 700;">
									<form id="offer">
										<input type="hidden" id="ui" value="<?php echo $user_id;?>"/>
										<div class="form-group">
											<div class="row">
												<div class="required-field col-sm-8 ">
													<label for="first_name" class="control-label">Offer Name</label>
													<input placeholder="Product Name" id="o_name" name="o_name" type="text" class="form-control" value="">
													<div class="error" id="e_o_name"></div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="required-field col-sm-8 ">
													<label for="first_name" class="control-label">Price</label>
													<input placeholder="Price" id="price" name="price" type="text" class="form-control" value="">
													<div class="error" id="e_price"></div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="required-field col-sm-8 ">
													<label for="first_name" class="control-label">Product</label>
													<br>
													<?php
													$index=1;
													foreach($list_product as $product)
													{
													?>
													<div class="form-check">
														<input type="checkbox" class="form-check-input" id="exampleCheck<?php echo $index;?>" name="products" value="<?php echo $product['product_id']?>">
														<label class="form-check-label" for="exampleCheck<?php echo $index;?>"><?php echo $product['product_name']?></label>
													</div>
													<?php
														$index++;
													}
													?>
													<div class="error" id="e_products"></div>
												</div>
											</div>
										</div>
										<div class="adjust_button">
											<button type="submit" class="btn btn-primary offer_btn">Add Offer</button>
										</div>
									</form>
									<div class="msg"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- Main Footer -->

		<?php require_once("include/footer.php");?>
	</div>
	<!-- ./wrapper -->

	<!--#========================== Javascript Links ================================================= -->

	<script src="https://kit.fontawesome.com/fd58adc4dc.js"></script>

	<!--#========================== JQuery 3.5.1 ================================================= -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!--#========================== Swiper-JS ================================================= -->

	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

	<!--#========================== Bootstrap JS ================================================== -->

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<!--#========================== Resource JS  ===================================================== -->

	<!-- Select2 -->

	<script src="Resource/plugins/select2/js/select2.full.min.js"></script>

	<!-- InputMask -->

	<script src="Resource/plugins/moment/moment.min.js"></script>
	<script src="Resource/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

	<!-- date-range-picker -->

	<script src="Resource/plugins/daterangepicker/daterangepicker.js"></script>

	<!-- Tempusdominus Bootstrap 4 -->

	<script src="Resource/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

	<!-- Bootstrap Switch -->
	<script src="Resource/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

	<!-- AdminLTE App -->

	<script src="Resource/dist/js/adminlte.min.js"></script>

	<!--#========================== Font Awesome JS  ===================================================== -->

	<script src="https://kit.fontawesome.com/fd58adc4dc.js" crossorigin="anonymous"></script>

	<!--#========================== Simple Bar JS ===================================================== -->

	<script src="https://cdn.jsdelivr.net/npm/simplebar@5.3.0/dist/simplebar.min.js"></script>

	<!--#========================== My JS File ===================================================== -->

	<script src="js/app.js"></script>
	<script src="js/offer.js"></script>
	<script src="js/logout.js"></script>
	<script>
		function openNav() {
			$( "#sideNav" ).addClass( 'open' );
			$( "#overlay" ).css( "width", "100%" );
			$( 'body' ).css( "overflow-y", "hidden" );
		}

		function closeNav() {
			$( "#sideNav" ).removeClass( 'open' );
			$( "#overlay" ).css( "width", "0px" );
			$( "body" ).css( "overflow-y", "visible" );
		}
		$( function () {
			$( '#dob-field' ).datetimepicker( {
				format: 'L'
			} );
		} );
		$( function () {
			$( '#doa-field' ).datetimepicker( {
				format: 'L'
			} );
			$( '#stdate' ).datetimepicker( {
				format: 'L'
			} );
		} );
		$( function () {
			$( '#state-choose' ).select2();
			$( '#bstop' ).select2();
			$( '#broute' ).select2();

		} );
		//var col1 = '<div class="col-sm-9"></div>'  
		//$('#ad-mf-t').on('click', function () {
		//   $('#add-new-file').appendChild(col1) 
		//}); 
		var i = 1;
		$( "#ad-mf-t" ).click( function () {
			i = i + 1;
			var html = '';
			html += '<div class="col-sm-9">';
			html += '<label class="control-label">File Information</label>';
			html += '<input name="file_info" id="file_info_' + i + '" type="text" class="form-control" value="">';
			html += '</div>';
			html += '<div class="col-sm-3">';
			html += '<label class="control-label">Upload File</label>';
			html += '<div class="custom-file">';
			html += '<input type="file" class="custom-file-input" id="my_file_' + i + '" name="my_file">';
			html += '<label class="custom-file-label" for="exampleInputFile">Choose File</label>';
			html += '</div>';
			html += '</div>';

			$( '#add-new-file' ).append( html );
		} );
		/*<div class="col-sm-9">
		                <label class="control-label">File Information</label>
		                <input name="last_class" type="text" class="form-control" value="">
		            </div>
		            <div class="col-sm-3">
		                <label class="control-label">Upload File</label>
		               <div class="custom-file">
		                <input type="file" class="custom-file-input" id="exampleInputFile">
		                <label class="custom-file-label" for="exampleInputFile">Choose File</label>
		               </div>
		            </div>
		<div class="clearfix"></div>*/
	</script>
</body>
</html>