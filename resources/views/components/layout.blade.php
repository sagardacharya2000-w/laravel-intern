<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Online Siksha — Smart Exam Management' }}</title>

    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800;900&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

    {{-- BOOTSTRAP 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
     <script src="https://cdn.tailwindcss.com"></script>
    {{-- GLOBAL STYLES --}}
    <style>
        :root {
            --blue:       #1a56db;
            --blue-dark:  #1040b0;
            --blue-light: #e8f0fe;
            --blue-ll:    #f0f5ff;
            --text:       #0a0f1e;
            --muted:      #5a6480;
            --subtle:     #8892a4;
            --white:      #ffffff;
            --surface:    #f7f9ff;
            --border:     #dde5f7;
            --border-l:   #eef2fb;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background: var(--white);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        .os-navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-l);
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .os-navbar-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 5%;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .os-logo {
            font-family: 'Sora', sans-serif;
            font-weight: 900;
            font-size: 1.4rem;
            color: var(--blue);
            text-decoration: none;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 9px;
            white-space: nowrap;
        }
        .os-logo strong { color: var(--text); font-weight: 900; }
        .os-logo-mark {
            width: 30px; height: 30px;
            background: var(--blue);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .os-logo-mark svg { width: 16px; height: 16px; }
        .os-nav-links {
            display: flex; gap: 0; list-style: none;
            align-items: center;
        }
        .os-nav-links a {
            color: var(--muted);
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.4rem 0.85rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.15s;
            white-space: nowrap;
        }
        .os-nav-links a:hover,
        .os-nav-links a.active {
            color: var(--blue);
            background: var(--blue-light);
        }
        .os-nav-cta { display: flex; gap: 0.5rem; align-items: center; }
        .os-btn-ghost {
            padding: 0.45rem 1rem;
            color: var(--muted);
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.15s;
            border: none;
            background: transparent;
            cursor: pointer;
            white-space: nowrap;
        }
        .os-btn-ghost:hover { color: var(--blue); background: var(--blue-light); }
        .os-btn-primary {
            padding: 0.5rem 1.15rem;
            background: var(--blue);
            color: #fff !important;
            border-radius: 9px;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: 'Sora', sans-serif;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }
        .os-btn-primary:hover { background: var(--blue-dark); }

        /* HAMBURGER */
        .os-hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
        }
        .os-hamburger span {
            display: block;
            width: 22px; height: 2px;
            background: var(--text);
            border-radius: 2px;
            transition: all 0.2s;
        }

        /* MOBILE MENU */
        .os-mobile-menu {
            display: none;
            background: var(--white);
            border-top: 1px solid var(--border-l);
            padding: 1rem 5%;
        }
        .os-mobile-menu.open { display: block; }
        .os-mobile-menu ul { list-style: none; margin-bottom: 1rem; }
        .os-mobile-menu ul li { border-bottom: 1px solid var(--border-l); }
        .os-mobile-menu ul a {
            display: block;
            padding: 0.75rem 0;
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .os-mobile-cta { display: flex; flex-direction: column; gap: 8px; }

        /* RESPONSIVE NAV */
        @media (max-width: 768px) {
            .os-nav-links,
            .os-nav-cta { display: none; }
            .os-hamburger { display: flex; }
        }

        /* ── FOOTER ── */
        .os-footer {
            background: var(--text);
            padding: 3rem 5% 2rem;
        }
        .os-footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            max-width: 1180px;
            margin: 0 auto;
            padding-bottom: 2.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .os-footer-brand p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.3);
            line-height: 1.7;
            max-width: 230px;
            margin-top: 0.875rem;
        }
        .os-footer-col h4 {
            font-family: 'Sora', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            color: rgba(255,255,255,0.4);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 0.875rem;
        }
        .os-footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 0.55rem; }
        .os-footer-col a {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.3);
            text-decoration: none;
            transition: color 0.15s;
        }
        .os-footer-col a:hover { color: rgba(255,255,255,0.75); }
        .os-footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1180px;
            margin: 2rem auto 0;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.22);
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        .os-footer-links { display: flex; gap: 1.5rem; }
        .os-footer-links a { color: rgba(255,255,255,0.22); text-decoration: none; }
        .os-footer-links a:hover { color: rgba(255,255,255,0.55); }

        @media (max-width: 768px) {
            .os-footer-top { grid-template-columns: 1fr 1fr; gap: 2rem; }
        }
        @media (max-width: 480px) {
            .os-footer-top { grid-template-columns: 1fr; }
        }
    </style>

    {{-- PER-PAGE EXTRA STYLES --}}
    {{ $styles ?? '' }}
</head>
<body>

    {{-- NAVBAR --}}
    <x-navbar />

    {{-- PAGE CONTENT --}}
    <main>
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <x-footer />

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- NAVBAR MOBILE TOGGLE --}}
    <script>
        document.getElementById('osHamburger').addEventListener('click', function () {
            document.getElementById('osMobileMenu').classList.toggle('open');
        });
    </script>

    {{-- PER-PAGE EXTRA SCRIPTS --}}
    {{ $scripts ?? '' }}

</body>
</html>
