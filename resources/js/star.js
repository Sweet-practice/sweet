$(function() {
  $('#range-group').each(function() {
    for (var i = 0; i < 5; i ++) {
      $(this).append('<a>');
    }
  });
  $('#range-group>a').on('click', function() {
     var index = $(this).index();
    $(this).siblings().removeClass('on');
     for (var i = 0; i < index; i++) {
        $(this).parent().find('a').eq(i).addClass('on');
     }
    $(this).parent().find('#input-range').attr('value', index);
  });
});



$(document).on('click','.comment_btn',function(e){
  e.stopPropagation();
  sweetId = $('.sweetId').val();
  userId = $('.userId').val();
  title = $('.title').val();
  star = $('.star').val();
  content = $('.content').val();
  $.ajax({
      type: 'POST',
      url: 'sweets/' + sweetId,
      data: { shopId: shopId,
              userId: userId,
              title: title,
              star: star,
              content: content }
  }).done(function(data){
    console.log(data);
    $('#avg').html(data);
    getComment();
    $('.title').val('');
    $('.content').val('');
    $('.range-group>a').removeClass('on');
  }).fail(function(){
    console.log("XMLHttpRequest : " + XMLHttpRequest.status);
    console.log("textStatus     : " + textStatus);
    console.log("errorThrown    : " + errorThrown.message);
  });
});



function getComment(){
  $.post("../public/detailshop.php", function(data){
    if (shopId === null){
      $("#send-comment-error").text("コメントの読み込みに失敗しました。リロードしてみて下さい。");
      return false;
    }else if (title === "")
      $("#comment").text("コメントがありません。");
    else{
      $("#newtitle").html(title);
      $("#newcomment").html(content);
    }
  });
}