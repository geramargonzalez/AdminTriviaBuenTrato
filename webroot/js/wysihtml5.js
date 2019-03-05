$(function() {

    $('[data-wysihtml5-dialog=insertImage]').remove();
    $('[data-wysihtml5-command=insertImage]').parent('li').empty().append(
        '<input class="hidden" type="file" name="wysihtml5_image" id="wysihtml5_image" />' +
        '<label for="wysihtml5_image" class="btn btn-default"><i class="glyphicon glyphicon-picture"></i></label>'
    );

    $('#wysihtml5_image').change(function() {
        var form = new FormData();
        form.append('file', this.files[0]);
        $.ajax({
            type: 'POST',
            url: '/admin/images/ajxFileUpload',
            data: form,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
                var image = new Image(200, 200);
                image.src = data;
                // $('.wysihtml5-editor').append(image);
            },
            error: function(xhr, status) {
                console.log(xhr);
            }
        });
    });

});
