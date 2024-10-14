<nav class="nav">
    @auth
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}" class="btn btn-primary">
            Log in
        </a>

        @if (Route::has('register'))
            <a  href="{{ route('register') }}" class="btn btn-primary">
                Register
            </a>
        @endif

    @endauth
</nav>
