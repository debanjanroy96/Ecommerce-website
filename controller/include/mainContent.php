<div class="content-wrapper ss-wrapper"> 
	<!-- Content Header (Page header) -->
	<? require_once("breadCrumb.php")?>
	<!-- /.content-header --> 

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row ss-row-2">
				<div class="col-12 p-0">
					<div class="card card-primary ss-card-main"> 
						<!-- /.card-header -->
						<div class="card-header ss-card-header">
							<h3 class="card-title">Add Student</h3>
						</div>
						<!-- form start -->
						<? require_once("studentFormDetails.php");?>
					</div>
				</div>
				<div class="col-12 p-0">
					<? require_once("uploadExcel.php");?>
				</div>
				<div class="col-12 p-0">
					<? require_once("additionalInputField.php");?>
				</div>
			</div>
			<!-- /.row --> 
		</div>
		<!-- /.container-fluid --> 
	</div>
	<!-- /.content --> 
</div>