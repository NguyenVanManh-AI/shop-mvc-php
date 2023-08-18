$(document).ready(function() {
  var n = 0;
  $("#image").on("change", function() {
    var previewContainer = $("#previewContainer");
    previewContainer.empty();
    var files = $(this)[0].files;
    n = files.length;

    for (var i = 0; i < files.length; i++) {
      (function(file) {
        var reader = new FileReader();
        var fileName = file.name;
        reader.onload = function(e) {
          var imgContainer = $("<div>").addClass("image-container");
          var img = $("<img>").attr("src", e.target.result);
          img.css({"max-width": "200px", "max-height": "200px"});
          imgContainer.append(img);

          var removeButton = $("<span>").addClass("remove-image").attr("name-image", fileName).html("<i class='fa-solid fa-xmark'></i>");
          imgContainer.append(removeButton);

          previewContainer.append(imgContainer);
        };
        reader.readAsDataURL(file);
      })(files[i]);
    }
  });

  $('#previewContainer').on('click', '.remove-image', function() {
    var imageName = $(this).attr('name-image');
    var hiddenInput = $("#image_remove");
    var currentValue = hiddenInput.val();

    if (currentValue === "") {
      hiddenInput.val(imageName);
    } else {
      hiddenInput.val(currentValue + '?' + imageName);
    }
    
    $(this).parent().remove();

    n = n - 1; 
    if(n==0){
        $('#image-container').hide();
        $('#image-preview').hide();
        $('#dropbox').val('').show();
        $('#cancel-btn').hide();
        $('#image').val('');
        var hiddenInput = $("#image_remove");
        hiddenInput.val('');
    }
  });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-container').css('display', 'inline-block');
            $('#image-preview').attr('src', e.target.result);
            $('#image-preview').show();
            $('#dropbox').hide();
            $('#cancel-btn').show();
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function() {
    readURL(this);
});

$("#cancel-btn").click(function() {
    $('#image-container').hide();
    $('#image-preview').hide();
    $('#dropbox').val('').show();
    $('#cancel-btn').hide();
    $('#image').val(''); 
});