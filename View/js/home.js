$(document).ready(function() {
  $('.logo_blog').on('click', function() {
    window.location.href = "/main/view";
  }); 
  var btn = $('#button');
  $('#toTop').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
    $('#dashboard_user').animate({scrollTop:0}, '300');
    $('#big_product').animate({scrollTop:0}, '300');
    $('.main_content').animate({scrollTop:0}, '300');
  });

  $('#text_search').on('input', function() {
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
            var productsHtml = '';
        
            products.forEach(function(product) {
                var carouselItems = '';
                product.urls.forEach(function(url, index) {
                    carouselItems += `
                        <div class="carousel-item imgproduct${index === 0 ? ' active' : ''}">
                            <img class="d-block w-100" src="http://localhost/${url}" alt="Slide ${index + 1}">
                        </div>`;
                });
        
                productsHtml += `
                    <div class="pr_detail">
                        <div class="pr_image">
                            <div id="carouselExampleControls${product.id_product}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    ${carouselItems}
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
                        </div>
                        <div class="pr_infor">
                            <p class="pr_price"><span><i class="fa-solid fa-coins"></i> Price </span> <span>${product.price} VNĐ</span></p>
                            <p class="pr_name"><span><i class="fa-brands fa-dropbox"></i> </span> <span>${product.name_product}</span></p>
                            <p class="pr_category"><span><i class="fa-brands fa-pinterest-p"></i> Category </span> <span>${product.name_category}</span></p>
                            <p class="pr_description">
                                ${product.description.length > 140 ? product.description.substring(0, 140) + '...' : product.description}
                                <a href="DetailProduct.php?id_product=${product.id_product}">More</a>
                            </p>
                        </div>
                    </div>`;
            });
            document.getElementById('inner_product').innerHTML = productsHtml;
        },
          error: function(xhr, status, error) {
              console.log(error);
          }
      });
  });
});