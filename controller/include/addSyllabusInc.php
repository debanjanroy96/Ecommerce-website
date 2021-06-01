<style>
	.syllabus_item
	{
		height: 50px;
		font-size: 18px;
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
	.msg {
		width: 100%;
		text-align: center;
		color: #17CE90;
		font-size: 18px;
		font-weight: 700;
		margin: 10px 0px 0px 0px;
		display: none;
	}
	
	.error {
		font-size: 16px;
		font-weight: 700;
		color: red;
		margin-top: 10px;
		display: none;
	}

</style>
<?
$list_class=listSchoolClassDtls($school_id,"order by c.ord");
?>
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
							<h3 class="card-title">Manage Syllabus</h3>
						</div>
						<!-- form start -->
						<div class="card-body">
							<form id="add_syllabus">
								<div class="form-group">
									<div class="row">
										<div class="required-field col-sm-6 ">
											<label for="class" class="control-label">Class</label>
											<select placeholder="" id="class_name" name="class_name" class="form-control">
												<option value="">Select Class</option>
												<?
												foreach($list_class as $class)
												{
												?>
												<option value="<?=$class['class_id']?>"><?=$class['class_name']?></option>
												<?
												}
												?>
											</select>
											<div class="error" id="e_class_name"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="required-field col-sm-6 ">
										<label for="section" class="control-label">Section</label>
										<select placeholder="" id="section_id" name="section_id" class="form-control">
											<option value="">Select Section</option>
										</select>
										<div class="error" id="e_section_id"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="required-field col-sm-6 ">
										<label for="subject" class="control-label">Subject</label>
										<select class="state-select form-control" name="subject_id" id="subject_id">
											<option value="">Select Subject</option>
											<?
											foreach($list_subject as $subject)
											{
											?>
											<option><?=$subject['subject_name']?></option>
											<?
											}
											?>
										</select>
										<div class="error" id="e_subject_id"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<input class="form-control" type="hidden" id="use_syllabus" name="use_syllabus" value="0"/>
										<div class="required-field col-sm-6 display_syllabus"></div>
										
										</div>
										<div class="error" id="e_display_syllabus"></div>
									</div>
								<div class="form-group">
									<div class="row">
										<div class="required-field col-sm-6 upload_s_doc">
										<label for="upload_syllabus" class="control-label">Upload New Syllabus</label>
										<input class="form-control" type="file" id="syllabus_doc" name="syllabus_doc"/>
										<div class="error" id="e_syllabus_doc"></div>
										</div>
									</div>
								</div>
								</div>
								<div class="col-sm-6 add_ins_submit_btn">
									<button type="submit" class="btn btn-primary ss-curve-btn pl-4 pr-4" id="add_syllabus_btn">Submit</button>
								</div>
								<div class="msg"></div>
							</form>
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