<?
use App\Models\Pages;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property=”og:image” content="http://okschain.info/{{asset('themes/frontend/img/favicon.png')}}" />
    <meta name="keywords" content="GM Uzbekistan">
    <meta name="description" content=" Okschain news">
    <meta name="Author" content="GM Uzbekistan">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('themes/backend/image/favicon.ico')}}">

    <link rel="stylesheet" href="{{ asset('themes/backend/css/bootstrap4-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/backend/css/styles.css') }}">

    <script src="{{ asset('themes/backend/js/all.min.js') }}">
    </script>
    <style>
      .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
      .toggle.ios .toggle-handle { border-radius: 20rem; }
      .toggle.ios{width: 64.0781px!important;}
      /*.btn{display: inline-flex!important}*/
    </style>

</head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route('index')}}">
                <img src="{{asset('themes/backend/image/admin-panel.png')}}" style="margin-right: 10px"> Laravel CMS
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{url('users')}}">
                            Users
                        </a>
                        <a class="dropdown-item" href="{{url('users/profile/'.Auth::user()['id'])}}">
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">
                                Home
                            </div>
                            <a class="nav-link" href="{{Route('dashboard')}}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="{{url('users')}}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                Users
                            </a>
                            <div class="sb-sidenav-menu-heading">
                                Content
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                Menu & Pages
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('menu')}}">
                                        Menu
                                    </a>
                                    <a class="nav-link" href="{{url('pages')}}">
                                        Pages
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-photo-video"></i>
                                </div>
                                Mediya
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="layout-static.html">
                                        Gallery
                                    </a>
                                    <a class="nav-link" href="layout-sidenav-light.html">
                                        Video gallery
                                    </a>
                                    <a class="nav-link" href="layout-sidenav-light.html">
                                        Carousel
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseTrans" aria-expanded="false" aria-co>
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                    Translation
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseTrans" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{url('title')}}">
                                        Translations
                                    </a>
                                    <a class="nav-link" href="{{url('text')}}">
                                        Texts
                                    </a>
                                </nav>
                            </div>     
                            <div class="sb-sidenav-menu-heading">
                                Social networks
                            </div>                             
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-co>
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-share-alt"></i>
                                </div>
                                    Plugins
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="layout-static.html">
                                        Socials
                                    </a>
                                    <a class="nav-link" href="layout-sidenav-light.html">
                                        Feedback
                                    </a>
                                    <a class="nav-link" href="layout-sidenav-light.html">
                                        Guestbook
                                    </a>
                                    <a class="nav-link" href="layout-sidenav-light.html">
                                        Subscribe
                                    </a>
                                </nav>
                            </div> 
                            <div class="sb-sidenav-menu-heading">
                                Site Settings
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseNastr" aria-expanded="false" aria-co>
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                    Settings
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseNastr" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{url('settings')}}">
                                        Settings
                                    </a>
                                    <a class="nav-link" href="{{url('setisettings')}}">
                                        Site settings
                                    </a>
                                    <a class="nav-link" href="{{url('temp')}}">
                                        Template
                                    </a>
                                    <a class="nav-link" href="{{url('lang')}}">
                                        Language
                                    </a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Static</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-chart-area"></i>
                                </div>
                                Charts
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-table"></i>
                                </div>
                                 Documentation
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
        
        <!-- jQuery -->
        <script src="{{ asset('themes/backend/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('themes/backend/js/bootstrap-4.3.1.min.js') }}"></script>
        <script src="{{ asset('themes/backend/js/scripts.js') }}"></script>
        @stack('scripts')
    </body>
</html>