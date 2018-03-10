var Invoice = function() {

    var invoiceList = function() {

        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
//                {extend: 'copy'},
//                {extend: 'csv'},
//                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]
        });
        
        
//         $('body').on('click', '.interestedlist', function() {
//            var muckId = $(this).attr('data-id');
//            var data = '';
//            if (muckId != "")
//            {
//                data = {'muckId': muckId, '_token': $("input[name=_token]").val()};
//                ajaxcall(baseurl + 'company/get-intersted-userlist', data, function(output) {
//                    $('#myModal_interested .modal-body').html(output);
//                });
//            }
//        });
    };
//    
//    var ticketAdd = function() {
//       
//        var form = $('#ticketsAddForm');
//        var rules = {
//            department_id: {required: true},
//            ticket_code: {required: true},
//            subject: {required: true},
//            client_id: {required: true},
//            priority: {required: true},
//            ticket_message: {required: true},
//            
//        };
//        handleFormValidate(form, rules, function(form) {
//            handleAjaxFormSubmit(form,true);
//        });
//       
//    };
//    
    var genral = function() {
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
        $(".showDicount").click(function() {
            $(".discountDiv").toggle();
        });
    }


    return {
        //main function to initiate the module
        invoiceList: function() {
            invoiceList();
        },
        invoiceAdd: function() {
            genral();
        },
    };
}();
