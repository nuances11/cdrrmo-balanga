$(document).ready(function () {

    var base_url = $('meta[name=base_url]').attr("content");
    $('#add_user_form input[name="password"]').val('');
    $('#add_user_form input[name="cpass"]').val('');
    $('#update_user_form').hide();
    // $('#show_pass').hide();
    // $('label.ckbox').hide();

    var usersDataTable =  $('#users').DataTable({
        "ajax": {
            url : base_url + 'admin/users/datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
    });

    $(document).on('blur', '#add_user_form #show_password', function(e) {
        e.preventDefault();
        var  pass = $('input[name="password"]');
        var  cpass = $('input[name="cpass"]');

        pass.attr('type', 'text');
        cpass.attr('type', 'text');


    })

    $(document).on('blur', '#update_user_form #show_password', function(e) {
        e.preventDefault();
        var  pass = $('#update_user_form input[name="password"]');
        var  cpass = $('#update_user_form input[name="cpass"]');

        pass.attr('type', 'text');
        cpass.attr('type', 'text');


    })

    $('#add_user_form #show_pass').click(function(){
        $(this).is(':checked') ? $('#add_user_form input[name="password"]').attr('type', 'text') : $('#add_user_form input[name="password"]').attr('type', 'password');
        $(this).is(':checked') ? $('#add_user_form input[name="cpass"]').attr('type', 'text') : $('#add_user_form input[name="cpass"]').attr('type', 'password');
        $(this).is(':checked') ? $('#add_user_form .ckbox span').text('Hide Password') : $('.ckbox span').text('Show Password');
    });

    $('#update_user_form #show_pass').click(function(){
        $(this).is(':checked') ? $('#update_user_form input[name="password"]').attr('type', 'text') : $('#update_user_form input[name="password"]').attr('type', 'password');
        $(this).is(':checked') ? $('#update_user_form input[name="cpass"]').attr('type', 'text') : $('#update_user_form input[name="cpass"]').attr('type', 'password');
        $(this).is(':checked') ? $('#update_user_form .ckbox span').text('Hide Password') : $('.ckbox span').text('Show Password');
    });

    $(document).on('click', '.btnDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var r = confirm("Are you sure you want to delete this user?");

        var data = {
            id : id,
            action : 'delete'
        };

        if (r == true) {
            $.ajax({
                type: "POST",
                url: base_url + "admin/users/action",
                data: data,
                dataType: "json",
                success: function(response)
                {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        usersDataTable.ajax.reload();
                    }else{
                        if (response.validation_errors) {
                            toastr.error(response.validation_errors);
                        }else{
                            toastr.error(response.message);
                        }
                    }
                }
            });
        }

    })

    $(document).on('submit', '#update_profile_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);

        $.ajax({
            type: "POST",
            url: base_url + "admin/edit-profile/submit",
            data: data,
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                }else{
                    if (response.validation_errors) {
                        toastr.error(response.validation_errors);
                    }else{
                        toastr.error(response.message);
                    }
                }
            }
        });
                    
    })

    $(document).on('submit', '#add_user_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);

        $.ajax({
            type: "POST",
            url: base_url + "admin/users/action",
            data: data,
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    $('#add_user_form').trigger("reset");
                    toastr.success(response.message);
                    usersDataTable.ajax.reload();
                }else{
                    if (response.validation_errors) {
                        toastr.error(response.validation_errors);
                    }else{
                        toastr.error(response.message);
                    }
                }
            }
        });
                    
    })

    $(document).on('click', '.btnEdit', function(e) {
        e.preventDefault();
        console.log($(this).data('id'));
        var id = $(this).data('id');
        
        $.ajax({
            type: "GET",
            url: base_url + "admin/users/get",
            data: { id : id },
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    $('#update_user_form input[name="firstname"]').val(response.user.first_name);
                    $('#update_user_form input[name="lastname"]').val(response.user.last_name);
                    $('#update_user_form input[name="email"]').val(response.user.email);
                    $('#update_user_form input[name="user_id"]').val(response.user.id);
                    $('#update_user_form select[name="user_type"]').val(response.user.user_type);

                }else{
                    toastr.error(response.message);
                }
            }
        });

        $('#update_user_form').show();
        $('#add_user_form').hide();

    })

    $(document).on('submit', '#update_user_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);

        $.ajax({
            type: "POST",
            url: base_url + "admin/users/action",
            data: data,
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    $('#update_user_form').trigger('reset');
                    $('#add_user_form').trigger('reset');
                    
                    $('#update_user_form').hide();
                    $('#add_user_form').show();
                    toastr.success(response.message);
                    usersDataTable.ajax.reload();
                }else{
                    if (response.validation_errors) {
                        toastr.error(response.validation_errors);
                    }else{
                        toastr.error(response.message);
                    }
                }
            }
        });
                    
    })

    $(document).on('submit', '#change_password_form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);

        $.ajax({
            type: "POST",
            url: base_url + "admin/change-password/submit",
            data: data,
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    $('#change_password_form').trigger('reset');
                    toastr.success(response.message);
                }else{
                    if (response.validation_errors) {
                        toastr.error(response.validation_errors);
                    }else{
                        toastr.error(response.message);
                    }
                }
            }
        });
                    
    })

    $(document).on('click', '#cancel_update', function(e) {
        e.preventDefault();
        console.log(this);
        $('#update_user_form').trigger('reset');
        $('#add_user_form').trigger('reset');
        
        $('#update_user_form').hide();
        $('#add_user_form').show();

    })
})

$(document).on('click', '#add_user_form #generate_pasword', function(e) {
    e.preventDefault();
    generate();
    // $('#show_pass').show();
    // $('label.ckbox').show();

})

$(document).on('click', '#update_user_form #generate_pasword', function(e) {
    e.preventDefault();
    generate_new();
    // $('#show_pass').show();
    // $('label.ckbox').show();

})

function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}


function generate() {
    var password = randomPassword(8)
    $('#add_user_form input[name="password"]').val(password);
    $('#add_user_form input[name="cpass"]').val(password);
}

function generate_new() {
    var password = randomPassword(8)
    console.log(password);
    $('#update_user_form input[name="password"]').val(password);
    $('#update_user_form input[name="cpass"]').val(password);
}