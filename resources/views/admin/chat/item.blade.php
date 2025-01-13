<div class="info">
    <div class="info-item">id - <a target="_blank" href="/admin/users/{{ $chat->user_id }}/edit">{{ $chat->user_id }}</a></div>
    <a class="info-item" target="_blank"
       href="/admin/obmenka?filters%5Buser_id%5D={{ $chat->user_id }}&sort=-id"
       >Оплаты</a>
    <div class="info-item phone-edit">
        <input type="text" name="phone" class="phone-change" placeholder="Телефон">
        <div onclick="updatePhone(this)" data-id="{{ $chat->user_id }}" class="btn btn-success">Сохранить</div>
    </div>
</div>
<div class="chat__dialog-list-wrap">
    <div class="chat__dialog-list">
        @foreach($chat->message as $item)
            <div
                class="chat__dialog-list-item @if($item->from == 0) chat__dialog-list-item--qst @else chat__dialog-list-item--ans @endif
            ">
                <div class="chat__dialog-list-item-text">
                    @if($item->related_class == \App\Models\Files::class)
                        @if(strpos($item->file->file, '.pdf'))
                            <a target="_blank" href="/storage/{{$item->file->file}}">Открыть</a>
                        @else
                            <img src="/1500-1500/thumbs/{{ $item->file->file }}" alt="">
                        @endif
                    @else
                        {{ $item->message }}
                    @endif
                </div>
                <div class="chat__dialog-list-item-date">
                    {{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}
                </div>
            </div>
        @endforeach
    </div>
</div>


<form action="#" class="chat__dialog-panel">
    <textarea id="chatMessage" name="chatMessage" class="chatMessage" placeholder="Напишите сообщение..."></textarea>
    <label for="chatFile">
        <svg>
            <use xlink:href='svg/dest/stack/sprite.svg#addFile'></use>
        </svg>
    </label>
    <div onclick="sendMessageAdmin(this)" data-id="{{ $chat->chat_id }}"
         class="btn-main">Отправить
    </div>
</form>

<div class="link-wrap">
    <div class="link" data-text="Нужна подробная квитанция" onclick="setText(this)" > Квитанция </div>
    <div class="link" data-text="Отправили запрос в платежную систему" onclick="setText(this)" > Запрос </div>
    <div class="link" data-text="Нужен чек с финальным статусом" onclick="setText(this)" > Ф. чек </div>
    <div class="link" data-text="Еще идет проверка оплаты" onclick="setText(this)" > Проверка </div>
    <div class="link" data-text="Нужна выписка по карте в формате пдф с этим платежом" onclick="setText(this)" > Выписка </div>
</div>
