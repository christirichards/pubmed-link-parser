$("#parser").submit(function(e) {

    var url = "parser.php";

    $.ajax({
        type: "POST",
        url: url,
        data: $("#parser").serialize(),
        success: function(data) {
            $('#parser-response').fadeOut('100', function() {
                $('#parser-response').fadeIn('100').html(data);

            });
        },

    });

    e.preventDefault();
});

var $loading = $('.preloader').hide();
$(document)
    .ajaxStart(function() {
        $loading.fadeIn('3000');
    })
    .ajaxStop(function() {
        $loading.fadeOut('3000');
    });

$('button').tooltip({
    trigger: 'click',
    placement: 'bottom'
});

function setTooltip(btn, message) {
    $(btn).tooltip('hide')
        .attr('data-original-title', message)
        .tooltip('show');
}

function hideTooltip(btn) {
    setTimeout(function() {
        $(btn).tooltip('hide');
    }, 1000);
}

var clipboard = new Clipboard('.btn');

clipboard.on('success', function(e) {
    setTooltip(e.trigger, 'Copied!');
    hideTooltip(e.trigger);
});

clipboard.on('error', function(e) {
    setTooltip(e.trigger, 'Failed!');
    hideTooltip(e.trigger);
});

$(document).on("click","#titles", function () {
    $( ".title" ).toggle( "slow", function() {
        $( ".title" ).toggleClass( "no-copy" );
  });

});

$(document).on("click","#numbering", function () {
    $( ".numbering" ).toggle( "slow", function() {
        $( ".numbering").toggleClass( "no-copy" );
  });
});

$(document).on("click","#links", function () {
    $( ".link" ).toggle( "slow", function() {
        $( ".link").toggleClass( "no-copy" );
         $("br").remove();
});
});
