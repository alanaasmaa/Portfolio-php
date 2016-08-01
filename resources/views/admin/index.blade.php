@extends('layouts.admin')

@section('title', 'Admin')
@section('description', 'This is a description')
@section('keywords', 'These, are, keywords')
@section('content')
<section class="box container center">
Welcome to your ADMINISTRATOR page {{ Auth::user()->name }}
</section>
@stop