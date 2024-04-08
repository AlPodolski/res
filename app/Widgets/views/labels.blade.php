@php
    /* @var $labelList  array */
@endphp

@if(!empty($labelList))

    <div class="filter-label-wrap">
        @foreach($labelList as $value)
            <a class="filter-label" href="{{ $value['url'] }}"><img src="/images/plus.svg" alt=""> {{ $value['value'] }}</a>
        @endforeach
    </div>

@endif
