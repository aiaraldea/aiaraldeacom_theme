$(document).ready(function () {
  $("div.view-azken-bideoak.view-display-id-block_1").before("<div id='video_name'></div>");

  // Execute this each pagination
  var reposition_video_thumbnails = function () {
    if ($("div.view-azken-bideoak.view-display-id-block_1 div.views-row:first").children(":first").siblings(":first").length) {  
      $("#video_name").empty();
      $("div.view-azken-bideoak.view-display-id-block_1 div.views-row:first").addClass("selected")
      $("div.view-azken-bideoak.view-display-id-block_1 div.views-row").each(
      function(i) {
        $(this).children(":not(:first)").wrapAll("<div id='orri_nagusiaren_bideoen_deskribapena-" + i + "'></div>");
        $("#video_name").append($(this).children(":not(:first)"));
        $("#video_name").children(":not(:first)").hide();
        $(this).children(":first").mouseover(function() {
          $(this).parent().siblings().removeClass("selected");
          $(this).parent().addClass("selected");
          $("#video_name").children().hide();
          $("#orri_nagusiaren_bideoen_deskribapena-" + i).show();
        });
      })
    }
  };

  reposition_video_thumbnails();
  $().ajaxComplete(reposition_video_thumbnails);
});