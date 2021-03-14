$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  });
  $("#btn_send").click(function() {
    const url = "/shop/messages";
    $.ajax({
      url: url,
      data: {
        content: $("#content").val(),
        room_id: $("#room_id").val(),
        user_id: $("#user_id").val(),
      },
      method: "POST"
    });
    $("#content").val("");
    return false;
  });
  window.Echo.channel("sweet").listen("MessageSent", e => {
    if($("#room_id").val() == e.message.room_id){
      if(e.message.shop_id){
        $('.talk').append('<div class="row offset-8 talk_right"><p>' + e.message.content + '</p></div>');
      }
      else if(e.message.user_id){
        $('.talk').append('<div class="row offset-8 talk_left"><p>' + e.message.content + '</p></div>');
      }
    }
  });
});
