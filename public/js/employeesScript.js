$(document).ready(function () {
    $('body').on("click", ".parent", function (e) {
    const element = $(this).attr('data-id');
    const el = this;
    e.stopPropagation();
    $.ajax({
        url: "http://127.0.0.1:8000/"+element,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (!$(el).hasClass('clicked')) {
                $(el).addClass('clicked');
                jQuery.each(response, function (r) {
                    $(el).append('<ul class="list-group"><li class="list-group-item"><div class="parent" data-id="' + response[r].id + '">'
                        + ' ' + response[r].name + ' ' + '(' + response[r].post + ')'
                        + '</li></div></ul>')
                });
            }
            else {
                $(el).removeClass('clicked');
                $(el).children().remove();
            }
        }

    });
});
});
