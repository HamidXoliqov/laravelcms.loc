<?php
/**
 * Created by PhpStorm.
 * User: Xoliqov. A
 * Date: 04.03.2020
 * Time: 15:21
 */
?>
<div class="similar-news">
    <div class="similar-title">
        <h3>
            Похожие новости
        </h3>
    </div>
    <div class="row similar-row">
        @foreach($simil as $value)
            <div class="similar-col col-md-6">
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
</div>
