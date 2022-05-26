arrowTop.onclick = function() {
    window.scrollTo(pageXOffset, 0);
    // после scrollTo возникнет событие "scroll", так что стрелка автоматически скроется
};

window.addEventListener('scroll', function() {
    arrowTop.hidden = (pageYOffset < document.documentElement.clientHeight);
});
function showPanel(object) {
    $('.' + $(object).attr('data-target')).addClass('is-show')
    $(".header-overlay").addClass("is-show");
    $(".side-panel").css("visibility", "");
}

function closePanel(object) {
    $(object).closest('.side-panel').removeClass('is-show');
    $(".header-overlay").removeClass("is-show");
}

function showFilter(){

}

function showSearchForm(object){

    let window_w = $(window).width();
    let search_block = $(object).parents(".header__search");
    let search_form = search_block.find(".header__search-form");
    let search_field_width = 250;

    if (window_w > 1024) {
        search_field_width = window_w - (window_w - $(object).offset().left) - 550;
    }
    else {
        search_field_width = $('.nav-container').innerWidth() - 100;
        console.log(search_field_width);
    }

    if (search_block.is(".is-show")) {
        search_block.removeClass("is-show");
        $('.top-nav').find(".logo").removeClass("is-hide");
    } else {
        search_form.css("width", search_field_width)
        $('.top-nav').find(".logo").addClass("is-hide");
        search_block.addClass("is-show");

        setTimeout(function() {
            search_block.find(".header__search-field").focus();
        }, 50);
    }

}
function show_phone(object){
    $(object).text($(object).attr('data-tel'));
}

function getMorePost(){

    var id = '';
    var rayon = '';
    var price = '';

    $('[data-id]').each(function() {
        id = id + $(this).attr('data-id') + ',';
    });

    rayon = $('.post-content').attr('data-rayon-id');
    price = $('.post-content').attr('data-price');

    $.ajax({
        type: 'POST',
        url: '/post/more',
        data: 'id=' +id + '&rayon=' + rayon + '&price=' + price,
        async:false,
        dataType: "html",
        cache: false,
        success: function (data){

            if(data !== ''){

                $('.post-wrap').append(data);
                phone_mask();

            }else{

                $('.get-more-post-btn').remove();

            }

            // window.history.pushState("object or string", "Title", "/page-2");

        },

    })

}

function getMorePosts(object){

    var url = $(object).attr('data-url');

    $.ajax({
        type: 'POST',
        url: url, //Путь к обработчику
        response: 'text',
        dataType: "html",
        cache: false,
        success: function (data) {

            data = JSON.parse(data)

            if (data){

                window.history.pushState('', document.title, url);

                if (data.posts) $('.posts').append(data.posts);

                if (data.next_page) $(object).attr('data-url',data.next_page);
                else $(object).remove();

            }

        }
    })

}

$(document).ready(function() {

    phone_mask();

});

function phone_mask(){

    if ($('.request-call-form').length > 0) {
        $(".request-call-input").mask("+7(999)99-99-999");
    }

}
