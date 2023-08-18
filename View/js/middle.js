var id_article = '';
$('.ajax_load_article').on('click', function() {
    id_article = $(this).data('id_article');
}); 

$(document).ready(function() {
    $(document).on("click", function(event) {
      var target = $(event.target);
      if (!target.closest(".btn_setting").length && !target.closest(".show_setting").length) {
        $(".show_setting").addClass("hidden");
      }
    });
    $(".btn_setting").on("click", function() {
      var $showSetting = $(this).next(".show_setting");
      $showSetting.toggleClass("hidden");
      $(".btn_setting").not(this).next(".show_setting").addClass("hidden");
    });
});

$(document).ready(function() {
    $(document).on("click", function(event) {
      var target = $(event.target);
      if (!target.closest(".btn_setting_cmt").length && !target.closest(".show_setting_cmt").length) {
        $(".show_setting_cmt").addClass("hidden");
      }
    });
});
$('body').on('click', '.btn_setting_cmt', function (e) {
    var $showSetting = $(this).next(".show_setting_cmt");
    $showSetting.toggleClass("hidden");
    $(".btn_setting_cmt").not(this).next(".show_setting_cmt").addClass("hidden");
});

$('body').on('click', '.li_edit_comment', function (e) {
    var str = $(this).attr('id');
    var parts = str.split('_');
    var id_comment = parts[2];
    $('#infor_comment_'+id_comment+', #form_edit_'+id_comment).toggleClass('hidden');
    $('#textarea_'+id_comment).val($('#comment_content_'+id_comment).html());
});

$('body').on('click', '.btn_cancel', function (e) {
    var str = $(this).attr('id');
    var parts = str.split('_');
    var id_comment = parts[2];
    $('#infor_comment_'+id_comment+', #form_edit_'+id_comment).toggleClass('hidden');
});

$('body').on('click', '.btn_save', function (e) {
    var str = $(this).attr('id');
    var parts = str.split('_');
    var id_comment = parts[2];
    var new_content_comment = $('#textarea_'+id_comment).val();
    $.ajax({
        url: 'Ajax.php?save_cmt=1', 
        type: 'GET',
        data: {
          id_comment: id_comment,
          new_content_comment: new_content_comment
        },
        success: function(response) {
          console.log(response);
        },
        error: function(xhr) {
          console.log(xhr.responseText);
        }
    });
    $('#comment_content_'+id_comment).html(new_content_comment);
    $('#infor_comment_'+id_comment+', #form_edit_'+id_comment).toggleClass('hidden');
});

function addComment() {
    var str = $('#number_comment_'+id_article).html();
    var number = parseInt(str); 
    number = number + 1 ; 
    $('#number_comment_'+id_article).html(number+' Comments');
}

function deleteComment() {
    var str = $('#number_comment_'+id_article).html();
    var number = parseInt(str); 
    number = number - 1 ; 
    $('#number_comment_'+id_article).html(number+' Comments');
}

$('body').on('click', '.li_delete', function (e) {
    var str = $(this).attr('id');
    var parts = str.split('_');
    var id_comment = parts[2];
    $.ajax({
        url: 'Ajax.php?delete_cmt',
        type: 'GET',
        data: {
          id_comment: id_comment
        },
        success: function(response) {
          console.log(response);
        },
        error: function(xhr) {
          console.log(xhr.responseText);
        }
    });
    deleteComment();
    $('#comment_article_'+id_comment).addClass('hidden');
});

$('body').on('keydown', '.inlineFormInputGroup', function (event) {
    if (event.which == 13) {
        event.preventDefault(); 
        var new_content_comment = $(this).val();
        console.log(id_article);
        if(id_article == ''){
          var currentURL = window.location.href;
          var params = new URLSearchParams(currentURL.split('?')[1]);
          var idArticle = params.get('id_article');
          id_article = idArticle;
          console.log(id_article);
        }
        if(new_content_comment != ''){
            $.ajax({
                url: 'Ajax.php?add_cmt',
                type: 'GET',
                data: {
                    id_article:id_article,
                    new_content_comment: new_content_comment
                },
                success: function(response) {
                    $("#list_comment_"+id_article).append(response[0].comment_element);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
            addComment();
        }
        $(this).val('');
    }
});

$('.infor_fullname').on('click', function() {
    idUser = $(this).data('id_user');
    window.location.href = "/main/personal-page/"+idUser;
}); 
