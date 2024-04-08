@php
    /* @var $post \App\Models\Post */
use App\Actions\Like;
@endphp
<div class="col-12">

    <div class="row">

        <div class="col-12 col-lg-4 ">
            <div class="photo">

                <a href="/600-600/thumbs{{$post->photo}}" data-lightbox="image-{{ $post->id }}">
                    <img title="Проститутка {{ $post->name }}" src="/500-500/thumbs{{$post->photo}}"
                         class="profile-main-info__slider-main-img"
                         alt="{{ $post->name }}">
                </a>


                @if($post->gallery and $post->gallery->count())

                    @foreach($post->gallery as $item)

                        <a href="/600-600/thumbs{{$item->file}}" data-lightbox="image-{{ $post->id }}">
                            <img title="Проститутка {{ $post->name }}"
                                 src="/500-500/thumbs{{$item->file}}"
                                 loading="lazy"
                                 class="profile-main-info__slider-main-img"
                                 alt="{{ $post->name }}">
                        </a>

                    @endforeach

                @endif

                @if($post->selphi and $post->selphi->count())

                    @foreach($post->selphi as $item)

                        <a href="/600-600/thumbs{{$item->file}}" data-lightbox="image-{{ $post->id }}">
                            <img title="Проститутка {{ $post->name }}"
                                 src="/500-500/thumbs{{$item->file}}"
                                 loading="lazy"
                                 class="profile-main-info__slider-main-img"
                                 alt="{{ $post->name }}">
                        </a>

                    @endforeach

                @endif

            </div>

        </div>

        <div class="col-12 col-lg-8 right-info">
            <div class="right-info-item">
                <div class="small-heading">
                    О проститутке:
                </div>
                <div class="single-phone-wrap">
                    <div class="phone"
                         data-city="{{ $post->city_id }}"
                         data-id="{{ $post->id }}"
                         onclick="show_phone(this)">
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_300_1129)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M13.8277 10.6784C14.7593 11.1961 15.6915 11.714 16.6231 12.2317C17.0241 12.4544 17.2 12.9268 17.0422 13.3577C16.2406 15.5475 13.8931 16.7033 11.6842 15.8972C7.16109 14.2462 3.8084 10.8934 2.1573 6.37028C1.35108 4.16142 2.50698 1.81381 4.69676 1.01228C5.12765 0.854409 5.6001 1.03031 5.8233 1.43131C6.3405 2.36297 6.85834 3.29516 7.37606 4.22676C7.61875 4.66381 7.56171 5.18259 7.22953 5.55581C6.79451 6.04533 6.35957 6.53474 5.92456 7.02375C6.85314 9.28499 8.7694 11.2013 11.0307 12.1299C11.5197 11.6948 12.0091 11.2599 12.4986 10.8249C12.8724 10.4927 13.3907 10.4357 13.8277 10.6784L13.8277 10.6784Z"
                                      fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_300_1129">
                                    <rect width="19" height="19" fill="white" transform="translate(0 0.954742)"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Показать телефон
                    </div>
                </div>

                @if($post->metro->first())

                    <div class="single-metro-wrap">
                        <div class="metro-left">Метро:</div>
                        <div class="metro-right">

                            @foreach($post->metro as $metro)

                                <div class="metro">
                                    <a href="/{{ $metro->metro->filterUrl->filter_url }}"
                                       class="metro-link">
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9017 5.33234L9.54563 10.1963L7.22003 5.33234L5.2896 11.1995H4.9552V11.8531H6.91605V11.2299H6.61208L7.5696 8.60029L9.3024 11.8531H9.77357L11.5065 8.56989L12.4793 11.1996H12.1296V11.8531H14.1361V11.1996H13.7865L11.9017 5.33234Z"
                                                fill="white"/>
                                            <path
                                                d="M9.50002 2.77872C7.66077 2.77872 5.92802 3.50829 4.63602 4.81549C3.35925 6.12269 2.66 7.84029 2.67517 9.64909C2.67517 11.2298 3.23754 12.7803 4.25591 14.0115C4.31667 14.0875 4.39269 14.1179 4.48387 14.1179H6.49033C8.0255 14.1179 10.0015 14.1331 11.6431 14.1331C12.9808 14.1331 14.1055 14.1331 14.6071 14.1179C14.6983 14.1179 14.7743 14.0724 14.8351 13.9963C15.8383 12.7499 16.3703 11.2299 16.3703 9.63393C16.3705 5.86433 13.2849 2.77873 9.50013 2.77873L9.50002 2.77872ZM14.44 13.5099C13.1328 13.5403 8.98322 13.5251 6.47522 13.5099H4.62082C3.75437 12.4155 3.26802 11.0475 3.26802 9.64912C3.26802 7.99234 3.9065 6.42672 5.07685 5.24112C6.26245 4.05541 7.82805 3.38672 9.50005 3.38672C12.9505 3.38672 15.7625 6.19872 15.7625 9.64912C15.7625 11.0627 15.3065 12.4003 14.4401 13.5099H14.44Z"
                                                fill="white"/>
                                        </svg>
                                        {{ $metro->metro->value }} </a>
                                </div>

                            @endforeach

                        </div>

                    </div>

                @endif

                @if($post->rayon->first())

                    <div class="single-metro-wrap">
                        <div class="metro-left">Район:</div>
                        <div class="metro-right">

                            <div class="metro">
                                <a href="/{{ $post->rayon->rayon->filterUrl->filter_url }}"
                                   class="metro-link">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.9017 5.33234L9.54563 10.1963L7.22003 5.33234L5.2896 11.1995H4.9552V11.8531H6.91605V11.2299H6.61208L7.5696 8.60029L9.3024 11.8531H9.77357L11.5065 8.56989L12.4793 11.1996H12.1296V11.8531H14.1361V11.1996H13.7865L11.9017 5.33234Z"
                                            fill="white"/>
                                        <path
                                            d="M9.50002 2.77872C7.66077 2.77872 5.92802 3.50829 4.63602 4.81549C3.35925 6.12269 2.66 7.84029 2.67517 9.64909C2.67517 11.2298 3.23754 12.7803 4.25591 14.0115C4.31667 14.0875 4.39269 14.1179 4.48387 14.1179H6.49033C8.0255 14.1179 10.0015 14.1331 11.6431 14.1331C12.9808 14.1331 14.1055 14.1331 14.6071 14.1179C14.6983 14.1179 14.7743 14.0724 14.8351 13.9963C15.8383 12.7499 16.3703 11.2299 16.3703 9.63393C16.3705 5.86433 13.2849 2.77873 9.50013 2.77873L9.50002 2.77872ZM14.44 13.5099C13.1328 13.5403 8.98322 13.5251 6.47522 13.5099H4.62082C3.75437 12.4155 3.26802 11.0475 3.26802 9.64912C3.26802 7.99234 3.9065 6.42672 5.07685 5.24112C6.26245 4.05541 7.82805 3.38672 9.50005 3.38672C12.9505 3.38672 15.7625 6.19872 15.7625 9.64912C15.7625 11.0627 15.3065 12.4003 14.4401 13.5099H14.44Z"
                                            fill="white"/>
                                    </svg>
                                    {{ $post->rayon->rayon->value }} </a>
                            </div>

                        </div>

                    </div>

                @endif

                <div class="single-price">
                    <div class="place-image">
                        <img src="/img/dom.svg" alt="">
                        Апартаменты:
                    </div>
                    <div class="single-price-item">
                        <div class="left-single-price">
                            <div class="left-price-item">Час:</div>
                            <div class="left-price-item">Два часа:</div>
                            <div class="left-price-item">Ночь:</div>
                        </div>
                        <div class="right-single-price">
                            <div class="right-price-item">{{ $post->price }}</div>
                            <div class="right-price-item">{{ $post->price * 2 }}</div>
                            <div class="right-price-item">{{ $post->price * 4}}</div>
                        </div>
                    </div>
                </div>

                <div class="params-wrap">
                    <div class="params-heading">
                        Параметры
                    </div>
                    <div class="params-item-wrap">
                        <div class="params-item">
                            <div class="param-value">{{ $post->age }}</div>
                            <div class="param-name">
                                Возраст
                            </div>
                        </div>
                        <div class="params-item">
                            <div class="param-value">{{ $post->rost }}</div>
                            <div class="param-name">
                                Рост
                            </div>
                        </div>
                        <div class="params-item">
                            <div class="param-value">{{ $post->ves }}</div>
                            <div class="param-name">
                                Вес
                            </div>
                        </div>
                        <div class="params-item">
                            <div class="param-value">{{ $post->breast_size }}</div>
                            <div class="param-name">
                                Грудь
                            </div>
                        </div>

                    </div>
                </div>

                <div class="params-wrap">
                    <div class="params-heading">
                        Дополнительные параметры
                    </div>
                    <div class="params-item-wrap">
                        <div class="params-item">
                            <div class="param-value">{{ $post->national->national->value }}</div>
                            <div class="param-name">
                                Национальность
                            </div>
                        </div>
                        <div class="params-item">
                            <div class="param-value">{{ $post->intimHair->value->value }}</div>
                            <div class="param-name">
                                Интимная стрижка
                            </div>
                        </div>
                        <div class="params-item">
                            <div class="param-value">{{ $post->hair->hair->value }}</div>
                            <div class="param-name">
                                Цвет волос
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            @if($post->about)

                <div class="right-info-item">
                    <div class="small-heading">
                        О себе:
                    </div>
                    {{ $post->about }}
                </div>

            @endif

            <div class="right-info-item">
                <div class="small-heading">
                    Предоставляемые услуги:
                </div>
                <div class="service-wrap">
                    @foreach($post->service as $item)
                        <a class="property-value"
                           href="/{{ $item->service->filterUrl->filter_url }}">
                            <img src="/images/check.svg" alt="">
                            {{ $item->service->value }}</a>
                    @endforeach
                </div>
            </div>

            <div class="right-info-item">
                <div class="small-heading">
                    Отзывы:
                </div>
                @if(!$post->comments->first())
                    <div class="no-review">
                        К этой анкете ещё нет ни одного отзыва.<br> Вы можете быть первым
                    </div>
                @endif

                <div class="red-btn review-btn" data-bs-toggle="modal" data-bs-target="#commentModal">
                    Оставить отзыв
                </div>

                @if($post->comments->first())

                    @foreach($post->comments as $item)
                        <div class="review-wrap">
                            <div class="name-date-wrap">
                                <div class="name">{{ $item->name }}</div>
                                <div class="date">{{ $item->created_at }}</div>
                            </div>
                            <div class="review">
                                {{ $item->text }}
                            </div>
                        </div>
                    @endforeach

                @endif

            </div>

            @if($morePosts)
                <div class="right-info-item">

                    <div class="photo-wrap more-posts">
                        <div class="small-heading">
                            Похожие анкеты
                        </div>

                        <div class="row more-posts-wrap">
                            @foreach($morePosts as $post)
                                @include('site.includes.post-item-more')
                            @endforeach
                        </div>

                    </div>
                </div>
            @endif

        </div>

    </div>

</div>

<div id="lightbox-script" data-script="/js/lightbox.min.js"></div>

<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">Добавить отзыв</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="/images/close.svg" alt="">
                </button>
            </div>
            <div class="modal-body">
                <form action="/comment/add" class="review-form" method="post">
                    @csrf
                    <div class="field d-flex">
                        <input type="text" required id="name-{{ $post->id }}" name="name" value="{{ old('name', '')  }}"
                               placeholder="Имя" class="text-input">
                    </div>

                    <input type="hidden" name="related_id" value="{{ $post->id }}">
                    <input type="hidden" name="related_class" value="{{ \App\Models\Post::class }}">

                    <div class="field d-flex">
                        <textarea class="comment-text"
                                  required
                                  placeholder="Комментарий"
                                  name="text"
                                  id="text-{{ $post->id }}">{{ old('text', '')  }}</textarea>
                    </div>
                    <button class="send-btn review-btn">Оставить отзыв</button>
                </form>
            </div>
        </div>
    </div>
</div>
