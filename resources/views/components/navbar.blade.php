<nav class="os-navbar">
    <div class="os-navbar-inner">

        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="os-logo">
            <div class="os-logo-mark">
                <svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 1L14 5V11L8 15L2 11V5L8 1Z"/>
                    <path d="M8 1V15M2 5L14 11M14 5L2 11"/>
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
                @if(auth()->user()->role === 'admin')
                    <div class="dropdown">
                        <a class="os-btn-ghost dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin Panel
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="border-radius:12px;min-width:180px;">
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2" style="color:#1a56db;"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('admin.users') }}">
                                    <i class="fas fa-users me-2" style="color:#1a56db;"></i>Users
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('admin.classes') }}">
                                    <i class="fas fa-school me-2" style="color:#1a56db;"></i>Classes
                                </a>
                            </li>
                        </ul>
                    </div>
                @elseif(auth()->user()->role === 'teacher')
                    <a href="{{ route('teacher.dashboard') }}" class="os-btn-ghost">Dashboard</a>
                @else
                    <a href="{{ route('student.dashboard') }}" class="os-btn-ghost">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="os-btn-primary">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="os-btn-ghost">Log In</a>
                <a href="{{ route('login') }}" class="os-btn-primary">Get Started Free</a>
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
            @auth
                @if(auth()->user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.users') }}">Users</a></li>
                    <li><a href="{{ route('admin.classes') }}">Classes</a></li>
                @endif
            @endauth
        </ul>
        <div class="os-mobile-cta">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="os-btn-primary" style="width:100%;text-align:center">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="os-btn-ghost" style="width:100%;text-align:center;display:block;margin-bottom:8px">Log In</a>
                <a href="{{ route('login') }}" class="os-btn-primary" style="width:100%;text-align:center;display:block">Get Started Free</a>
            @endauth
        </div>
    </div>
</nav>
