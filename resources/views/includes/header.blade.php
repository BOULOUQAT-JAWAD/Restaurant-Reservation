<nav class="nav-main">
    <div class="toggle-btn"></div>
    <a href="/" id="logo"><div class="logo"></div></a>
    <div class="half-nav">
        <a href="/category" id="menu-link">Menu</a>
        <a @if(session()->has('loggedUser'))
               href="/reservation/create"
           @else
               href="/account/login"
        @endif
        id="reservation-link">Make reservation</a>
    </div>
    @if(session()->has('loggedUser'))
        <a id="logoutBtn" href="{{route('account.logout')}}">Logout</a>
    @endif
</nav>
<aside class="nav-sidebar">
    <ul>
        <li><a href="/">HOME</a></li>
        <li><a href="/category">Menu</a></li>
        <li><a href="/account/login">Make reservation</a></li>
        <li><a href="/#AboutUs">ABOUT US</a></li>
        <li><a href="#ContactUs">CONTACT US</a></li>
    </ul>
</aside>
