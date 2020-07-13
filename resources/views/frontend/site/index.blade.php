@extends('layouts.frontend')
@section('title')
    {{'Okschain news'}}
@stop
@section('content')

<section class="main">
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        @php $i=0 @endphp
        @foreach($pages as $value)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{($i==0)?'active':''}}">
                <a href="#" class="d-none d-md-block">
                    {{$value->short}}
                </a>
            </li>
        @php $i++ @endphp
            @break($i==3)
        @endforeach
      </ol>
      <div class="carousel-inner">
        @php $j=0 @endphp
        @foreach($pages as $value)
            <div class="carousel-item {{($j==0)?'active':''}}">
                <img src="{{$value->getImage()}}" class="d-block w-100" alt="{{$value->title}}">
                <div class="carousel-caption ">
                    <a href="{{url('news')}}" class="slider-news">Новости</a>
                    <h5>{{$value->title}}</h5>
                    <i class="fal fa-clock">{{date('d.m.Y', $value->time)}}</i>
                    <a href="{{url('news/'.$value->slug)}}" class="read-more">Подробнее <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            @php $j++ @endphp
            @break($j==3)
        @endforeach
      </div>
    </div>
  </div>
</section>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 sticky-left">
        <div class="content-area row">
          @php $k=0 @endphp
            @foreach($pages as $value)
                <div class="col-md-6 news-item">
                    <div class="item-top">
                        <img src="{{$value->getImage()}}" alt="{{$value->title}}">
                        <a href="{{url('news/'.$value->slug)}}" class="read-href">Подробнее <i class="fa fa-arrow-right"></i></a>
                        <div class="item-hover"></div>
                    </div>
                    <div class="item-body">
                        <a href="{{url('news/'.$value->slug)}}" class="item-title">
                            {{$value->title}}
                        </a>
                        <p class="item-text">
                            {{$value->short}}
                        </p>
                        <div class="item-tags">
                            <a href="{{url('news')}}" class="news-events">Новости</a>
                            <p class="news-date">
                                <i class="fal fa-clock"></i> {{date('d.m.Y', $value->time)}}
                            </p>
                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                        </div>
                    </div>
                </div>
                @php $k++ @endphp
                @break($k==4)
            @endforeach
        </div>
        <div class=" col-12 p-0">
          <div class="popular-news">
            <div class="popular-title">
              <h3>
                Самые просматриваемые
              </h3>
            </div>
            <div class="popular-slider">
              @foreach($pages as $value)
              <div class="popular-item">
                <div class="item-top">
                    <img src="{{$value->getImage()}}" alt="{{$value->title}}">
                    <a href="{{url('news/'.$value->slug)}}" class="read-href">Подробнее <i class="fa fa-arrow-right"></i></a>
                    <div class="item-hover"></div>
                </div>
                <a href="{{url('news/'.$value->slug)}}" class="popular-h3">
                    <h3 class="popular-h3">
                        {{$value->short}}
                    </h3>
                </a>
              </div>
            @endforeach
            </div>
          </div>
        </div>
        <div id="last_news" class="content-area-lg row">
           @foreach($pages as $value)
          <div class=" col-md-12  news-item">
            <div class="item-top ">
                <img src="{{$value->getImage()}}" alt="{{$value->title}}">
                <a href="{{url('news/'.$value->slug)}}" class="read-href">Подробнее <i class="fa fa-arrow-right"></i></a>
                <div class="item-hover"></div>
            </div>
            <div class="item-body ">
                <a href="{{url('news/'.$value->slug)}}" class="item-title">
                    {{$value->title}}
                </a>
                <p class="item-text">
                    {{$value->short}}
                </p>
               <div class="item-tags">
                    <a href="{{url('news')}}" class="news-events">Новости</a>
                    <p class="news-date">
                        <i class="fal fa-clock"></i> {{date('d.m.Y', $value->time)}}
                    </p>
                    <p class="eye"><i class="fa fa-eye"></i>412</p>
                </div>            
            </div>
          </div>
            @endforeach
        </div>
        <a id="more_news" class="all-news-btn"> 
            Еще новости 
        <i class="fa fa-arrow-down"></i></a>
      </div>
      <div class="col-lg-4 sticky-right">
        <aside class="sidebar">
            <div class="row">
              <div class="currency col-lg-12">
                <div class="currensy-row ">
                    <div class="currensy-col">
                        <img src="img/Bitcoin.svg.png" alt="">
                        <div class="currensy">
                            <p class="currensy-name"> bitcoin</p>

                            <span id="btc" class="currency-number">$3,409.09</span>
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
                <div class="converter-row">
                  <div class="converter-col">
                    <input id="val1" type="text" class="form-control" placeholder="0">
                    <div class="form-group">
                      <select id="myselect_one">                     
                            <option value="1">1</option>                    
                            <option value="1">1</option>                    
                            <option value="1">1</option>                    
                      </select>
                    </div>
                  </div>
                  <div class="converter-col ">
                    <input id="val2" type="text" class="form-control" placeholder="0" disabled="disabled">
                    <div class="form-group">
                      <select id="myselect_two">
                           <option value="1">2</option>                    
                            <option value="1">2</option>                    
                            <option value="1">2</option> 
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
                <div class="sidebar-title col-lg-12">
                    <h3>Самые просматриваемые</h3>
                </div>
                 <div class="sidebar-news-col">
                    <div class="news-img">
                        <img src="img/sidebar-news-img1.png" alt="">
                    </div>
                    <div class="news-body">
                        <a href="single-post.html" class="news-title">
                            Инсайд: Samsung Galaxy S10 выйдет со встроенным криптокошельком
                        </a>
                        <div class="item-tags">
                            <a href="single-post.html" class="news-events">Новости</a>
                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                        </div>
                    </div>
                </div>
                <div class="sidebar-news-col">
                    <div class="news-img">
                        <img src="img/sidebar-news-img2.png" alt="">
                    </div>
                    <div class="news-body">
                        <a href="single-post.html" class="news-title">
                            Самопровозглашенный президент Венесуэлы похоронит Petro
                        </a>
                        <div class="item-tags">
                            <a href="single-post.html" class="news-events">Аналитика</a>
                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                        </div>
                    </div>
                </div>
                <div class="sidebar-news-col">
                    <div class="news-img">
                        <img src="img/sidebar-news-img3.png" alt="">
                    </div>
                    <div class="news-body">
                        <a href="single-post.html" class="news-title">
                            Nasdaq инвестирует в запуск корпоративного блокчейна Symbiont
                        </a>
                        <div class="item-tags">
                            <a href="single-post.html" class="news-events">Новости</a>
                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                        </div>
                    </div>
                </div>
                <div class="sidebar-news-col">
                    <div class="news-img">
                        <img src="img/sidebar-news-img4.png" alt="">
                    </div>
                    <div class="news-body">
                        <a href="single-post.html" class="news-title">
                            BitTorrent объявляет BTT Airdrops для держателей TRX
                        </a>
                        <div class="item-tags">
                            <a href="single-post.html" class="news-events">Новости</a>
                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                        </div>
                    </div>
                </div>
                <div class="sidebar-news-col">
                    <div class="news-img">
                        <img src="img/sidebar-news-img5.png" alt="">
                    </div>
                    <div class="news-body">
                        <a href="single-post.html" class="news-title">
                            Криптобиржи Южной Кореи объединяют усилия в борьбе с отмыванием денег
                        </a>
                        <div class="item-tags">
                            <a href="single-post.html" class="news-events">Новости</a>
                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                        </div>
                    </div>
                </div>
                <div class="sidebar-news-col">
                    <div class="news-img">
                        <img src="img/sidebar-news-img6.png" alt="">
                    </div>
                    <div class="news-body">
                        <a href="single-post.html" class="news-title">
                            Опытные криптографы помогают полиции в поисках средств Cryptopia
                        </a>
                        <div class="item-tags">
                            <a href="single-post.html" class="news-events">Новости</a>
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
                    <a href="single-post.html" class="social-item">
                        <div class="social-logo">
                            <img src="img/facebook.png" alt="">
                        </div>
                        <div class="social-count">
                            <p>
                                3 569 подписчиков
                            </p>
                        </div>
                    </a>
                    <a href="single-post.html" class="social-item">
                        <div class="social-logo">
                            <img src="img/instagram.png" alt="">
                        </div>
                        <div class="social-count">
                            <p>
                                4 569 подписчиков
                            </p>
                        </div>
                    </a>
                    <a href="single-post.html" class="social-item">
                        <div class="social-logo">
                            <img src="img/telegram.png" alt="">
                        </div>
                        <div class="social-count">
                            <p>
                                4 559 подписчиков
                            </p>
                        </div>
                    </a>
                    <a href="single-post.html" class="social-item">
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
    <div id="click_news" style="display:none;">0</div>
@stop
<!--  -->