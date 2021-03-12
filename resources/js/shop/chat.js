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
    return false;
  });
  window.Echo.channel("sweet").listen("MessageSent", e => {
    if($("#room_id").val() == e.message.room_id){
      $("#room").append('<li>' + e.message.content + '</li>');
    }
  });
});
