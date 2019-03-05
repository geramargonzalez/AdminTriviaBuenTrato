$(function() {

    $('.ajax-select2').select2({
        placeholder: 'Seleccionar opción.',
        color: '#f39c12'
    });

    $('.ajax-multiple-select2').select2({
        placeholder: 'Sin opción/es seleccionada/s.',
        color: '#f39c12'
    });

    $('.ajax-select2-empty').select2({
        placeholder: 'Seleccionar opción.',
        color: '#f39c12',
        allowClear: true,
        dropdownParent: $('#ajax-modal')
    });

    $('.ajax-select2-icons').select2({
        placeholder: 'Seleccionar opción.',
        color: '#f39c12',
        allowClear: true,
        minimumResultsForSearch: Infinity,
        templateResult: function(option) {
      			return '<i class=\'fa ' + option.text + '\'></i>';
      	},
        templateSelection: function (option) {
  	        return '<i class=\'fa ' + option.text + '\'></i>';
  	    },
        escapeMarkup: function(m) {
            return m;
  			}
    });

    // DATEPICKER
    $('.datepicker').datepicker({
        autoclose: true,
        language: 'es',
        format: 'dd/mm/yyyy',
    });

    $('.datepicker-one').datepicker({
        autoclose: true,
        language: 'es',
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });

    $('.datepicker-three').datepicker({
        autoclose: true,
        language: 'es',
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });

    $('.datepicker-one').on('changeDate', function(e) {
        $('.datepicker-two').datepicker({
            autoclose: true,
            language: 'es',
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            startDate: e.date
        });
    });

    $('.datepicker-three').on('changeDate', function(e) {
        $('.datepicker-four').datepicker({
            autoclose: true,
            language: 'es',
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            startDate: e.date
        });
    });

    // ACTUALIZACIÓN AL SELECCIONAR IMAGEN
    $('#select-file').change(function() {
        var img = this.files[0];
        var tmppath = URL.createObjectURL(img);
        $('#show-file').fadeIn('fast').attr('src', tmppath);
    });

    $('.wysihtml5').wysihtml5();

});
