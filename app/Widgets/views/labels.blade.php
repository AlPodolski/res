@php
    /* @var $labelList  array */
@endphp

@if(!empty($labelList))

    @foreach($labelList as $value)
        <a class="filter-label" href="{{ $value['url'] }}">{{ $value['value'] }}</a>
    @endforeach

@endif
