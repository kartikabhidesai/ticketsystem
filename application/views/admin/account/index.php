<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tickets List</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Ticket Code</th>
                                        <th>Subject</th>
                                        <th>Reporter</th>
                                        <th>Department</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<count($getTicket); $i++) { ?>
                                    <tr>
                                        <td><?= $getTicket[$i]->companyName; ?></td>
                                        <td><?= $getTicket[$i]->ticket_code; ?></td>
                                        <td><?= $getTicket[$i]->subject; ?></td>
                                        <td><?= $getTicket[$i]->first_name .' ' . $getTicket[$i]->last_name; ?> </td>
                                        <td><?= $getTicket[$i]->name; ?></td>
                                        <td><?= $getTicket[$i]->priority; ?></td>
                                        <td><?= str_replace('_',' ',$getTicket[$i]->status); ?></td>
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
</div>
