
$(document).ready(function () {
    var canonicalUrl = document.querySelector("link[rel='canonical']").getAttribute("href");
    var title = document.querySelector("meta[property='twitter:title']").getAttribute("content");
    var encodedUrl = encodeURIComponent(canonicalUrl);
    var hasWhatsapp = ((navigator.userAgent.match(/Android|iPhone/i) && !navigator.userAgent.match(/iPod|iPad/i)) ? true : false);

    $('#detail_share_links').append("<div class='facebook_share_button'><a target='_blank' href='http://www.facebook.com/sharer.php?u="+encodedUrl+"'>Facebook</a></div>");
    $('#detail_share_links').append("<div class='twitter_share_button'><a target='_blank' href='https://twitter.com/intent/tweet?text="+title+"&url="+encodedUrl+"&original_referer="+encodedUrl+"'>Twitter</a></div>");
    if (hasWhatsapp) {
        $('#detail_share_links').append("<div class='whatsapp_share_button'><a href='whatsapp://send?text="+ title + " " + canonicalUrl+"' data-action='share/whatsapp/share'>WhatsApp</a></div>");
    }
});
