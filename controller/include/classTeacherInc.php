<style>
.select_teacher_btn
{
	border-radius: 25px;	
}
.del_class_teacher
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

<?
$list_class=listClassAndSection($school_id);
/*echo "<pre>";
print_r($list_class);
echo "</pre>";*/
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
              <h3 class="card-title">Update Class Teacher</h3>
            </div>
            <!-- form start -->
            <div class="card-body">
			
              <div class="row" id="row_<?=$department['department_id']?>">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
                    </div>
               
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Class</th>
                            <th>Student Count</th>
                            <th>Teacher</th>
                          </tr>
                        </thead>
                        <tbody>
						
							<?
							foreach($list_class as $class)
							{
								$count_student=0;
$count_student=count(listStudentByClassAndSection($class['class_id'],$class['school_class_section_id']));
								$class_teacher_dtls=classTeacherDtls($class['class_id'],$class['school_class_section_id']);
								if($class_teacher_dtls['class_teacher_id'])
								{
									$button_name=$class_teacher_dtls['name'];
									$btn_class="btn btn-sm btn-success select_teacher_btn";
								}
								else
								{
									$class_teacher_dtls['class_teacher_id']=0;
									$button_name="Select Teacher";
									$btn_class="btn btn-sm btn-primary select_teacher_btn";
								}
							?>
						<tr class="class_content_<?=$class['school_class_section_id']?>">
							<td><?=$class['class_name']?>-<?=$class['section']?></td>
                            <td><?=$count_student?></td>
							<td class="adjust_td">
								<button class="<?=$btn_class?>" data-cls="<?=$class['class_id']?>" data-sec="<?=$class['school_class_section_id']?>" data-cls-nm="<?=$class['class_name']?>" data-sec-nm="<?=$class['section']?>" data-clsti="<?=$class_teacher_dtls['class_teacher_id']?>" id="teacher_btn_<?=$class['class_id'].$class['school_class_section_id']?>"><?=$button_name?></button>
							</td> 
							<td>
<?
if($class_teacher_dtls['class_teacher_id'])	{							
?>
<i class="far fa-trash-alt del_class_teacher" data-cls="<?=$class['class_id']?>" data-sec="<?=$class['school_class_section_id']?>" data-clsti="<?=$class_teacher_dtls['class_teacher_id']?>" id="del_teacher_btn_<?=$class['class_id'].$class['school_class_section_id']?>"></i>
<?
											}
else
{
?>
	<i class="far fa-trash-alt del_class_teacher" data-cls="<?=$class['class_id']?>" data-sec="<?=$class['school_class_section_id']?>" data-clsti="<?=$class_teacher_dtls['class_teacher_id']?>" id="del_teacher_btn_<?=$class['class_id'].$class['school_class_section_id']?>" style="display: none;"></i>
<?
}
?>
							</td>
						</tr>
							<?
							}
							?>
                            
						</tr> 
                        </tbody>
                      </table>
                    </div>
                   
                  </div>
                  
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
