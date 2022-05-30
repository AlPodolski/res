@php
 /* @var $limit string */
 /* @var $sort string */
@endphp

<div class="sort-block d-flex">
    <div class="order-block">
        Сортировать
        <select class="metro-select" name="limit" id="sort-select" onchange="setSort()">
            <option @if($sort == 'default') selected @endif value="default">Выбрать</option>
            <option @if($sort == 'price_asc') selected @endif value="price_asc">От дешевых к дорогим</option>
            <option @if($sort == 'price_desc') selected @endif value="price_desc">От дорогих к дешевым</option>
        </select>
    </div>
    <div class="limit">
        <select class="metro-select" name="limit" id="limit-select" onchange="setLimit()">
            <option @if($limit == 15) selected @endif value="15">На странице 15</option>
            <option @if($limit == 30) selected @endif value="30">На странице 30</option>
            <option @if($limit == 45) selected @endif value="45">На странице 45</option>
        </select>
    </div>
</div>
