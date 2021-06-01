<style>
.dept_heading {
	font-size: 18px;
	margin: 50px 0px 0px 0px;
}
.del_designation
{
	color:#DA6764;
	font-size: 22px;
	cursor: pointer;
}
.add_designation
{
	color:#5BC0DE;
	font-size: 22px;
	cursor: pointer;
}
.del_department
{
	color:#D9534F;
	font-size: 22px;
	cursor: pointer;
}
.designation_item
{
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.adjust_icon
{
	display: flex;
	align-items: center;
	justify-content: center;
}
.adjust_thead,.adjust_tbody
{
	text-align: center;
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
              <h3 class="card-title">Add Department</h3>
            </div>
            <!-- form start -->
            <div class="card-body">
              <form id="addDepartment">
                <div class="form-group">
                  <div class="row">
                    <div class="required-field col-sm-6 ">
                      <label for="first_name" class="control-label">Department Name:</label>
                      <input placeholder="Department Name" id="department_name" name="department_name" type="text" class="form-control" value="">
                      <div class="error" id="e_department_name"></div>
                      <button type="submit" class="btn btn-primary ss-curve-btn pl-4 pr-4" id="dept_btn" style="width: 100%;margin-top: 20px;">Add Department</button>
						<div class="msg"></div>
                    </div>
                  </div>
                </div>
              </form>
              
              <div class="row">
                <div class="col-12">
					<p class="dept_heading">All Department</p>
					<hr>
                  <div class="card">
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="adjust_thead">Department</th>
                            <th class="adjust_thead">Designations</th>
                            <th class="adjust_thead">Add Designation</th>
                            <th class="adjust_thead">Delete Department</th>
                          </tr>
                        </thead>
                        <tbody class="display_tbody">
						<?
						$list_department=listStaffDepartment();
			$index=1;
			foreach($list_department as $department)
			{	
				$list_designation=listDesignation($department['department_id']);
						?>
                          <tr class="dept_full_content_<?=$department['department_id']?>">
                            <td><?=$index?></td>
                            <td class="adjust_tbody"><?=$department['department_name']?></td>
							  <td><ul class="dept_content_<?=$department['department_id']?>">
					<?
					foreach($list_designation as $designation)
					{
					?>
						<li class="designation_item" id="d_item_<?=$designation['designation_id']?>">
							<p><?=$designation['designation_name']?></p>
							<i class="far fa-times-circle del_designation" data-desi="<?=$designation['designation_id']?>" 
						data-des-nm="<?=$designation['designation_name']?>" data-depti="<?=$designation['department_id']?>"></i></li>
					<?
					}
					?>
								  </ul>
							  </td>
							  <td><div class="adjust_icon"><i class="far fa-plus-square add_designation" data-depti="<?=$department['department_id']?>"></i></div></td>
                            <td><div class="adjust_icon"><i class="far fa-trash-alt del_department" data-depti="<?=$department['department_id']?>" data-dept-nm="<?=$department['department_name']?>"></i></div></td>
                          </tr>
			<?
							$index++;
			}
			?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body --> 
                  </div>
                  <!-- /.card --> 
                </div>
              </div>
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
