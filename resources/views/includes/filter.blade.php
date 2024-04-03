<div class="col-12">
    <div class="filter-wrap">
        <form action="/filter" class="d-flex filter-form">
            @csrf

            @if(isset($metro) and $metro->first())

                <div class="filter-item">
                    <div class="metro-select-wrap position-relative">

                        <select name="metro" id="" class="metro-select">

                            <option value="">Выберите метро</option>

                            @foreach($metro as $metroItem)

                                <option value="{{ $metroItem['id'] }}"> {{ $metroItem['value'] }}</option>

                            @endforeach

                        </select>
                    </div>
                </div>

            @endif

            <div class="filter-item">
                <div class="slider-item-text">Возраст</div>
                <div class="slider-item d-flex">
                    <div id="slider-range-age"></div>
                    <div class="d-flex filter-input-wrap">
                        <input type="text" id="age-from" class="text-left" name="age-from" readonly value="18">
                        <input type="text" id="age-to" name="age-to" class="text-right" readonly value="65">
                    </div>
                </div>
            </div>

            <div class="filter-item">
                <div class="slider-item-text">Рост</div>
                <div class="slider-item d-flex">

                    <div id="rost-range-age"></div>

                    <div class="d-flex filter-input-wrap">
                        <input type="text" id="rost-from" class="text-left" name="rost-from" readonly value="140">

                        <input type="text" id="rost-to" class="text-right" name="rost-to" readonly value="200">
                    </div>

                </div>
            </div>

            <div class="filter-item">
                <div class="slider-item-text">Вес</div>
                <div class="slider-item d-flex">

                    <div id="slider-range-ves"></div>
                    <div class="d-flex filter-input-wrap">
                        <input type="text" id="ves-from" class="text-left" name="ves-from" readonly value="40">
                        <input type="text" id="ves-to" class="text-right" name="ves-to" readonly value="120">
                    </div>

                </div>
            </div>

            <div class="filter-item">

                <div class="slider-item-text">Грудь</div>

                <div class="slider-item d-flex">
                    <div id="slider-range-grud"></div>

                    <div class="d-flex filter-input-wrap">
                        <input type="text" id="grud-from" class="text-left" name="grud-from" readonly value="0">
                        <input type="text" id="grud-to" class="text-right" name="grud-to" readonly value="9">
                    </div>
                </div>

            </div>

            <div class="filter-item">

                <div class="slider-item-text">Цена (1 час)</div>
                <div class="slider-item d-flex">
                    <div id="slider-range-price-1-hour"></div>
                    <div class="d-flex filter-input-wrap">
                        <input type="text" id="price-1-from" class="text-left" name="price-1-from" readonly
                               value="1000">
                        <input type="text" id="price-1-to" class="text-right" name="price-1-to" readonly value="100000">
                    </div>
                </div>
            </div>

            <button class="red-btn">Найти</button>

            <div class="close-panel" onclick="showFilter(this)">
                <img src="/img/close.svg" alt="">
            </div>

        </form>
    </div>
</div>

