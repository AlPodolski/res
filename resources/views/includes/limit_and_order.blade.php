@php
 /* @var $limit string */
@endphp

<div class="sort-block">
    <div class="limit">
        <select class="metro-select" name="limit" id="limit-select" onchange="setLimit()">
            <option @if($limit == 15) selected @endif value="15">На странице 15</option>
            <option @if($limit == 30) selected @endif value="30">Анкет на странице 30</option>
            <option @if($limit == 45) selected @endif value="45">Анкет на странице 45</option>
        </select>
    </div>
</div>
