var Login = function () {

    var loginInt = function () {
        
        var form = $('#login');
        var rules = {
            email: {required: true,email:true},
            password: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    };


    return {
        //main function to initiate the module
        init: function () {
            loginInt();
        }
    };
}();
