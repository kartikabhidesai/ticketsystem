<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        
        <div class="row">
            <div class="col-lg-12">
                <form method="post" class="form-horizontal" action="<?= admin_url('invoice/view/') . $this->utility->encode($invoiceData[0]->id); ?>" id='invoiceDetail'>
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <address>
                                        <img src="<?= IMAGES . 'logo.png'; ?>" style="width: 250px;height: 150px;">
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No. <?= $invoiceData[0]->ref_no; ?></h4>
                                    <h4>Invoice Date: <?= date('M d, Y', strtotime($invoiceData[0]->dt_created)); ?>    </h4>
                                    <h4>Due Date: <?= date('M d, Y', strtotime($invoiceData[0]->due_date)); ?> </h4>
                                    <h4>Payment Status: <button type="button" class="btn btn-outline btn-success btn-xs">Not paid</button></h4>
                                </div>
                            </div>
                            <div class="row well m-t">
                                <div class="col-md-6">
                                    <h4>Received From:</h4>
                                    <h4>Expert Tech | Justin Govan</h4>
                                    <h4>142 Brier Park Rd Brantford, ON N3R 5T7 Canada</h4>
                                    <h4>Phone: 519-719-7586</h4>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Bill To:</h4>
                                    <h4>General Seed Company</h4>
                                    <h4>648 Alberton Road South Alberton,ON Canada </h4>
                                    <h4>Phone : 905-648-2101</h4>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                        <tr>
                                            <th>Item Name </th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        for ($i = 0; $i < count($invoicepaymentData); $i++) {
                                            if (!empty($invoicepaymentData[$i]->price)) {
                                                $itemTotal = $invoicepaymentData[$i]->quentity * $invoicepaymentData[$i]->price;
                                                $total += $itemTotal;
                                                ?>
                                                <tr>
                                                    <td><?= date('M d', strtotime($invoiceData[0]->dt_created)); ?> | <?= $invoicepaymentData[$i]->item_name ?> </td>
                                                    <td> <?= $invoicepaymentData[$i]->item_desc ?></td>
                                                    <td> <?= $invoicepaymentData[$i]->quentity ?></td>
                                                    <td> <?= $invoicepaymentData[$i]->price ?></td>
                                                    <td>
                                                        <?= $itemTotal; ?> 
                                                        <a data-toggle="modal" data-target="#myModal_autocomplete" data-href="<?= admin_url() . 'invoice/paymentDelete' ?>" data-id="<?php echo $invoicepaymentData[$i]->paymentId; ?>" class="deletePayment">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td><input type="text" placeholder="Item Name" name="item_name" class="form-control"></td>
                                            <td><input type="text" placeholder="Item Description" name="item_desc" class="form-control"></td>
                                            <td><input type="text" placeholder="1" name="quentity" class="form-control"></td>
                                            <td><input type="text" placeholder="56.12" name="price" class="form-control"></td>
                                    <input type="hidden" name="id" value="<?= $invoiceData[0]->id; ?>" class="form-control">
                                    <td>
                                        <div class="text-right">
                                            <button  class="btn btn-success "><i class="fa fa-check"></i> Save</button>
                                        </div>
                                    </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->
                            <?php if (count($invoicepaymentData) > 0) { ?>
                                <table class="table invoice-total">
                                    <tbody>
                                        <tr>
                                            <td><strong>Sub Total :</strong></td>
                                            <td><?= $invoiceData[0]->currency . number_format($total, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tax - <?= $invoiceData[0]->default_tax ?>% :</strong></td>
                                            <td><?php
                                                $defaultTax = ($total * $invoiceData[0]->default_tax) / 100;
                                                echo $invoiceData[0]->currency . number_format($defaultTax,2);
                                                ?></td>
                                        </tr>
                                        <?php
                                        if ($invoiceData[0]->discount > 0) {
                                            $discount = ($total * $invoiceData[0]->discount) / 100;
                                            $total = $total - ($discount + $defaultTax);
                                            ?>
                                            <tr>
                                                <td><strong>Discount - <?= $invoiceData[0]->discount ?>%:</strong></td>
                                                <td><?= number_format($discount, 2) ?></td>
                                            </tr>
                                        <?php } ?>

                                        <tr>
                                            <td><strong>Payment Made:</strong></td>
                                            <td><?= $invoiceData[0]->currency . 0.00 ?></td>
                                        </tr>

                                        <tr>
                                            <td><strong>TOTAL :</strong></td>
                                            <td><?= $invoiceData[0]->currency . number_format($total, 2) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                            <div class="well m-t"><?= $invoiceData[0]->note; ?>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
