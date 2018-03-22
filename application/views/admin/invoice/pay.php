<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>invoice/add" id='invoiceAdd'>
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px"> Invoice Details</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Trans ID *</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Trans ID " readonly="" name="ref_no" value="<?= $invoiceNo ?> " class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Payment Method *</label>
                <div class="col-sm-7">
                    <?php $paymentMethod = json_decode(PAYMENT_METOHD); ?>
                    <select class="payment_method form-control">
                        <?php foreach ($paymentMethod as $key => $value) { ?>
                            <option value="<?= $key ?>"><?= $value; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="data_1">
                <label class="col-sm-3 control-label">Payment Date</label>
                <div class="input-group date col-sm-7">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="due_date" value="03/04/2014">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Amount (CAD) *</label>
                <div class="col-sm-7">
                    <input type="text" name="amount" placeholder="Enter Amount (CAD)" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Notes *</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="notes"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Send Email</label>
                <div class="col-sm-1">
                    <input type="checkbox" name="amount" placeholder="" class="form-control">
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
