<section class="navbar box container">
    <nav>
      <span>
        <a href="{{url('/')}}" title="alan aasmaa" id="logo">alan aasmaa</a>
      </span>
      <input type="checkbox" id="nav-trigger" />
      <label for="nav-trigger">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </label>
    </nav>
    <nav id="nav">
      <ul>
        <li><a class="{!! set_active('/') !!}" href="/">Etusivu</a></li>
        <li><a class="{!! set_active('blog') !!}" href="{{ url('blog')}}" aria-haspopup="true">Blog</a>
          <ul>
            <li><a href="/">Design</a></li>
            <li><a href="/">HTML</a></li>
            <li><a href="/">CSS</a></li>
            <li><a href="/">Java</a></li>
          </ul>
        </li>
        <li><a class="{!! set_active('portfolio') !!}" href="{{ url('portfolio')}}">Portfolio</a></li>
      </ul>
      @if (Auth::check())
        <ul class="center">
        <li><a href="logout">{{ Auth::user()->name }}</a>
          </li><img class="navimg" src="{{ Gravatar::src(Auth::user()->email, 40)  }}">
        </ul>
      @endif
    </nav>
    <nav>
      <ul>
        <li><a href="https://github.com/alanaasmaa"><i class="fa fa-github" aria-hidden="true"></i></a></li>     
        <li><a href="https://www.linkedin.com/in/alanaasmaa"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href="http://codepen.io/thasmog/"><i class="fa fa-codepen" aria-hidden="true"></i></a></li>
      </ul>
    </nav>
</section>