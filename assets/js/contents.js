$(document).ready(function () {

    var base_url = $('meta[name=base_url]').attr("content");
    $('#update_barangay_form').hide();
    $('#update_affected_population_form').hide();
    $('#update_vehicle_and_driver_form').hide();
    $('#update_evacuation_center_form').hide();

    var floodDataTable =  $('#messages').DataTable({
        "ajax": {
            url : base_url + 'admin/messages/datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
    });
    

    var floodDataTable =  $('#flood').DataTable({
        "ajax": {
            url : base_url + 'admin/flood/datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
    });

    var affectedPopulationDataTable =  $('#affectedPopulation').DataTable({
        "ajax": {
            url : base_url + 'admin/contents/affected-population/datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
    });

    var vehicleAndDriverDataTable =  $('#vehicle_and_driver').DataTable({
        "ajax": {
            url : base_url + 'admin/contents/vehicles-and-drivers/datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
    });

    var evacuationCenterDataTable =  $('#evacuation_center').DataTable({
        "ajax": {
            url : base_url + 'admin/contents/evacuation-centers/datatable',
            type : 'GET'
        },
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
    });

    $(document).on('submit', '#add_vehicle_and_driver_form', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/contents/vehicles-and-drivers/data/action',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    vehicleAndDriverDataTable.ajax.reload();
                    $('#add_vehicle_and_driver_form').trigger('reset');
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

    $(document).on('submit', '#add_evacuation_center_form', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/contents/evacuation-centers/data/action',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    evacuationCenterDataTable.ajax.reload();
                    $('#add_evacuation_center_form').trigger('reset');
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

    $(document).on('submit', '#add_affected_population_form', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/contents/affected-population/data/action',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    affectedPopulationDataTable.ajax.reload();
                    $('#add_affected_population_form').trigger('reset');
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

    $(document).on('click', '#vehicle_and_driver .btnEdit', function(e) {
        e.preventDefault();
        $('.btnEdit').show();
        var id = $(this).data('id');
        $(this).hide();
        
        $.ajax({
            type: "GET",
            url: base_url + "admin/contents/vehicles-and-drivers/data/get",
            data: { id : id },
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    $('#update_vehicle_and_driver_form input[name="vehicle"]').val(response.data_details.vehicle);
                    $('#update_vehicle_and_driver_form input[name="driver"]').val(response.data_details.driver);
                    $('#update_vehicle_and_driver_form input[name="data_id"]').val(response.data_details.id);
                }else{
                    toastr.error(response.message);
                }
            }
        });

        $('#update_vehicle_and_driver_form').show();
        $('#add_vehicle_and_driver_form').hide();

    })

    $(document).on('click', '#evacuation_center .btnEdit', function(e) {
        e.preventDefault();
        $('.btnEdit').show();
        var id = $(this).data('id');
        $(this).hide();
        
        $.ajax({
            type: "GET",
            url: base_url + "admin/contents/evacuation-centers/data/get",
            data: { id : id },
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    $('#update_evacuation_center_form input[name="evacuation_center"]').val(response.data_details.evacuation_center);
                    $('#update_evacuation_center_form input[name="data_id"]').val(response.data_details.id);
                }else{
                    toastr.error(response.message);
                }
            }
        });

        $('#update_evacuation_center_form').show();
        $('#add_evacuation_center_form').hide();

    })

    $(document).on('submit', '#update_evacuation_center_form', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/contents/evacuation-centers/data/action',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    $('#update_evacuation_center_form').trigger('reset');
                    $('#add_evacuation_center_form').trigger('reset');
                    
                    $('#update_evacuation_center_form').hide();
                    $('#add_evacuation_center_form').show();
                    toastr.success(response.message);
                    evacuationCenterDataTable.ajax.reload();
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

    $(document).on('submit', '#update_vehicle_and_driver_form', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/contents/vehicles-and-drivers/data/action',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    $('#update_vehicle_and_driver_form').trigger('reset');
                    $('#add_vehicle_and_driver_form').trigger('reset');
                    
                    $('#update_vehicle_and_driver_form').hide();
                    $('#add_vehicle_and_driver_form').show();
                    toastr.success(response.message);
                    vehicleAndDriverDataTable.ajax.reload();
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

    $(document).on('click', '#update_vehicle_and_driver_form #cancel_update', function(e) {
        e.preventDefault();
        console.log(this);
        $('#update_vehicle_and_driver_form').trigger('reset');
        $('#add_vehicle_and_driver_form').trigger('reset');
        
        $('#update_vehicle_and_driver_form').hide();
        $('#add_vehicle_and_driver_form').show();
        $('.btnEdit').show();

    })

    $(document).on('click', '#update_evacuation_center_form #cancel_update', function(e) {
        e.preventDefault();
        console.log(this);
        $('#update_evacuation_center_form').trigger('reset');
        $('#add_evacuation_center_form').trigger('reset');
        
        $('#update_evacuation_center_form').hide();
        $('#add_evacuation_center_form').show();
        $('.btnEdit').show();

    })

    $(document).on('click', '#evacuation_center .btnDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var r = confirm("Are you sure you want to delete this data?");

        var data = {
            id : id,
            action : 'delete'
        };

        if (r == true) {
            $.ajax({
                type: "POST",
                url: base_url + "admin/contents/evacuation-centers/data/action",
                data: data,
                dataType: "json",
                success: function(response)
                {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        evacuationCenterDataTable.ajax.reload();

                        $('#update_evacuation_center_form').trigger('reset');
                        $('#add_evacuation_center_form').trigger('reset');
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

    $(document).on('click', '#vehicle_and_driver .btnDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var r = confirm("Are you sure you want to delete this data?");

        var data = {
            id : id,
            action : 'delete'
        };

        if (r == true) {
            $.ajax({
                type: "POST",
                url: base_url + "admin/contents/vehicles-and-drivers/data/action",
                data: data,
                dataType: "json",
                success: function(response)
                {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        vehicleAndDriverDataTable.ajax.reload();

                        $('#update_vehicle_and_driver_form').trigger('reset');
                        $('#add_vehicle_and_driver_form').trigger('reset');
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

    $(document).on('click', '#affectedPopulation .btnEdit', function(e) {
        e.preventDefault();
        $('.btnEdit').show();
        var id = $(this).data('id');
        $(this).hide();
        
        $.ajax({
            type: "GET",
            url: base_url + "admin/flood/affected-population/data/get",
            data: { id : id },
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    $('#update_affected_population_form input[name="barangay"]').val(response.affected.barangay);
                    $('#update_affected_population_form input[name="data_id"]').val(response.affected.id);
                    if (response.affected.high_risk) {
                        $('#update_affected_population_form input[name="high_risk"]').prop('checked', true);
                    }else{
                        $('#update_affected_population_form input[name="high_risk"]').prop('checked', false);
                    }
                    
                    $('#update_affected_population_form input[name="families_affected"]').val(response.affected.families);
                    $('#update_affected_population_form input[name="persons_affected"]').val(response.affected.persons_affected);

                }else{
                    toastr.error(response.message);
                }
            }
        });

        $('#update_affected_population_form').show();
        $('#add_affected_population_form').hide();

    })

    $(document).on('click', '#update_barangay_form #cancel_update', function(e) {
        e.preventDefault();
        console.log(this);
        $('#update_barangay_form').trigger('reset');
        $('#add_barangay_form').trigger('reset');
        
        $('#update_barangay_form').hide();
        $('#add_barangay_form').show();
        $('.btnEdit').show();

    })

    $(document).on('submit', '#update_affected_population_form', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/contents/affected-population/data/action',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    $('#update_affected_population_form').trigger('reset');
                    $('#add_affected_population_form').trigger('reset');
                    
                    $('#update_affected_population_form').hide();
                    $('#add_affected_population_form').show();
                    toastr.success(response.message);
                    affectedPopulationDataTable.ajax.reload();
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

    $(document).on('click', '#affectedPopulation .btnDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var r = confirm("Are you sure you want to delete this data?");

        var data = {
            id : id,
            action : 'delete'
        };

        if (r == true) {
            $.ajax({
                type: "POST",
                url: base_url + "admin/contents/affected-population/data/action",
                data: data,
                dataType: "json",
                success: function(response)
                {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        affectedPopulationDataTable.ajax.reload();

                        $('#update_affected_population_form').trigger('reset');
                        $('#add_affected_population_form').trigger('reset');
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

    $(document).on('submit', '#add_barangay_form', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/contents/flood/data/action',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    toastr.success(response.message);
                    floodDataTable.ajax.reload();
                    $('#add_barangay_form').trigger('reset');
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

    $(document).on('click', '#flood .btnDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var r = confirm("Are you sure you want to delete this data?");

        var data = {
            id : id,
            action : 'delete'
        };

        if (r == true) {
            $.ajax({
                type: "POST",
                url: base_url + "admin/contents/flood/data/action",
                data: data,
                dataType: "json",
                success: function(response)
                {
                    console.log(response);
                    if (response.success) {
                        toastr.success(response.message);
                        floodDataTable.ajax.reload();

                        $('#update_barangay_form').trigger('reset');
                        $('#add_barangay_form').trigger('reset');
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

    $(document).on('submit', '#update_barangay_form', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method : "POST",
            url : base_url + 'admin/contents/flood/data/action',
            dataType : "JSON",
            data : data,
            success : function(response) {
                console.log(response);
                if (response.success) {
                    $('#update_barangay_form').trigger('reset');
                    $('#add_barangay_form').trigger('reset');
                    
                    $('#update_barangay_form').hide();
                    $('#add_barangay_form').show();
                    toastr.success(response.message);
                    floodDataTable.ajax.reload();
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

    $(document).on('click', '#flood .btnEdit', function(e) {
        e.preventDefault();
        $('.btnEdit').show();
        var id = $(this).data('id');
        $(this).hide();
        
        $.ajax({
            type: "GET",
            url: base_url + "admin/flood/data/get",
            data: { id : id },
            dataType: "json",
            success: function(response)
            {
                console.log(response);
                if (response.success) {
                    $('#update_barangay_form input[name="barangay"]').val(response.flood.barangay);
                    $('#update_barangay_form select[name="risk_level"]').val(response.flood.risk);
                    $('#update_barangay_form input[name="data_id"]').val(response.flood.id);

                }else{
                    toastr.error(response.message);
                }
            }
        });

        $('#update_barangay_form').show();
        $('#add_barangay_form').hide();

    })

    $(document).on('click', '#update_barangay_form #cancel_update', function(e) {
        e.preventDefault();
        console.log(this);
        $('#update_barangay_form').trigger('reset');
        $('#add_barangay_form').trigger('reset');
        
        $('#update_barangay_form').hide();
        $('#add_barangay_form').show();
        $('.btnEdit').show();

    })


})