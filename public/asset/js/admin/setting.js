var Setting = function() {

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
    
        
    };
    var departmentAddEdit = function() {
        var form = $('#addDepartmentForm');
        var rules = {
            department_name: {required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form);
        });
       
    };
    
    var gneral = function(){
        $('body').on('click','.deletebutton',function(){
            var personId = $(this).attr('data-id');
            var dataUrl = $(this).attr('data-href');
          
            $('#btndelete').attr('data-url',dataUrl);
            $('#btndelete').attr('data-id',personId);
            
        });
        handleDelete();
    }
    
    return {
        //main function to initiate the module
        list: function() {
            clientList();
            gneral();
        },
        add_edit: function() {
            departmentAddEdit();
        },
    };
}();
