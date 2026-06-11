{{-- <x-layout>
    <x-slot name="title">
        Sign In
    </x-slot>

    <section class="min-h-[calc(100vh-4rem)] flex items-center justify-center px-8 py-16">

        <div class="w-full max-w-[400px]">
            <div class="text-center">
                <span
                    class="inline-flex items-center gap-1.5 text-xs font-medium text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full mb-7">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                    Exam Management System
                </span>
            </div>

            <h1 class="text-2xl font-semibold tracking-tight text-slate-900 mb-2 text-center">
                Sign in to your account
            </h1>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="username" class="block text-base font-medium text-slate-700 mb-1.5">
                        Username
                    </label>

                    <input
                        id="username"
                        name="username"
                        type="text"
                        required
                        autofocus
                        value="{{ old('username') }}"
                        class="w-full text-base px-4 py-2 text-slate-900 bg-white border border-slate-200 rounded-[10px] placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-colors"
                        placeholder="Enter your username"
                    />

                    @error('username')
                        <p class="text-sm text-red-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-base font-medium text-slate-700 mb-1.5">
                        Password
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="w-full text-base px-4 py-2 text-slate-900 bg-white border border-slate-200 rounded-[10px] placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-colors"
                        placeholder="Enter your password"
                    />

                    @error('password')
                        <p class="text-sm text-red-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                @if ($errors->any() && !$errors->has('username') && !$errors->has('password'))
                    <p class="text-sm text-red-500">{{ $errors->first() }}</p>
                @endif

                <button
                    type="submit"
                    class="font-medium text-base w-full text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-[10px] transition-colors">
                    Sign in
                </button>

            </form>

            <p class="text-sm text-center text-slate-400 mt-8 leading-relaxed">
                Don't have credentials? Contact your administrator.
            </p>

        </div>

    </section>
 </x-layout>  --}}

 <x-layout>
    <x-slot name="title">
        Sign In — Online Siksha
    </x-slot>

    <x-slot name="styles">
    <style>
    /* ── LOGIN PAGE ── */
    .os-login-wrap {
        min-height: calc(100vh - 68px);
        background: linear-gradient(160deg, var(--blue-ll) 0%, var(--white) 60%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1.5rem;
        position: relative;
        overflow: hidden;
    }
    .os-login-wrap::before {
        content: '';
        position: absolute;
        top: -120px; right: -120px;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(26,86,219,0.07) 0%, transparent 70%);
        pointer-events: none;
    }
    .os-login-wrap::after {
        content: '';
        position: absolute;
        bottom: -80px; left: -80px;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(26,86,219,0.05) 0%, transparent 70%);
        pointer-events: none;
    }
    .os-login-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        max-width: 960px;
        width: 100%;
        background: var(--white);
        border-radius: 24px;
        border: 1px solid var(--border);
        overflow: hidden;
        position: relative;
        z-index: 1;
        box-shadow: 0 20px 60px rgba(26,86,219,0.08);
    }

    /* LEFT PANEL */
    .os-login-left {
        background: #0b2d7a;
        padding: 3rem 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }
    .os-login-left::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255,255,255,0.035) 1px, transparent 1px);
        background-size: 18px 18px;
        pointer-events: none;
    }
    .os-login-left-logo {
        display: flex;
        align-items: center;
        gap: 9px;
        font-family: 'Sora', sans-serif;
        font-weight: 900;
        font-size: 1.2rem;
        color: #fff;
        text-decoration: none;
        position: relative;
        z-index: 1;
    }
    .os-login-left-logo .os-logo-mark {
        width: 30px; height: 30px;
        background: rgba(255,255,255,0.15);
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
    }
    .os-login-left-logo .os-logo-mark svg {
        width: 16px; height: 16px;
        fill: none; stroke: #fff;
        stroke-width: 2.2; stroke-linecap: round; stroke-linejoin: round;
    }
    .os-login-left-body {
        position: relative;
        z-index: 1;
    }
    .os-login-left-body h2 {
        font-family: 'Sora', sans-serif;
        font-size: 1.75rem;
        font-weight: 900;
        color: #fff;
        letter-spacing: -0.8px;
        line-height: 1.2;
        margin-bottom: 0.875rem;
    }
    .os-login-left-body h2 em {
        font-style: normal;
        color: #93c5fd;
    }
    .os-login-left-body p {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.5);
        line-height: 1.7;
        margin-bottom: 2rem;
    }
    .os-login-features {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    .os-login-features li {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.855rem;
        color: rgba(255,255,255,0.65);
    }
    .os-lf-icon {
        width: 30px; height: 30px;
        background: rgba(255,255,255,0.08);
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        font-size: 0.8rem;
        color: #93c5fd;
    }
    .os-login-left-footer {
        position: relative;
        z-index: 1;
        font-size: 0.75rem;
        color: rgba(255,255,255,0.25);
    }

    /* RIGHT PANEL */
    .os-login-right {
        padding: 3rem 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .os-login-right-top {
        margin-bottom: 2rem;
    }
    .os-login-right-top h3 {
        font-family: 'Sora', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--text);
        letter-spacing: -0.5px;
        margin-bottom: 0.35rem;
    }
    .os-login-right-top p {
        font-size: 0.875rem;
        color: var(--muted);
    }

    /* ROLE TABS */
    .os-role-tabs {
        display: flex;
        gap: 6px;
        background: var(--surface);
        border-radius: 10px;
        padding: 4px;
        margin-bottom: 1.75rem;
    }
    .os-role-tab {
        flex: 1;
        padding: 0.5rem 0;
        text-align: center;
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--muted);
        border-radius: 7px;
        cursor: pointer;
        transition: all 0.15s;
        border: none;
        background: transparent;
        font-family: 'DM Sans', sans-serif;
    }
    .os-role-tab.active {
        background: var(--white);
        color: var(--blue);
        border: 1px solid var(--border);
    }

    /* FORM */
    .os-form-group {
        margin-bottom: 1.1rem;
    }
    .os-form-label {
        display: block;
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 0.4rem;
    }
    .os-form-label span {
        color: #e53e3e;
        margin-left: 2px;
    }
    .os-form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--border);
        border-radius: 10px;
        font-size: 0.9rem;
        color: var(--text);
        background: var(--white);
        transition: all 0.15s;
        font-family: 'DM Sans', sans-serif;
        outline: none;
    }
    .os-form-input:focus {
        border-color: var(--blue);
        box-shadow: 0 0 0 3px rgba(26,86,219,0.08);
    }
    .os-form-input::placeholder {
        color: var(--subtle);
    }
    .os-form-input-wrap {
        position: relative;
    }
    .os-form-input-wrap .os-form-input {
        padding-right: 2.75rem;
    }
    .os-input-icon {
        position: absolute;
        right: 0.875rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--subtle);
        font-size: 0.875rem;
        cursor: pointer;
        transition: color 0.15s;
    }
    .os-input-icon:hover { color: var(--blue); }

    .os-form-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }
    .os-remember {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 0.82rem;
        color: var(--muted);
        cursor: pointer;
    }
    .os-remember input[type="checkbox"] {
        width: 15px; height: 15px;
        accent-color: var(--blue);
        cursor: pointer;
    }
    .os-forgot {
        font-size: 0.82rem;
        color: var(--blue);
        font-weight: 600;
        text-decoration: none;
    }
    .os-forgot:hover { text-decoration: underline; }

    /* SUBMIT BUTTON */
    .os-btn-login {
        width: 100%;
        padding: 0.875rem;
        background: var(--blue);
        color: #fff;
        border: none;
        border-radius: 11px;
        font-size: 1rem;
        font-weight: 700;
        font-family: 'Sora', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-bottom: 1.25rem;
    }
    .os-btn-login:hover {
        background: var(--blue-dark);
        transform: translateY(-1px);
    }
    .os-btn-login:active { transform: translateY(0); }

    /* ERROR & SUCCESS ALERTS */
    .os-alert {
        padding: 0.75rem 1rem;
        border-radius: 10px;
        font-size: 0.855rem;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: flex-start;
        gap: 8px;
        line-height: 1.5;
    }
    .os-alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
    }
    .os-alert-success {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #15803d;
    }
    .os-alert i { flex-shrink: 0; margin-top: 2px; }

    .os-login-divider {
        text-align: center;
        font-size: 0.78rem;
        color: var(--subtle);
        margin-bottom: 1.25rem;
        position: relative;
    }
    .os-login-divider::before,
    .os-login-divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 38%;
        height: 1px;
        background: var(--border-l);
    }
    .os-login-divider::before { left: 0; }
    .os-login-divider::after { right: 0; }

    .os-login-back {
        text-align: center;
        font-size: 0.82rem;
        color: var(--muted);
    }
    .os-login-back a {
        color: var(--blue);
        font-weight: 600;
        text-decoration: none;
    }
    .os-login-back a:hover { text-decoration: underline; }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .os-login-grid { grid-template-columns: 1fr; }
        .os-login-left { padding: 2rem 1.75rem; }
        .os-login-left-body h2 { font-size: 1.4rem; }
        .os-login-right { padding: 2rem 1.75rem; }
    }
    </style>
    </x-slot>

    <div class="os-login-wrap">
        <div class="os-login-grid">

            {{-- ── LEFT PANEL ── --}}
            <div class="os-login-left">
                <a href="{{ url('/') }}" class="os-login-left-logo">
                    <div class="os-logo-mark">
                        <svg viewBox="0 0 16 16">
                            <path d="M8 1L14 5V11L8 15L2 11V5L8 1Z"/>
                            <path d="M8 1V15M2 5L14 11M14 5L2 11"/>
                        </svg>
                    </div>
                    Online Siksha
                </a>

                <div class="os-login-left-body">
                    <h2>Welcome<br>back to<br><em>Online Siksha.</em></h2>
                    <p>Sign in to access your dashboard — exams, results, and everything your school needs.</p>
                    <ul class="os-login-features">
                        <li>
                            <div class="os-lf-icon"><i class="fa-solid fa-clock"></i></div>
                            Timed exams with auto-submit
                        </li>
                        <li>
                            <div class="os-lf-icon"><i class="fa-solid fa-bolt"></i></div>
                            Instant results on submission
                        </li>
                        <li>
                            <div class="os-lf-icon"><i class="fa-solid fa-shield-halved"></i></div>
                            Role-based secure access
                        </li>
                        <li>
                            <div class="os-lf-icon"><i class="fa-solid fa-bell"></i></div>
                            In-app exam notifications
                        </li>
                    </ul>
                </div>

                <div class="os-login-left-footer">
                    © {{ date('Y') }} Online Siksha · Built for Nepali Schools
                </div>
            </div>

            {{-- ── RIGHT PANEL ── --}}
            <div class="os-login-right">
                <div class="os-login-right-top">
                    <h3>Sign in to your account</h3>
                    <p>Enter your email and password to continue.</p>
                </div>

                {{-- ROLE TABS (visual only — role determined by credentials) --}}
                <div class="os-role-tabs">
                    <button class="os-role-tab active" onclick="setTab(this, 'admin')">
                        <i class="fa-solid fa-user-shield"></i> Admin
                    </button>
                    <button class="os-role-tab" onclick="setTab(this, 'teacher')">
                        <i class="fa-solid fa-chalkboard-teacher"></i> Teacher
                    </button>
                    <button class="os-role-tab" onclick="setTab(this, 'student')">
                        <i class="fa-solid fa-user-graduate"></i> Student
                    </button>
                </div>

                {{-- SESSION ERROR --}}
                @if ($errors->any())
                    <div class="os-alert os-alert-error">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                {{-- SESSION SUCCESS (e.g. after password reset) --}}
                @if (session('status'))
                    <div class="os-alert os-alert-success">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                {{-- LOGIN FORM --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="os-form-group">
                        <label class="os-form-label" for="email">
                            Email address <span>*</span>
                        </label>
                        <div class="os-form-input-wrap">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="os-form-input"
                                placeholder="you@school.edu.np"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="email"
                            >
                            <i class="fa-solid fa-envelope os-input-icon"></i>
                        </div>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="os-form-group">
                        <label class="os-form-label" for="password">
                            Password <span>*</span>
                        </label>
                        <div class="os-form-input-wrap">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="os-form-input"
                                placeholder="Enter your password"
                                required
                                autocomplete="current-password"
                            >
                            <i class="fa-solid fa-eye os-input-icon" id="osTogglePwd" onclick="togglePwd()"></i>
                        </div>
                    </div>

                    {{-- REMEMBER + FORGOT --}}
                    <div class="os-form-row">
                        <label class="os-remember">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember me
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="os-forgot">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    {{-- SUBMIT --}}
                    <button type="submit" class="os-btn-login">
                        Sign In
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </form>

                <div class="os-login-divider">or</div>

                <div class="os-login-back">
                    Not a member yet?
                    <a href="{{ url('/') }}">Contact your school admin</a>
                </div>

            </div>
        </div>
    </div>

    <x-slot name="scripts">
    <script>
        // Password show/hide toggle
        function togglePwd() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('osTogglePwd');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Role tab switcher (visual only)
        function setTab(el, role) {
            document.querySelectorAll('.os-role-tab').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
            if (role == 'admin') {
                window.location.herf ='/admin';
            }
        }
    </script>
    </x-slot>

</x-layout>
