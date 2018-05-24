<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig form-horizontal">
        <div class="form-group headingmain">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title" style="margin:10px;"> Document List</h2>
                </div>
                <div class="col-md-6">
                    <div class="ibox-tools" style="margin-top:4px;">
<!--                        <a data-toggle="modal"  class="btn btn-primary openPopup">
                            <i class="fa fa-plus"></i> Add Document
                        </a>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover label-dataTables" >
                            <thead>
                                <tr>
                                    <th>Document Name</th>
                                    <th>Company Name</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($docsArray); $i++) { ?>
                                    <tr>
                                        <td><?php echo $docsArray[$i]->document_name; ?></td>
                                        <td><?php echo $docsArray[$i]->company_name; ?></td>
                                        <td><?php  echo date('d-m-Y',  strtotime($docsArray[$i]->dt_created)); ?></td>
                                        <td>
<!--                                            <a data-toggle="modal" title="Edit" data-label-id="<?php echo $docsArray[$i]->id; ?>" class="editPopup"><i class="fa fa-edit text-navy"></i></a>
                                            <a data-toggle="modal" title="Delete" data-target="#myModal_autocomplete"  class="deleteLabel" data-url="<?php echo client_url().'document/deleteDocument' ?>" data-id="<?php echo $docsArray[$i]->id; ?>" ><i class="fa fa-close text-navy"></i></a>        -->
                                            <a data-toggle="modal" title="Add Item"  data-id="<?php echo $docsArray[$i]->id; ?>"  data-target="#addItemModel"  class="itemModel" ><i class="fa fa-anchor text-navy"></i></a>        
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="addItemModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Document Item List</h4>
            </div>
            <form method="post" class="form-horizontal" action="<?php echo client_url().'document/addDocsItem' ?>" enctype="multipart/form-data" id="addItem" novalidate="novalidate">
<!--                <div class="modal-body">
                    <div class="form-group" id="data_1">
                        <label class="col-sm-3 control-label">Date</label>
                        <div class="input-group date col-sm-7" style="">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="item_date" value="<?php echo date("d-m-Y", strtotime("+1 month")); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"> Value*</label>
                        <div class="input-group col-sm-7">
                            <input name="item_value" id="" placeholder="Enter Value" class="form-control" type="text">
                            <input name="docsId" id="docsId" class="form-control docsId" type="hidden">
                        </div>
                    </div>
                </div>-->
                <div class="appendHtml"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>