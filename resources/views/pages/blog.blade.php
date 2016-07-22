@extends('layouts.master')

@section('title', 'Blog')
@section('description', 'This is a description')
@section('keywords', 'These, are, keywords')
@section('content')
<div class="container">
    <section class="sideContent">
        @foreach ($articles as $article)
        <article id="{{$article->id}}" class="box">
            <a href="{{url('article/'.$article->slug)}}">
                <img src="{{$article->image}}">
            </a>
            <header>
                <a href="{{url('article/'.$article->slug)}}">
                    <h4>{{$article->title}}</h4>
                </a>
                <dl>
                    <dd><i class="fa fa-user"></i> {{$article->user->name}}</dd>
                    <dd><i class="fa fa-clock-o"></i> <time title="{{$article->created_at->format('D, j. F Y')}}">{{$article->created_at->diffForHumans()}}</time></dd>
                    <dd><i class="fa fa-folder"></i> <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a></dd>
                    <?php
                        $tags = $article->tags->map(function ($tag) {
                            return sprintf('<a href="/tags/%s">%s</a>', $tag['slug'], $tag['name']);
                        })->all();
                    ?>
                    <dd><i class="fa fa-tags"></i> {!! implode(', ', $tags) !!}</dd>
                </dl>
            </header>
            @markdown((str_limit($article->body, 200, '...')))
            <div class="social-share">
            <a href="http://www.facebook.com/sharer.php?u={{rawurlencode(url('article/'.$article->slug))}}&title={{$article->title}}" 
                onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" 
                rel="nofollow" 
                data-original-title="Share on Facebook">
                <i class="fa fa-facebook-official fa-fw" aria-hidden="true">
                </i>
            </a>
            <a href="http://www.twitter.com/share?url={{rawurlencode(url('article/'.$article->slug))}}&title={{$article->title}}" 
                onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" 
                rel="nofollow" 
                data-original-title="Share on Twitter">
                <i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
            </a>
            <a href="https://plus.google.com/share?url={{rawurlencode(url('article/'.$article->slug))}}&title={{$article->title}}" 
                onclick="window.open(this.href, 'windowName', 'width=600, height=400, left=24, top=24, scrollbars, resizable'); return false;" 
                rel="nofollow" 
                data-original-title="Share on Google+">
                <i class="fa fa-google-plus fa-fw" aria-hidden="true"></i></a>
            <a href="/"><i class="fa fa-reddit-alien fa-fw" aria-hidden="true"></i></a>
            </div>
            <a class="readmore" href="{{url('article/'.$article->slug)}}">Read More</a>
        </article>
        @endforeach
        @unless (count($articles))
        <div class="box center">
            <p>Unfortunately, no items were returned.</p>
        </div>
        @endunless
        {!! $articles->render() !!}
    </section>
    @include('layouts.partials.blog_sidebar')
</div>
@endsection
