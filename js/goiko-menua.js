$(document).ready(function () {

    // Albisteak
    $("#block-menu-menu-goiko-menua ul.menu li.first").mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menu_herri_zerrenda-b_deialdiak").hide();
        $("#block-views-menu_herri_zerrenda-b_bideoak").hide();
        $("#block-views-menu_herri_zerrenda-b_argazkiak").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
        $("#block-views-menu_herri_zerrenda-b_albisteak").show();
    });

    // Agenda
    $($("#block-menu-menu-goiko-menua ul.menu li")[1]).mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menu_herri_zerrenda-b_albisteak").hide();
        $("#block-views-menu_herri_zerrenda-b_bideoak").hide();
        $("#block-views-menu_herri_zerrenda-b_argazkiak").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
        $("#block-views-menu_herri_zerrenda-b_deialdiak").show();
    });

    // Bideoak
    $($("#block-menu-menu-goiko-menua ul.menu li")[2]).mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menu_herri_zerrenda-b_albisteak").hide();
        $("#block-views-menu_herri_zerrenda-b_deialdiak").hide();
        $("#block-views-menu_herri_zerrenda-b_argazkiak").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
        $("#block-views-menu_herri_zerrenda-b_bideoak").show();
    });

    // Proposamenak
    $($("#block-menu-menu-goiko-menua ul.menu li")[3]).mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menu_herri_zerrenda-b_albisteak").hide();
        $("#block-views-menu_herri_zerrenda-b_deialdiak").hide();
        $("#block-views-menu_herri_zerrenda-b_argazkiak").hide();
        $("#block-views-menu_herri_zerrenda-b_bideoak").hide();
        $("#block-panels_mini-proposamenak_menu").show();
    });

    // Argazki bildumak
    $($("#block-menu-menu-goiko-menua ul.menu li")[4]).mouseover(function() {
        $("#block-block-1").hide();
        $("#block-views-menu_herri_zerrenda-b_albisteak").hide();
        $("#block-views-menu_herri_zerrenda-b_deialdiak").hide();
        $("#block-views-menu_herri_zerrenda-b_argazkiak").show();
        $("#block-views-menu_herri_zerrenda-b_bideoak").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
    });

    showPlaceholder = function() {
        $("#block-views-menu_herri_zerrenda-b_albisteak").hide();
        $("#block-views-menu_herri_zerrenda-b_deialdiak").hide();
        $("#block-views-menu_herri_zerrenda-b_argazkiak").hide();
        $("#block-views-menu_herri_zerrenda-b_bideoak").hide();
        $("#block-panels_mini-proposamenak_menu").hide();
        $("#block-block-1").show();
    };

    // Nor gara
//    $($("#block-menu-menu-goiko-menua ul.menu li")[4]).mouseover(showPlaceholder);
    $($("#block-menu-menu-goiko-menua ul.menu li")[5]).mouseover(showPlaceholder);
    $($("#block-menu-menu-goiko-menua ul.menu li")[6]).mouseover(showPlaceholder);
    $($("#block-menu-menu-goiko-menua ul.menu li")[7]).mouseover(showPlaceholder);
    $($("#block-menu-menu-goiko-menua ul.menu li")[8]).mouseover(showPlaceholder);
    $($("#block-menu-menu-goiko-menua ul.menu li")[9]).mouseover(showPlaceholder);
    
    // Guztiak
    $("#block-menu-menu-goiko-menua ul.menu li").bind('mouseover', (function() {
        $("#block-menu-menu-goiko-menua ul.menu li").removeClass("goiko_menua_irekia");
        $(this).addClass("goiko_menua_irekia");
    }));

    // Show only some towns for news
    $("#block-views-menu_herri_zerrenda-b_deialdiak").css("overflow", "hidden");
    $("#block-views-menu_herri_zerrenda-b_deialdiak").css("height", "1.2em");
    $("#block-views-menu_herri_zerrenda-b_deialdiak").prepend("<div id='expand_herriak' style='float: right;'>[gehiago+]</div>");

    var news_status = 0;
    $("#expand_herriak").click(function() {
        if (news_status == 0) {
            news_status = 1;
            $("#block-views-menu_herri_zerrenda-b_deialdiak").css("height", "");
	    $("#expand_herriak").text("[gutxiago-]");
        } else {
            news_status = 0;
            $("#block-views-menu_herri_zerrenda-b_deialdiak").css("height", "1.2em");
	    $("#expand_herriak").text("[gehiago+]");
        }
    });

    // Show only some towns for the videos
    $("#block-views-menu_herri_zerrenda-b_bideoak").css("overflow", "hidden");
    $("#block-views-menu_herri_zerrenda-b_bideoak").css("height", "1.2em");
    $("#block-views-menu_herri_zerrenda-b_bideoak").prepend("<div id='expand_bideoak' style='float: right;'>[gehiago+]</div>");

    var bideoak_status = 0;
    $("#expand_bideoak").click(function() {
        if (bideoak_status == 0) {
            bideoak_status = 1;
            $("#block-views-menu_herri_zerrenda-b_bideoak").css("height", "");
	    $("#expand_bideoak").text("[gutxiago-]");
        } else {
            bideoak_status = 0;
            $("#block-views-menu_herri_zerrenda-b_bideoak").css("height", "1.2em");
	    $("#expand_bideoak").text("[gehiago+]");
        }
    });

    // Show only some towns for the agenda
    $("#block-views-menu_herri_zerrenda-b_albisteak").css("overflow", "hidden");
    $("#block-views-menu_herri_zerrenda-b_albisteak").css("height", "1.2em");
    $("#block-views-menu_herri_zerrenda-b_albisteak").prepend("<div id='expand_agenda' style='float: right;'>[gehiago+]</div>");

    var agenda_status = 0;
    $("#expand_agenda").click(function() {
        if (agenda_status == 0) {
            agenda_status = 1;
            $("#block-views-menu_herri_zerrenda-b_albisteak").css("height", "");
	    $("#expand_agenda").text("[gutxiago-]");
        } else {
            agenda_status = 0;
            $("#block-views-menu_herri_zerrenda-b_albisteak").css("height", "1.2em");
	    $("#expand_agenda").text("[gehiago+]");
        }
    });
   

    // Show only some towns for the photos
    $("#block-views-menu_herri_zerrenda-b_argazkiak").css("overflow", "hidden");
    $("#block-views-menu_herri_zerrenda-b_argazkiak").css("height", "1.2em");
    $("#block-views-menu_herri_zerrenda-b_argazkiak").prepend("<div id='expand_argazkiak' style='float: right;'>[gehiago+]</div>");

    var argazkiak_status = 0;
    $("#expand_argazkiak").click(function() {
        if (argazkiak_status == 0) {
            argazkiak_status = 1;
            $("#block-views-menu_herri_zerrenda-b_argazkiak").css("height", "");
            $("#expand_argazkiak").text("[gutxiago-]");
        } else {
            argazkiak_status = 0;
            $("#block-views-menu_herri_zerrenda-b_argazkiak").css("height", "1.2em");
            $("#expand_argazkiak").text("[gehiago+]");
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
