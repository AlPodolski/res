<div class="side-panel">
    <div class="side-panel-content">
        <div class="panel-menu">
            <ul class="menu__list" id="accordion" itemscope itemtype="https://schema.org/SiteNavigationElement"
                data-navigation="" data-menu-handle="main-menu" data-navigation-inited="true">
                <meta itemprop="name" content="Навигационное Меню">
                @if($metroList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseMetro">
                                Метро <img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseMetro" class="collapse" data-parent="#accordion">
                                @foreach($metroList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        <span itemprop="name">{{ $item->metro->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if($rayonList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseRayon">
                                Район<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseRayon" class="collapse" data-parent="#accordion">
                                @foreach($rayonList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        {{ $item->rayon->value }}
                                        <span itemprop="name">{{ $item->rayon->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if($serviceList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseService">
                                Услуги<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseService" class="collapse" data-parent="#accordion">
                                @foreach($serviceList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        <span itemprop="name">{{ $item->service->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if($timeList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseTime">
                                Время встречи<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseTime" class="collapse" data-parent="#accordion">
                                @foreach($timeList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        <span itemprop="name">{{ $item->time->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
                @if($ageList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseAge">
                                Возраст<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseAge" class="collapse" data-parent="#accordion">
                                @foreach($ageList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        <span itemprop="name">{{ $item->age->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
                @if($priceList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapsePrice">
                                Цена<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapsePrice" class="collapse" data-parent="#accordion">
                                @foreach($priceList as $item)
                                    @if(isset($item->price->value))
                                        <a itemprop="url" class="collapse-item d-block menu__link"
                                           href="/{{$item->filter_url}}">
                                            <span itemprop="name">{{ $item->price->value }}</span>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if($placeList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapsePlace">
                                Место встречи<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapsePlace" class="collapse" data-parent="#accordion">
                                @foreach($placeList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        <span itemprop="name">{{ $item->place->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if($nationalList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseNational">
                                Национальность<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseNational" class="collapse" data-parent="#accordion">
                                @foreach($nationalList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        <span itemprop="name">{{ $item->national->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if($hairColorList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseHair">
                                Цвет волос<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseHair" class="collapse" data-parent="#accordion">
                                @foreach($hairColorList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        <span itemprop="name">{{ $item->hairColor->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif

                @if($intimHairList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseHairIntim">
                                Интимная стрижка<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseHairIntim" class="collapse" data-parent="#accordion">
                                @foreach($intimHairList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="/{{$item->filter_url}}">
                                        <span itemprop="name">{{ $item->intimHair->value }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
                @if($intimHairList)
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                        <div class="menu__controls">
                            <a class="menu__link" data-toggle="collapse" href="#collapseCity">
                                Изменить город<img src="/img/img_1.png" alt="">
                            </a>
                            <div id="collapseCity" class="collapse" data-parent="#accordion">
                                @foreach($cityList as $item)
                                    <a itemprop="url" class="collapse-item d-block menu__link"
                                       href="https://{{$item->url}}.{{env('DOMAIN')}}">
                                        <span itemprop="name">{{ $item->city }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
                <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                    <div class="menu__controls">
                        <a class="menu__link" data-toggle="collapse" href="#claimForm">
                            Обратная связь<img src="/img/img_1.png" alt="">
                        </a>
                        <div id="claimForm" class="collapse" data-parent="#accordion">
                            <form class="claim-form" action="/claim/add" method="post">
                                @csrf
                                <div class="form-group d-flex">
                                    <input id="name" type="text"
                                           class="form-control request-call-input"
                                           name="name" required placeholder="Ваше имя">
                                </div>
                                <input type="hidden" name="city_id" value="{{ $cityId }}">
                                <div class="form-group d-flex">
                                    <input id="email" type="text"
                                           class="form-control request-call-input"
                                           name="email" required placeholder="Ваша почта">
                                </div>
                                <div class="text-wrap form-group">
                                    <textarea name="text" required
                                              id="about" cols="30" rows="10" placeholder="Комментарий"></textarea>
                                </div>
                                <button class="get-more-post-btn" type="submit">Отправить</button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="menu__item">
                    <div class="menu__controls">
                        <a class="menu__link" href="/proverennye-prostitutki">Проверенные</a>
                    </div>
                </li>
                @auth()
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971302">
                        <div class="menu__controls">

                            <a href="/cabinet" class="menu__link"
                               data-navigation-link="/client_account/login">
                                Кабинет
                            </a>
                        </div>
                    </li>
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971302">
                        <div class="menu__controls">
                            <a href="/logout" class="menu__link"
                               data-navigation-link="/client_account/login">
                                Выйти
                            </a>
                        </div>
                    </li>
                @endauth
                @guest()
                    <li class="menu__item" data-navigation-item="" data-menu-item-id="11971302">
                        <div class="menu__controls">
                            <a href="/login" class="menu__link"
                               data-navigation-link="/client_account/login">
                                Войти в кабинет
                            </a>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
    <div class="close-panel" onclick="closePanel(this)">
        <img src="/img/close.svg" alt="">
    </div>
</div>

