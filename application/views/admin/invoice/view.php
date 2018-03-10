<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="col-md-3">
                            <?php $priority = json_decode(SHORTINVOICE); ?>
                            <select class="changeStatus form-control">
                                <option value="">Short Invoice</option>
                                <?php foreach ($priority as $key => $value) { ?>
                                    <option value="<?= $key ?>"><?= $value; ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-1 displaylable">
                            <a href="<?= admin_url() . 'tickets/edit/' . $decodeId; ?>" style="margin:5px" class="btn btn-sm btn-primary  m-t-n-xs" ><strong><i class="fa fa-print"></i></strong></a>
                        </div>
                        <div class="col-sm-1 displaylable">
                            <a href="javascript:;" style="margin:5px" class="btn btn-sm btn-primary m-t-n-xs"><strong> <i class="fa fa-address-card"></i> Items </strong></a>
                        </div>
                        <div class="col-sm-2 displaylable">
                            <a  data-href="javascript:;" data-id="" style="margin:5px 5px 5px 20px"  data-original-title="Pay Invoice" class="btn btn-danger btn-sm "><strong><i class="fa fa-trash-o"></i> Pay Ticket</strong></a>
                        </div>
                        <div class="col-sm-3 displaylable" style="margin-left: 20px;">
                            <?php $priority = json_decode(TICKETMOREACTIONS); ?>
                            <select class="changeStatus form-control">
                                <option value="">More Action</option>
                                <?php foreach ($priority as $key => $value) { ?>
                                    <option value="<?= $key ?>"><?= $value; ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-1 displaylable">
                            <a href="javascript:;" style="margin:5px" class="btn btn-sm btn-primary pull-right m-t-n-xs" ><strong><i class="fa fa-file-pdf-o"></i></strong></a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Item Name </th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Unit Price </th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 5; $i++) { ?>
                                        <tr>
                                            <td>Sept 25th | Scanner issues</td>
                                            <td>Scanner issues after several intermittent power outages. Had Jackie power the scanner/fax off, remove the power cable and perform a power drain on the machine. She plugged it back in and turned it back on tested it and it worked.</td>
                                            <td>0.25</td>
                                            <td>45.00</td>
                                            <td>
                                                11.25 <a href=""><i class="fa fa-trash-o"></i></a>
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
