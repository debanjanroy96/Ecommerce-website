<div class="card card-primary ss-card-main"> 
  <!-- /.card-header -->
  <div class="card-header ss-card-header">
    <div class="card-title d-flex justify-content-between w-100">
      <div>Upload Excel</div>
      <div>containing details of all student</div>
    </div>
  </div>
  <div class="card-body">
    <form action="#" autocomplete="off" class="">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div role="alert" class="alert alert-info ss-info-bg"><strong>Instructions for Uploading Excel</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button type="button" class="btn btn-primary ss-curve-btn" data-toggle="modal" data-target="#modal-default3">Show Excel Format Instructions</button>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <h3><strong>All in One</strong></h3>
            <input name="students" accept=".csv, application/vnd.ms-excel" type="file" class="">
            <br>
            <input name="rowsCount" required="" min="0" max="400" placeholder="Enter No. of Students (Max. 400)" type="number" class="form-control">
            <input name="school_id" type="hidden" class="form-control">
          </div>
          <div class="col-sm-4">
            <h3><strong>Add Additional Field</strong></h3>
            <button type="button" class="btn btn-primary pl-4 pr-4 ss-curve-btn" data-toggle="modal" data-target="#modal-default2">Add Additional Field</button>
          </div>
          <div class="col-sm-4">
            <h3><strong>Download Template</strong></h3>
            <button type="button" class="btn-success btn ss-curve-btn pl-4 pr-4">Download &nbsp;&nbsp;<i class="fa fa-file-upload"></i></button>
          </div>
        </div>
        <div class="row" style="margin-top: 10px;">
          <div class="col-sm-12">
            <div style="display: inline;">
              <button type="submit" disabled="" class="pull-left ss-curve-btn pl-4 pr-4 btn-outline-primary btn">Upload Excel</button>
            </div>
            <br>
          </div>
        </div>
      </div>
      <br>
    </form>
  </div>
</div>
