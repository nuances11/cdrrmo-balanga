$(document).ready(function() {

    var base_url = $('meta[name=base_url]').attr("content");

    $(document).on('submit', '#contactform', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var alert = $('#message-contact');

        $.ajax({
            method : "POST",
            url : base_url + 'contact-us/send',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    alert.html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#contactform').trigger('reset');
                }else{
                    if (response.validation_errors) {
                        alert.html('<div class="alert alert-danger">' + response.validation_errors + '</div>')
                    }else{
                        alert.html('<div class="alert alert-danger">' + response.message + '</div>')
                    }
                }
            }
        })

    })
})