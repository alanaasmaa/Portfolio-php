<!DOCTYPE html>
<html>
    <head>
        @include('layouts.admin.meta') 
        <title>Alan Aasmaa - @yield('title')</title>
        @include('layouts.admin.css') 
        @include('layouts.admin.shim')
    </head>
    <body>
        @include('layouts.admin.navbar')
        @include('errors.list') 
        @yield('content')
        @include('cookieConsent::index')
    </body>
</html>