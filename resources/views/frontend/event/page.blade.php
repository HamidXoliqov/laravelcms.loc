@extends('layouts.frontend')
@section('title')
{{$page->title}}
@stop
@section('content')
    <div class="content p-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="news-post">
                        <div class="post-title">
                            <h3>
                                {{$page->title}}
                            </h3>
                            <div class="post-info">
                                <div class="post-tags">
                                    <a href="{{url('news',$menu->slug)}}" class="news-events">
                                        Новости
                                    </a>
                                    <p class="news-date"><i class="fas fa-clock"></i>
                                        {{date('d.m.Y',$page->time)}}
                                    </p>
                                    <p class="eye"><i class="fa fa-eye"></i>412</p>
                                </div>
                                <ul class="footer-social">
                                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-odnoklassniki"></i></a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="post-img">
                            <img src="{{$page->getImage()}}" alt="{{$page->title}}">
                        </div>
                        <div class="post-body">
                            <h3 class="post-h3">
                                {{$page->short}}
                            </h3>
                            <p class="post-text">
                                {{$page->text}}
                            </p>
                        </div>
                    </div>
                    <?//= View::make('frontend.blocks.simil',['menu'=>$menu,'simil'=>$simil])->render(); ?>
                </div>
                <div class="col-lg-4">
                    <?//= View::make('frontend.blocks.right',['views'=>$views,'menu'=>$menu])->render(); ?>
                </div>
            </div>
        </div>
    </div>
@stop
