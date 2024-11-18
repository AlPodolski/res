@extends('layouts.cabinet')

@section('title', 'Обратная связь')

@section('content')

    @include('cabinet.includes.sidebar')

    <main class="main chat col-lg-9">

        <div class="chat__dialog">


            <div class="chat__dialog-name">
                Служба поддержки
            </div>

            <div class="chat__dialog-list-wrap">


                <div class="chat__dialog-list">

                    @if($chat and $chat->message->count())

                        @foreach($chat->message as $item)

                            <div class="chat__dialog-list-item @if($item->from == auth()->user()->id) chat__dialog-list-item--qst @else chat__dialog-list-item--ans @endif
                                ">
                                <div class="chat__dialog-list-item-text">
                                    @if($item->related_class == \App\Models\Files::class)
                                        @if(strpos($item->file->file, '.pdf'))
                                            <a target="_blank" href="/storage/{{$item->file->file}}">Открыть</a>
                                        @else
                                            <img src="/400-500/thumbs/{{ $item->file->file }}" alt="">
                                        @endif
                                    @else
                                        {{ $item->message }}
                                    @endif
                                </div>
                                <div
                                    class="chat__dialog-list-item-date">{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s') }}</div>
                            </div>

                        @endforeach

                    @else

                        <div class="chat__dialog-list-item chat__dialog-list-item--ans">
                            <div class="chat__dialog-list-item-text">
                                Опишите проблему и мы ответим
                            </div>
                        </div>

                    @endif


                </div>

            </div>

            <div action="#" class="chat__dialog-panel">
                <textarea name="chatMessage" class="chatMessage" placeholder="Напишите сообщение..."></textarea>
                <form action="" id="send-message-photo-form" enctype="multipart/form-data">
                    <label for="chatFile">
                        <svg version="1.1" width="28px" height="28px" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.875 477.875"
                             style="enable-background:new 0 0 477.875 477.875;" xml:space="preserve">
<g>
    <g>
        <path fill="#D134C2 " d="M329.622,142.691c6.517-6.517,6.517-17.283,0-24.083c-6.517-6.517-17.283-6.517-24.083,0L127.322,296.825
			c-21.25,21.25-21.25,56.1,0,77.35s56.1,21.25,77.35,0l186.717-186.717c1.7-0.85,3.4-1.983,5.1-3.4
			c24.933-24.933,91.233-91.233,27.483-154.983c-24.367-24.367-53.55-33.717-84.433-26.917c-25.217,5.383-51.283,21.533-77.35,47.6
			l-202.3,202.3c-24.083,24.083-36.833,57.517-35.417,94.067c1.417,34.85,15.867,68.85,39.95,92.933s57.517,37.967,92.083,38.817
			c0.85,0,1.7,0,2.833,0c34.567,0,66.3-13.033,89.817-36.55l199.467-199.467c6.517-6.517,6.517-17.283,0-24.083
			c-6.517-6.517-17.283-6.517-24.083,0L225.072,417.241c-17.567,17.567-41.65,26.917-68,26.633
			c-25.783-0.567-50.717-11.05-68.567-28.9c-38.25-38.25-40.233-103.133-4.533-138.833l202.3-202.3
			c20.967-20.967,41.933-34.283,60.35-38.25c19.55-4.25,37.117,1.417,53.267,17.85c15.867,15.867,20.4,30.6,14.733,48.45
			c-3.967,12.75-13.033,26.917-28.333,43.917c-1.133,0.85-2.55,1.7-3.4,2.55L180.872,350.375c-7.933,7.933-21.25,7.933-29.183,0
			c-7.933-7.933-7.933-21.25,0-29.183L329.622,142.691z"></path>
    </g>
</g>
</svg>
                    </label>
                    <input onchange="send_photo()" type="file" name="chatFile" id="chatFile" accept=".jpg, .jpeg, .pdf">
                </form>

                <div onclick="sendMessage(this)"
                     class="btn-main">Отправить
                </div>
            </div>
        </div>

    </main>

@endsection
