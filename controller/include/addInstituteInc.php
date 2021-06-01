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
.add_ins_submit_btn
{
	display: flex;
	align-items: flex-end;
	justify-content: center;
	height: 100px;
}
.msg
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
	text-align: center;
}
</style>
<?
$school_dtls=getSchoolDetails($school_id);
$school_address_dtls=getSchoolAddress($school_id);
$state_dtls=getSearchStateByStateId($school_address_dtls['state_id']);
$state_name=$state_dtls['name'];
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
							<h3 class="card-title">Institute Details</h3>
						</div>
						<!-- form start -->
						<div class="card-body">
                                <form id="addInstitute">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="required-field col-sm-12 ">
                                                <label for="first_name" class="control-label">Institute Name</label>
<input placeholder="Institute Name" id="institute_name" name="institute_name" required="" type="text" class="form-control" value="<?=$school_dtls['school_name']?>">
												<div class="error" id="e_institute_name"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?
										$list_state=getState();
									?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="state-choose" class="control-label">State</label>
                                                <select class="state-select form-control" name="state-choose" id="state-choose">
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
                                                <label for="city" class="control-label">City</label>
 <input placeholder="City" id="city" name="city" type="text" class="form-control" value="<?=$school_address_dtls['city']?>">
												<div class="error" id="e_city"></div>
                                            </div>
											<div class="col-sm-4">
                                                <label for="city" class="control-label">District</label>
  <input placeholder="District" id="district" name="district" type="text" class="form-control" value="<?=$school_address_dtls['district']?>">
												<div class="error" id="e_district"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label class="control-label">Address: </label>
                                                <input rows="2" id="address" name="address" placeholder="Full address without city and state" type="text" class="form-control" value="<?=$school_address_dtls['address']?>">
												<div class="error" id="e_address"></div>
                                            </div>
											<div class="col-sm-4">
                                                <label for="pincode" class="control-label">Pin Code</label>
                                                <input placeholder="Enter Pin Code" id="pincode" name="pincode" type="number" class="form-control" value="<?=$school_address_dtls['pincode']?>" >
												<div class="error" id="e_pincode"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nationality" class="control-label">Contact 1</label>
                                                <input placeholder="Enter Contact 1" id="contact_1" name="contact_1" type="text" class="form-control" value="<?=$school_dtls['contact_no1']?>">
												<div class="error" id="e_contact_1"></div>
                                            </div>
											<div class="col-sm-6">
                                                <label for="nationality" class="control-label">Contact 2</label>
                                                <input placeholder="Enter Contact 2" id="contact_2" name="contact_2" type="text" class="form-control" value="<?=$school_dtls['contact_no2']?>">
												<div class="error" id="e_contact_2"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nationality" class="control-label">Affiliation Code</label>
                                                <input placeholder="Enter Affiliation Code" id="affilation" name="affilation" type="text" class="form-control" value="<?=$school_dtls['affiliation_code']?>">
												<div class="error" id="e_affilation"></div>
                                            </div>
											<div class="col-sm-6">
                                                <label for="nationality" class="control-label">School Code:</label>
                                                <input placeholder="Enter School Code" id="school_code" name="school_code" type="text" class="form-control" value="<?=$school_dtls['school_code']?>">
												<div class="error" id="e_school_code"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nationality" class="control-label">Email:</label>
                                                <input placeholder="Enter Email" email="email" id="email" name="email" type="text" class="form-control" value="<?=$school_dtls['email']?>">
												<div class="error" id="e_email"></div>
                                            </div>
											<div class="col-sm-6">
                                                <label for="nationality" class="control-label">Village:</label>
                                                <input placeholder="Enter Village" id="village" name="village" type="text" class="form-control" value="<?=$school_address_dtls['village']?>">
												<div class="error" id="e_village"></div>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nationality" class="control-label">Institute Logo</label>
<input  id="institute_logo" name="institute_logo" type="file" class="form-control" style="display: none;">
<div class="upload_ins_logo" id="upload_logo_btn">
	<?
	if($school_dtls['logo']=="")
	{
	?>
	<p id="file_upload">Drop files here to upload</p>	
	<img src="" id="uploaded_logo" style="padding: 10px 0px;width: 150px;display: none;"/>
	<?
	}
	else
	{
	?>
	<p id="file_upload" style="display: none;">Drop files here to upload</p>	
	<img src="school/<?=$school_dtls['logo']?>" id="uploaded_logo" style="padding: 10px 0px;width: 150px;"/>
	<?
	}
	?>
	
</div>
												<div class="error" id="e_institute_logo"></div>
                                            </div>
											<!--<div class="col-sm-6">
                                                <label for="nationality" class="control-label">Institute Logo(SMALL)</label>
<input  id="institute_logo_small" name="institute_logo_small" type="file" class="form-control" style="display: none;">
<div class="upload_ins_logo" id="upload_logo_btn_small">
	<p id="file_upload_small">Drop files here to upload</p>	
	<img src="" id="uploaded_logo_small" style="padding: 10px 0px;width: 150px;display: none;"/>
</div>
                                            </div>-->
											
                                        </div>
                                    </div>
									<div class="col-sm-12 add_ins_submit_btn">
<button type="submit" class="btn btn-primary ss-curve-btn pl-4 pr-4" id="submit_ins_btn">Submit</button>
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