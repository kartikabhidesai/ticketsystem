<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>client/add" id='clientAdd'>
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px"> Invoice Details</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Ref No*</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Company Name" name="company_name" class="form-control">
                </div>
            </div>

            <div class="form-group" id="data_1">
                <label class="col-sm-3 control-label">Due Date</label>
                <div class="input-group date col-sm-7">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                </div>
            </div>
          
            <div class="form-group">
                <label class="col-sm-3 control-label">Default Tax*</label>
                <div class="col-sm-7">
                    <div class="input-group m-b"><span class="input-group-addon">%</span> <input placeholder="Default Tax" class="form-control" type="text"></div>
                </div>
            </div>
         
              <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-7">
                    <button class="btn btn-primary showDicount" type="button">Discount</button>
                </div>
            </div>
            <div class="form-group discountDiv" style="display: none;">
                <label class="col-sm-3 control-label">Discount</label>
                <div class="col-sm-7">
                    <div class="input-group m-b"><span class="input-group-addon">%</span> <input placeholder="Dicount" class="form-control" type="text"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Currency</label>
                <div class="col-sm-7">
                    <input type="text" name="company_city" placeholder="Enter Currency" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Notes *</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="additional_information"></textarea>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Create Invoice</button>
                </div>
            </div>
        </form>
    </div>
</div>
