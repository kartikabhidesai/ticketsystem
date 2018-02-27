
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= client_url(); ?>tickets/edit" id='ticketEditForm'>

            <div class="form-group headingmain">                        
                <label class="col-sm-2 displaylable">
               <a href="<?= client_url().'tickets/edit/2'; ?>" style="margin:10px" class="btn btn-sm btn-primary pull-left m-t-n-xs" ><strong><i class="fa fa-tag"></i> Edit Ticket</strong></a>
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
             HO4IZGL
         </div>
     </div>
     <div class="form-group">
        <label class="col-sm-5 displaylable">Reporter </label>
        <div class="col-sm-7">
          broer
      </div>
  </div>
  <div class="form-group">
    <label class="col-sm-5 displaylable">   Department</label>
    <div class="col-sm-7">
        Support
    </div>
</div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-sm-5 displaylable">Status</label>
        <div class="col-sm-7">
          <span class="btn btn-primary btn-xs">  Closed</span>
      </div>
  </div>
  <div class="form-group">
    <label class="col-sm-5 displaylable"> Priority </label>
    <div class="col-sm-7">
      Medium
  </div>
</div>
<div class="form-group">
    <label class="col-sm-5 displaylable"> Created</label>
    <div class="col-sm-7">
     2015-07-21 07:23:21
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
    <div class="col-lg-6">
        <div class="ibox float-e-margins">

            <div class="ibox-content">

                <div class="row">
                    <div class="chat-activity-list">

                        <div class="chat-form chat-element">
                            <form role="form">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-sm btn-primary m-t-n-xs"><strong>Replay Ticket</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                     <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Your daily feed</h5>
                                        <div class="ibox-tools">
                                            <span class="label label-warning-light pull-right">10 Messages</span>
                                           </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div>
                                            <div class="feed-activity-list">

                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="img/a5.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                        <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                        <div class="well">
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
</div>

</div>
