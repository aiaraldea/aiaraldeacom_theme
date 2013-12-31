$(document).ready(function () {  
  $('.mejs-container').css("width: 200px; height: 30px;");
  $('.view-irratia-feeds .views-field-description-1 p').children('audio').each(function() {
      $(this).prependTo($(this).parents('.field-content'));
  });
  $('.view-irratia-feeds p').remove();
  $('.view-irratia-feeds ul').remove();
  $('.view-irratia-feeds script').remove();
  $('.view-irratia-feeds object').remove();
});
