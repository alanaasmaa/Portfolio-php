@extends('layouts.master')

@section('title', 'Categories')
@section('description', 'This is a description')
@section('keywords', 'These, are, keywords')
@section('content')
<div class="container">
    <section class="sideContent">
        @foreach ($articles as $article)
        <div class="box">
            <a href="{{url('article/'.$article->slug)}}">
                <img src="{{$article->image}}" class="blog-img">
                <h4>{{$article->title}}</h4>
            </a>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> {{$article->user->name}}</li>
                    <li><i class="fa fa-clock-o"></i> {{$article->created_at->diffForHumans()}}</li>
                    <li><i class="fa fa-folder"></i> <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a></li>
                    <li><i class="fa fa-tags"></i> @foreach($article->tags as $key => $tag)<a href="/tags/{{ $tag->slug }}"> {{ $tag->name }}</a>@endforeach</li>
                </ul>
            </div>
            <p>{!! str_limit($article->body_html, $limit = 200, $end = '...') !!}</p>
            <a  class="btn btn-primary" href="{{url('article/'.$article->slug)}}">Read More</a>
        </div>
        @endforeach
        <div class="box center">
            {!! $articles->render() !!}
        </div>
    </section>
    @include('layouts.partials.blog_sidebar')
</div>
@endsection