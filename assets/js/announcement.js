$(document).ready(function () {

    var base_url = $('meta[name=base_url]').attr("content");

    var usersDataTable =  $('#announcement').DataTable({
        "ajax": {
            url : base_url + 'admin/announcement/datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
    });

    $('#summernote').summernote({
        height: 150,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'hr']],
            ['view', ['fullscreen']],
            ['help', ['help']]
          ],
    })

    $(document).on('submit', '#add_announcement_form', function (e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            method : "POST",
            url : base_url + 'admin/announcement/action',
            dataType : "JSON",
            data : data,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success : function(response) {
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
        })
    })
})