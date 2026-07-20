    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Student Panel — Online Siksha' }}</title>


        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.44.0/iconfont/tabler-icons.min.css">

        <style>
            /* ── SAME CSS SYSTEM AS TEACHER LAYOUT ── */
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: #f8f9fb;
                color: #1f2937;
            }

            .shell {
                display: flex;
                min-height: 100vh;
            }

            .sidebar {
                width: 260px;
                background: #fff;
                border-right: 1px solid #eef0f3;
                padding: 24px 16px;
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                overflow-y: auto;
            }

            .sidebar-logo {
                font-size: 20px;
                font-weight: 800;
                padding: 0 12px 24px;
                color: #111827;
            }

            .nav-section-label {
                font-size: 12px;
                font-weight: 600;
                color: #9ca3af;
                text-transform: uppercase;
                letter-spacing: .04em;
                padding: 16px 12px 8px;
            }

            .nav-link {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 10px 12px;
                border-radius: 8px;
                color: #4b5563;
                text-decoration: none;
                font-size: 14px;
                font-weight: 500;
                margin-bottom: 2px;
            }

            .nav-link i {
                font-size: 18px;
                width: 20px;
                text-align: center;
            }

            .nav-link:hover {
                background: #f3f4f6;
                color: #111827;
            }

            .nav-link.active {
                background: #eef2ff;
                color: #4338ca;
            }

            .main {
                margin-left: 260px;
                flex: 1;
                display: flex;
                flex-direction: column;
                min-width: 0;
            }

            .topbar {
                height: 72px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                gap: 16px;
                padding: 0 32px;
                border-bottom: 1px solid #eef0f3;
                background: #fff;
            }

            .search-box {
                display: flex;
                align-items: center;
                gap: 8px;
                background: #f3f4f6;
                border-radius: 8px;
                padding: 8px 14px;
                color: #9ca3af;
                font-size: 14px;
                width: 280px;
            }

            .search-box input {
                border: none;
                background: transparent;
                outline: none;
                font-size: 14px;
                width: 100%;
                color: #1f2937;
            }

            .avatar {
                width: 38px;
                height: 38px;
                border-radius: 50%;
                background: #111827;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 14px;
                flex-shrink: 0;
            }

            .content {
                padding: 32px;
                flex: 1;
            }

            .page-title {
                font-size: 28px;
                font-weight: 800;
                color: #111827;
                margin: 0 0 24px;
            }

            .stat-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 20px;
                margin-bottom: 28px;
            }

            .stat-card {
                background: #fff;
                border: 1px solid #eef0f3;
                border-radius: 12px;
                padding: 20px;
            }

            .stat-label {
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 14px;
                color: #6b7280;
                font-weight: 500;
                margin-bottom: 10px;
            }

            .stat-value {
                font-size: 30px;
                font-weight: 800;
                color: #111827;
            }

            .panel {
                background: #fff;
                border: 1px solid #eef0f3;
                border-radius: 12px;
                margin-bottom: 28px;
                overflow: hidden;
            }

            .panel-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 18px 24px;
                border-bottom: 1px solid #eef0f3;
            }

            .panel-header h3 {
                margin: 0;
                font-size: 17px;
                font-weight: 700;
                color: #111827;
            }

            table.data-table {
                width: 100%;
                border-collapse: collapse;
            }

            table.data-table th {
                text-align: left;
                font-size: 12px;
                text-transform: uppercase;
                letter-spacing: .03em;
                color: #9ca3af;
                font-weight: 600;
                padding: 12px 24px;
                border-bottom: 1px solid #eef0f3;
            }

            table.data-table td {
                padding: 14px 24px;
                font-size: 14px;
                color: #1f2937;
                border-bottom: 1px solid #f4f5f7;
            }

            table.data-table tr:last-child td {
                border-bottom: none;
            }

            .empty-state {
                padding: 40px 24px;
                text-align: center;
                color: #9ca3af;
                font-size: 14px;
            }

            .badge {
                display: inline-block;
                font-size: 12px;
                font-weight: 600;
                padding: 3px 10px;
                border-radius: 999px;
            }

            .badge-green {
                background: #ecfdf5;
                color: #047857;
            }

            .badge-amber {
                background: #fffbeb;
                color: #b45309;
            }

            .badge-gray {
                background: #f3f4f6;
                color: #6b7280;
            }

            .alert-success {
                background: #ecfdf5;
                color: #047857;
                border: 1px solid #a7f3d0;
                padding: 12px 16px;
                border-radius: 8px;
                margin-bottom: 20px;
                font-size: 14px;
            }

            .btn-primary {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: #4338ca;
                color: #fff;
                border: none;
                padding: 9px 16px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 600;
                text-decoration: none;
                cursor: pointer;
            }

            .btn-primary:hover {
                background: #3730a3;
            }

            .btn-secondary {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: #f3f4f6;
                color: #374151;
                border: none;
                padding: 9px 16px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 600;
                text-decoration: none;
                cursor: pointer;
            }

            .btn-secondary:hover {
                background: #e5e7eb;
            }

            .action-link {
                color: #4338ca;
                text-decoration: none;
                font-size: 13px;
                font-weight: 600;
                margin-right: 12px;
                background: none;
                border: none;
                cursor: pointer;
                padding: 0;
            }

            .action-link:hover {
                text-decoration: underline;
            }

            .action-danger {
                color: #dc2626;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                font-size: 14px;
                font-weight: 600;
                color: #374151;
                margin-bottom: 6px;
            }

            .form-input {
                width: 100%;
                padding: 10px 14px;
                border: 1px solid #d1d5db;
                border-radius: 8px;
                font-size: 14px;
                color: #1f2937;
                font-family: inherit;
            }

            .form-input:focus {
                outline: none;
                border-color: #4338ca;
                box-shadow: 0 0 0 3px rgba(67, 56, 202, 0.1);
            }

            .form-error {
                color: #dc2626;
                font-size: 13px;
                margin-top: 4px;
            }

            .form-actions {
                display: flex;
                gap: 12px;
                justify-content: flex-end;
                margin-top: 24px;
            }


            .exam-card-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                gap: 16px;
                padding: 24px;
            }

            .exam-card {
                background: #f9fafb;
                border: 1px solid #eef0f3;
                border-radius: 12px;
                padding: 18px;
            }

            .exam-card-subject {
                font-size: 11px;
                font-weight: 700;
                color: #4338ca;
                text-transform: uppercase;
                letter-spacing: .04em;
                margin-bottom: 6px;
            }

            .exam-card-title {
                font-size: 15px;
                font-weight: 700;
                color: #111827;
                margin-bottom: 10px;
            }

            .exam-card-meta {
                display: flex;
                gap: 12px;
                font-size: 12px;
                color: #6b7280;
                margin-bottom: 14px;
            }

            @media (max-width:900px) {
                .sidebar {
                    transform: translateX(-100%);
                }

                .main {
                    margin-left: 0;
                }
            }
        </style>

        {{ $styles ?? '' }}

    </head>

    <body>
        <div class="shell">
            <aside class="sidebar">
                <div class="sidebar-logo">Online Siksha</div>

                <a href="{{ route('student.dashboard') }}"
                    class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                    <i class="ti ti-home"></i> Dashboard
                </a>

                <div class="nav-section-label">My Learning</div>

                <a href="{{ route('student.courses') }}"
                    class="nav-link {{ request()->routeIs('student.courses') ? 'active' : '' }}">
                    <i class="ti ti-key"></i> Enroll Class
                </a>

                <a href="{{ route('student.exams') }}"
                    class="nav-link {{ request()->routeIs('student.exams') ? 'active' : '' }}">
                    <i class="ti ti-file-text"></i> My Exams
                </a>

                <a href="{{ route('student.result') }}"
                    class="nav-link {{ request()->routeIs('student.result') ? 'active' : '' }}">
                    <i class="ti ti-chart-bar"></i> Attempt History
                </a>
                <a href="{{ route('student.plans') }}"
                    class="nav-link {{ request()->routeIs('student.plans') ? 'active' : '' }}">
                    <i class="ti ti-wallet"></i> Subscription
                </a>

            </aside>

            <div class="main">
                <div class="topbar">
                    <div class="search-box">
                        <i class="ti ti-search"></i>
                        <input type="text" placeholder="Search">
                    </div>
                    <div style="position:relative;">
                        <div class="avatar" id="avatarBtn" onclick="toggleDropdown()" style="cursor:pointer;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div id="avatarDropdown"
                            style="
            display:none;
            position:absolute;
            right:0;
            top:48px;
            width:200px;
            background:#fff;
            border:1px solid #eef0f3;
            border-radius:12px;
            box-shadow:0 8px 24px rgba(0,0,0,0.08);
            z-index:999;
            overflow:hidden;
        ">
                            <div style="padding:12px 16px;border-bottom:1px solid #eef0f3;">
                                <div style="font-size:13px;font-weight:700;color:#111827;">
                                    {{ auth()->user()->name }}
                                </div>
                                <div style="font-size:12px;color:#9ca3af;margin-top:2px;">
                                    {{ auth()->user()->email }}
                                </div>
                            </div>
                            <a href="{{ route('student.profile') }}"
                                style="display:flex;align-items:center;gap:10px;padding:11px 16px;
                    font-size:13px;font-weight:500;color:#4b5563;text-decoration:none;">
                                <i class="ti ti-user-circle" style="font-size:16px;"></i>
                                My Account
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    style="
                    display:flex;align-items:center;gap:10px;
                    width:100%;padding:11px 16px;
                    font-size:13px;font-weight:500;color:#dc2626;
                    background:none;border:none;cursor:pointer;
                    border-top:1px solid #eef0f3;
                ">
                                    <i class="ti ti-logout" style="font-size:16px;"></i>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <h1 class="page-title">{{ $pageTitle ?? 'Dashboard' }}</h1>
                    {{-- $pageTitle passed as named slot instead of @yield --}}

                    @if (session('success'))
                        <div class="alert-success">{{ session('success') }}</div>
                    @endif

                    {{ $slot }}

                </div>
            </div>
        </div>
        <script>
            function toggleDropdown() {
                const d = document.getElementById('avatarDropdown');
                d.style.display = d.style.display === 'none' ? 'block' : 'none';
            }

            document.addEventListener('click', function(e) {
                const btn = document.getElementById('avatarBtn');
                const dd = document.getElementById('avatarDropdown');
                if (!btn.contains(e.target) && !dd.contains(e.target)) {
                    dd.style.display = 'none';
                }
            });
        </script>

        {{ $scripts ?? '' }}

    </body>

    </html>
