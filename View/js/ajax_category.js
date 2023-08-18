$(document).ready(function() {
    $('#search').on('input', function() {
        var search_text = $(this).val();
        console.log(search_text);
        $.ajax({
            url: "http://localhost/ShopPHP/Controller/ControllerCategory.php?allsearch=1", 
            type: "GET",
            data: {
                search_text: search_text
            },
            success: function(response) {
                var categories = response.categories;
                var categoryHtml = '';
                categories.forEach(function(category, index) {
                    categoryHtml += `
                        <div class="item-category">
                            <div class="name"><span style="font-weight: bold;"> #${index + 1} </span>${category.name}</div>
                            <div class="gr">
                                <button data-id_user='${category.id_user}' data-name_category='${category.name}' data-id_category='${category.id}' data-toggle="modal" type="button" class="btn btn-outline-primary btn-edit"  data-toggle="modal" data-target="#exampleModalEdit"><i class="fa-solid fa-pencil"></i> Edit</button>
                                <form method="POST" action="../Controller/ControllerCategory.php?delete=1&id_category=${category.id}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category ?');">
                                    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>`;
                });
                document.getElementById('html_category').innerHTML = categoryHtml;
            },            
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });

    $(document).on('click', '.btn-edit', function() {
        id_user = $(this).data('id_user');
        id_category = $(this).data('id_category');
        name_category = $(this).data('name_category');
        $('#nameCategory').val(name_category);
        $('#idCategory').val(id_category);
    });

    $(document).on('click', '#btn-save-edit', function() {
        console.log(id_user, id_category, name_category);
        console.log($('#nameCategory').val());

        $('#name_category_' + id_category).data('name_category', $('#nameCategory').val());
        $('#name_category_' + id_category).html("<span style='font-weight: bold;'> #" + $('#name_category_' + id_category).data('index') +  "</span>" + $('#nameCategory').val() + "");
    });

});