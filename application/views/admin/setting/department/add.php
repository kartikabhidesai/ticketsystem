
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>setting/add" id='addDepartmentForm'>
            
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px"> <i class="fa fa-gears"></i> Departments</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Department Name *</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Department Name" name="department_name" class="form-control">
                </div>
            </div>
         
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <a class="btn btn-white" href="<?= admin_url().'setting' ?>" type="button">Cancel</a>
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
