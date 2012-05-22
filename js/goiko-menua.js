$(document).ready(function () {

    // Albisteak
    $("#block-menu-menu-goiko-menua ul.menu li.first").mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menuaren_herri_zerrenda-block_1").hide();
        $("#block-views-menuaren_herri_zerrenda-block_3").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
        $("#block-views-menuaren_herri_zerrenda-block_2").show();
    });

    // Agenda
    $($("#block-menu-menu-goiko-menua ul.menu li")[1]).mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menuaren_herri_zerrenda-block_2").hide();
        $("#block-views-menuaren_herri_zerrenda-block_3").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
        $("#block-views-menuaren_herri_zerrenda-block_1").show();
    });

    // Bideoak
    $($("#block-menu-menu-goiko-menua ul.menu li")[2]).mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menuaren_herri_zerrenda-block_1").hide();
        $("#block-views-menuaren_herri_zerrenda-block_2").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
        $("#block-views-menuaren_herri_zerrenda-block_3").show();
    });

    // Proposamenak
    $($("#block-menu-menu-goiko-menua ul.menu li")[4]).mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menuaren_herri_zerrenda-block_1").hide();
        $("#block-views-menuaren_herri_zerrenda-block_2").hide();
        $("#block-views-menuaren_herri_zerrenda-block_3").hide();
        $("#block-panels_mini-proposamenak_menu").show();
    });

    showPlaceholder = function() {
        $("#block-views-menuaren_herri_zerrenda-block_1").hide();
        $("#block-views-menuaren_herri_zerrenda-block_2").hide();
        $("#block-views-menuaren_herri_zerrenda-block_3").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
        $("#block-block-1").show();
    };

    // Nor gara
    $($("#block-menu-menu-goiko-menua ul.menu li")[3]).mouseover(showPlaceholder);
    $($("#block-menu-menu-goiko-menua ul.menu li")[5]).mouseover(showPlaceholder);
    $($("#block-menu-menu-goiko-menua ul.menu li")[6]).mouseover(showPlaceholder);
//    $($("#block-menu-menu-goiko-menua ul.menu li")[7]).mouseover(showPlaceholder);
//    $($("#block-menu-menu-goiko-menua ul.menu li")[8]).mouseover(showPlaceholder);
    
    // Guztiak
    $("#block-menu-menu-goiko-menua ul.menu li").bind('mouseover', (function() {
        $("#block-menu-menu-goiko-menua ul.menu li").removeClass("goiko_menua_irekia");
        $(this).addClass("goiko_menua_irekia");
    }));

    // Show only some towns for news
    $("#block-views-menuaren_herri_zerrenda-block_2").css("overflow", "hidden");
    $("#block-views-menuaren_herri_zerrenda-block_2").css("height", "1.2em");
    $("#block-views-menuaren_herri_zerrenda-block_2").prepend("<div id='expand_herriak' style='float: right;'>[gehiago+]</div>");

    var news_status = 0;
    $("#expand_herriak").click(function() {
        if (news_status == 0) {
            news_status = 1;
            $("#block-views-menuaren_herri_zerrenda-block_2").css("height", "");
	    $("#expand_herriak").text("[gutxiago-]");
        } else {
            news_status = 0;
            $("#block-views-menuaren_herri_zerrenda-block_2").css("height", "1.2em");
	    $("#expand_herriak").text("[gehiago+]");
        }
    });

    // Show only some towns for the videos
    $("#block-views-menuaren_herri_zerrenda-block_3").css("overflow", "hidden");
    $("#block-views-menuaren_herri_zerrenda-block_3").css("height", "1.2em");
    $("#block-views-menuaren_herri_zerrenda-block_3").prepend("<div id='expand_bideoak' style='float: right;'>[gehiago+]</div>");

    var bideoak_status = 0;
    $("#expand_bideoak").click(function() {
        if (bideoak_status == 0) {
            bideoak_status = 1;
            $("#block-views-menuaren_herri_zerrenda-block_3").css("height", "");
	    $("#expand_bideoak").text("[gutxiago-]");
        } else {
            bideoak_status = 0;
            $("#block-views-menuaren_herri_zerrenda-block_3").css("height", "1.2em");
	    $("#expand_bideoak").text("[gehiago+]");
        }
    });

    // Show only some towns for the agenda
    $("#block-views-menuaren_herri_zerrenda-block_1").css("overflow", "hidden");
    $("#block-views-menuaren_herri_zerrenda-block_1").css("height", "1.2em");
    $("#block-views-menuaren_herri_zerrenda-block_1").prepend("<div id='expand_agenda' style='float: right;'>[gehiago+]</div>");

    var agenda_status = 0;
    $("#expand_agenda").click(function() {
        if (agenda_status == 0) {
            agenda_status = 1;
            $("#block-views-menuaren_herri_zerrenda-block_1").css("height", "");
	    $("#expand_agenda").text("[gutxiago-]");
        } else {
            agenda_status = 0;
            $("#block-views-menuaren_herri_zerrenda-block_1").css("height", "1.2em");
	    $("#expand_agenda").text("[gehiago+]");
        }
    });
    
    $(".block-dynamic_persistent_menu ul.dynamic-persistent-menu-sub-menu").css("overflow", "hidden");
    $(".block-dynamic_persistent_menu ul.dynamic-persistent-menu-sub-menu").css("height", "1.2em");
    $(".block-dynamic_persistent_menu ul.dynamic-persistent-menu-sub-menu").each(function() {
      $(this).prepend("<div class='expand_submenu' style='float: right;'>[gehiago+]</div>");
    });
    var submenu_status = 0;
    $(".expand_submenu").click(function() {
        if (submenu_status == 0) {
            submenu_status = 1;
            $(".block-dynamic_persistent_menu ul.dynamic-persistent-menu-sub-menu").css("height", "");
	    $(".expand_submenu").text("[gutxiago-]");
        } else {
            submenu_status = 0;
            $(".block-dynamic_persistent_menu ul.dynamic-persistent-menu-sub-menu").css("height", "1.2em");
        }
    });
});
