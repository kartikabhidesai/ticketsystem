<table class="table table-striped table-bordered table-hover" >
    <thead>
        <tr>
            <th>Date</th>
            <th>Value</th>
            <!--<th>Action</th>-->
        </tr>
    </thead>
    <tbody class="appendHtml">
        <?php for ($i = 0; $i < count($lableInfo); $i++) { 
            if($lableInfo[$i]->document_value){
            ?>
            <tr>
                <td><?php echo date('d-m-Y', strtotime($lableInfo[$i]->document_date)); ?></td>
                <td><?php echo $lableInfo[$i]->document_value; ?></td>
<!--                <td>
                    <a data-toggle="modal" data-target="#myModal_autocomplete" data-url="<?php echo client_url() . 'document/deleteDocumentInfo' ?>" data-id="<?php echo $lableInfo[$i]->id; ?>" class="deleteItem" href="javascript:;"><i class="fa fa-close text-navy"></i></a>        
                </td>-->
            </tr>
        <?php
        }}
        if (count($lableInfo) == 0) {
            echo '<tr><td colspan="3" style="color: red;" class="error text-center"><b>No record Found</b></td></tr>';
        }
        ?>
    </tbody>
</table>
