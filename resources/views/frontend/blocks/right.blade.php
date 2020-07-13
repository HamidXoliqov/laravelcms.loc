<?php
/**
 * Created by PhpStorm.
 * User: Xoliqov. A
 * Date: 04.03.2020
 * Time: 14:40
 */
?>
<aside class="sidebar ">
    <div class="row">
        <div class="currency col-lg-12">
            <div class="currensy-row ">

                <div class="currensy-col">
                    <img src="/themes/frontend/img/Bitcoin.svg.png" alt="">
                    <div class="currensy">
                        <p class="currensy-name"> bitcoin</p>

                        <span class="currency-number">$3,409.09</span>
                        <i class="fa fa-caret-down">2.33%</i>
                    </div>
                </div>

                <div class="currensy-col">
                    <img src="/themes/frontend/img/2000px-Ethereum_logo_2014.svg.png" alt="">
                    <div class="currensy">
                        <p class="currensy-name">
                            ethereum
                        </p>

                        <span class="currency-number">$104.49</span>
                        <i class="fa fa-caret-up">3.93%</i>
                    </div>
                </div>

                <div class=" currensy-col">
                    <img src="/themes/frontend/img/zcash.svg.png" alt="">
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
                    <input type="email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Введите свой E-mail">
                </div>

                <button class="send-btn">Получать рассылку</button>
            </form>
        </div>

        <div class="sidebar-news-row col-lg-12">
            <div class="sidebar-title col-lg-12">
                <h3>Самые просматриваемые</h3>
            </div>
            @foreach($views as $value)
                <div class="sidebar-news-col">
                    <div class="news-img">
                        <img src="{{$value->getImage()}}" alt="{{$value->title}}">
                    </div>
                    <div class="news-body">
                        <a href="{{url('news/'.$value->slug,$menu->slug)}}" class="news-title">
                            {{$value->short}}
                        </a>
                        <div class="item-tags">
                            <a href="{{url('news',$menu->slug)}}" class="news-events">Новости</a>
                            <p class="eye"><i class="fa fa-eye"></i>412</p>
                        </div>
                    </div>
                </div>
            @endforeach
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
                        <img src="/themes/frontend/img/facebook.png" alt="">
                    </div>
                    <div class="social-count">
                        <p>
                            3 569 подписчиков
                        </p>
                    </div>
                </a>
                <a href="#" class="social-item">
                    <div class="social-logo">
                        <img src="/themes/frontend/img/instagram.png" alt="">
                    </div>
                    <div class="social-count">
                        <p>
                            4 569 подписчиков
                        </p>
                    </div>
                </a>
                <a href="#" class="social-item">
                    <div class="social-logo">
                        <img src="/themes/frontend/img/telegram.png" alt="">
                    </div>
                    <div class="social-count">
                        <p>
                            4 559 подписчиков
                        </p>
                    </div>
                </a>
                <a href="#" class="social-item">
                    <div class="social-logo">
                        <img src="/themes/frontend/img/ok.png" alt="">
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
