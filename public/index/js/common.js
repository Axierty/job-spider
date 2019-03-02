$(function(){

    $('.search_input').on("click",function(){

        $(this).parent().find('.search-box').show();
    })

    $('.search_input').on("blur",function(){

        $(this).parent().find('.search-box').hide();
    })

})