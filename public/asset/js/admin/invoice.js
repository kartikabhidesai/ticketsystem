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
    var general = function() {
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true
        });
        $(".showDicount").click(function() {
            $(".discountDiv").toggle();
        });
        $(".recurring").click(function() {
            $(".showRecurring").toggle();
        });
    }

    var invoiceAdd = function() {


        var form = $('#invoiceAdd');
        var rules = {
            ref_no: {required: true},
            due_date: {required: true, },
            client_id: {required: true},
            default_tax: {required: true},
            discount: {required: true, number: true},
            currency: {required: true},
            notes: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });

    };

    var invoiceEdit = function() {
        var form = $('#invoiceEdit');
        var rules = {
            ref_no: {required: true},
            due_date: {required: true, },
            client_id: {required: true},
            default_tax: {required: true},
            discount: {required: true, number: true},
            currency: {required: true},
            notes: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };
    var invoiceDetail = function() {

        var form = $('#invoiceDetail');
        var rules = {
            item_name: {required: true},
            item_desc: {required: true},
            price: {required: true, number: true},
            quentiry: {required: true, number: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };

    var invoicePay = function() {
        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, {color: '#CB080D'});

        $('body').on('blur', '.amount', function() {
            var amount = parseInt($(".amount").val());
            var totalAmount = parseInt($(".totalAmount").val());
            if (amount > totalAmount) {
                showToster('error', 'Amount no more then total amount');
                $('.submitBtn').attr('disabled', true);
            } else {
                $('.submitBtn').attr('disabled', false);
            }
        });
    };
    var invoicePayment = function() {

        var form = $('#invoicePayment');
        var rules = {
            item_name: {required: true},
            item_desc: {required: true},
            price: {required: true, number: true},
            quentiry: {required: true, number: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    };


    var deleteInvoicePayment = function() {
        $('body').on('click', '.deletePayment', function() {
            var personId = $(this).attr('data-id');
            var dataUrl = $(this).attr('data-href');
            $('#btndelete').attr('data-url', dataUrl);
            $('#btndelete').attr('data-id', personId);
        });
        handleDelete();
    }


    return {
        //main function to initiate the module
        invoiceList: function() {
            invoiceList();
        },
        invoiceAdd: function() {
            general();
            invoiceAdd();
        },
        payInit: function() {
            invoicePay();
            general();
            invoicePayment();
        },
        initEdit: function() {
            invoiceEdit();
            invoiceDetail();
            deleteInvoicePayment();
            general();
        },
    };
}();
