
<style type="text/css">
.ibox-content {
  clear: both;
  border: none;
}
</style>
<div class="wrapper wrapper-content white-bg m-t">
  <div class=" animated fadeInRightBig">

    <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>tickets/edit" id='ticketEditForm'>

      <div class="form-group headingmain">                        
        <label class="col-sm-2 displaylable">
         <a href="<?= admin_url().'tickets/edit/2'; ?>" style="margin:10px" class="btn btn-sm btn-primary pull-left m-t-n-xs" ><strong><i class="fa fa-tag"></i> Edit Ticket</strong></a>
       </label>
       <label class="col-sm-8 displaylable" style="margin-top:10px">
        <div class="input-group-btn"   >
          <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">Change Status <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="#">Answer</a></li>
            <li><a href="#">Close</a></li>
            <li><a href="#">Open</a></li>
            <li><a href="#">In Progress</a></li>
          </ul>
        </div>
      </label>
      <label class="col-sm-2 displaylable">
        <a  href="javascript:;" style="margin:10px" data-toggle="tooltip" data-original-title="Delete Ticket" class="btn btn-danger btn-sm pull-right"><strong><i class="fa fa-trash-o"></i> Delete Ticket</strong></a>
      </label>
    </div>

    <div class="row">
     <div class="col-md-6">
      <div class="form-group">
        <label class="col-sm-5 displaylable">Ticket Code</label>
        <div class="col-sm-7">
         <?= $getTicket[0]->ticket_code ?>
       </div>
     </div>
     <div class="form-group">
      <label class="col-sm-5 displaylable">Reporter </label>
      <div class="col-sm-7">
        <!-- broer -->
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-5 displaylable">Department</label>
      <div class="col-sm-7">
        <!-- <?= $getTicket[0]->id ?> -->
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="col-sm-5 displaylable">Status</label>
      <div class="col-sm-7">
        <span class="btn btn-primary btn-xs">  <?= $getTicket[0]->status ?> </span>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-5 displaylable"> Priority </label>
      <div class="col-sm-7">
        <?= $getTicket[0]->priority ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-5 displaylable"> Created</label>
      <div class="col-sm-7">
        <?= date('Y-m-d h:i:s',$getTicket[0]->dt_created) ?>
       
     </div>
   </div>
 </div>
</div>

<div class="form-group headingmain">                        
  <h2 class="title" style="margin:10px">Subject: New printer install </h2>
</div>
<div class="form-group headingmain">                        
 Would like to have new printer installed.
</div>
</form>
</div>
<div class="row m-t-lg">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">

      <div class="ibox-content">
        <div class="row">

          <div class="" style="border: 1px solid #e7eaec;padding:10px;">
            <form role="form" method="post" id="addComment">
              <div class="form-group">
                <textarea class="form-control" placeholder="Ticket #HO4IZGL reply"></textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-sm btn-primary m-t-n-xs"><strong>Replay Ticket</strong></button>
              </div>
            </form>
          </div>

          <div class="col-lg-12" style="border: 1px solid #e7eaec;padding:10px;margin-top:10px; ">
            <div class="ibox float-e-margins">
              <div class="feed-activity-list">
                <div class="">
                  <div class="media-body">
                    <small class="pull-right"> <i class="fa fa-clock-o"></i> 3 Years ago</small>
                    <strong>Justin.govan</strong> <strong class="btn btn-primary btn-xs btn-danger">Monica Smith</strong> 
                    <div class="" style="border-top: 1px solid #e7eaec;margin: 15px; padding-top: 15px; ">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
