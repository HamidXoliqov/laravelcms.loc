@extends('layouts.frontend')
@section('title')
    {{$menu->title}}
@stop
@section('content')
    <div class="content p-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content-area row">
                        @foreach($pages as $value)
                            <div class=" col-md-6 news-item">
                                <div class="item-top">
                                    <img src="{{$value->getImage()}}" alt="">
                                    <a href="
                                        {{url('frontend/'.$menu->slug,$value->slug)}}" class="read-href">
                                        Подробнее <i class="fa fa-arrow-right"></i>
                                    </a>
                                    <div class="item-hover"></div>
                                </div>
                                <div class="item-body">
                                    <a href="#" class="item-title">
                                        {{$value->title}}
                                    </a>
                                    <p class="item-text">
                                        {{$value->short}}
                                    </p>
                                    <div class="item-tags">
                                        <a href="#" class="news-events">Новости</a>
                                        <p class="news-date">
                                            <i class="fal fa-clock"></i> {{date('d.m.Y',$value->time)}}
                                        </p>
                                        <p class="eye"><i class="fal fa-eye"></i>412</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item"><a href="#"><i class="fal fa-angle-left"></i></a></li>
                          <li class="page-item"><a  href="#">1</a></li>
                          <li class="page-item"><a  href="#">2</a></li>
                          <li class="page-item"><a  href="#">3</a></li>
                          <li class="page-item"><a href="#"><i class="fal fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-lg-4">
                    <aside class="sidebar ">
                        <div class="row">
                            <div class="currency col-lg-12">
                                <div class="currensy-row ">

                                    <div class="currensy-col">
                                        <img src="img/Bitcoin.svg.png" alt="">
                                        <div class="currensy">
                                            <p class="currensy-name"> bitcoin</p>

                                            <span class="currency-number">$3,409.09</span>
                                            <i class="fa fa-caret-down">2.33%</i>
                                        </div>
                                    </div>

                                    <div class="currensy-col">
                                        <img src="img/2000px-Ethereum_logo_2014.svg.png" alt="">
                                        <div class="currensy">
                                            <p class="currensy-name">
                                                ethereum
                                            </p>

                                            <span class="currency-number">$104.49</span>
                                            <i class="fa fa-caret-up">3.93%</i>
                                        </div>
                                    </div>

                                    <div class=" currensy-col">
                                        <img src="img/zcash.svg.png" alt="">
                                        <div class="currensy">
                                            <p class="currensy-name">zchash</p>
                                            <span class="currency-number">$47.97</span>
                                            <i class="fa fa-caret-down">4.5%</i>
                                        </div>
                                    </div>
                                </div>

                                <div class="converter-row  ">
                                    <div class="converter-col ">

                                        <input type="text" class="form-control" placeholder="1">
                                        <div class="form-group">
                                            <select>
                                                <option>Bitcoin</option>
                                                <option>Ethereum</option>
                                                <option>Zcash</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="converter-col ">

                                        <input type="text" class="form-control" placeholder="1">
                                        <div class="form-group">
                                            <select>
                                                <option>Ethereum</option>
                                                <option>Bitcoin</option>
                                                <option>Zcash</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="email-row col-lg-12">
                                <form>
                                    <div class="sidebar-title">
                                        <h3>Подпишитесь на рассылку</h3>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Получайте свежие новости на свой почтовый ящик</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите свой E-mail">
                                    </div>

                                    <button class="send-btn">Получать рассылку</button>
                                </form>
                            </div>

                            <div class="sidebar-news-row col-lg-12">
                                <div class="sidebar-title col-lg-12
                                ">
                                    <h3>Самые просматриваемые</h3>
                                </div>
                                <div class="sidebar-news-col">
                                    <div class="news-img">
                                        <img src="img/carouselimg2.png" alt="">
                                    </div>
                                    <div class="news-body">
                                        <a href="#" class="news-title">
                                            Инсайд: Samsung Galaxy S10 выйдет со встроенным криптокошельком
                                        </a>
                                        <div class="item-tags">
                                            <a href="#" class="news-events">Новости</a>
                                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-news-col">
                                    <div class="news-img">
                                        <img src="img/sidebar-news-img2.png" alt="">
                                    </div>
                                    <div class="news-body">
                                        <a href="#" class="news-title">
                                            Самопровозглашенный президент Венесуэлы похоронит Petro
                                        </a>
                                        <div class="item-tags">
                                            <a href="#" class="news-events">Аналитика</a>
                                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-news-col">
                                    <div class="news-img">
                                        <img src="img/sidebar-news-img3.png" alt="">
                                    </div>
                                    <div class="news-body">
                                        <a href="#" class="news-title">
                                            Nasdaq инвестирует в запуск корпоративного блокчейна Symbiont
                                        </a>
                                        <div class="item-tags">
                                            <a href="#" class="news-events">Новости</a>
                                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-news-col">
                                    <div class="news-img">
                                        <img src="img/sidebar-news-img4.png" alt="">
                                    </div>
                                    <div class="news-body">
                                        <a href="#" class="news-title">
                                            BitTorrent объявляет BTT Airdrops для держателей TRX
                                        </a>
                                        <div class="item-tags">
                                            <a href="#" class="news-events">Новости</a>
                                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-news-col">
                                    <div class="news-img">
                                        <img src="img/sidebar-news-img5.png" alt="">
                                    </div>
                                    <div class="news-body">
                                        <a href="#" class="news-title">
                                            Криптобиржи Южной Кореи объединяют усилия в борьбе с отмыванием денег
                                        </a>
                                        <div class="item-tags">
                                            <a href="#" class="news-events">Новости</a>
                                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-news-col">
                                    <div class="news-img">
                                        <img src="img/sidebar-news-img6.png" alt="">
                                    </div>
                                    <div class="news-body">
                                        <a href="#" class="news-title">
                                            Опытные криптографы помогают полиции в поисках средств Cryptopia
                                        </a>
                                        <div class="item-tags">
                                            <a href="#" class="news-events">Новости</a>
                                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-social col-lg-12">
                                <div class="sidebar-title">
                                    <h3>
                                        Мы в соцсетях
                                    </h3>
                                </div>
                                <div class="social">
                                    <a href="#" class="social-item">
                                        <div class="social-logo">
                                            <img src="img/facebook.png" alt="">
                                        </div>
                                        <div class="social-count">
                                            <p>
                                                3 569 подписчиков
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#" class="social-item">
                                        <div class="social-logo">
                                            <img src="img/instagram.png" alt="">
                                        </div>
                                        <div class="social-count">
                                            <p>
                                                4 569 подписчиков
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#" class="social-item">
                                        <div class="social-logo">
                                            <img src="img/telegram.png" alt="">
                                        </div>
                                        <div class="social-count">
                                            <p>
                                                4 559 подписчиков
                                            </p>
                                        </div>
                                    </a>
                                    <a href="#" class="social-item">
                                        <div class="social-logo">
                                            <img src="img/ok.png" alt="">
                                        </div>
                                        <div class="social-count">
                                            <p>
                                                4 559 подписчиков
                                            </p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
@stop



