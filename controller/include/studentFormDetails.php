<div class="card-body">
	<form id="addstudent">
		<div class="row">
			<div class="col-12">
				<button type="button" class="float-right btn btn-primary ss-curve-btn btn-md pl-4 pr-4">Print Form</button>
			</div>
		</div>
		<br>
		<div class="row mb-3">
			<div class="col-sm-4">
				<h4>Student Details</h4>
			</div>
			<div class="col-sm-8">
				<div style="float: right; display: flex;">
					<button type="button" class="btn-block btn-outline-success btn-md btn ss-curve-btn pl-4 pr-4">Show Last SR No.</button>
				</div>
			</div>
		</div>
		<input name="school_id" type="hidden" class="form-control" >
		<div class="form-group">
			<div class="row">
				<div class="required-field col-sm-8 ">
					<label for="first_name" class="control-label">Student Name</label>
					<input placeholder="Student Name" id="name" name="name" required="" type="text" class="form-control" value="">
					<div class="error" id="e_name"></div>
				</div>
				<?
				$last_sr_no=getSerialNo();
				?>
				<div class="col-sm-4">
					<label for="srno" class="control-label">
					<div> SR No. <span class="fg-green">(Last SR No.: S1060)</span></div>
					</label>
					<input placeholder="SR No" id="srno" name="srno" type="text" class="form-control" value="<?=$last_sr_no?>" readonly>
					<div class="error" id="e_srno"></div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-4">
					<label for="gender" class="control-label">Gender</label>
					<br>
					<label class="radio-inline mr-2" title="">
						<input name="gender" id="male" name="gender" required="" type="radio" value="male">
						Male </label>
					<label class="radio-inline" title="">
						<input name="gender" id="female" name="gender" required="" type="radio" value="female">
						Female </label>
					<br>
					<div class="error" id="e_gender"></div>
				</div>
				<div class="required-field col-sm-4">
					<label class="control-label">Date Of Birth</label>
					<div class="input-group date" id="dob-field" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" id="dob" data-target="#dob-field">
						<div class="input-group-append" data-target="#dob-field" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
					<div class="error" id="e_dob"></div>
				</div>
				<div class="col-sm-4">
					<label for="adhaar" class="control-label">Aadhaar Number</label>
					<input pattern="[0-9]{12}" placeholder="Aadhaar Number (12 digits)" id="adhar_no" name="adhar_no" type="text" class="form-control" value="">
					<div class="error" id="e_adhar_no"></div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-12">
					<label class="control-label">Address: </label>
					<input rows="2" name="address" id="address" placeholder="Full address without city and state" type="text" class="form-control" value="">
					<div class="error" id="e_address"></div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-4">
					<label for="city" class="control-label">City</label>
					<input placeholder="City" id="city" name="city" type="text" class="form-control" value="">
					<div class="error" id="e_city"></div>
				</div>
				<?
				$list_state=getState($con);
				?>
				<div class="col-sm-4">
					<label for="state-choose" class="control-label">State</label>
					<select class="state-select form-control" name="state-choose" id="state-choose">
						<?
						foreach($list_state as $state)
						{
						?>
						<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
						<?
						}
						?>
					</select>
					<div class="error" id="e_state-choose"></div>
				</div>
				<div class="col-sm-4">
					<label for="pincode" class="control-label">Pin Code</label>
					<input placeholder="Pin Code" id="pincode" name="pincode" type="number" class="form-control" value="" >
					<div class="error" id="e_pincode"></div>
				</div>
			</div>
		</div>
		<?
		$list_religion=getReligion($con);
		?>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-4">
					<label for="religion" class="control-label">Religion</label>
					<select placeholder="Religion" id="religion" name="religion" class="form-control">
						<option value="">Select Religion</option>
						<?
						foreach($list_religion as $religion)
						{
						?>
						<option value="<?=$religion['religion_id']?>"><?=$religion['religion_name']?></option>
						<?
						}
						?>
						<!--<option value="HINDU">HINDU</option>
						<option value="MUSLIM">MUSLIM</option>
						<option value="SIKH">SIKH</option>
						<option value="BUDDHIST">BUDDHIST</option>
						<option value="CHRISTIAN">CHRISTIAN</option>
						<option value="JAIN">JAIN</option>
						<option value="PARSI">PARSI</option>
						<option value="OTHER">OTHER</option>-->
					</select>
					<div class="error" id="e_religion"></div>
				</div>
				<?
				$list_category=getCategory($con);
				?>
				<div class="col-sm-4">
					<label for="category" class="control-label">Category</label>
					<select placeholder="Category" id="category" name="category" class="form-control">
						<option value="">Select Category</option>
						<?
						foreach($list_category as $category)
						{
						?>
						<option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
						<?
						}
						?>
					</select>
					<div class="error" id="e_category"></div>
				</div>
				<div class="required-field col-sm-4">
					<label class="control-label">Date Of Admission</label>
					<div class="input-group date" id="doa-field" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" id="doa" data-target="#doa-field">
						<div class="input-group-append" data-target="#doa-field" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
					<div class="error" id="e_doa"></div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-4">
					<label for="nationality" class="control-label">Nationality</label>
					<input placeholder="Nationality" id="nationality" name="nationality" type="text" class="form-control" value="Indian">
					<div class="error" id="e_nationality"></div>
				</div>
				<div class="col-sm-4">
					<label for="schooling_type" class="control-label">Schooling Type</label>
					<select placeholder="Schooling Type" id="schooling_type" name="schooling_type" class="form-control">
						<option value="">Select Schooling Type</option>
						<option value="Day Scholar">Day Scholar</option>
						<option value="Hosteler">Hosteler</option>
					</select>
					<div class="error" id="e_schooling_type"></div>
				</div>
				<?
				$list_transport=getTransport();
				/*echo "<pre>";
				print_r($list_transport);
				echo "</pre>";*/
				?>
				<div class="col-sm-4">
					<label for="transport" class="control-label">Transport</label>
					<select placeholder="Transport" id="transport" name="transport" class="form-control">
						<option value="">Select Transport Type</option>
						<?
						foreach($list_transport as $transport)
						{
						?>
						<option value="<?=$transport['transport_id']?>"><?=$transport['transport_name']?></option>
						<?		
						}
						?>
						<!--<option value="1">Bus</option>
						<option value="2">One-way Bus</option>
						<option value="3">Private</option>
						<option value="4">On Foot</option>-->
					</select>
					<div class="error" id="e_transport"></div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-sm-4">
					<label for="transport" class="control-label">Staff Relation</label>
					<select placeholder="Staff Relation" id="staff_relation" name="staff_relation" class="form-control">
						<option value="">Select Staff Relation</option>
						<option value="Teaching">Teaching</option>
						<option value="Non-Teaching">Non-Teaching</option>
					</select>
					<div class="error" id="e_staff_relation"></div>
				</div>
				<div class="required-field col-sm-4">
					<label for="transport" class="control-label">New Admission?</label>
					<select placeholder="New Admission" id="new_admission" name="new_admission" class="form-control">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
					<div class="error" id="e_new_admission"></div>
				</div>
				<?
				$list_medium=getMedium($con);
				?>
				<div class="col-sm-4">
					<label for="medium" class="control-label">Medium</label>
					<select placeholder="Medium" id="medium" name="medium" class="form-control">
						<?
						foreach($list_medium as $medium)
						{
						?>
							<option value="<?=$medium['medium_id']?>"><?=$medium['medium_name']?></option>
						<?
						}
						?>
						<!--<option>English</option>-->
						<!--<option>Hindi</option>-->
					</select>
					<div class="error" id="e_medium"></div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<?
				$list_class=getSchoolClass($school_id);
				/*echo "<pre>";
				print_r($list_class);
				echo "<pre>";*/
				?>
				<div class="required-field col-sm-6 ">
					<label for="standard" class="control-label">Class</label>
					<select placeholder="Select Class" required="" class="form-control" id="class_name">
						<option value="">Select Class</option>
						<?
						foreach($list_class as $class)
						{
						?>
						<option value="<?=$class['class_id']?>"><?=$class['class_name']?></option>
						<?
						}
						?>
						<!--<option value="1">1</option>
						<option value="2">2</option>-->
					</select>
					<div class="error" id="e_class"></div>
				</div>
				<div class="required-field col-sm-6">
					<label for="section" class="control-label">Section</label>
					<select placeholder="Select Section" required="" id="section_id" name="section_id" class="form-control">
						<!--<option value="">Select Section</option>
						<option value="A">A</option>
						<option value="B">B</option>-->
					</select>
					<div class="error" id="e_section_id"></div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<?
				$admission_no=getAdmissionNo("SDI",6);
				?>
				<div class="admission-key col-sm-4">
					<label for="admission_no" class="control-label">Admission Number</label>
					<input placeholder="Admission Number" id="admission_no" name="admission_no" type="text" class="form-control" value="<?=$admission_no?>" readonly>
					<div class="error" id="e_admission_no"></div>
				</div>
			</div>
		</div>
		<hr>
		<h4>Parent/Guardian Details
			<button type="button" class="btn btn-primary ss-curve-btn pl-4 pr-4" style="margin-left: 30px;">Add</button>
		</h4>
		<ul class="list-group">
			<li class="list-group-item">
				<div class="form-group has-error">
					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<label class="control-label">Relation</label>
								<input readonly="" type="text" class="form-control" value="father" >
								<input readonly="" type="hidden" class="form-control" value="1" >
							</div>
						</div>
						<div class="col-sm-collapse-right  col-sm-collapse-left  required-field col-sm-3">
							<label for="relations[0]" class="control-label">Name</label>
							<input required="" id="father_name" placeholder="Father's Name" type="text" class="form-control" value="" >
							<div class="error" id="e_father_name"></div>
						</div>
						<div class="col-sm-collapse-right  col-sm-2">
							<label for="relations[0]" class="control-label">Occupation</label>
							<input id="father_occupation" placeholder="Occupation" type="text" class="form-control" value="">
							<div class="error" id="e_father_occupation"></div>
						</div>
						<div class="col-sm-collapse-right  required-field col-sm-3">
							<label for="relations[0]" class="control-label">Primary Contact</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-phone-alt"></i></span> </div>
								<input type="text" class="form-control" id="father_contact" placeholder="Primary Contact">
								<div class="error" id="e_father_contact"></div>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<div class="checkbox">
									<label title="">
										<input readonly="" type="checkbox" value="1" checked="" >
										App Access</label>
								</div>
								<div class="checkbox">
									<label title="">
										<input readonly="" type="checkbox" value="1" checked="" >
										GatePass Access</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="list-group-item">
				<div class="form-group has-success">
					<div class="row">
						<div class="col-sm-2">
							<label for="relations[1]" class="control-label">Relation</label>
							<input  readonly="" type="text" class="form-control" value="mother">
							<input readonly="" type="hidden" class="form-control" value="0">
						</div>
						<div class="col-sm-collapse-right  col-sm-collapse-left  col-sm-3">
							<label for="relations[1]" class="control-label">Name</label>
							<input id="mother_name" placeholder="Mother's Name" type="text" class="form-control" value="" >
							<div class="error" id="e_mother_name"></div>
						</div>
						<div class="col-sm-2">
							<label for="relations[1]" class="control-label">Occupation</label>
							<input id="mother_occupation" placeholder="Occupation" type="text"  class="form-control" value="" >
							<div class="error" id="e_mother_occupation"></div>
						</div>
						<div class="col-sm-collapse-right  col-sm-3">
							<label for="relations[1]" class="control-label">Secondary Contact</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-phone-alt"></i></span> </div>
								<input type="text" id="mother_contact" class="form-control" placeholder="Primary Contact">
								<div class="error" id="e_mother_contact"></div>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<div class="checkbox">
									<label title="">
										<input readonly="" type="checkbox" value="1" checked="">
										App Access</label>
								</div>
								<div class="checkbox">
									<label title="">
										<input readonly="" type="checkbox" value="1" checked="" >
										GatePass Access</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<hr>
		<h4>Previous School Details</h4>
		<div class="form-group">
			<div class="row mt-3">
				<div class="col-sm-6">
					<label class="control-label">Last Class</label>
					<input id="last_class" name="last_class" type="text" class="form-control" value="">
					<div class="error" id="e_last_class"></div>
				</div>
				<div class="col-sm-6">
					<label class="control-label">School Name</label>
					<input id="last_school" name="last_school" type="text" class="form-control" value="">
					<div class="error" id="e_last_school"></div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-sm-6">
					<label class="control-label">Percentage/Grade</label>
					<input id="last_school_percent" name="last_school_percent" type="text" class="form-control" value="">
					<div class="error" id="e_last_school_percent"></div>
				</div>
				<div class="col-sm-6">
					<label class="control-label">Result (Pass/Fail)</label>
					<input id="last_school_result" name="last_school_result" type="text" class="form-control" value="">
					<div class="error" id="e_last_school_result"></div>
				</div>
			</div>
		</div>
		<div>
			<hr>
			<h4>Transport Details</h4>
			<button type="button" class="btn btn-primary ss-curve-btn pl-4 pr-4" data-toggle="modal" data-target="#modal-default1">Add Bus Stop</button>
		</div>
		<hr>
		<h4>Additional Information
			<button type="button" class="btn btn-primary ss-curve-btn pl-4 pr-4" style="margin-left: 30px;" data-toggle="modal" data-target="#modal-default4">Add New Field</button>
		</h4>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">
					<label class="control-label">Custom Field</label>
					<input type="text" class="form-control" value="">
				</div>
			</div>
			<br>
		</div>
		<h4>Upload Student File</h4>
		<div class="form-group">
			<div class="row mt-3" id="add-new-file">
				<div class="col-sm-9">
					<label class="control-label">File Information</label>
					<input name="file_info" id="file_info_1" type="text"  class="form-control" value="">
				</div>
				<div class="col-sm-3">
					<label class="control-label">Upload File</label>
				   <div class="custom-file">
					<input type="file" class="custom-file-input" id="my_file_1" name="my_file">
					<label class="custom-file-label" for="exampleInputFile">Choose File</label>
				   </div>
				</div>
				<div class="clearfix"></div> 
			</div>
		</div>
		<div class="form-group">
			<div class="row">
					<div class="col-sm-12 clearfix mt-3">
						<button type="button" class="btn btn-primary ss-curve-btn pl-4 pr-4 float-right" id="ad-mf-t" style="margin-left: 30px;" >Add More Document</button>
						<div class="clearfix"></div> 
					</div>
			</div>
		</div>
		<hr class="hide-print">
		<div class="row">
			<div class="col-sm-12">
				<div class="float-right">
					<div style="display: inline;">
						<button type="submit" class="ss-curve-btn pl-4 pr-4 btn-outline-primary btn">Add Student</button>
					</div>
					&nbsp;&nbsp;
					<button type="button" class="btn btn-secondary ss-curve-btn pl-4 pr-4">Reset</button>
					&nbsp;&nbsp;</div>
				<div class="text-center"></div>
			</div>
		</div>
	</form>
</div>