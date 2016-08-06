<aside class="box">
    <header>
        <a href="/profile/{{ Auth::user()->id}}">
            <img src="{{ Gravatar::src(Auth::user()->email, 80)  }}">
        </a>
        <a href="/profile/{{ Auth::user()->id}}">
            <h4>{{ Auth::user()->name }}</h4>
        </a>
        <p>Owner</p>
        <ul>
            <li><a href="index.html"><span>Profile</span><i class="fa fa-user"></i></a></li>
            <li><a href="index.html"><span>Settings</span><i class="fa fa-cog"></i></a></li>
            <li><a href="index.html"><span>Log out</span><i class="fa fa-sign-out"></i></a></li>
        </ul>
    </header>
    <section>
    <h6>Navigation</h6>
    <ul>
        <li><a href="admin/">Dashboard</a></li>
        <li><a href="admin/email">Email</a></li>
        <li><a href="admin/users">Users</a></li>
    </ul>
    <section>
</aside>