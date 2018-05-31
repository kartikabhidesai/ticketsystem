<?php
for ($j = 0; $j < count($columnArray); $j++) {
    ?>
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo $columnArray[$j]->column_name ?></label>
        <div class="input-group col-sm-6">
            <?php if (!empty($columnArray[$j]->row_value)) {
                ?>
                <input value="<?= $columnArray[$j]->row_value ?>"  placeholder="Enter <?= $columnArray[$j]->column_name ?>" class="form-control rows" type="text">
                    <!--<a style="margin-right: -12px !important;" data-toggle="modal" title="Delete" data-target="#myModal_autocomplete"  class="deleteRow" data-url="<?php echo admin_url() . 'document/deleterow' ?>" data-id="<?php echo $columnArray[$j]->rowId; ?>" ><i class="fa fa-close text-navy"></i></a>-->
            <?php } else {
                ?>
                <input value="<?= $columnArray[$j]->row_value ?>" name="rows[<?php echo $j; ?>][<?php echo $columnArray[$j]->id; ?>]" id="rows" placeholder="Enter <?= $columnArray[$j]->column_name ?>" class="form-control rows" type="text">
            <?php }
            ?>
        </div>
    </div>
<?php }
?>
<div class="col-sm-1 btn" style="margin-left: 400px;margin-top: -55px;">
    <button class="btn btn-success appendRow" type="button"><i class="fa fa-plus"></i></button>
</div>
<div class="appendRowData" style="display: none;">
    <?php
    for ($j = 0; $j < count($columnArray); $j++) {
        $rows = count($columnArray) + 1 ;
        ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo $columnArray[$j]->column_name ?></label>
            <div class="input-group col-sm-6">
                <input value="" name="rows[<?php echo $rows; ?>][<?php echo $columnArray[$j]->id; ?>]" id="rows" placeholder="Enter <?= $columnArray[$j]->column_name ?>" class="form-control rows" type="text">
            </div>
        </div>
    <?php }
    ?>
</div>