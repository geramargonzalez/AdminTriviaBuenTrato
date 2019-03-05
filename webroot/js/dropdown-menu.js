$(function() {

    $('.dropdown-menu-element').click(function() {
        var type = $(this).data('type');
        var action = type != 2 ? '/alumni/articles' : '/alumni/events';
        $('#header-icon').removeClass().addClass($(this).find('i').attr('class'));
        $('#header-search').attr('placeholder', $(this).data('text'));
        $('#header-form').attr('action', action);
        $('#header-type').val(type);
    });

});
