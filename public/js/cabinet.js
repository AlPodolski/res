function updateTarif(object) {

    var id = $(object).attr('data-id');
    var tarif_id = $(object).val();

    $.ajax({
        type: 'POST',
        url: '/cabinet/post/update-tarif',
        async:false,
        data: 'id=' + id + '&tarif_id=' + tarif_id,
        dataType: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        cache: false,
        success: function (data){

        },

    })

}
