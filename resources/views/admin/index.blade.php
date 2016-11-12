@extends('layouts.admin')

@section('title', 'Admin')
@section('description', 'This is a description')
@section('keywords', 'These, are, keywords')
@section('content')
<section class="admin-main center">
    <section class="row">
     <div class="fourth box info-box">
        <span class="orangeBg">
            <i class="fa fa-cog"></i>
        </span>
        <p>visits today</p>
     </div>
     <div class="fourth box info-box">
        <span class="redBg">
            <i class="fa fa-cog"></i>
        </span>
        Unique visitors
     </div>
     <div class="fourth box info-box">
        <span class="oliveBg">
            <i class="fa fa-cog"></i>
        </span>
        Page views
     </div>
     <div class="fourth box info-box">
        <span class="navyBg">
            <i class="fa fa-cog"></i>
        </span>
        Comments
     </div>
    </section>
</section>
@stop
