<?
$list_class=listClass();
$list_subject=listSubject();
?>
<div class="modal fade" id="modal-default5" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #17ce90 !important; color: #fff;">
                    <h4 class="modal-title">List Basechapters</h4>
                    <button type="button mt-3" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row pl-4 pr-4">
                            <div class="col-sm-12">
                                <label class="control-label">Standards:</label>
                                <div style="display: flex; flex-wrap: wrap;">
									<div class="row" style="width: 100%;">
										<div class="col-md-6">
											<select class="form-control" id="select_class">
											<option value="">Select Standards</option>
											<?
											foreach($list_class as $class) 
											{
											?>
											<option value="<?=$class['class_id']?>"><?=$class['class_name']?></option>
											
											<?	 
											}
											?>
											</select> 
											<div class="error" id="e_select_class"></div>
										</div>
									</div>
									
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="control-label">Subjects: </label>
                                <div class="display_subject" style="display: flex; flex-wrap: wrap;">
									<?
									foreach($list_subject as $subject)
									{
									?>
									<div class="checkbox-bordered ss-unselect">
                                        <label class="checkbox-inline" title="">
                                            <input type="checkbox" class="lms-chk" name="subject" 
												   value="<?=$subject['subject_id']?>">
                                            <?=$subject['subject_name']?>&nbsp;&nbsp;</label>
                                    </div>
									<?
									}
									?>
                                </div>
								<div class="error" id="e_subject"></div>
                            </div>
                            <div class="col-sm-12"><br>
                                <button type="button" class="btn btn-primary btn-block" id="fetch_btn">Fetch</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between"> </div>
            </div>
            <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
    </div>