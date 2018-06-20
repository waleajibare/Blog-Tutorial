<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Laravel Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="{{Request::is('/') ? "active" : ""}}">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="{{Request::is('blog') ? "active" : ""}}">
        <a class="nav-link" href="/blog">Blog</a>
      </li>
      <li class="{{Request::is('about') ? "active" : ""}}">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="{{Request::is('contact') ? "active" : ""}}">
        <a class="nav-link" href="/contact">Contact</a>
      </li>
      
    </ul>
    <div class="nav-item dropdown">
      @if (Auth::check())
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
          <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
          <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
          <a class="dropdown-item" href="{{ route('register') }}">Register</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
      @else

      <a href="{{ route('login') }}" class="btn btn-success">Login</a>

      @endif

    </div>
  </div>
</nav>
<br> 