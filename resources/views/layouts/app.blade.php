<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Online Siksha — Exam Management System')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; color: #1a1a2e; }

        /* ── NAVBAR ── */
        .nav {
            display: flex; justify-content: space-between; align-items: center;
            padding: 0 48px; height: 64px;
            background: #fff; border-bottom: 1px solid #e2e8f0;
            position: sticky; top: 0; z-index: 999;
        }
        .nav-logo {
            font-size: 22px; font-weight: 700; color: #185FA5;
            display: flex; align-items: center; gap: 8px;
        }
        .nav-logo .dot { color: #f59e0b; }
        .nav-links { display: flex; gap: 32px; list-style: none; }
        .nav-links a {
            font-size: 14px; color: #64748b; text-decoration: none;
            font-weight: 500; transition: color 0.2s;
        }
        .nav-links a:hover { color: #185FA5; }
        .nav-actions { display: flex; gap: 10px; align-items: center; }
        .btn-nav-login {
            padding: 8px 20px; border: 1.5px solid #185FA5;
            color: #185FA5; background: transparent;
            border-radius: 8px; font-size: 14px; font-weight: 500;
            cursor: pointer; text-decoration: none;
        }
        .btn-nav-login:hover { background: #e6f1fb; }
        .btn-nav-start {
            padding: 8px 20px; background: #185FA5;
            color: #fff; border: none;
            border-radius: 8px; font-size: 14px; font-weight: 500;
            cursor: pointer; text-decoration: none;
        }
        .btn-nav-start:hover { background: #1251891; }

        /* ── FOOTER ── */
        footer {
            background: #1a1a2e; color: #94a3b8;
            padding: 48px; margin-top: 0;
        }
        .footer-grid {
            display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px; max-width: 1100px; margin: 0 auto 40px;
        }
        .footer-brand .logo {
            font-size: 20px; font-weight: 700;
            color: #fff; margin-bottom: 12px;
        }
        .footer-brand .logo span { color: #f59e0b; }
        .footer-brand p { font-size: 13px; line-height: 1.7; color: #94a3b8; }
        .footer-col h4 { font-size: 13px; font-weight: 600; color: #fff; margin-bottom: 14px; text-transform: uppercase; letter-spacing: 0.8px; }
        .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 8px; }
        .footer-col ul li a { font-size: 13px; color: #94a3b8; text-decoration: none; }
        .footer-col ul li a:hover { color: #fff; }
        .footer-bottom {
            border-top: 1px solid #2d3748; padding-top: 24px;
            display: flex; justify-content: space-between; align-items: center;
            max-width: 1100px; margin: 0 auto;
        }
        .footer-bottom p { font-size: 13px; color: #64748b; }

        /* ── HAMBURGER ── */
        .hamburger { display: none; background: none; border: none; cursor: pointer; font-size: 22px; color: #185FA5; }

        @media (max-width: 768px) {
            .nav { padding: 0 20px; }
            .nav-links { display: none; }
            .hamburger { display: block; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
    @yield('styles')
</head>
<body>

{{-- NAVBAR --}}
<nav class="nav">
    <div class="nav-logo">
        <i class="ti ti-school" aria-hidden="true"></i>
        Online<span class="dot">Siksha</span>
    </div>
    <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="nav-actions">
        <a href="/admin" class="btn-nav-login">Sign in</a>
        <a href="/admin" class="btn-nav-start">Get started</a>
    </div>
    <button class="hamburger"><i class="ti ti-menu-2"></i></button>
</nav>

{{-- PAGE CONTENT --}}
@yield('content')

{{-- FOOTER --}}
<footer>
    <div class="footer-grid">
        <div class="footer-brand">
            <div class="logo">Online<span>Siksha</span></div>
            <p>Nepal's smart web-based exam management platform. Digitizing examinations for schools across the country.</p>
        </div>
        <div class="footer-col">
            <h4>Platform</h4>
            <ul>
                <li><a href="#">Features</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">Roadmap</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Users</h4>
            <ul>
                <li><a href="#">For Schools</a></li>
                <li><a href="#">For Teachers</a></li>
                <li><a href="#">For Students</a></li>
                <li><a href="#">Admin Panel</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Company</h4>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2082-83 Online Siksha. All rights reserved.</p>
        <p>Built with Laravel & Filament · Made in Nepal 🇳🇵</p>
    </div>
</footer>

</body>
</html>



