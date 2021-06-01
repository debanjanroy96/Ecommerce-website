<style>
.adjust_upload_excel
{
	display: flex;
	align-items: center;
	justify-content: flex-start;
	padding: 0px !important;
}
</style>
<!--<div class="content-wrapper ss-wrapper">-->
  <div class="content">
    <div class="container-fluid">
      <div class="row ss-row-2">
        <div class="col-12 p-0">
          <div class="card card-primary ss-card-main"> 
            <!-- /.card-header -->
            <div class="card-header ss-card-header">
              <h3 class="card-title">Upload Excel</h3>
            </div>
            <!-- form start -->
            <div class="card-body">
            <form id="addStaffinexcel">
              <div class="form-group">
                <div class="row">
                  <div class="required-field col-sm-6 ">
                    <label for="first_name" class="control-label">All in One</label>
                    <input  id="import_excel" name="import_excel" required="" type="file" class="form-control" value="">
                    <div class="error" id="e_import_excel"></div>
                  </div>
                  <div class="required-field col-sm-6 " style="">
                    <label for="first_name" class="control-label">Download Template</label><br>
                    <button type="button" class="btn btn-primary ss-curve-btn pl-4 pr-4" id="download_template" onclick="download_csv()">Download
					  <i class="fas fa-file-download"></i></button>
                    <div class="error" id="e_short_code_name"></div>
                  </div>
                </div>
              </div>
				<div class="col-sm-12 adjust_upload_excel">
                <button type="submit" class="btn btn-primary ss-curve-btn pl-4 pr-4" id="upload_excel_btn">upload excel</button>
              </div>
              <div class="csv_msg"></div>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.container-fluid --> 
<!--</div>-->
<!-- /.content -->
<!--</div>-->
