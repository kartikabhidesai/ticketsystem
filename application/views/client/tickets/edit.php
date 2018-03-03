
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= client_url(); ?>tickets/edit/<?=  $this->utility->encode($getTicket[0]->id);?>" id='ticketEditForm'>
            
            <div class="form-group headingmain">                        
                <h2 class="title" style="margin:10px">Ticket Details - <?= $getTicket[0]->ticket_code; ?>  
                        <a href="<?= client_url().'tickets/view/1'; ?>" style="margin:10px" class="btn btn-sm btn-primary pull-right m-t-n-xs" ><strong><i class="fa fa-tag"></i> View Tickets </strong></a> 
                </h2> 
                                            
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Department *</label>
                <div class="col-sm-7">
                      <select class="form-control m-b" name="ticket_department">
                        <option value="">Select Department</option>
                        <?php for($i=0; $i<count($department_detail); $i++){ ?>
                            <option value="<?= $department_detail[$i]->id;?>" <?php if($department_detail[$i]->id == $getTicket[0]->department_id){ echo "selected='selected'";} ?>><?= $department_detail[$i]->name;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ticket Code *</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter Ticket Code" readonly="readonly" value="<?= $getTicket[0]->ticket_code; ?>" name="ticket_code" class="form-control">
                    <input type="hidden"  value="<?= $getTicket[0]->id; ?>" name="id" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Subject  *</label>
                <div class="col-sm-7">
                    <input type="text" value="<?= $getTicket[0]->subject; ?>" placeholder="Enter Subject " name="ticket_subject" class="form-control">
                </div>

            </div>
   
             <?php $priority = json_decode(PRIORITY);?>
             <div class="form-group">
                <label class="col-sm-3 control-label">Pririty *</label>
                <div class="col-sm-7">
                      <select class="form-control m-b" name="ticket_prioity">
                            <option value="">Select Priority</option>
                            <?php  foreach ($priority as $key => $value){ ?>
                                <option value="<?= $key ?>" <?php if($key == $getTicket[0]->priority){ echo "selected='selected'"; } ?>><?= $value; ?></option>
                            <?php }  ?>
                    </select>
                </div>
            </div>
    
            <div class="form-group">
                <label class="col-sm-3 control-label">Ticket Message </label>
                <div class="col-sm-7">
                    <textarea class="form-control" value="<?= $getTicket[0]->ticket_message; ?>" name="ticket_message"><?= $getTicket[0]->ticket_message; ?></textarea>
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
                    <button class="btn btn-primary" type="submit">Update Ticket</button>
                </div>
            </div>
        </form>
    </div>
</div>
