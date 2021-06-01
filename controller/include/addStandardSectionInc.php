<div class="modal fade" id="modal-default9" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background: #17ce90 !important; color: #fff;">
                <h4 class="modal-title" id="standard_section">Add Sections to 1</h4>
                <button type="button mt-3" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="add_section_frm" autocomplete="off" class="">
                                <div class="required-field form-group">
                                    <label class="control-label">Sections</label>
                                    <input id="seci" type="hidden" value="0"/>
									<input id="clsi" type="hidden" value="0"/>
									<input id="s_section" name="key" placeholder="Enter Section Name" required="" type="text" class="form-control border-1 border-success">
									<div class="error" id="e_s_section"></div>
                                </div>
                                <div style="display: inline;">
                                    <button type="submit" class="btn btn-outline-primary float-right btn ss-curve-btn btn-block pl-4 pr-4 add_section_btn">Save</button>
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