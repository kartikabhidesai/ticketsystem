<style>

</style>
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig form-horizontal">
        <div class="form-group headingmain">						
            <h2 class="title" style="margin:10px">Company Detail</h2>								
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-5 displaylable">Company Name</label>
                    <div class="col-sm-7">
                        dd
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 displaylable"> Email </label>
                    <div class="col-sm-7">
                        dd
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 displaylable"> Phone</label>
                    <div class="col-sm-7">
                        dd
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-5 displaylable">Address </label>
                    <div class="col-sm-7">
                        dd
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 displaylable">City</label>
                    <div class="col-sm-7">
                        dd
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 displaylable">Country</label>
                    <div class="col-sm-7">
                        dd
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group headingmain">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title" style="margin:10px;"> Contact Person</h2>
                </div>
                <div class="col-md-6">
                    <div class="ibox-tools" style="margin-top:4px;">
                        <a data-toggle="modal" data-target="#myModal_addnewperson" href="javascript:;" class="btn btn-primary">
                            <i class="fa fa-plus"></i>Add Person
                        </a>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company Domain </th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Title</td>
                                    <td>Unit Name</td>
                                    <td>Material name</td>
                                    <td>Quantity</td>
                                    <td>Availability Start Date</td>

                                    <td>
                                        <a data-toggle="modal" data-target="#myModal_addnewperson" href="javascript:;"><i class="fa fa-edit text-navy"></i></a>
                                        <a data-toggle="modal" data-target="#myModal_autocomplete"  data-id="2" class="deletebutton" href="javascript;;"><i class="fa fa-close text-navy"></i></a>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                <button  id='btndelete' data-url="{{ route('muck-delete')}}" data-id="" type="button" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal inmodal" id="myModal_addnewperson" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title">Add new person</h4>
                <!--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
            </div>
            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?= admin_url(); ?>client/detail" id="addnewperson" novalidate="novalidate">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Person full name *</label> 
                        <input name="person_name" placeholder="Person full name *" class="form-control getlatlong" type="text">
                    </div>
                    <div class="form-group">
                        <label>Username *</label> 
                        <input name="address_line_1" placeholder="Username *" class="form-control getlatlong" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email</label> 
                        <input name="address_line_2" placeholder="Email *" class="form-control getlatlong" type="text">
                    </div>
                    <div class="form-group">
                        <label>Password *</label> 
                        <input name="city" placeholder="Password *" class="form-control getlatlong" type="text">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password *</label> 
                        <input name="postcode" placeholder="Confirm Password *" class="form-control getlatlong" type="text">
                    </div>
                    <div class="form-group">
                        <label>Phone *</label> 
                        <input name="postcode" placeholder="Phone *" class="form-control getlatlong" type="text">
                    </div>
                    <div class="form-group">
                        <label>Address *</label> 
                        <textarea class="form-control" name="additional_information"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>