<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><a title="Invoice Details" href="<?= admin_url().'invoice/view/2'; ?>" class="btn btn-info btn-block m-t"><i class="fa fa-info-circle"> </i> Invoice Details</a></h5>
                        <div class="ibox-tools">
                            <a href="javascript:;" title="PDF" class="btn btn-outline btn-info pull-right"><i class="fa fa-file-pdf-o"> Pdf</i> </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div>
                            <div class="feed-activity-list">
                                <?php for($i=0 ;$i < 5;$i++) { ?>
                                <div class="feed-element">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="<?= IMAGES . 'logo.png'; ?>">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">Feb 27, 2018 19:19:22</small>
                                        <strong>Monica Smith</strong> posted a new blog. <br>
                                        <small class="text-muted">Justin.govan  edited INVOICE #INV0032 </small>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
