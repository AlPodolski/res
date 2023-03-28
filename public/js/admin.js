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
