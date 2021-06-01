<style>
	.selected_sub
	{
		display: flex;
		align-items: center;
		padding: 4px 15px;
		border-radius: 25px;
		background: #D2D6DE;
	}
	.selected_subject
	{
		display: flex;
		align-items: center;
		padding: 4px 15px;
		border-radius: 25px;
	}
	.adjust_subject
	{
		padding: 10px;
	}
</style>
<div class="modal fade" id="modal-default7" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <div class="ss-lh-header">
                    <h4 class="modal-title" id="modal_default7_clsnm">Edit Subjects for Standard <br>
                        <!--<div>Selected Sections:
                            <div class="btn-group">
                                <button type="button" class="btn-green btn-outline-success btn ss-curve-modal-btn">1 - A <span class="glyphicon-remove glyphicon"></span></button>
                            </div>
                        </div>-->
                    </h4>
                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
								<input type="hidden" id="modal_default7_clsi" name="modal_default7_clsi" value="0"/>
								<!--<input type="hidden" id="modal_default7_clsi" name="modal_default7_clsnm" value=""/>-->
                                <div class="form-group">
                                    <label class="control-label">Filter Subjects</label>
                                    <input type="text" class="form-control" id="search_sub">
                                </div>
								<div class="list_selec_sub">
									<div class="row">
										<div class="col-md-4">
											<button class="btn btn-sm btn-primary selected_subject">
												<div style="width: 20px;"><i class="fas fa-check"></i></div><p class="adjust_subject">GK</p>
											</button>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                        <label class="control-label">Add Subjects:</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <!--<div style="display: flex; flex-wrap: wrap;">-->
                                    <div class="list_all_sub" >
										<div class="col-md-4">
											<button class="btn btn-sm selected_sub">
												<div style="width: 20px;"><i class="fas fa-plus"></i></div><p class="adjust_subject">GK</p>
											</button>
										</div>
									</div>
                                <!--</div>-->
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 col-sm-6"></div>
                            <div class="col-md-6 col-sm-6"><span class="float-right">
                                <button type="button" class="btn btn-danger ss-curve-btn modal-default7_close" style="margin-right: 5px;">Close</button>
                                <div style="display: inline;">
                                    <button type="button" class="btn btn-outline-primary ss-curve-modal-btn" id="save_sub_changes">Save Changes</button>
                                </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.modal-dialog --> 
</div>