
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>client/add" id='clientadd'>
            
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px">Company Detail</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Company Name*</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Company Name*" name="company_name" class="form-control">
                </div>

            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Company Email *</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Company Email" name="company_email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Company Phone*</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Company Phone" name="company_phone" class="form-control">
                </div>

            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Address *</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="additional_information"></textarea>
                </div>

            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">City</label>
                <div class="col-sm-7">
                    <input type="text" name="company_city" placeholder="Enter City" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Country</label>
                <div class="col-sm-7">
                     <select class="form-control m-b" name="site_id">
                        <option value="">- Select Country -</option>
                    </select>
                </div>
            </div>
            <div class="form-group headingmain" >						
                <h2 class="title" style="margin:10px">Company User Detail</h2>								
            </div>
            <div class="form-group">
                <p style="">Enter company contact person detail. Username and password would be sent to register email id.</p>     
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Person full name </label>
                <div class="col-sm-7">
                    <input type="text" name="person_name" placeholder="Enter Person full name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-7">
                    <input type="text" name="person_username" placeholder="Enter Username" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-7">
                    <input type="text" name="person_email" placeholder="Enter Email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-7">
                    <input type="text" name="company_username" placeholder="Enter Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-7">
                    <input type="text" name="company_username" placeholder="Enter Confirm Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-7">
                    <input type="text" name="company_password" placeholder="Enter Phone" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="additional_information"></textarea>
                </div>
            </div>
            
           

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Create Client</button>
                </div>
            </div>
        </form>
    </div>
</div>
