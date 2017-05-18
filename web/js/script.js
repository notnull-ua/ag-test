/**
 * Created by Vladyslav on 18.05.2017.
 */

$().ready(function () {
    $('.radio').on('change','input[type="radio"]',function () {
        console.log($(this).parents('.form-group'));
        $(this).parents('.form-group').find('label').removeClass('checked');
        $(this).parent('label').addClass('checked');
    });
});
