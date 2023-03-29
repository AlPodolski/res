function deletePost (object){

    var id = $(object).attr('data-id');

    $.ajax({
        type: 'POST',
        url: '/admin/post/delete',
        data: 'id=' +id,
        async:false,
        dataType: "html",
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        success: function (data){
            $(object).closest('tr').remove();
        },

    })
}
function deleteComment (object){

    var id = $(object).attr('data-id');

    $.ajax({
        type: 'POST',
        url: '/admin/comments/delete',
        data: 'id=' +id,
        async:false,
        dataType: "html",
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        success: function (data){
            $(object).closest('tr').remove();
        },

    })
}

function checkComment(object){

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
            $(object).text('Подтверждено')
        }
    })

}
