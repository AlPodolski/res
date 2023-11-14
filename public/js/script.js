$(document).scroll(function () {

    if ($('.ya-share2').length > 0){
        $.getScript("https://yastatic.net/share2/share.js", function (data, textStatus, jqxhr) {

        });
    }

    if (document.getElementById('lightbox-script') !== null){

        $.getScript("/js/lightbox.min.js", function (data, textStatus, jqxhr) {
            $("head").prepend('<link href="/css/lightbox.min.css" rel="stylesheet">');
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true
            })
        });

        $('#lightbox-script').remove();

    }

});

$(document).ready(function(){
    setTimeout(afterDelay, 250);
})

function upPost(object) {

    var id = $(object).attr('data-id');

    $.ajax({
        type: 'POST',
        url: '/cabinet/post/up',
        async:false,
        data: 'id=' + id,
        dataType: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        cache: false,
        success: function (data){

            $(object).html(data);

        },

    })

}

function afterDelay() {
    $('.chat__dialog-list-wrap').scrollTop($('.chat__dialog-list-wrap').height() + 99999999);
}

$(document).ready(function () {

    $.getScript("/js/nouislider.js", function (data, textStatus, jqxhr) {
        $("head").prepend('<link href="/css/nouislider.min.css" rel="stylesheet">');
        filter();
    });

    if (document.getElementById('lightbox-script') !== null){

        $.getScript("/js/jquery.maskedinput.js", function (data, textStatus, jqxhr) {
            phone_mask();
        });

    }

});

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
    $( ".filter-wrap" ).toggleClass( "show-filter" )
}

function setLimit(){

    var redirectUrl = location.pathname;

    if ($('#limit-select').val()) {

        document.cookie =  'post_limit=' + $('#limit-select').val();

    }

    window.location.href = redirectUrl;

}

function publication(object){

    var id = $(object).attr('data-id');

    $.ajax({
        type: 'POST',
        url: '/cabinet/post/publication',
        data: 'id=' +id,
        async:false,
        dataType: "html",
        cache: false,
        success: function (data){

            $(object).html(data);

        },

    })

}

function setSort(){

    if ($('#sort-select').val()) {

        document.cookie =  'sort=' + $('#sort-select').val();

    }

    window.location.href = location.pathname;

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

    var phone = $(object).attr('data-tel');

    var id = $(object).attr('data-id');
    var city = $(object).attr('data-city');

    if (phone){

        window.location.href = 'tel:+' + phone;

        return false;

    }else{

        $.ajax({
            type: 'POST',
            url: '/view/phone',
            data: 'id=' +id + '&city=' + city,
            async:false,
            dataType: "html",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            },
            success: function (data){
                $(object).text(data);
                $(object).attr('data-tel', data);
                window.location.href = 'tel:+' + data;
            },

        })

    }

}

function like(object){

    var type = $(object).attr('data-type');
    var id = $(object).attr('data-id');

    if (!$(object).hasClass('selected')){

        $.ajax({
            type: 'POST',
            url: '/like',
            data: 'id=' +id + '&type=' + type,
            async:false,
            dataType: "html",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            },
            success: function (data){

                $(object).siblings('.like-count').html(data)

            },

        })

    }

    if (type == 'like'){

        $(object).siblings('.dislike').removeClass('selected')
        $(object).addClass('selected')

    }else{

        $(object).siblings('.like').removeClass('selected')
        $(object).addClass('selected')

    }

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

function check(object){

    var id = $(object).attr('data-id');
    var url = $(object).attr('data-url');

    $.ajax({
        type: 'POST',
        url: url, //Путь к обработчику
        response: 'text',
        data: 'id=' +id ,
        dataType: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        cache: false,
        success: function (data) {
            $(object).html('Подтверждено')
        }
    })

}

function sendMessage(object){

    var message = $('.chatMessage').val()

    $.ajax({
        type: 'POST',
        url: '/cabinet/chat',
        async:false,
        data: 'message=' + message,
        dataType: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        cache: false,
        success: function (data){

            $('.chatMessage').val('')

            addMessage(data);

        },

    })
}

function addMessage(text){

    var message = '<div class="chat__dialog-list-item chat__dialog-list-item--qst">\n' +
        '                    <div class="chat__dialog-list-item-text">\n' +
        text +
        '                    </div>\n' +
        '                </div>';

    $('.chat__dialog-list').append(message);

    $('.chat__dialog-list-wrap').scrollTop($('.chat__dialog-list-wrap').height() + 99999999);

}

function send_photo(){

    var formData = new FormData($("#send-message-photo-form")[0]);

    var tmp = this;

    $.ajax({
        url: '/cabinet/chat/file',
        type: 'POST',
        data: formData,
        datatype: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        // async: false,
        beforeSend: function () {
            $(this).siblings('label').text('Загрузка');
        },
        success: function (data) {

            $('.chat__dialog-list').append(data);

            $('.chat__dialog-list-wrap').scrollTop($('.chat__dialog-list-wrap').height() + 99999999);

            setTimeout(afterDelay, 200);

        },

        complete: function () {
            // success alerts
        },

        error: function (data) {
            alert("There may a error on uploading. Try again later");
        },
        cache: false,
        contentType: false,
        processData: false
    });

}

$(document).ready(function(){
    setTimeout(afterDelay, 250);
})

function afterDelay() {
    $('.chat__dialog-list-wrap').scrollTop($('.chat__dialog-list-wrap').height() + 99999999);
}

function getMorePosts(object){

    var url = $(object).attr('data-url');

    $.ajax({
        type: 'POST',
        url: url, //Путь к обработчику
        response: 'text',
        dataType: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
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

function filter() {

    var slider = document.getElementById('slider-range-age');

    noUiSlider.create(slider, {
        start: [18, 65],
        connect: true,
        step: 1,
        format: wNumb({
            decimals: 0
        }),
        range: {
            'min': 18,
            'max': 65
        }
    });

    slider.noUiSlider.on('update', function (values, handle) {
        console.log(values);
        var age_from = document.getElementById('age-from')
        var age_to = document.getElementById('age-to')
        age_from.value = values[0];
        age_to.value = values[1];
    });

    var sliderAge = document.getElementById('rost-range-age');

    noUiSlider.create(sliderAge, {
        start: [150, 200],
        connect: true,
        step: 1,
        format: wNumb({
            decimals: 0
        }),
        range: {
            'min': 150,
            'max': 200
        }
    });

    sliderAge.noUiSlider.on('update', function (values, handle) {
        console.log(values);
        var age_from = document.getElementById('rost-from')
        var age_to = document.getElementById('rost-to')
        age_from.value = values[0];
        age_to.value = values[1];
    });

    var sliderVes = document.getElementById('slider-range-ves');

    noUiSlider.create(sliderVes, {
        start: [35, 130],
        connect: true,
        step: 1,
        format: wNumb({
            decimals: 0
        }),
        range: {
            'min': 35,
            'max': 130
        }
    });

    sliderVes.noUiSlider.on('update', function (values, handle) {
        console.log(values);
        var age_from = document.getElementById('ves-from')
        var age_to = document.getElementById('ves-to')
        age_from.value = values[0];
        age_to.value = values[1];
    });

    var sliderGrud = document.getElementById('slider-range-grud');

    noUiSlider.create(sliderGrud, {
        start: [0, 9],
        connect: true,
        step: 1,
        format: wNumb({
            decimals: 0
        }),
        range: {
            'min': 0,
            'max': 9
        }
    });

    sliderGrud.noUiSlider.on('update', function (values, handle) {
        console.log(values);
        var age_from = document.getElementById('grud-from')
        var age_to = document.getElementById('grud-to')
        age_from.value = values[0];
        age_to.value = values[1];
    });

    var sliderPrice = document.getElementById('slider-range-price-1-hour');

    noUiSlider.create(sliderPrice, {
        start: [1500, 25000],
        connect: true,
        step: 1,
        format: wNumb({
            decimals: 0
        }),
        range: {
            'min': 1500,
            'max': 25000
        }
    });

    sliderPrice.noUiSlider.on('update', function (values, handle) {
        console.log(values);
        var age_from = document.getElementById('price-1-from')
        var age_to = document.getElementById('price-1-to')
        age_from.value = values[0];
        age_to.value = values[1];
    });

}

function phone_mask(){

    if ($('.request-call-form').length > 0) {
        $(".request-call-input").mask("+7(999)99-99-999");
    }

    if ($('#phone').length > 0) {
        $("#phone").mask("+7(999)99-99-999");
    }

}

function sendDeleteForm(object){

    if( !confirm('Удалить анкету?') )
        event.preventDefault();

        return true;

}

function publication(object){

    var id = $(object).attr('data-id');

    $.ajax({
        type: 'POST',
        url: '/cabinet/post/publication',
        data: 'id=' +id,
        async:false,
        dataType: "html",
        cache: false,
        success: function (data){

            $(object).html(data);

        },

    })

}

!function (e) {
    e.extend({
        uploadPreview: function (l) {
            var i = e.extend({
                input_field: "#addpost-image",
                preview_box: ".img-label",
                label_field: ".img-label",
                label_default: "Choose File",
                label_selected: "Change File",
                no_label: !1,
                success_callback: null
            }, l);
            return window.File && window.FileList && window.FileReader ? void (void 0 !== e(i.input_field) && null !== e(i.input_field) && e(i.input_field).change(function () {
                var l = this.files;
                if (l.length > 0) {
                    var a = l[0], o = new FileReader;
                    o.addEventListener("load", function (l) {
                        var o = l.target;
                        a.type.match("image") ? (e(i.preview_box).css("background-image", "url(" + o.result + ")"), e(i.preview_box).css("background-size", "cover"), e(i.preview_box).css("background-position", "center center")) : a.type.match("audio") ? e(i.preview_box).html("<audio controls><source src='" + o.result + "' type='" + a.type + "' />Your browser does not support the audio element.</audio>") : alert("This file type is not supported yet.")
                    }), 0 == i.no_label && e(i.label_field).html(i.label_selected), o.readAsDataURL(a), i.success_callback && i.success_callback()
                } else 0 == i.no_label && e(i.label_field).html(i.label_default), e(i.preview_box).css("background-image", "none"), e(i.preview_box + " audio").remove()
            })) : (alert("You need a browser with file reader support, to use this form properly."), !1);
            var fileField = document.getElementById('cabinet-main-img');
            fileField.remove();
            var cabinetLabel = document.getElementById('cabinet-main-img-label');
            cabinetLabel.classList.remove('exist-img');
        }
    })
}(jQuery);
$(document).ready(function() {
    $.uploadPreview({
        input_field: "#addpost-image",   // Default: .image-upload
        preview_box: "#cabinet-main-img-label",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Загрузить основное фото",   // Default: Choose File
        label_selected: "Загрузить основное фото",  // Default: Change File
        no_label: false                 // Default: false
    });
});

var fileField = document.getElementById('addpost-photo');
var preview = document.getElementById('preview');
fileField.addEventListener('change', function(event) {
    preview.innerHTML = '';
    for(var x = 0; x < event.target.files.length; x++) {
        (function(i) {
            var reader = new FileReader();
            var img = document.createElement('img');
            reader.onload = function(event) {
                img.setAttribute('src', event.target.result);
                img.setAttribute('class', 'preview post-photo-item');

                preview.appendChild(img);
            }
            reader.readAsDataURL(event.target.files[x]);
        })(x);
    }
}, false);
