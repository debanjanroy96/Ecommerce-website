<?
$list_school_class=listSchoolClassDtls($school_id,"order by c.ord");
?>
<div class="modal fade" id="modal-default12" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background: #17ce90 !important; color: #fff;">
                <h4 class="modal-title">Add New Class</h4>
                <button type="button mt-3" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
						<form id="add_new_class">
                         <label class="control-label">Select Standard</label>
                            <div class="d-flex" style="flex-wrap: wrap;">
								<?
								foreach($list_school_class as $school_class)
								{
								?>
                                <div class="class_div" style="padding: 5px; cursor: pointer;">
                                    <div class="d-flex" style="border: 1px solid rgb(215, 215, 215); border-radius: 3px; color: rgb(78, 93, 107);">
                                        <div style="border-right: 1px solid rgb(215, 215, 215); padding: 0px 10px; text-align: center;">
                                            <div class="radio" style="padding: 0px; width: 20px; margin: 0px;">
                                                <label title="">
                                                    <input name="class" type="radio" value="<?=$school_class['class_id']?>">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="ss-lbl-sc-rad" style=""><?=$school_class['class_name']?></div>
                                    </div>
                                </div>
								<?
								}
								?>
								<div class="error" id="e_class"></div>
                            </div>
                            <div style="position: relative; margin: 40px 100px;"><span style="font-size: 18px; position: absolute; left: 45%; border-radius: 50%; width: 50px; top: -30px; background: white; text-align: center; height: 50px; border: 1px solid rgba(48, 62, 82, 0.13); padding: 8px;">OR</span>
                                <hr>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <label class="control-label">Enter New Standard:</label>
                                </div>
                                <div style="padding-left: 10px;">
                                    <input class="form-control" id="new_class" value="" style="border: 1px solid rgb(214, 219, 223);">
									<div class="error" id="e_new_class"></div>
                                </div>
                            </div>
                            <hr style="height: 1px; border: none; color: rgba(48, 62, 82, 0.13); background-color: rgba(48, 62, 82, 0.13); margin: 40px 0px;">
                            <div class="d-flex" style="width: 100%;">
                                <div>
                                    <label class="control-label">Default Sections:</label>
                                </div>
                                <div class="ss-inp-txt" style="padding-left: 10px; width: 80%;">
                                    <div class=""><span>
                                        <input type="text" class="form-control" id="section" placeholder="Press Enter To Add" disabled="" value="">
                                        </span>
                                    </div>
									<div class="error" id="e_section" style="display: block;">*Select or add standard name first to add sections</div>
                                   </div>
                            </div>
                            <br>
                            <div class="text-center">
                                <button disabled="" type="submit" class="btn btn-lg btn-info save_new_class" style="border-radius: 5px; width: 150px;">Save</button>
                            </div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>