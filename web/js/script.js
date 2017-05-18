/**
 * Created by Vladyslav on 18.05.2017.
 */

$().ready(function () {
    $('.radio').on('change','input[type="radio"]',function () {
        console.log($(this).parents('.form-group'));
        $(this).parents('.form-group').find('label').removeClass('checked');
        $(this).parent('label').addClass('checked');
    });
    // /*$('#uploadform-imagefiles').on('change',function () {
    //     event.preventDefault();
    //     var data = new FormData(this.name);
    //     $.each( this.files, function( key, value ){
    //         data.append(key, value );
    //     });
    //
    //     $.ajax({
    //         url: './request/upload-images',
    //         type: 'POST',
    //         data: data,
    //         cache: false,
    //         dataType: 'json',
    //         processData: false, // Не обрабатываем файлы (Don't process the files)
    //         contentType: false, // Так jQuery скажет серверу что это строковой запрос
    //         success: function( respond, textStatus, jqXHR ){
    //
    //             // Если все ОК
    //
    //             if( typeof respond.error === 'undefined' ){
    //                 // Файлы успешно загружены, делаем что нибудь здесь
    //
    //                 // выведем пути к загруженным файлам в блок '.ajax-respond'
    //
    //                 var files_path = respond.files;
    //                 var html = '';
    //                 $.each( files_path, function( key, val ){ html += val +'<br>'; } )
    //                 $('.ajax-respond').html( html );
    //             }
    //             else{
    //                 console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
    //             }
    //         },
    //         error: function( jqXHR, textStatus, errorThrown ){
    //             console.log('ОШИБКИ AJAX запроса: ' + textStatus );
    //         }
    //     });
    // });*/



});
