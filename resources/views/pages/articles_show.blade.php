@extends('layouts.master')
<?php
    $tags = $article->tags->map(function ($tag) {
        return sprintf('<a href="/tags/%s">%s</a>', $tag['slug'], $tag['name']);
    })->all();
    $keywords = $article->tags->map(function ($tag) {
        return sprintf('%s',  $tag['name']);
    })->all();
?>
@section('title', $article->title)
@section('description', $article->title)
@section('keywords', 'blog, ' . implode(', ', $keywords))
@section('author', $article->user->name)
@section('content')
<div class="container">
    <section class="sideContent">
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
                    <dd><i class="fa fa-tags"></i> {!! implode(', ', $tags) !!}</dd>
                </dl>
            </header>
            @markdown(($article->body))
            @unless(is_null($article->original) || empty($article->original))
			    <p class="source"><b>Source:</b> {!!str_limit($article->original, 50, '...')!!}</p>
		    @endunless
            <div class="social-share right">
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
        </article>
        {!! $article->nextPageUrl() !!}
    </section>
    @include('layouts.partials.blog_sidebar')
</div>
@stop
