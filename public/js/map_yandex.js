ymaps.ready(function () {
    var x = $('#map').attr('data-x');
    var y = $('#map').attr('data-y');
    init('map', x, y)
})

function init(map_name, x, y) {

    var myMap = new ymaps.Map(map_name, {
        center: [x, y],
        zoom: 13,
    });

    // Все виды меток
    // https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/option.presetStorage-docpage/


    // Собственное изображение для метки с контентом
    var placemark4 = new ymaps.Placemark([x, y], {
        // hintContent: 'Собственный значок метки с контентом',
    }, {
        // Опции.
        preset: "twirl#redClusterIcons", gridSize: 100
    });

    myMap.geoObjects.add(placemark4);
}

