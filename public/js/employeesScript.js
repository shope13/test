$('body').on("click", ".parent", function (e) {

    const element = $(this).attr('data-id');
    const el = this;
    e.stopPropagation();
    $.ajax({
        url: "http://127.0.0.1:8000/"+element,
        type: "GET",
        dataType: "json",
        success: function (response) {
            jQuery.each(response,function (r) {
                // alert(response[r].name);
                $(el).append('<ul><li class="list-group-item"><div class="parent" data-id="'+response[r].id+'">'
                    + response[r].id+' '+response[r].name+' '+'('+response[r].post+')'+' '+ response[r].parent_id
                    +'</li></div></ul>')

            });
        }
    });
});