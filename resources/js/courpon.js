$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  });
  $("#get").click(function() {
    $.ajax({
        type: 'POST',
        url: '/courpon',
        data: { courponId: $('#courpon_id').val(),
              }
    }).done(function(data){
      console.log(data);
      $('.getCourpon').empty();
    }).fail(function(){
      console.log("XMLHttpRequest : " + XMLHttpRequest.status);
      console.log("textStatus     : " + textStatus);
      console.log("errorThrown    : " + errorThrown.message);
    });
  });
});