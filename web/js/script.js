/**
 * Created by Vladyslav on 18.05.2017.
 */

$().ready(function () {
    $('.radio').on('change', 'input[type="radio"]', function () {
        $(this).parents('.form-group').find('label').removeClass('checked');
        $(this).parent('label').addClass('checked');
    });
    console.log($('form'));
    $('.select-image').on('change', function () {
        event.preventDefault();
        var data = new FormData($(this).parents('form')[0]);
        $.ajax({
            url: './request/upload-images',
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (respond, textStatus, jqXHR) {

                if (typeof respond.error === 'undefined') {

                    $('#post-photos').val(respond);
                    var images = JSON.parse(respond);
                    updatePreview(images);

                }
                else {
                    console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('ОШИБКИ AJAX запроса: ' + textStatus);
            }
        });
    });

    $('.gallery').on('click', '.preview', function () {
        var item = $(this);
        if (item.attr('data-key') != undefined) {
            $.get('./request/delete-image', {id: item.attr('data-key')})
                .done(function (data) {
                    var images = JSON.parse($('#post-photos').val()); //get images from hidden input
                    delete images[item.attr('data-key')]; // delete image from array images
                    updatePreview(images); //update preview
                    var imageArray = JSON.stringify(images);
                    $('#post-photos').val(imageArray); //set new value to hidden input




                });
        }
    });

    function updatePreview(images) {
        var preview = $('.preview');
        preview.removeAttr('src');
        preview.each(function (index, value) {
            console.log(Object.keys(images).length);
            if (Object.keys(images).length > 0) {
                var imageValue = images[Object.keys(images)[0]]; //get first property
                var imageKey = Object.keys(images)[0];
                delete images[imageKey];

                $(this).attr('src', "images/uploads/" + imageValue);
                $(this).attr('data-key', imageKey);
            }
            else {
                $(this).removeAttr('src');
                $(this).removeAttr('data-key');
            }

        });
    }

});
