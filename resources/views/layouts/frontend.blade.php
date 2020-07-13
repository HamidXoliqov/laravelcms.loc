<?
use \App\Models\Menu;
// dd(Menu::menus());
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property=”og:image” content="http://okschain.nfi/{{asset('themes/frontend/img/favicon.png')}}" />
    <meta name="keywords" content="GM Uzbekistan">
    <meta name="description" content=" Okschain news">
    <meta name="Author" content="GM Uzbekistan">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('themes/frontend/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/libs/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/libs/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/libs/css/sina-nav.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/libs/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/libs/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('themes/frontend/css/sude.css')}}">
</head>
<body>
<div id="top">
    <i class="fas fa-arrow-up"></i>
</div>
<header>
    <div class="top-bar">
        <div class="container">
            <div class="row">

                <div class="col-lg-3  col-sm-5  currensy">
                    <img src="{{asset('themes/frontend/img/bitcoin.png')}}" alt="">
                    <div class="currensy-name">
                        <p class="valuta">bitcoin</p>
                        <p class="currency-number">$3,409.09</p>
                        <i class="fa fa-caret-down">2.33%</i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-5   currensy">
                    <img src="{{asset('themes/frontend/img/ethereum.png')}}" alt="">
                    <div class="currensy-name">
                        <p class="valuta"> ethereum</p>
                        <p class="currency-number">$104.49</p>
                        <i class="fa fa-caret-up">3.93%</i>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-5   currensy">
                    <img src="{{asset('themes/frontend/img/zcash.png')}}" alt="">
                    <div class="currensy-name">
                        <p class="valuta">zchash</p>
                        <p class="currency-number">$47.97</p>
                        <i class="fa fa-caret-down">4.5%</i>
                    </div>
                </div>
                <div class="col-lg-2  col-sm-5  currensy">
                    <img src="{{asset('themes/frontend/img/ripple.png')}}" alt="">
                    <div class="currensy-name">
                        <p class="valuta"> ripple</p>
                        <p class="currency-number">0.29</p>
                        <i class="fa ">0.00</i>
                    </div>
                </div>
                <div class="col-lg-1  col-sm-2 col-3">
            
                    <ul class="language">
                        <li class="">
                          
                          <a href="" title="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">  
                                  En   </a>
                               <ul class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(50px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <li>
                                 <a href="/uz/">
                                      Uz 
                                </a>
                                   </li>
                                   <li>
                               <a href="/ru/">
                               Ru 
                                     </a>
                                  </li>
                            </ul>
                           </li>  
                       </ul>
            
                </div>
            </div>

        </div>
    </div>

    <nav class="sina-nav mobile-sidebar navbar-fixed" data-top="60">
        <div class="container">

            <div class="search-box">
                <form role="search" method="get" action="#">
                    <span class="search-addon close-search"><i class="fa fa-times"></i></span>
                    <div class="search-input">
                        <input type="search" class="form-control" placeholder="Search here" value="" name="">
                    </div>
                    <span class="search-addon search-icon"><i class="fa fa-search"></i></span>
                </form>
            </div><!-- .search-box -->

            <div class="extension-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div><!-- .extension-nav -->

            <div class="sina-nav-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="sina-brand" href="{{url('/')}}">
                    <img src="{{asset('themes/frontend/img/logo.svg')}}" alt="">
                </a>
            </div><!-- .sina-nav-header -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="sina-menu sina-menu-center" data-in="fadeInLeft" data-out="fadeInOut">
                    <div class="d-none">
                        <ul class="" id="dropLang" aria-labelledby="dropdownMenuReference">
                            <li>
                                <a class="dropdown-item" href="#">Uz</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Ru</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">En</a>
                            </li>


                        </ul>
                    </div>
                    @foreach(Menu::menus() as $value)
                        @if((!$value->module)&&($value->status==1))
                            <li>
                                <a href="{{url('frontend/'.$value->slug)}}">
                                    {{$value->title}}
                                </a>
                            </li>
                        @elseif($value->status==1)
                            <li>
                                <a href="{{url($value->slug)}}">
                                    {{$value->title}}
                                </a>
                            </li>
                        @endif
                    @endforeach
                    <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- .container -->
    </nav>
</header>
@yield('content')

<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-item">
                <a href="{{route('index')}}">
                    <img src="{{asset('themes/frontend/img/footer-logo.svg')}}" alt="">
                </a>
            </div>
            <div class="footer-item">
                <ul class="footer-nav">
                    <li><a href="#">Новости</a></li>
                    <li><a href="#">Эксклюзив</a></li>
                    <li><a href="#">Карточки</a></li>
                </ul>
            </div>
            <div class="footer-item">
                <ul class="footer-nav">
                    <li><a href="#">События</a></li>
                    <li><a href="#">Спецпроекты</a></li>
                    <li><a href="#">Криптобизнес</a></li>
                </ul>
            </div>
            <div class="footer-item">
                <p>
                    Присоединяйтесь
                    к нам в соцсетях:
                </p>
                <ul class="footer-social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                    <li><a href="#"><i class="fab fa-odnoklassniki"></i></a></li>
                </ul>
            </div>
            <div class="footer-item">
                <p> <i class="fa fa-envelope"></i> Если у вас есть вопросы по сотрудничеству,
                    или новые интересные предложения,
                    пишите нам на <a href="#">contact@okschainnews.com</a></p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('themes/frontend/libs/js/jquery.min.js') }}"></script>
<script src="{{ asset('themes/frontend/libs/js/popper.js') }}"></script>
<script src="{{ asset('themes/frontend/libs/js/bootstrap.js') }}"></script>
<script src="{{ asset('themes/frontend/libs/js/sina-nav.js') }}"></script>
<script src="{{ asset('themes/frontend/libs/js/slick.min.js') }}"></script>
<script src="{{ asset('themes/frontend/libs/js/stiky.js') }}"></script>
<script src="{{ asset('themes/frontend/libs/js/theia-sticky-sidebar.js') }}"></script>
<script src="{{ asset('themes/frontend/js/script.js') }}"></script>
