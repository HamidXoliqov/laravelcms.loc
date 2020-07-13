@extends('layouts.frontend')
@section('title') 
    {{ $menu->title }} 
@stop
@section('content')
    <div class="contact">
        <div class="container">
            <div class="contact-title">
                <h3>
                    Контакты
                </h3>
                <p>
                    Команда OksChain News постоянно работает над совершенствованием и добавлением на сайт новых
                    разделов, расширением тематики публикаций, разработкой новых типов контента. Именно поэтому мы
                    всегда будем рады услышать обратную связь от наших читателей.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-3 contact-col">
                    <h2><i class="fa fa-phone"></i>Телефоны:</h2>
                    <ul>
                        <li><a href="#">+ 987 65 431-01-23</a></li>
                        <li><a href="#">+ 987 65 431-01-23</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 contact-col">
                    <h2><i class="fa fa-envelope-open"></i>Эл. почта:</h2>
                    <p> по вопросам сотрудничества
                        <a href="#">contact@okschainnews.com</a> </p>
                </div>
                <div class="col-lg-3 contact-col">
                    <h2><i class="fa fa-envelope-open"></i>Эл. почта:</h2>
                    <p> по вопросам рекламы
                        <a href="#">sales@okschainnews.com</a> </p>
                </div>
            </div>
        </div>
    </div>
@stop
