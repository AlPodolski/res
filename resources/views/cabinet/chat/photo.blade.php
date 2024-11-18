<div class="chat__dialog-list-item chat__dialog-list-item--qst">
    <div class="chat__dialog-list-item-text">
        @if(strpos($file, '.pdf'))
            <a target="_blank" href="/storage/{{$file}}">Открыть</a>
        @else
            <img src="/400-500/thumbs/{{ $file }}" alt="">
        @endif
    </div>
    <div
        class="chat__dialog-list-item-date"></div>
</div>
