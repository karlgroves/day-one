jQuery(document).ready(function ($) {
    // Code here will be executed on document ready. Use $ as normal.

    // remove the meta generator, for security reasons
    $('meta[name=generator]').remove();

    // fix cases where blog post photos have title attributes but not alt attributes
    // this is caused by WP making authors think only title is required
    $('img[title]').not(':has([alt])').each(function () {
        let tehTitle = $(this).attr('title');
        $(this).attr('alt', tehTitle).removeAttr('title');
    });

    // remove the title attribute off of everything else
    // because WP vomits title attributes everywhere
    $('body *[title]').removeAttr('title');

    // if a table summary is empty, just remove it
    $('table[summary]').each(function () {
        if ($(this).empty()) {
            $(this).removeAttr('summary');
        }
    });

    $.fn.addOffScrn = function (text) {
        return $('<span class="offscrn">' + text + '</span>');
    };
});
