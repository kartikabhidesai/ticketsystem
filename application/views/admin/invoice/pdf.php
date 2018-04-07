<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>


    </head>
    <body>
        <table border="0" cellspacing="0" cellpadding="0" style="margin: auto; width: 645px; font-family: arial;">
            <tr>
                <td style="width: 60%;"><img style="width: 150px" src="public/asset/images/logo.png"/></td>
                <td style="width: 40%;">
                    <table border="0" cellspacing="3" cellpadding="0" style="width: 100%">
                        <tr>
                            <td colspan="2" style="text-align: right; font-size: 22px; padding-bottom: 10px"><b>Invoice</b></td>
                        </tr>
                       <tr>
                            <td style="color: #CB080E;font-size: 12px; font-weight: 600; text-align: right;text-transform: uppercase;">reference:</td>
                            <td style="font-size: 12px; text-align: right;"><?= $invoiceData[0]->ref_no; ?></td>
                        </tr>
                        <tr>
                            <td style="color: #CB080E;font-size: 12px; font-weight: 600; text-align: right;text-transform: uppercase;">billing date:</td>
                            <td style="font-size: 12px; text-align: right;"><?= date('d/m/Y', strtotime($invoiceData[0]->dt_created)); ?></td>
                        </tr>
                        <tr>
                            <td style="color: #CB080E;font-size: 12px; font-weight: 600; text-align: right;text-transform: uppercase;">due date:</td>
                            <td style="font-size: 12px; text-align: right;"><?= date('d/m/Y', strtotime($invoiceData[0]->due_date)); ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td colspan="2">
                    <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
                        <tr>
                            <td style="width: 46%;">
                                <table border="0" cellspacing="5" cellpadding="0" style="width: 100%">
                                    <tr>
                                        <td style="border-bottom: 1px solid #CB080E; color: #CB080E; font-size: 14px;font-weight: 600; padding-bottom: 10px; text-transform: uppercase;">Received From:</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 12px;">
                                            <b><?php echo 'Expert Tech | Justin Govan'; ?></b><br>
                                            <?php echo '142 Brier Park Rd Brantford, ON N3R 5T7 Canada'; ?><br>
                                            <?php echo 'Phone: 519-719-7586'; ?><br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width: 8%;">
                            <td style="width: 46%;">
                                <table border="0" cellspacing="5" cellpadding="0" style="width: 100%">
                                    <tr>
                                        <td style="border-bottom: 1px solid #CB080E; color: #CB080E;font-size: 14px;font-weight: 600; padding-bottom: 10px; text-transform: uppercase;">Bill To:</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 12px;">
                                            <b><?= $invoiceData[0]->companyName; ?></b><br>
                                            <?= $invoiceData[0]->companyAddress .', ' .$invoiceData[0]->companyCity .', ' .$invoiceData[0]->countryName ?><br>
                                            Phone : <?= $invoiceData[0]->companyPhone  ?><br>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td colspan="2">
                    <table border="0" cellspacing="0" cellpadding="7" style="width: 100%">
                        <tr>
                            <td style="border-bottom: 1px solid #CB080E; color: #000;font-size: 13px;font-weight: 600; padding-bottom: 10px; text-transform: uppercase; text-align: left;">description</td>
                            <td style="border-bottom: 1px solid #CB080E; color: #000;font-size: 13px;font-weight: 600; padding-bottom: 10px; text-transform: uppercase; text-align: center;">quantity</td>
                            <td style="border-bottom: 1px solid #CB080E; color: #000;font-size: 13px;font-weight: 600; padding-bottom: 10px; text-transform: uppercase; text-align: center;">price</td>
                            <td style="border-bottom: 1px solid #CB080E; color: #000;font-size: 13px;font-weight: 600; padding-bottom: 10px; text-transform: uppercase; text-align: center;">total</td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <?php 
                                $subTotal = 0; 
                               
                                for($i=0;$i<count($invoicepaymentData);$i++){   
                                    if (!empty($invoicepaymentData[$i]->price)) {
                                        $itemTotal = $invoicepaymentData[$i]->quentity * $invoicepaymentData[$i]->price;
                                        $subTotal += $itemTotal;
                        ?>
                                <tr>
                                    <td style="text-align: left;font-size: 12px;width: 55%;background: #f0f0f0;">
                                        <b style="display: block; margin-bottom: 5px;"><?= date('M d', strtotime($invoiceData[0]->dt_created)); ?> | <?= $invoicepaymentData[$i]->item_name ?>  </b>
                                        <br><?= $invoicepaymentData[$i]->item_desc ?> 
                                    </td>
                                    <td style="text-align: center;font-size: 12px;width: 15%;background: #f0f0f0;">
                                        <?= $invoicepaymentData[$i]->quentity ?>
                                    </td>
                                    <td style="text-align: center;font-size: 12px;width: 15%;background: #f0f0f0;border-left: 1px solid #fff;">
                                        <?= $invoiceData[0]->currency .' '. $invoicepaymentData[$i]->price ?> 
                                    </td>
                                    <td style="text-align: center;font-size: 12px;width: 15%;background: #f0f0f0;">
                                        <?= $invoiceData[0]->currency .' '.  number_format($itemTotal, 2, '.', ''); ?> 
                                    </td>
                                </tr>
                        <?php 
                                    }
                            } 
                        ?>
                        <?php
                            if (count($invoicepaymentData) > 0) {
                            $defaultTax = ($subTotal * $invoiceData[0]->default_tax) / 100;
                            $discount = ($subTotal * $invoiceData[0]->discount) / 100;
                            $totalPaid = getPaidAmount($invoiceData[0]->id);
                            $total2 = $subTotal + $defaultTax;
                            $total1 = ($totalPaid + $discount);
                            $finalTotal = $total2 - $total1;
                            $finalTotal = ($finalTotal > 0) ? $finalTotal : '0.00';
                        ?>
                        <tr>
                            <td colspan="2" style="width: 70%;">&nbsp;</td>
                            <td style="text-align: left;font-size: 12px;width: 15%;background: #f0f0f0;border-left: 1px solid #fff; font-weight: 600">Sub Total :</td>
                            <td style="text-align: center;font-size: 12px;width: 15%;background: #f0f0f0;font-weight: 600"><?= $invoiceData[0]->currency .' '. number_format($subTotal, 2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width: 70%;">&nbsp;</td>
                            <td style="text-align: left;font-size: 12px;width: 15%;background: #f0f0f0;border-left: 1px solid #fff; font-weight: 600">Tax - <?= $invoiceData[0]->default_tax ?>% :</td>
                            <td style="text-align: center;font-size: 12px;width: 15%;background: #f0f0f0;font-weight: 600"><?php echo $invoiceData[0]->currency .' '. number_format($defaultTax, 2); ?> </td>
                        </tr>
                        <?php
                            if ($invoiceData[0]->discount > 0) {
                        ?>
                        <tr>
                            <td colspan="2" style="width: 70%;">&nbsp;</td>
                            <td style="text-align: left;font-size: 12px;width: 15%;background: #f0f0f0;border-left: 1px solid #fff; font-weight: 600">Discount - <?= $invoiceData[0]->discount ?>%:</td>
                            <td style="text-align: center;font-size: 12px;width: 15%;background: #f0f0f0;font-weight: 600"><?= $invoiceData[0]->currency .' '. number_format($discount, 2) ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" style="width: 70%;">&nbsp;</td>
                            <td style="text-align: left;font-size: 12px;width: 15%;background: #f0f0f0;border-left: 1px solid #fff; font-weight: 600">Payment Made:</td>
                            <td style="text-align: center;font-size: 12px;width: 15%;background: #f0f0f0;font-weight: 600"><?php echo $invoiceData[0]->currency .' '. number_format($totalPaid, 2); ?></td>
                        </tr>
                        <tr>
                            
                            <td colspan="2" style="width: 70%;">&nbsp;</td>
                            <td style="text-align: left; color: #fff;font-size: 12px;width: 15%;background: #CB080E;border-left: 1px solid #fff; font-weight: 600">TOTAL :</td>
                            <td style="text-align: center;color: #fff;font-size: 12px;width: 15%;background: #CB080E;font-weight: 600"><?= $invoiceData[0]->currency .' '. number_format($finalTotal, 2) ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border="0" cellspacing="0" cellpadding="7" style="width: 100%">
                        <tr>
                            <td style="border-bottom: 1px solid #CB080E; color: #000;font-size: 13px;font-weight: 600; padding-bottom: 10px; text-transform: uppercase; text-align: left;">Payment information</td>
                        </tr>
                        <?php if('5' == 'I'){?>
                        <tr>
                            <td style="font-size: 13px;text-align: left;padding-top:10px">Thank you so much for choosing <span style="color: red;">The Magic Of Justin Govan</span> and allowing us to perform at your event!</td>
                         </tr>
                        <?php }else{?>
                         <tr>
                            <td style="font-size: 13px;text-align: left;padding-top:10px">Thank you for considering  <span style="color: red;">The Magic Of Justin Govan!</span> </td>
                         </tr>
                        <?php }?>
                         <tr>   <td style="font-size: 13px;text-align: left;padding-top:10px">Please make cheques payable to Justin Govan. All invoices are due at the start of the event, unless both parties have agreed to other arrangements. Any late payment will be subjected to 25% interest calculated daily. Thank you for your business!</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>