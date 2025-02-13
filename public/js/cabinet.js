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

function set_all_selected(){

    $(".action-check").each(function () {
        $(this).prop("checked", !$(this).prop("checked"));
    });

    toggleSelectState();

}

$("#update_tarif").change(function () {

    let selectedTarif = $(this).val(); // Получаем выбранное значение из select
    let selectedIds = []; // Массив для ID отмеченных чекбоксов

    $(".action-check:checked").each(function () {
        let postId = $(this).data("id");
        selectedIds.push($(this).data("id")); // Собираем data-id чекбоксов
        $("select[data-id='" + postId + "']").val(selectedTarif);
        $(this).prop("checked", !$(this).prop("checked"));
    });

    toggleSelectState();

    if (selectedIds.length === 0) {
        alert("Выберите хотя бы один элемент!");
        return;
    }

    // Отправка POST-запроса
    $.ajax({
        url: '/cabinet/post/update-tarif-all', // Укажи свой обработчик на сервере
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        data: {
            tarif: selectedTarif,
            ids: selectedIds
        },
        success: function (response) {
            alert("Тарифы успешно изменены  " + response);
        },
        error: function () {
            alert("Ошибка при отправке запроса.");
        }
    });
});

function toggleSelectState() {
    // Проверяем, есть ли хотя бы один отмеченный чекбокс
    let isChecked = $(".action-check:checked").length > 0;

    // Делаем select активным или неактивным
    $("#update_tarif").prop("disabled", !isChecked);
}

// Отслеживаем изменение состояния чекбоксов
$(".action-check").on("change", function () {
    toggleSelectState();
});

// Вызываем функцию при загрузке страницы (на случай предустановленных чекбоксов)
$(document).ready(function () {
    toggleSelectState();
});

function get_phone_modal() {

    var check = false;

    $(".action-check").each(function () {

        if (this.checked) {

            $('#phoneModal').modal('toggle');

            check = true;

            return false;
        }
    });

    if (!check) alert("Нужно выделить анкеты");

}

$(document).ready(function () {
    $("#posts-phone-update").mask("+7(999)99-99-999");
});

function updatePhone(object) {

    var phone = $('#posts-phone-update').val();

    let selectedIds = []; // Массив для ID отмеченных чекбоксов

    $(".action-check:checked").each(function () {
        selectedIds.push($(this).data("id")); // Собираем data-id чекбоксов
        let postId = $(this).data("id");
        $(".post-phone[data-id='" + postId + "']").text(phone);
        $(this).prop("checked", !$(this).prop("checked"));
    });

    toggleSelectState();

    $.ajax({
        type: 'POST',
        url: '/cabinet/post/update-phone',
        async:false,
        data: {
            phone: phone,
            ids: selectedIds
        },
        dataType: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        cache: false,
        success: function (data){

            $('#phoneModal').modal('toggle');

        },

    })

}

$(document).on("pointerdown", ".update_tarif:disabled", function(event) {
    alert("Нужно выделить анкеты");
    event.preventDefault();
});
