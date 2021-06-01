<?
$list_class=listClass();
$list_board=listBoard();
$list_school_class=listSchoolClass($school_id);
$list_school_board=listSchoolBoard($school_id);
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
              <h3 class="card-title">LMS Configurations</h3>
            </div>
            <!-- form start -->
            <div class="card-body">
              <div class="container-fluid">
                <div>
                  <div>
                    <div>
                      <div class="row">
                        <div class="col-sm-12" style="text-align: right;">
                          <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default5" >Basechapters</button>
                          </div>
                        </div>
                      </div>
					<form id="add-school-cls">
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="control-label">Standards:</label>
                          <div style="display: flex; flex-wrap: wrap;">
							 <?
							 foreach($list_class as $class) 
							 {
						     ?>
							 <div class="checkbox-bordered <? 
								 if(in_array($class['class_id'],$list_school_class))
								 { echo "ss-select"; } 
								 else
								 { echo "ss-unselect"; }
							 ?>">
                              <label class="checkbox-inline" title="">
                                <input type="checkbox" class="lms-chk" name="cls" value="<?=$class['class_id']?>" 
									   <? if(in_array($class['class_id'],$list_school_class)){ echo "checked"; }?>>
                                <?=$class['class_name']?>&nbsp;&nbsp;</label>
                            </div> 
							 <?	 
							 }
							 ?>
                          </div>
                        </div>
                      </div>
						<div class="error" id="e_cls"></div>
                      <br>
                      <div class="row">
                        <div class="col-sm-12">
                          <label class="control-label">Boards: </label>
                          <div style="display: flex; flex-wrap: wrap;">
							<?
							foreach($list_board as $board)
							{
							?>
							<div class="checkbox-bordered ss-unselect">
                              <label class="checkbox-inline" title="">
                                <input type="checkbox" class="lms-chk" name="board" value="<?=$board['board_id']?>" <? if(in_array($board['board_id'],$list_school_board)){ echo "checked"; } ?>>
                                <?=$board['board_name']?>&nbsp;&nbsp;</label>
                            </div>  
							<?
							}  
							?>
                          </div>
                        </div>
                      </div>
						<div class="error" id="e_board"></div>
                      <br>
                      <button type="submit" class="btn btn-primary btn-block" id="school_cls_btn">Save</button>
					</form>
						<div class="msg"></div>
                    </div>
                  </div>
                </div>
                <br>
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
