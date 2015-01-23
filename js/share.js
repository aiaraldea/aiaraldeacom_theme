(function ($) {
    $(document).ready(function () {
        var linkContainer = $('#detail_share_links');
        if (linkContainer.size() > 0) {
            var canonicalUrl = document.querySelector("link[rel='canonical']").getAttribute("href");
            var title = document.querySelector("meta[property='twitter:title']").getAttribute("content");
            var encodedUrl = encodeURIComponent(canonicalUrl);
            var hasWhatsapp = ((navigator.userAgent.match(/Android|iPhone/i) && !navigator.userAgent.match(/iPod|iPad/i)) ? true : false);

            linkContainer.append("<div class='facebook_share_button'><a target='_blank' href='http://www.facebook.com/sharer.php?u=" + encodedUrl + "'>Facebook <span class='fbcount'></span></a></div>");
            linkContainer.append("<div class='twitter_share_button'><a target='_blank' href='https://twitter.com/intent/tweet?text=" + title + "&url=" + encodedUrl + "&original_referer=" + encodedUrl + "'>Twitter <span class='twcount'></span></a></div>");
            if (hasWhatsapp) {
                linkContainer.append("<div class='whatsapp_share_button'><a href='whatsapp://send?text=" + title + " " + canonicalUrl + "' data-action='share/whatsapp/share'>WhatsApp</a></div>");
            }
            $.ajax({
                url: 'http://api.facebook.com/method/links.getStats?urls=' + canonicalUrl + '&format=json',
                success: function (data) {
                    var fbTotala = data[0].total_count;
                    if (fbTotala > 0) {
                        $(".facebook_share_button .fbcount").text(fbTotala);
                        $(".facebook_share_button .fbcount").show();
                    }
                }
            });

            $.ajax({
                type: 'GET',
                dataType: 'jsonp',
                data: {},
                url: "http://cdn.api.twitter.com/1/urls/count.json?url=" + canonicalUrl + "&callback=?",
                success: function (msg) {
                    var twTotala = msg.count;
                    if (twTotala > 0) {
                        $(".twitter_share_button .twcount").text(twTotala);
                        $(".twitter_share_button .twcount").show();
                    }
                }
            });
        }
    });
})(jq1110);

