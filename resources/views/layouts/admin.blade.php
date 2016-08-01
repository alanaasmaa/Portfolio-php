<!DOCTYPE html>
<html>
    <head>
        @include('layouts.admin.meta') 
        <title>Alan Aasmaa - @yield('title')</title>
        @include('layouts.admin.css') 
        @include('layouts.admin.shim')
    </head>
    <body>
        @include('errors.list') 
        @include('layouts.admin.aside')
        @yield('content')
        @include('cookieConsent::index')
    </body>
</html>