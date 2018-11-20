$(document).ready(function () {

    var base_url = $('meta[name=base_url]').attr("content");

    var announcementDataTable =  $('#announcement').DataTable({
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
    });

    $(document).on('click', '.btnDelete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        data = {
            id : id,
            action : 'delete'
        }

        var r = confirm("Are you sure you want to delete this post?");

        if(r == true){

            $.ajax({
                method : "POST",
                url : base_url + 'admin/announcement/action',
                dataType : "JSON",
                data : data,
                success : function(response) {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        announcementDataTable.ajax.reload();
                    }else{
                        if (response.validation_errors) {
                            toastr.error(response.validation_errors);
                        }else{
                            toastr.error(response.message);
                        }
                    }
                }
            })

        }
        
    });


})