<style>
.login_role_item
{
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.edit_user,.view_user
{
	font-size: 22px;
	cursor: pointer;
}
.del_login_role
{
	color:#DA6764;
	font-size: 22px;
	cursor: pointer;
}
.del_staff_dtls
{
	color:#D9534F;
	font-size: 22px;
	cursor: pointer;
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
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th 
{
  background-color: #FFFFFF;
}
.add_login_role
{
	font-size: 22px;
	cursor: pointer;
}
</style>
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
              <h3 class="card-title">Manage Staff</h3>
            </div>
            <!-- form start -->
            <div class="card-body">
			<?
			$list_department=listStaffDepartment();
			foreach($list_department as $department)
			{
				$list_staff=listStaffByDepartment($department['department_id']);
				if(count($list_staff)>0){
			?>
              <div class="row" id="row_<?=$department['department_id']?>">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><?=$department['department_name']?></h3>
                    </div>
               
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Designation</th>
                            <th>Staff Name</th>
                            <th>Short Code</th>
                            <th>Emp. Code</th>
                            <th>Contacts</th>
							<th>Username</th>
							<th>Password</th>
							<th>Login Roles</th>
							<th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
						<?
						foreach($list_staff as $staff)
						{
							$list_login_role=listStaffLoginRole($staff['staff_id']);
							
							if($staff['primary_contact'] && $staff['secondary_contact'])
							{
								$contact=$staff['primary_contact'].",".$staff['secondary_contact'];
							}
							else if($staff['primary_contact'])
							{
								$contact=$staff['primary_contact'];
							}
							else if($staff['secondary_contact'])
							{
								$contact=$staff['secondary_contact'];
							}
						?>
						<tr class="staff_content_<?=$staff['staff_id'].$staff['staff_designation_id']?>">
                            <td><?=$staff['designation_name']?></td>
                            <td><?=$staff['name']?></td>
                            <td><?=$staff['short_code_name']?></td>
                            <td><?=$staff['employee_code']?></td>
                            <td><?=$contact?></td>
							<td><?=$staff['username']?></td>
							<td><?=$staff['password']?></td>
							
							<td><ul class="staff_login_role_<?=$staff['staff_id'].$staff['staff_designation_id']?>">
							<?
								if(count($list_login_role)>0)
								{
								?>
							
								<?
									foreach($list_login_role as $login_role)
									{
									?>
						<li class="login_role_item login_role_<?=$staff['staff_id'].$staff['staff_designation_id']?><?=$login_role['login_role']?>">
						<p><?=$login_role['login_role_name']?></p>&nbsp;&nbsp;
<i class="far fa-times-circle del_login_role" data-sti="<?=$staff['staff_id']?>" 
						data-lr="<?=$login_role['login_role']?>" data-desi="<?=$staff['staff_designation_id']?>" data-login-role-nm="<?=$login_role['login_role_name']?>"></i></li>
									<?	
									}
								}
								else
								{	
								?>
								<li style="list-style: none;">&nbsp;</li>
								<?	
								}
							?>
								</ul></td>
							<td><i class="fas fa-user view_user" onClick="window.location.href='staff-profile.php?i=<?=$staff['staff_id']?>'"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-plus add_login_role" data-sti="<?=$staff['staff_id']?>" data-desi="<?=$staff['staff_designation_id']?>"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-edit edit_user"
							onclick="window.location.href='addstaff.php?i=<?=$staff['staff_id']?>&si=<?=$staff['staff_details_id']?>'"></i>&nbsp;&nbsp;&nbsp;&nbsp;
							<i class="far fa-trash-alt del_staff_dtls" data-sti="<?=$staff['staff_id']?>" data-desi="<?=$staff['staff_designation_id']?>" data-depti="<?=$department['department_id']?>"></i>
							</td>
                        </tr>
						<?	
						}
						?>
                          
                          
                        </tbody>
                      </table>
                    </div>
                   
                  </div>
                  
                </div>
              </div>
			<?
				}
			}
			?>
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
