$(function() {

    //------------ AJAX MODAL -----------------------
    $('.ajax-button').click(function(e) {
        e.preventDefault();
        var token = $.cookie('csrfToken');
        var url = $(this).attr('href');
        var type = 'GET';
        var dataType = 'html';
        $.ajax({
            headers: { 'X-XSRF-TOKEN': token },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', token);
            },
            url: url,
            type: type,
            dataType: dataType,
            success: function(html) {
                $('#ajax-modal .form').html(html);
                $('#ajax-modal').modal('show');
            },
            error: function(xhr, status, errorThrown) {
                if (xhr.status == 403) {
                    var responseText = xhr.responseText;
                    var response = JSON.parse(responseText);
                    if (response['login']) {
                        window.location.href = url;
                    }
                }
            },
        });
    });

    $('#ajax-modal').on('hidden.bs.modal', function(e) {
        $('#ajax-modal .form').empty();
    });

    $('#ajax-modal').on('shown.bs.modal', function(e) {
        $('#ajax-modal .btn-cancel').on('click', function(e) {
            $('#ajax-modal').modal('hide');
            e.preventDefault();
        });

        $('#ajax-modal form.no-redirect').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var type = $(this).attr('method');
            var data = $(this).serialize();
            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function(data, textStatus, jqXHR) {
                    try {
                        var response = JSON.parse(data);
                        $('#ajax-modal .form').html(response.body);
                        window.location.href = response.url;
                    } catch(e) {
                        $('#ajax-modal .form').html(data);
                    };
                }
            });
        });
    });

    // DATEPICKER
    $('.datepicker').datepicker({
        autoclose: true,
        language: 'es',
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });

    $('.datepicker-today').datepicker({
        autoclose: true,
        language: 'es',
        format: 'dd/mm/yyyy',
        todayHighlight: true,
        startDate: 'today'
    });

    // DATETIMEPICKER
    $('.datetimepicker-from').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        locale: 'es'
    });

    $('.datetimepicker-to').datetimepicker({
        useCurrent: false,
        format: 'DD/MM/YYYY HH:mm',
        locale: 'es'
    });

    $('.datetimepicker-from').on('dp.change', function(e) {
        $('.datetimepicker-to').data('DateTimePicker').minDate(e.date);
    });

    $('.datetimepicker-to').on('dp.change', function(e) {
        $('.datetimepicker-from').data('DateTimePicker').maxDate(e.date);
    });

    // SELECT2
    $('.select2').select2({
        placeholder: 'Seleccionar opción.',
        color: '#f39c12'
    });

    $('.select2-empty').select2({
        placeholder: 'Seleccionar opción.',
        color: '#f39c12',
        allowClear: true
    });

    $('.multiple-select2').select2({
        placeholder: 'Sin opción/es seleccionada/s.',
        color: '#f39c12'
    });

    // ACTUALIZACIÓN AL SELECCIONAR IMAGEN
    $('#select-file').change(function() {
        var img = this.files[0];
        var tmppath = URL.createObjectURL(img);
        $('#show-file').fadeIn('fast').attr('src', tmppath);
    });

    // WYSIHTML5
    $('.wysihtml5').wysihtml5();

});
