@php
    /* @var $post \App\Models\Post */
use App\Actions\Like;
@endphp
<div id="lightbox-script" data-script="/js/lightbox.min.js"></div>
<div class="post-content" data-price="{{ $post->price }}" data-id="{{ $post->id }}"
     data-rayon-id="{{ $post->rayon->rayon->id ?? '' }}">
    <div class="left">
        <picture>
            <source srcset="/370-526/thumbs{{str_replace('.jpg', '.webp', $post->photo)}}"
                    media="(max-width: 400px)" type="image/webp">
            <source srcset="/370-526/thumbs{{$post->photo}}"
                    media="(max-width: 400px)" type="image/jpeg">

            <source srcset="/521-741/thumbs{{str_replace('.jpg', '.webp', $post->photo)}}" type="image/webp">
            <source srcset="/521-741/thumbs{{$post->photo}}" type="image/jpeg">

            <img title="Проститутка {{ $post->name }}" srcset="/521-741/thumbs{{$post->photo}}"
                 alt="{{ $post->name }}">
        </picture>
    </div>
    <div class="right">
        <h1>{{ $post->name }}</h1>
        <div class="likes-wrap d-flex">
            <div class="like
        @if(Like::isLike($post->id))
        selected
        @endif
        " onclick="like(this)" data-type="like" data-id="{{ $post->id }}">
                <svg fill="#000000" height="25px" width="25px" version="1.1" id="Capa_1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 512 512" xml:space="preserve">
<g>
    <path d="M498.323,297.032c0-7.992-1.901-15.683-5.553-22.635c12.034-9.18,19.23-23.438,19.23-38.914
		c0-27.037-21.996-49.032-49.032-49.032H330.206c11.434-29.24,17.665-64.728,17.665-101.419c0-23.266-18.928-42.194-42.194-42.194
		s-42.193,18.928-42.193,42.194c0,83.161-58.012,145.389-144.355,154.844c-0.592,0.065-1.159,0.197-1.7,0.38
		C111.752,235.129,104.235,232,96,232H32c-17.645,0-32,14.355-32,32v152c0,17.645,14.355,32,32,32h64
		c9.763,0,18.513-4.4,24.388-11.315c20.473,2.987,33.744,9.534,46.568,15.882c16.484,8.158,33.53,16.595,63.496,16.595h191.484
		c27.037,0,49.032-21.996,49.032-49.032c0-7.991-1.901-15.683-5.553-22.635c12.034-9.18,19.23-23.438,19.23-38.914
		c0-7.991-1.901-15.683-5.553-22.635C491.126,326.766,498.323,312.507,498.323,297.032z M465.561,325.727H452c-4.418,0-8,3.582-8,8
		s3.582,8,8,8h11.958c3.061,5.1,4.687,10.847,4.687,16.854c0,12.106-6.56,23.096-17.163,28.919h-14.548c-4.418,0-8,3.582-8,8
		s3.582,8,8,8h13.481c2.973,5.044,4.553,10.71,4.553,16.629c0,18.214-14.818,33.032-33.032,33.032H230.452
		c-26.223,0-40.207-6.921-56.398-14.935c-12.358-6.117-26.235-12.961-46.56-16.594c0.326-1.83,0.506-3.71,0.506-5.632V295
		c0-4.418-3.582-8-8-8s-8,3.582-8,8v121c0,8.822-7.178,16-16,16H32c-8.822,0-16-7.178-16-16V264c0-8.822,7.178-16,16-16h64
		c8.822,0,16,7.178,16,16c0,4.418,3.582,8,8,8s8-3.582,8-8c0-3.105-0.453-6.105-1.282-8.947
		c44.778-6.106,82.817-25.325,110.284-55.813c27.395-30.408,42.481-70.967,42.481-114.208c0-14.443,11.75-26.194,26.193-26.194
		c14.443,0,26.194,11.75,26.194,26.194c0,39.305-7.464,76.964-21.018,106.04c-1.867,4.004-0.134,8.764,3.871,10.631
		c1.304,0.608,2.687,0.828,4.025,0.719c0.201,0.015,0.401,0.031,0.605,0.031h143.613c18.214,0,33.032,14.818,33.032,33.032
		c0,11.798-6.228,22.539-16.359,28.469h-14.975c-4.418,0-8,3.582-8,8s3.582,8,8,8h12.835c3.149,5.155,4.822,10.984,4.822,17.079
		C482.323,308.985,475.927,319.848,465.561,325.727z"/>
    <path
        d="M422.384,325.727h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S426.802,325.727,422.384,325.727z"/>
    <path
        d="M436.934,263.953h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S441.352,263.953,436.934,263.953z"/>
    <path
        d="M407.833,387.5h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S412.252,387.5,407.833,387.5z"/>
    <path d="M80,264c-8.822,0-16,7.178-16,16s7.178,16,16,16s16-7.178,16-16S88.822,264,80,264z"/>
</g>
</svg>
            </div>
            <div class="like-count">{{ $post->likes }}</div>
            <div onclick="like(this)" data-type="dislike"
                 data-id="{{ $post->id }}" class="dislike
             @if(Like::isDislike($post->id))
            selected
            @endif
             ">
                <svg fill="#000000" height="25px" width="25px" version="1.1" id="Capa_1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 512 512" xml:space="preserve">
<g>
    <path d="M498.323,297.032c0-7.992-1.901-15.683-5.553-22.635c12.034-9.18,19.23-23.438,19.23-38.914
		c0-27.037-21.996-49.032-49.032-49.032H330.206c11.434-29.24,17.665-64.728,17.665-101.419c0-23.266-18.928-42.194-42.194-42.194
		s-42.193,18.928-42.193,42.194c0,83.161-58.012,145.389-144.355,154.844c-0.592,0.065-1.159,0.197-1.7,0.38
		C111.752,235.129,104.235,232,96,232H32c-17.645,0-32,14.355-32,32v152c0,17.645,14.355,32,32,32h64
		c9.763,0,18.513-4.4,24.388-11.315c20.473,2.987,33.744,9.534,46.568,15.882c16.484,8.158,33.53,16.595,63.496,16.595h191.484
		c27.037,0,49.032-21.996,49.032-49.032c0-7.991-1.901-15.683-5.553-22.635c12.034-9.18,19.23-23.438,19.23-38.914
		c0-7.991-1.901-15.683-5.553-22.635C491.126,326.766,498.323,312.507,498.323,297.032z M465.561,325.727H452c-4.418,0-8,3.582-8,8
		s3.582,8,8,8h11.958c3.061,5.1,4.687,10.847,4.687,16.854c0,12.106-6.56,23.096-17.163,28.919h-14.548c-4.418,0-8,3.582-8,8
		s3.582,8,8,8h13.481c2.973,5.044,4.553,10.71,4.553,16.629c0,18.214-14.818,33.032-33.032,33.032H230.452
		c-26.223,0-40.207-6.921-56.398-14.935c-12.358-6.117-26.235-12.961-46.56-16.594c0.326-1.83,0.506-3.71,0.506-5.632V295
		c0-4.418-3.582-8-8-8s-8,3.582-8,8v121c0,8.822-7.178,16-16,16H32c-8.822,0-16-7.178-16-16V264c0-8.822,7.178-16,16-16h64
		c8.822,0,16,7.178,16,16c0,4.418,3.582,8,8,8s8-3.582,8-8c0-3.105-0.453-6.105-1.282-8.947
		c44.778-6.106,82.817-25.325,110.284-55.813c27.395-30.408,42.481-70.967,42.481-114.208c0-14.443,11.75-26.194,26.193-26.194
		c14.443,0,26.194,11.75,26.194,26.194c0,39.305-7.464,76.964-21.018,106.04c-1.867,4.004-0.134,8.764,3.871,10.631
		c1.304,0.608,2.687,0.828,4.025,0.719c0.201,0.015,0.401,0.031,0.605,0.031h143.613c18.214,0,33.032,14.818,33.032,33.032
		c0,11.798-6.228,22.539-16.359,28.469h-14.975c-4.418,0-8,3.582-8,8s3.582,8,8,8h12.835c3.149,5.155,4.822,10.984,4.822,17.079
		C482.323,308.985,475.927,319.848,465.561,325.727z"/>
    <path
        d="M422.384,325.727h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S426.802,325.727,422.384,325.727z"/>
    <path
        d="M436.934,263.953h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S441.352,263.953,436.934,263.953z"/>
    <path
        d="M407.833,387.5h-8.525c-4.418,0-8,3.582-8,8s3.582,8,8,8h8.525c4.418,0,8-3.582,8-8S412.252,387.5,407.833,387.5z"/>
    <path d="M80,264c-8.822,0-16,7.178-16,16s7.178,16,16,16s16-7.178,16-16S88.822,264,80,264z"/>
</g>
</svg>
            </div>
        </div>
        <div class="post-price">
            {{ $post->price }} ₽
        </div>
        <div class="decr-title">Скажите что звоните с сайта
            {{ $_SERVER['HTTP_HOST'] }}</div>
        @if($post->phone)
            <div class="phone-favorite-wrap d-flex">
                <a data-city="{{ $post->city_id }}"
                   data-id="{{ $post->id }}" onclick="show_phone(this)"
                   class="phone single-phone">Показать телефон</a>
            </div>
        @endif
        <div class="ya-share2" data-curtain data-shape="round"
             data-services="messenger,vkontakte,odnoklassniki,telegram,twitter,viber,whatsapp,skype,linkedin,reddit"></div>
        <form action="/call/request" method="post" class="request-call-form">
            @csrf
            <div class="property-name">Заказать звонок</div>
            <div class="phone-wrap d-flex">
                <input type="text" name="phone" class="request-call-input">
                <input type="hidden" name="posts_id" value="{{$post->id}}">
                <button class="red-btn">Заказать</button>
            </div>
        </form>

        <div class="post-property-list">
            @if($post->metro->first())
                <div class="property-item metro-list">
                    <div class="property-name">Метро</div>
                    <div class="d-flex">
                        @foreach($post->metro as $item)
                            <a class="property-value"
                               href="/{{ $item->metro->filterUrl->filter_url }}">{{ $item->metro->value }}
                                @if($post->metro->last() != $item)
                                    ,
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($post->rayon)
                <div class="property-item metro-list">
                    <div class="property-name">Район</div>
                    <a class="property-value"
                       href="/{{ $post->rayon->rayon->filterUrl->filter_url }}">{{ $post->rayon->rayon->value }}</a>

                </div>
            @endif

            @if($post->time)
                <div class="property-item metro-list">
                    <div class="property-name">Время встречи</div>
                    <div class="d-flex">
                        @foreach($post->time as $item)
                            <a href="/{{ $item->time->filterUrl->filter_url }}"
                               class="property-value">{{ $item->time->value }}
                                @if($post->time->last() != $item)
                                    ,
                                @endif
                            </a>
                        @endforeach
                    </div>

                </div>
            @endif

            @if($post->place)
                <div class="property-item metro-list">
                    <div class="property-name">Место встречи</div>
                    <div class="d-flex">
                        @foreach($post->place as $item)
                            <a href="/{{ $item->place->filterUrl->filter_url }}"
                               class="property-value">{{ $item->place->value }}
                                @if($post->place->last() != $item)
                                    ,
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($post->age)
                <div class="property-item">
                    <div class="property-name">Возраст</div>
                    <div class="property-value">{{ $post->age }}</div>
                </div>
            @endif
            @if($post->ves)
                <div class="property-item">
                    <div class="property-name">Вес</div>
                    <div class="property-value">{{ $post->ves }}</div>
                </div>
            @endif
            @if($post->breast_size)
                <div class="property-item">
                    <div class="property-name">Размер груди</div>
                    <div class="property-value">{{ $post->breast_size }}</div>
                </div>
            @endif
            @if($post->national)
                <div class="property-item">
                    <div class="property-name">Национальность</div>
                    <a href="/{{ $post->national->national->filterUrl->filter_url }}"
                       class="property-value">{{ $post->national->national->value }} </a>
                </div>
            @endif
            @if($post->hair)
                <div class="property-item">
                    <div class="property-name">Цвет волос</div>
                    <a href="/{{ $post->hair->hair->filterUrl->filter_url }}"
                       class="property-value">{{ $post->hair->hair->value }}</a>
                </div>
            @endif
            @if($post->intimHair and isset($post->intimHair->value->filterUrl->filter_url ))
                <div class="property-item">
                    <div class="property-name">Интимная стрижка</div>
                    <a href="/{{ $post->intimHair->value->filterUrl->filter_url }}"
                       class="property-value">{{ $post->intimHair->value->value }}</a>
                </div>
            @endif
        </div>
    </div>


    @if($post->service->first())
        <div class="property-item metro-list service-list">
            <div class="decr-title">
                Услуги
            </div>
            <div class="d-flex">
                @foreach($post->service as $item)
                    <a class="property-value"
                       href="/{{ $item->service->filterUrl->filter_url }}">
                        {{ $item->service->value }}@if($post->service->last() != $item),@endif</a>

                @endforeach
            </div>
        </div>

    @endif

    @if($post->about)
        <div class="post-decr">
            <div class="decr-title">
                Описание
            </div>
            <div class="decr-text">
                {{ $post->about }}
            </div>
        </div>
    @endif

    @if($post->gallery and $post->gallery->count())

        <div class="photo-wrap">
            <div class="decr-title">
                Фото
            </div>
            <div class="popular-list post-photo">
                @foreach($post->gallery as $item)
                    <div class="post-photo-item">
                        <a href="/600-600/thumbs{{$item->file}}" data-lightbox="image-{{ $post->id }}">
                            <picture>

                                <source srcset="/181-257/thumbs{{str_replace('.jpg', '.webp', $item->file)}}"
                                        type="image/webp">
                                <source srcset="/181-257/thumbs{{$item->file}}" type="image/jpeg">

                                <img data-lightbox="roadtrip" title="Проститутка {{ $post->name }}"
                                     srcset="/181-257/thumbs{{$item->file}}"
                                     loading="lazy"
                                     alt="{{ $post->name }}">
                            </picture>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>

    @endif

    @if($post->selphi and $post->selphi->count())

        <div class="photo-wrap">
            <div class="decr-title">
                Селфи
            </div>
            <div class="popular-list post-photo">
                @foreach($post->selphi as $item)
                    <div class="post-photo-item">
                        <a href="/600-600/thumbs{{$item->file}}" data-lightbox="image-{{ $post->id }}">
                            <picture>
                                <source srcset="/181-257/thumbs{{$item->file}}">
                                <img
                                    loading="lazy"
                                    title="Проститутка {{ $post->name }}" srcset="/181-257/thumbs{{$item->file}}"
                                    alt="{{ $post->name }}">
                            </picture>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    @endif
    <div class="col-12"></div>
    @if($post->video)
        <div class="post-decr">
            <div class="decr-title">
                Видео
            </div>
            <div class="decr-text">
                <video controls="controls" class="video">
                    <source src="/storage{{ $post->video->file }}">
                </video>
            </div>
        </div>
    @endif


    <div class="col-12"></div>

    @if( $firstMetro = $post->metro->first() and isset($firstMetro->metro->x) or isset($cityInfo['x']) )
        <div class="post-decr">
            <div class="decr-title">
                Я на карте
            </div>
            @php
                if ($firstMetro){
                    $x = $firstMetro->metro->x;
                    $y = $firstMetro->metro->y;
                }else{
                    $x = $cityInfo['x'];
                    $y = $cityInfo['y'];
                }
            @endphp
            <div class="decr-text">
                <div id="map"
                     class="yandex-map map-not-exist"
                     data-x="{{ $x }}"
                     data-y="{{ $y }}" style="height: 300px">
                </div>
            </div>
        </div>
    @endif

    <div class="decr-title">
        Отзывы
    </div>
    <div class="review-list">
        @if($post->comments->first())

            @foreach($post->comments as $item)
                <div class="review-item review-form">
                    <div class="name">
                        {{ $item->name }}
                    </div>
                    <div class="text">
                        {{ $item->text }}
                    </div>
                </div>
            @endforeach

        @else
            <div class="review-item">
                Отзывов еще никто не оставлял
            </div>
        @endif
    </div>
    <form action="/comment/add" class="review-form" method="post">
        @csrf
        <div class="form-review-title">
            Оставить отзыв
        </div>
        <div class="field d-flex">
            <label for="name-{{ $post->id }}">Имя</label>
            <input type="text" required id="name-{{ $post->id }}" name="name" value="{{ old('name', '')  }}"
                   placeholder="Имя">
        </div>

        <input type="hidden" name="related_id" value="{{ $post->id }}">
        <input type="hidden" name="related_class" value="{{ \App\Models\Post::class }}">

        <div class="field d-flex">
            <label for="text-{{ $post->id }}">Комментарий</label>
            <textarea class="comment-text" required placeholder="Комментарий" name="text" id="text-{{ $post->id }}">
                    {{ old('text', '')  }}
                </textarea>
        </div>
        <button class="send-btn">Отправить</button>
    </form>
</div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" defer></script>
<script src="/js/map_yandex.js?v=1" defer></script>
