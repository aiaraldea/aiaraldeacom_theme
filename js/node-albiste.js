$(document).ready(function () {
    $("body.node-type-story .node-inner .content").before($("#node_albiste_argazkiak"));
    $("body.node-type-story #node_albiste_argazkiak").css("float", "right");
});

$(document).ready(function () {
    $('#detail_content .irudi_txikia').click(function (e) {
        var b = $(this);
        $('#detail_content .irudi_nagusia img').attr('src', b.find('a').attr('href')).
            load(function () {
                $('#detail_content .irudi_nagusia .deskripzioa').
                        text(b.find('.deskripzioa').text());
            });
        return false;
    });
});