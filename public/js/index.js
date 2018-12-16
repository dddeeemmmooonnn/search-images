$(document).ready( function() {
  $("#tag-typer").keypress( function(event) {
    var key = event.which;
    if (key == 13 || key == 44){
     event.preventDefault();
     var tag = $(this).val();
      if(tag.length > 0){
        $("<span class='tag' style='display:none'><span class='close'>&times;</span>"+tag+" </span>").insertBefore(this).fadeIn(100);
        $(this).val("");
      }
    }
  });
  
  $("#tags").on("click", ".close", function() {
    $(this).parent("span").remove();
  });
  
  $(".colors li").click(function() {
    var c = $(this).css("background-color");
    $(".tag").css("background-color",c);
    $("#title").css("color",c);
  });

  $("#search-btn").click(function () {
    var query = $.map($('.tag'), function (el) { return el.innerText; });
    var postData = {
        tags: query
    };

    $.ajax({
        type: "POST",
        url: "/search",
        data: JSON.stringify(postData),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            data = data['images'];
            var memosDiv = $('#memos-images')[0];
            memosDiv.innerHTML = '';
            for (var i = 0; i < data.length; i++) {
                memosDiv.append(
                    $(`<div class="col-3 result-image mb-1" style="background-image: url(${data[i]})"></div>`)[0]
                )
            }
        },
        error: function(msg) {
            console.error(msg)
        }
    });
  });
});