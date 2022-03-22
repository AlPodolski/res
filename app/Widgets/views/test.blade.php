<div class="side-panel">
    <div class="side-panel-content">
        <div class="panel-menu">
            <ul class="menu__list" id="accordion" data-navigation="" data-menu-handle="main-menu" data-navigation-inited="true">
                @if($metroList)
                <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                    <div class="menu__controls">
                        <a class="menu__link" data-toggle="collapse" href="#collapseMetro">
                            Метро
                        </a>
                        <div id="collapseMetro" class="collapse" data-parent="#accordion">
                            @foreach($metroList as $item)
                                <a class="collapse-item d-block menu__link" href="/{{$item->filter_url}}">{{ $item->metro->value }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endif

                @if($rayonList)
                <li class="menu__item" data-navigation-item="" data-menu-item-id="11971292">
                    <div class="menu__controls">
                        <a class="menu__link" data-toggle="collapse" href="#collapseRayon">
                            Район
                        </a>
                        <div id="collapseRayon" class="collapse" data-parent="#accordion">
                            @foreach($rayonList as $item)
                                <a class="collapse-item d-block menu__link" href="/{{$item->filter_url}}">{{ $item->rayon->value }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endif

                <li class="menu__item" data-navigation-item="" data-menu-item-id="11971294">
                    <div class="menu__controls">
                        <a href="/page/about-us" class="menu__link" data-navigation-link="/page/about-us">
                            О компании
                        </a>
                    </div>
                </li>

                <li class="menu__item" data-navigation-item="" data-menu-item-id="11971297">
                    <div class="menu__controls">
                        <a href="/page/contacts" class="menu__link" data-navigation-link="/page/contacts">
                            Контакты
                        </a>
                    </div>
                </li>

                <li class="menu__item" data-navigation-item="" data-menu-item-id="11971299">
                    <div class="menu__controls">
                        <a href="/page/delivery" class="menu__link" data-navigation-link="/page/delivery">
                            Доставка
                        </a>
                    </div>
                </li>

                <li class="menu__item" data-navigation-item="" data-menu-item-id="11971301">
                    <div class="menu__controls">
                        <a href="/page/payment" class="menu__link" data-navigation-link="/page/payment">
                            Оплата
                        </a>
                    </div>
                </li>

                <li class="menu__item" data-navigation-item="" data-menu-item-id="11971302">
                    <div class="menu__controls">
                        <a href="/client_account/login" class="menu__link"
                           data-navigation-link="/client_account/login">
                            Личный кабинет
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="close-panel" onclick="closePanel(this)">
        <img src="/img/close.svg" alt="">
    </div>
</div>

