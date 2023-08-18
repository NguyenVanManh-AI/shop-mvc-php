$(document).ready(function() {
    var id_user = null;
    var id_category = null;
    var name_category = null;
    $('.btn-edit').on('click', function() {
        id_user = $(this).data('id_user');
        id_category = $(this).data('id_category');
        name_category = $(this).data('name_category');

        $('#nameCategory').val(name_category);
        $('#idCategory').val(id_category);
    });

    $('#btn-save-edit').on('click', function() {
        $('#name_category_'+id_category).data('name_category') = $('#nameCategory').val();
        $('#name_category_'+id_category).html("<span style='font-weight: bold;'> #" + $('#name_category_'+id_category).data('index') +  "</span>" + $('#nameCategory').val() + "");
    });
});