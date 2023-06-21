<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/about">We Like 3deHands.be</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/news">Latest News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/products">List Products</a>
            </li>
            @if( auth()->check() )
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="/profile">Hi {{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
                @if( auth()->user()->isAdmin() )
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="/users">AdminTools</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/logon">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/reg">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
