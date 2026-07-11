<nav class="os-navbar">
    <div class="os-navbar-inner">

        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="os-logo">
            <div class="os-logo-mark">
                <svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M8 1L14 5V11L8 15L2 11V5L8 1Z" />
                    <path d="M8 1V15M2 5L14 11M14 5L2 11" />
                </svg>
            </div>
            <span>Online<strong>Siksha</strong></span>
        </a>

        {{-- NAV LINKS --}}
        <ul class="os-nav-links">
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        {{-- CTA BUTTONS --}}
        <div class="os-nav-cta">
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="/admin" class="os-btn-ghost">Admin Panel</a>
                @elseif(auth()->user()->role === 'teacher')
                    {{-- <a href="{{ route('teacher.dashboard') }}" class="os-btn-ghost">Dashboard</a> --}}
                    <a href="#" class="os-btn-ghost">Dashboard</a>
                @else
                    {{-- <a href="{{ route('student.dashboard') }}" class="os-btn-ghost">Dashboard</a> --}}
                    <a href="#" class="os-btn-ghost">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="os-btn-primary">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="os-btn-primary">Log In</a>
            @endauth
        </div>

        {{-- MOBILE HAMBURGER --}}
        <button class="os-hamburger" id="osHamburger" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>

    </div>

    {{-- MOBILE MENU --}}
    <div class="os-mobile-menu" id="osMobileMenu">
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="os-mobile-cta">
            @auth
                <a href="{{ route('logout') }}" class="os-btn-primary" style="width:100%;text-align:center">Log Out</a>
            @else
                <a href="{{ route('login') }}" class="os-btn-primary"
                    style="width:100%;text-align:center;display:block">Log In</a>
            @endauth
        </div>
    </div>
</nav>
