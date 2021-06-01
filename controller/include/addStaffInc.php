<style>
.upload_ins_logo
{
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100px;
	width: 70%;
	cursor: pointer;
	border: 2px dotted #C7C7C7;
	background-color: #E1E1E1;
	border-radius: 3px;
}
.add_staff_btn
{
	display: flex;
	align-items: flex-end;
	justify-content: flex-end;
	height: 100px;
}
.msg,.csv_msg
{
	width: 100%;
	text-align: center;
	color:#17CE90;
	font-size: 18px;
	font-weight: 700;
	margin:10px 0px 0px 0px;
	display: none;
}
.error
{
	font-size: 16px;
	font-weight: 700;
	color:red;
	margin-top:10px;
	display: none;
}
</style>
<?
$staff_dtls=getStaffDetails($staff_id);
$state_dtls=getSearchStateByStateId($staff_dtls['state_id']);
$state_name=$state_dtls['name'];
$depart_dtls=getDepartmentName($staff_dtls['staff_department_id']);
$design_dtls=getDesignationName($staff_dtls['staff_designation_id']);
$depart_name=$depart_dtls['department_name'];
$design_name=$design_dtls['designation_name'];
$db_login_role=getStaffRole($staff_id);
if(!$staff_id)
{
	$staff_code=getUserCode("SF",$school_id,6);
}
else
{
	if($staff_dtls['username'])
	{
		$staff_code=$staff_dtls['username'];	
	}
	else
	{
		$staff_code=getUserCode("SF",$school_id,6);
	}
}
/*echo "<pre>";
print_r($staff_dtls);
echo "</pre>";*/
?>
<!--<div class="content-wrapper ss-wrapper" style="border: 1px solid red;">--> 
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
							
							<h3 class="card-title"><?=$title?></h3>
						</div>
						<!-- form start -->
						<div class="card-body">
                                <form id="addStaff">
									<input type="hidden" id="staff_id" name="staff_id" value="<?=$staff_id?>"/>
									<input type="hidden" id="staff_details_id" name="staff_id" value="<?=$staff_details_id?>"/>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="required-field col-sm-6 ">
 <label for="first_name" class="control-label">Staff Name</label>
<input placeholder="Staff Name" id="staff_name" name="staff_name"  type="text" class="form-control" value="<?=$staff_dtls['name']?>">
												<div class="error" id="e_staff_name"></div>
                                            </div>
											<div class="required-field col-sm-6 ">
<label for="first_name" class="control-label">Short Code Name</label>
<input placeholder="Short Code Name" id="short_code_name" name="short_code_name"  type="text" class="form-control" value="<?=$staff_dtls['short_code_name']?>">
												<div class="error" id="e_short_code_name"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
                                            <div class="required-field col-sm-6 ">
 <label for="first_name" class="control-label">Employee Code</label>
<input placeholder="Employee Code" id="employee_code" name="employee_code" type="text" class="form-control" value="<?=$staff_dtls['employee_code']?>">
												<div class="error" id="e_employee_code"></div>
                                            </div>
											<div class="required-field col-sm-6 ">
<label class="control-label">Date Of Birth</label>
<div class="input-group date" id="dob-field" data-target-input="nearest">
	<input type="text" class="form-control datetimepicker-input" id="dob" data-target="#dob-field" 
		   <? if($staff_dtls['dob']) { ?>value="<?=date("m/d/Y",$staff_dtls['dob'])?>" <? } ?>>
	<div class="input-group-append" data-target="#dob-field" data-toggle="datetimepicker">
		<div class="input-group-text"><i class="fa fa-calendar"></i></div>
	</div>
</div>
												<div class="error" id="e_dob"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
<?
$list_department=listStaffDepartment();											
?>
                                            <div class="required-field col-sm-5 ">
 <label for="first_name" class="control-label">Department Name</label>
<select class="state-select form-control" name="dept_name" id="dept_name">
	<option>Select Department</option>
	<?
	foreach($list_department as $department)
	{
		if($depart_name==$department['department_name'])
		{
		?>
		<option selected><?=$department['department_name']?></option>
		<?
		}
		else
		{
		?>
		<option><?=$department['department_name']?></option>
		<?
		}
	}
	?>
</select>
												<div class="error" id="e_dept_name"></div>
                                            </div>
											<div class="required-field col-sm-5 ">
 <label for="first_name" class="control-label">Designation</label>
<select class="state-select form-control" name="designation" id="designation">
	<?
	if($design_name)
	{
	?>
	<option selected><?=$design_name?></option>
	<?
	}
	?>
</select>
												<div class="error" id="e_designation"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
<?
$list_login_role=listLoginRole();											
?>
                                            <div class="required-field col-sm-12 ">
<label for="first_name" class="control-label">User Login Role</label>
<select placeholder="Category" id="login_role" name="login_role" class="form-control">
	<option value="">Select Role</option>
	<?
	foreach($list_login_role as $role)
	{
		$login_selected="";
		if($db_login_role['login_role']==$role['login_role'])
		{
			$login_selected="selected";
		}
	?>
	<option value="<?=$role['login_role']?>" <?=$login_selected?>><?=$role['login_role_name']?></option>
	<?
	}
	?>
</select>
					<div class="error" id="e_login_role"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
											<div class="col-sm-6">
<label for="gender" class="control-label">Gender</label>
<br>
<label class="radio-inline mr-2" title="">
<input name="gender" id="male" name="gender"  type="radio" value="male" <? if($staff_dtls['gender']=="male"){ echo "checked";}?>>
Male </label>
<label class="radio-inline" title="">
<input name="gender" id="female" name="gender"  type="radio" value="female" <? if($staff_dtls['gender']=="female"){ echo "checked";}?>>
Female </label>
<br>
										<div class="error" id="e_gender"></div>
											</div>
											<div class="required-field col-sm-6 ">
 <label for="first_name" class="control-label">Aadhaar Number</label>
<input placeholder="Employee Code" id="aadhaar_no" name="aadhaar_no"  type="text" class="form-control" value="<?=$staff_dtls['adhar_no']?>">
												<div class="error" id="e_aadhaar_no"></div>
                                            </div>
										</div>
									</div>
									<div class="form-group">
                                        <div class="row">
											<div class="col-sm-12">
 <label for="first_name" class="control-label">Address</label>
<input placeholder="Full address without city and state" id="address" name="address"  type="text" class="form-control" value="<?=$staff_dtls['address']?>">
												<div class="error" id="e_address"></div>
											</div>
										</div>
									</div>
                                    <?
										$list_state=getState();
									?>
                                    <div class="form-group">
                                        <div class="row">
											<div class="col-sm-4">
                                                <label for="city" class="control-label">City</label>
 <input placeholder="City" id="city" name="city" type="text" class="form-control" value="<?=$staff_dtls['city']?>">
												<div class="error" id="e_city"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="state-choose" class="control-label">State</label>
                                                <select class="state-select form-control" name="state_id" id="state_id">
													<?
													foreach($list_state as $state)
													{
														if($state_name==$state['name'])
														{
														?>
														<option selected><?=$state['name']?></option>
														<?
														}
														else
														{
														?>
														<option><?=$state['name']?></option>
														<?	
														}	
													}
													?>
                                                </select>
												<div class="error" id="e_state-choose"></div>
                                            </div>
											
											<div class="col-sm-4">
                                                <label for="pincode" class="control-label">Pin Code</label>
                                                <input placeholder="Enter Pin Code" id="pincode" name="pincode" type="number" class="form-control" value="<?=$staff_dtls['pincode']?>" >
												<div class="error" id="e_pincode"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
					<?
					$list_religion=getReligion($con);
					?>
					<label for="religion" class="control-label">Religion</label>
					<select placeholder="Religion" id="religion" name="religion" class="form-control">
						<option value="">Select Religion</option>
						<?
						foreach($list_religion as $religion)
						{
							$selected="";
							if($staff_dtls['religion_id']==$religion['religion_id'])
							{
								$selected="selected";
							}
						?>
						<option value="<?=$religion['religion_id']?>" <?=$selected?>><?=$religion['religion_name']?></option>
						<?
						}
						?>
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
							$selected="";
							if($staff_dtls['category_id']==$category['category_id'])
							{
								$selected="selected";
							}
						?>
						<option value="<?=$category['category_id']?>" <?=$selected?>><?=$category['category_name']?></option>
						<?
						}
						?>
					</select>
					<div class="error" id="e_category"></div>
				</div>
				<div class="col-sm-4">
					<label for="nationality" class="control-label">Nationality</label>
					<input placeholder="Nationality" id="nationality" name="nationality" type="text" class="form-control" value="Indian">
					<div class="error" id="e_nationality"></div>
				</div>
										</div>
									</div>
									<div class="form-group">
                                        <div class="row">
                                            <div class="required-field col-sm-6 ">
<label class="control-label">Date Of Profession</label>
<div class="input-group date" id="dop-field" data-target-input="nearest">
	<input type="text" class="form-control datetimepicker-input" id="dop" data-target="#dop-field"
		   <? if($staff_dtls['dop']) { ?> value="<?=date("m/d/Y",$staff_dtls['dop'])?>" <? } ?>>
	<div class="input-group-append" data-target="#dop-field" data-toggle="datetimepicker">
		<div class="input-group-text"><i class="fa fa-calendar"></i></div>
	</div>
</div>
												<div class="error" id="e_dop"></div>
                                            </div>
											<div class="required-field col-sm-6 ">
<label class="control-label">Date Of Joining</label>
<div class="input-group date" id="doj-field" data-target-input="nearest">
	<input type="text" class="form-control datetimepicker-input" id="doj" data-target="#doj-field"
		   <? if($staff_dtls['doj']) { ?> value="<?=date("m/d/Y",$staff_dtls['doj'])?>" <? } ?>>
	<div class="input-group-append" data-target="#doj-field" data-toggle="datetimepicker">
		<div class="input-group-text"><i class="fa fa-calendar"></i></div>
	</div>
</div>
												<div class="error" id="e_doj"></div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nationality" class="control-label">Alma Mater</label>
                                                <input placeholder="Alma Mater" id="alma_mater" name="alma_mater" type="text" class="form-control" value="<?=$staff_dtls['alma_mater']?>">
												<div class="error" id="e_alma_mater"></div>
                                            </div>
											<div class="col-sm-6">
                                                <label for="nationality" class="control-label">Major</label>
                                                <input placeholder="Major" id="major" name="major" type="text" class="form-control" value="<?=$staff_dtls['major']?>">
												<div class="error" id="e_major"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nationality" class="control-label">Phone Number</label>
                                                <input placeholder="Primary Contact" id="p_contact" name="p_contact" type="text" class="form-control" value="<?=$staff_dtls['primary_contact']?>">
												<div class="error" id="e_p_contact"></div>
                                            </div>
											<div class="col-sm-6">
                                                <label for="nationality" class="control-label">WhatsApp Number</label>
                                                <input placeholder="Secondary Contact" id="s_contact" name="s_contact" type="text" class="form-control" value="<?=$staff_dtls['secondary_contact']?>">
												<div class="error" id="e_s_contact"></div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nationality" class="control-label">Email</label>
                                                <input placeholder="Email" id="email" name="email" type="text" class="form-control" value="<?=$staff_dtls['email']?>">
												<div class="error" id="e_email"></div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nationality" class="control-label">User Id</label>
                                                <input placeholder="Enter User Id" id="user_nm" name="user_nm" type="text" class="form-control" value="<?=$staff_code?>" readonly autocomplete="off">
												<div class="error" id="e_user_nm"></div>
                                            </div>
											<div class="col-sm-6">
                                                <label for="nationality" class="control-label">Password</label>
                                                <input placeholder="Password" id="pwd" name="pwd" type="password" class="form-control" value="<?=$staff_dtls['password']?>" autocomplete="off">
												<div class="error" id="e_pwd"></div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="col-sm-12 add_staff_btn">
<button type="submit" class="btn btn-primary ss-curve-btn pl-4 pr-4" id="staff_btn">Add Staff</button>
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
<!--</div>-->