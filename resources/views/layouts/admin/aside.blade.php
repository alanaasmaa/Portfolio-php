<aside class="box">
    <header>
        <a href="/profile/{{ Auth::user()->id}}">
            {{ Auth::user()->name }}
            <img src="{{ Gravatar::src(Auth::user()->email, 40)  }}">
        </a>
    </header>
</aside>