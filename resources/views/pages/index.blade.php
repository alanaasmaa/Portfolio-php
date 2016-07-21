@extends('layouts.master')

@section('title', 'Etusivu')
@section('description', 'This is a description')
@section('keywords', 'These, are, keywords')
@section('styles', '')
@section('content')
<section class="container">
    <div class="full box blueBg hero">
        <div class="center whiteText">
            <h1>TESTING</h1>
            <h5>Tämä • sivusto • on • työn • alla</h5>
            <hr>
            <a href="https://github.com/alanaasmaa/Portfolio">Lähdekoodi > https://github.com/alanaasmaa/Portfolio</a>
        </div>
    </div>
</section>
<section class="container box center">
    <div class="full title">
        <h4>Mitä mä teen ?</h4>
        <p>Jotain kivaa tekstii</p>
    </div>
    <div class="row">
        <div class="third">
            <div class="whatDo">
                <i class="fa fa-code fa-3x" aria-hidden="true"></i>
                <h5>Verkkokehitys</h5>
                <p>HTML5/CSS3 verkkosivujen kehitys on pikemminki minun harrastus kun työ. Tarvid uuden verkkosivuston tai vanha kaipaa päivitystä ota ihmeessä yhteyttä. </p>
            </div>
        </div>
        <div class="third">
            <div class="whatDo">
                <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>
                <h5>Puhelin Korjaukset</h5>
                <p>Jo puhelimesta hajos lasi, näyttö, kamera tai kajutin ei oikein toimi, niin voin korjata sen itse tai neuvoa sinua korjaaman se itse.</p>
            </div>
        </div>
        <div class="third">
            <div class="whatDo">
                <i class="fa fa-laptop fa-3x" aria-hidden="true"></i>
                <h5>Tietokone Huolto</h5>
                <p>Jos tietokone tökkii tai tarvii päivitystä niin ota yhteyttä. Voin huoltaa vanhaa konettais tai kasata jopa ihan uuden.</p>
            </div>
        </div>
        <div class="third">
            <div class="whatDo">
                <i class="fa fa-camera-retro fa-3x" aria-hidden="true"></i>
                <h5>Kuvankäsittely</h5>
                <p>Photoshoppia olen käyttänyt todella paljon, myös kokemusta löytyy pienempien 3D kuvakkeiten osalta.</p>
            </div>
        </div>
        <div class="third">
            <div class="whatDo">
                <i class="fa fa-video-camera fa-3x" aria-hidden="true"></i>
                <h5>Videokäsittely</h5>
                <p>Videkäsittely on ollut minulla pienempiä harrastuksia, kokumusta on After Effects, Sony Vegas ja Cinema 4D ohjelmista.</p>
            </div>
        </div>
        <div class="third">
            <div class="whatDo">
                <i class="fa fa-heart fa-3x" aria-hidden="true"></i>
                <h5>Ja paljon muuta..</h5>
                <p>Jos uskot että minä voisin olla oikea henkilö johonkin työhön niin ota ihmeessä yhteyttä !</p>
            </div>
        </div>
    </div>
</section>
<section class="container box center">
    <div class="full title">
        <h4>Newest Portfolio Items</h4>
        <p>Click to open full article</p>
    </div>
    <div class="row">
        @foreach ($articles as $article)
            <div class="third">
                <a style="display:block;" href="article/{{ $article->slug }}">
                    <figure>
                        <figcaption><b>{!! str_limit($article->title, $limit = 25, $end = '...') !!}</b></figcaption>
                        <img src="{{$article->image}}">
                        <figcaption>@markdown((str_limit($article->body, 100, '...')))</figcaption>
                    </figure>
                </a>
            </div>
        @endforeach
    </div>
</section>
@section('scripts')

@stop
@stop
