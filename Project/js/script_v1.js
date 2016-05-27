var main = (function () {
    doConstruct = function () {
        this.init_callbacks = [];
    };
    doConstruct.prototype = {
        add_init_callback : function (func) {
            if (typeof(func) == 'function') {
                this.init_callbacks.push(func);
                return true;
            }
            else {
                return false;
            }

        }
    };
    return new doConstruct;
})();
$(document).ready(function () {
    $.each(main.init_callbacks, function (index, func) {
        func();
    });
});
var orders_manipulation = (function () {
    var doConstruct = function () {
        main.add_init_callback(this.show_modal);
        main.add_init_callback(this.show_upload_img_name);
    };
    doConstruct.prototype = {
        show_modal: function () {
            $('#s-join').click(function(){                  //show registration modal
                $('#join-modal').modal('show');
            });
            if( $.trim( $('#info-body').html() ).length ) { //show information modal
                $('#w-info').modal('show');
            }
            $('#s-sign-in').click(function(){               //show login modal
                $('#sign-in-modal').modal('show');
            });
            $('#add_post').click(function(){               //show "#post-modal" modal
                $('#post-modal').modal('show');
            });
        },
        show_upload_img_name: function () {
            $('#btn').click(function(){
                $('#upfile').click();
            });
            $("#upfile").change(function() {
                var files = $(this)[0].files;
                for (var i = 0; i < files.length; i++) {
                    if((i + 1) !== files.length) {          //If the last cell in the array - the name of the output append without ','
                        $("#btn").append(files[i].name+',  ');
                    } else {
                        $("#btn").append(files[i].name);
                    }
                }
            });
        },
    };
    return new doConstruct;
})();
//validate filter form input #filter-order-form
function filter_check(){
    var check_form_empty = $('#filter-order-form').serializeArray();
    var empty_form_array = [];              //if filter form input empty push input name field into array
    jQuery.each( check_form_empty, function( i, field ) {
        if((field.value).length == 0){
            empty_form_array.push(field.name); //push empty filter input to array 
        }
    });
    if(empty_form_array.length == 7 ){   //if == 7 (all input empty) return false
        $('#filter-orders-b').removeAttr('disabled');
        $("#admin-orders-info").html('Filter input empty');
        $("#modal-admin-orders-info").modal('show');
        setTimeout(function () {
            $("#modal-admin-orders-info").modal('hide');
            $('#admin-orders-info').html('');
        }, 2000);
        return false;
    }
    var filter_e_capacity = $( "input[name='engine_capacity']" ).val();   //validate input data
    var filter_e_mileage = $( "input[name='mileage']" ).val();
    var filter_owners = $("input[name='owners']").val();
    if(filter_e_capacity != 0 ) {
        if (!$.isNumeric(filter_e_capacity)) {                        //validate input tell (only number)
            $('#filter-orders-b').removeAttr('disabled');
            $("#admin-orders-info").html('Engine capacity is numeric');
            $("#modal-admin-orders-info").modal('show');
            setTimeout(function () {
                $("#modal-admin-orders-info").modal('hide');
                $('#admin-orders-info').html('');
            }, 2000);
            return false;
        }
    }
    if(filter_e_mileage != 0) {
        if (!$.isNumeric(filter_e_mileage)) {
            $('#filter-orders-b').removeAttr('disabled');
            $("#admin-orders-info").html('Mileage is numeric');
            $("#modal-admin-orders-info").modal('show');
            setTimeout(function () {
                $("#modal-admin-orders-info").modal('hide');
                $('#admin-orders-info').html('');
            }, 2000);
            return false;
        }
    }
    if(filter_owners != 0) {
        if (!$.isNumeric(filter_owners)) {
            $('#filter-orders-b').removeAttr('disabled');
            $("#admin-orders-info").html('Owners is numeric');
            $("#modal-admin-orders-info").modal('show');
            setTimeout(function () {
                $("#modal-admin-orders-info").modal('hide');
                $('#admin-orders-info').html('');
            }, 2000);
            return false;
        }
    }
}
