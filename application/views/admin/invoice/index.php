<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Invoice List</h5>
                        <div class="ibox-tools">
                            <a href="<?= admin_url(); ?>invoice/add" class="btn btn-primary">
                                <i class="fa fa-plus"></i>Add New
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Invoice</th>
                                        <th>Due Date</th>
                                        <th>Client Name</th>
                                        <th>Amount</th>
                                        <th>Due Amount</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 10; $i++) { ?>
                                        <tr>
                                            <td>OPEN</td>
                                            <td>INVS000<?= $i; ?></td>
                                            <td>12-03-2018</td>
                                            <td>test client</td>
                                            <td>CAD155.15</td>
                                            <td>CAD10.55</td>
                                            <td>   
                                                 <a title="Preview Ticket"  href="<?= admin_url() . 'invoice/view/' . $i; ?>"> <i class="fa fa-eye"></i> </a>
                                                <a title="Edit Ticket"  href="<?= admin_url() . 'invoice/edit/' . $i; ?>"> <i class="fa fa-edit text-navy"></i> </a>
                                                <a title="Invoice History"  href="<?= admin_url() . 'invoice/history/' . $i; ?>"> <i class="fa fa-book text-navy"></i> </a>
                                                <a title="Email Invoice "  href="javascript:;"> <i class="fa fa-male text-navy"></i> </a>
                                                <a title="Send Remainder"  href="javascript:;"> <i class="fa fa-refresh text-navy"></i> </a>
                                                <a title="Pdf"  href="javascript:;"> <i class="fa fa-file-pdf-o text-navy"></i> </a>
                                            </td> 
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal inmodal" id="myModal_autocomplete" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <i class="fa fa-close modal-icon"></i>
                                    <h4 class="modal-title">Delete</h4>
                                    <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                </div>
                                <div class="modal-body">
                                    <h4>Are you sure?</h4>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button  id='btndelete' data-url="" data-id="" type="button" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal" id="myModal_interested" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <i class="fa fa-user modal-icon"></i>
                                    <h4 class="modal-title">Interested User List</h4>
                                    <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <!--<button  id='btndelete' data-url="{{ route('muck-delete')}}" data-id="" type="button" class="btn btn-primary">Delete</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
