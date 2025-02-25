<div class="col-12">
    <div class="filter-wrap">
        <form action="/filter" class="d-flex filter-form">
            @csrf

            @if(isset($data['metro']) and $data['metro']->first())

                <div class="filter-item">
                    <div class="metro-select-wrap position-relative">

                        <select name="metro" id="" class="metro-select">

                            <option value="">Выберите метро</option>

                            @foreach($data['metro'] as $metroItem)
                                <option
                                    @if(isset($dataSearch['metro']) and $dataSearch['metro'] and $dataSearch['metro'] == $metroItem->related_id) selected
                                    @endif
                                    value="{{ $metroItem->related_id}}"> {{ $metroItem->metro->value }}</option>

                            @endforeach

                        </select>
                    </div>
                </div>

            @endif

            <div class="filter-item custom-select position-relative">
                <select name="national_id" id="" class="metro-select">
                    <option value="">Национальность</option>
                    @foreach($data['national'] as $nationalItem)
                        <option
                            @if(isset($dataSearch['national_id']) and $dataSearch['national_id'] and $dataSearch['national_id'] == $nationalItem->related_id) selected
                            @endif
                            value="{{ $nationalItem->related_id }}">{{ $nationalItem->national->value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="filter-item">
                <div class="slider-item-text">Возраст</div>
                <div class="slider-item d-flex">
                    <div id="slider-range-age"></div>
                    <div class="d-flex filter-input-wrap">
                        <input data-value="{{ $dataSearch['age-from'] ?? 18 }}" type="text" id="age-from"
                               class="text-left" name="age-from" readonly value="18">
                        <input data-value="{{ $dataSearch['age-to'] ?? 65 }}" type="text" id="age-to" name="age-to"
                               class="text-right" readonly value="65">
                    </div>
                </div>
            </div>

            <div class="filter-item">
                <div class="slider-item-text">Вес</div>
                <div class="slider-item d-flex">

                    <div id="slider-range-ves"></div>
                    <div class="d-flex filter-input-wrap">
                        <input data-value="{{ $dataSearch['ves-from'] ?? 35 }}" type="text" id="ves-from"
                               class="text-left" name="ves-from" readonly value="40">
                        <input data-value="{{ $dataSearch['ves-to'] ?? 130 }}" type="text" id="ves-to"
                               class="text-right" name="ves-to" readonly value="120">
                    </div>

                </div>
            </div>

            <div class="filter-item">

                <div class="slider-item-text">Грудь</div>

                <div class="slider-item d-flex">
                    <div id="slider-range-grud"></div>

                    <div class="d-flex filter-input-wrap">
                        <input data-value="{{ $dataSearch['grud-from'] ?? 0 }}" type="text" id="grud-from"
                               class="text-left" name="grud-from" readonly value="0">
                        <input data-value="{{ $dataSearch['grud-to'] ?? 9 }}" type="text" id="grud-to"
                               class="text-right" name="grud-to" readonly value="9">
                    </div>
                </div>
            </div>

            <div class="filter-item">

                <div class="slider-item-text">Цена (1 час)</div>
                <div class="slider-item d-flex">
                    <div id="slider-range-price-1-hour"></div>
                    <div class="d-flex filter-input-wrap">
                        <input data-value="{{ $dataSearch['price-1-from'] ?? 1500 }}" type="text" id="price-1-from"
                               class="text-left" name="price-1-from" readonly
                               value="1000">
                        <input data-value="{{ $dataSearch['price-1-to'] ?? 25000 }}" type="text" id="price-1-to"
                               class="text-right" name="price-1-to" readonly
                               value="100000">
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

