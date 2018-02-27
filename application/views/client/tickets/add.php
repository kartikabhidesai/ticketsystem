
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= client_url(); ?>tickets/add" id='ticketsAddForm'>
            
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px">Ticket Details</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Department *</label>
                <div class="col-sm-7">
                      <select class="form-control m-b" name="ticket_department">
                        <option value="">Departmentd1</option>
                        <option value="">Departmentd12</option>
                        <option value="">Departmentd13</option>
                        <option value="">Departmentd134</option>
                       
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ticket Code *</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Ticket Code" name="ticket_code" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Subject  *</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Subject " name="ticket_subject" class="form-control">
                </div>
            </div>
            
            <!-- <div class="form-group">
                <label class="col-sm-3 control-label">Reporter *</label>
                <div class="col-sm-7">
                      <select class="form-control m-b" name="ticket_reporter">
                      <option value=""> Reporter</option>
                      <option value=""> Reporter1</option>
                      <option value=""> Reporter12</option>
                      <option value=""> Reporter123</option>
                    </select>
                </div>
            </div> -->

             <div class="form-group">
                <label class="col-sm-3 control-label">Pririty *</label>
                <div class="col-sm-7">
                      <select class="form-control m-b" name="ticket_prioity">
                            <option value=""> Priority1</option>
                            <option value=""> Priority2</option>
                    </select>
                </div>
            </div>
    
            <div class="form-group">
                <label class="col-sm-3 control-label">Ticket Message </label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="ticket_message"></textarea>
                </div>
            </div>   

            <div class="form-group">
                <label class="col-sm-3 control-label">Attachment </label>
                <div class="col-sm-7">

                    <input type="file" name="ticket_attachment"> 
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <a class="btn btn-white" href="<?= client_url('tickets'); ?>" type="button">Cancel</a>
                    <button class="btn btn-primary" type="submit">Create Ticket</button>
                </div>
            </div>
        </form>
    </div>
</div>
