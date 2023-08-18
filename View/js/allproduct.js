$(document).ready(function() {
    $('#search').on('input', function() {
        var search_text = $(this).val();
        console.log(search_text);
        $.ajax({
            url: "http://localhost/ShopPHP/Controller/ControllerProduct.php?allsearch=1", 
            type: "GET",
            data: {
                search_text: search_text
            },
            success: function(response) {
                var products = response.products;
                var table = '';
                products.forEach(function(product, index) {
                    table += `
                        <tr>
                            <th scope="row">${index + 1}</th>
                            <td class="col-1">${product.name_product}</td>
                            <td>${product.price}</td>
                            <td>
                                <div id="carouselExampleControls${product.id_product}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active imgproduct">
                                            <img class="d-block w-100" src="http://localhost/${product.urls[0]}" alt="Second slide">
                                        </div>`;
                    product.urls.forEach(function(url) {
                        table += `
                                        <div class="carousel-item imgproduct">
                                            <img class="d-block w-100" src="http://localhost/${url}" alt="Second slide">
                                        </div>`;
                    });
                    table += `
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls${product.id_product}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls${product.id_product}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </td>
                            <td>${product.name_category}</td>
                            <td>
                                ${product.description.length > 199 ? product.description.substring(0, 199) + '...' : product.description}
                            </td>
                            <td style="display: flex;justify-content: center;">
                                <a style="margin-right: 10px;" href="../Controller/ControllerProduct.php?edit=1&id_product=${product.id_product}" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <form method="POST" action="../Controller/ControllerProduct.php?delete=1&id_product=${product.id_product}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product ?');">
                                    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>`;
                });
                table += '</table>';
                $('#html_table').html(table);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});