$(document).ready(function () {

    var base_url = $('meta[name=base_url]').attr("content");
    $('#add_user_form input[name="password"]').val('');
    $('#add_user_form input[name="cpass"]').val('');

    console.log('sample');

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

    $(document).on('blur', '#show_password', function(e) {
        e.preventDefault();
        var  pass = $('input[name="password"]');
        var  cpass = $('input[name="cpass"]');

        pass.attr('type', 'text');
        cpass.attr('type', 'text');


    })
})

$(document).on('click', '#generate_pasword', function(e) {
    e.preventDefault();
    generate();

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