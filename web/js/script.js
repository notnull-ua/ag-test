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
            url: '../request/upload-images',
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (respond, textStatus, jqXHR) {

                if (typeof respond.error === 'undefined') {

                    $('#post-photos').val(respond);
                    var images = respond.split('|');
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
            $.get('./request/delete-image', {name: item.attr('data-key')})
                .done(function (data) {
                    var images = $('#post-photos').val().split('|'); //get images from hidden input
                    images.splice(images.indexOf(item.attr('data-key'))); // delete image from array images
                    updatePreview(images); //update preview
                    var imageString = images.join('|');
                    $('#post-photos').val(imageString); //set new value to hidden input




                });
            alert("Delete " + item.attr('data-key'));
        }
    });

    function updatePreview(images) {
        var preview = $('.preview');
        preview.removeAttr('src');
        preview.each(function (index, value) {
            if (images.length > 0) {
                var nameImage = images.shift();
                $(this).attr('src', "images/uploads/" + nameImage)
                $(this).attr('data-key', nameImage)
            }
            else {
                $(this).removeAttr('src');
                $(this).removeAttr('data-key');
            }

        });
    }

});
