var Tickets = function() {

    var clientList = function() {

        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
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
        
        
         $('body').on('click', '.interestedlist', function() {
            var muckId = $(this).attr('data-id');
            var data = '';
            if (muckId != "")
            {
                data = {'muckId': muckId, '_token': $("input[name=_token]").val()};
                ajaxcall(baseurl + 'company/get-intersted-userlist', data, function(output) {
                    $('#myModal_interested .modal-body').html(output);
                });
            }
        });
    };
    
    var ticketAdd = function() {
       
        var form = $('#ticketsAddForm');
        var rules = {
            department_id: {required: true},
            ticket_code: {required: true},
            subject: {required: true},
            priority: {required: true},
            ticket_message: {required: true},
            
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
       
    };
    var ticketEdit = function() {
       
        var form = $('#ticketEditForm');
        var rules = {
            department_id: {required: true},
            ticket_code: {required: true},
            subject: {required: true},
            priority: {required: true},
            ticket_message: {required: true},
            
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    };
    
    
    var clientDetail = function() {
       
        
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    }
                }
            ]

        });
    };
    
    var addNewPerson = function(){
        var form = $('#addNewPerson');
        var rules = {
            person_fname: {required: true},
            person_lname: {required: true},
            person_email: {required: true,email:true},
            company_password: {required: true},
            company_confirm_password: {required: true,equalTo:'#password'},
            company_user_phone: {required: true},
            address: {required: true},
            
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
    }
    
    var deleteTicket = function(){
        
        $('body').on('click','.deletebutton',function(){
            var personId = $(this).attr('data-id');
            var dataUrl = $(this).attr('data-href');
          
            $('#btndelete').attr('data-url',dataUrl);
            $('#btndelete').attr('data-id',personId);
            
        });
        handleDelete();
    }
    
    var genral = function (){
        $('.changeDepartment').on('change',function(){
            if($(this).val() != ''){
                var randStr = randomString();
                $('.ticketCode').val(randStr); 
            }else{
                $('.ticketCode').val(''); 
            }
            
        });
    }
    
    function randomString() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
	var string_length = 6;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	return randomstring;
    }
    
    return {
        //main function to initiate the module
        clientList: function() {
            clientList();
            deleteTicket();
        },
        ticketAdd: function() {
            ticketAdd();
            genral();
        },
        ticketEdit: function() {
            ticketEdit();
            genral();
        },
    };
}();
