<style>
/*    .customDate {
    float: none;
    padding-right: -10px;
    padding-left: 15px;
}*/
</style>

<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>client/add" id='clientAdd'>
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px"> Invoice Details
                <a href="<?= admin_url() . 'invoice/view/' . 2; ?>" style="margin:10px" class="btn btn-sm btn-primary pull-right m-t-n-xs" ><strong><i class="fa fa-tag"></i> View Tickets </strong></a> 
                </h2>								
                
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Ref No*</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Company Name" name="company_name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-7">
                    <button class="btn btn-primary recurring" type="button">Recurring</button>
                </div>
            </div>
            <div class="form-group showRecurring" style="display: none;">
                <label class="col-sm-3 control-label">Recur every </label>
                <div class="col-sm-7">
                    <?php $priority = json_decode(RECURRING); ?>
                    <select class="changeStatus form-control">
                        <option value="">Select Recur every</option>
                        <?php foreach ($priority as $key => $value) { ?>
                            <option value="<?= $key ?>"><?= $value; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group  showRecurring" style="display: none;" id="data_1">
                <label class="col-sm-3 control-label">Start Date</label>
                <div class="input-group date col-sm-7 ">
                    <span class="input-group-addon customDate"><i class="fa fa-calendar"></i></span><input type="text" name="start_date" class="form-control" value="03/04/2014">
                </div>
            </div>
            <div class="form-group  showRecurring" style="display: none;" id="data_1">
                <label class="col-sm-3 control-label">End Date</label>
                <div class="input-group date col-sm-7 ">
                    <span class="input-group-addon customDate"><i class="fa fa-calendar"></i></span><input type="text" name="end_date" class="form-control" value="03/04/2014">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Client *</label>
                <div class="col-sm-7">
                    <select class="form-control m-b reporter" id="reporter" name="client_id">
                        <option value="">Select Reporter</option>
                        <?php for ($i = 0; $i < count($client_list); $i++) {
                            ?>
                            <option data-email="<?= $client_list[$i]->email; ?>" value="<?= $client_list[$i]->id; ?>"><?= $client_list[$i]->first_name; ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>
            <div class="form-group" id="data_1">
                <label class="col-sm-3 control-label">Due Date</label>
                <div class="input-group date col-sm-7 ">
                    <span class="input-group-addon customDate"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
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
                    <button class="btn btn-primary" type="submit">Update Invoice</button>
                </div>
            </div>
        </form>
    </div>
</div>
