$(document).on('click', 'a.page-link', function (event) {
    event.preventDefault();
    ajaxLoad($(this).attr('href'));
});

$(document).on('submit', 'form#frm', function (event) {
    event.preventDefault();
    var form = $(this);
    var data = new FormData($(this)[0]);
    var url = form.attr("action");
    $.ajax({
        type: form.attr('method'),
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('.is-invalid').removeClass('is-invalid');
            if (data.fail) {
                for (control in data.errors) {
                    $('#' + control).addClass('is-invalid');
                    $('#error-' + control).html(data.errors[control]);
                }
            } else {
                ajaxLoad(data.redirect_url);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function ajaxLoad(filename, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    $('.loading').show();
    $.ajax({
        type: "GET",
        url: filename,
        contentType: false,
        success: function (data) {
            $("#" + content).html(data);
            $('.loading').hide();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function ajaxDelete(filename, token, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    $('.loading').show();
    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $("#" + content).html(data);
            $('.loading').hide();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}
function renderWorker(worker) {
    $('.boss-select').show();
    $('.boss-select').append(
      "<li class='list-group-item' data-id='" + worker.id + "'>" + worker.id + "." + " " + worker.name  + " - " + worker.post + "</li>"
    );
}
$(document).on('keyup', '#parent_id', function(e){
    console.log($(this).val());
    $.ajax({
        method: 'GET',
        url: '/search',
        data: {'query' : $(this).val()},
        success: function(result) {
            if (result.workers) {
                $('.boss-select').empty();
                result.workers.map(renderWorker)
            }
        }
    })
});
$(document).on('click', '.boss-select li', function(){
    $('.boss-select li').removeClass('active');
    $(this).addClass('active');
    $('input[name="parent_id"]').val($(this).data('id'));
    $('.boss-select').hide();
});