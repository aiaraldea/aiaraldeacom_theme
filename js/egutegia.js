$(document).ready(function () {
    $('div.view-egutegia td.has-events div.inner').each(function() {
        $(this).children('div.view-item-egutegia').
        wrapAll('<div class="view-egutegia-items-day"></div>')
    });

    $('div.view-egutegia-items-day').hide().
    css('position', 'absolute').
    css('width', '160px');

    $('div.view-egutegia td.has-events div.inner').mouseover(function() {
        $(this).children('div.view-egutegia-items-day').show();
    });
    $('div.view-egutegia td.has-events div.inner').mouseout(function() {
        $(this).children('div.view-egutegia-items-day').hide();
    });
});