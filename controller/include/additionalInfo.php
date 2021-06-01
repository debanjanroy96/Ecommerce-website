<div class="modal fade" id="modal-default2" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #17ce90 !important; color: #fff;">
                    <h4 class="modal-title">Add Additional Field</h4>
                    <button type="button mt-3" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="addextrakey" autocomplete="off" class="">
                                    <div class="required-field form-group">
                                        <label class="control-label">Extra Field</label>
                                        <input name="key" placeholder="Extra Field Name" required="" type="text" class="form-control">
                                    </div>
                                    <div class="required-field form-group">
                                        <label class="control-label">Data Type</label>
                                        <select name="data_type" placeholder="Select Data Type" required="" class="form-control">
                                            <option value="">Select Data Type</option>
                                            <option value="string">Text</option>
                                            <option value="number">Number</option>
                                            <option value="boolean">Yes/No</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                    <div style="display: inline;">
                                        <button type="submit" class="btn btn-outline-primary float-left btn ss-curve-btn  pl-4 pr-4">Save</button>
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