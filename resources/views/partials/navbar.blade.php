<nav class="navbar navbar-expand-lg bg-yellow border-dark border-bottom fixed-top">
  <div class="container">
      <a class="navbar-brand" href="/">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ ($active === "home" ? 'active fw-bold' : '') }}" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($active === "about" ? 'active fw-bold' : '') }}" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($active === "posts" ? 'active fw-bold' : '') }}" href="/posts">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($active === "categories" ? 'active fw-bold' : '') }}" href="/categories">Categories</a>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">

            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="/dashboard">
                      <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard
                    </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      
                      <button type="submit" class="dropdown-item">
                        <i class="bi bi-door-open-fill"></i> Logout
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            @else
            <div class="d-flex align-items-center">
              <li class="nav-item">
                <a href="/login" class="nav-link {{ ($active === "login" ? 'active fw-bold' : '') }}">
                  Sign in
                </a>
              </li>
              <li class="nav-item">
                <a href="/register" class="{{ ($active === "register" ? 'active fw-bold' : '') }} btn btn-black ms-3 rounded-pill py-1" role="button">
                  Get Started
                </a>
              </li>
            </div>
            @endauth
          </ul>
      </div>
  </div>
</nav>