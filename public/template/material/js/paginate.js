$(document).ready(function () {

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        $('.page-loader').show();
        var page = $(this).attr('href');
        fetch_data(page);
    });


});

function fetch_data(page) {
    $.ajax({
        url: page,
        success: function (data) {
            $('#my-block').html(data);
            $('.page-loader').hide();

        }
    });
}
