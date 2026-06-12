<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --blue: #1a56db;
            --blue-dark: #1040b0;
            --blue-light: #e8f0fe;
            --blue-ll: #f0f5ff;
            --text: #0a0f1e;
            --muted: #5a6480;
            --subtle: #8892a4;
            --white: #ffffff;
            --surface: #f7f9ff;
            --border: #dde5f7;
            --border-l: #eef2fb;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 48px;
            height: 64px;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .nav-logo {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-logo .dot {
            color: #f59e0b;
        }
    </style>
</head>

<body class="bg-(--surface) text-(--text)">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-(--blue) text-white p-4 hidden md:flex flex-col sticky top-0 h-screen">

            <div class="nav">
                <div class="nav-logo">
                 Online<span class="dot">Siksha</span>
                </div>
            </div>
            <a href="{{ route('student.dashboard') }}" class="block px-3 py-2 rounded hover:bg-(--blue-dark)">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>

            <a href="{{ route('student.courses') }}" class="block px-3 py-2 rounded hover:bg-(--blue-dark)">
                <i class="fa-solid fa-book"></i></i> Courses
            </a>

            <a href="{{ route('student.exams') }}" class="block px-3 py-2 rounded hover:bg-(--blue-dark)">
                <i class="fa-solid fa-file-pen"></i> Exams
            </a>

            <a href="{{ route('student.result') }}" class="block px-3 py-2 rounded hover:bg-(--blue-dark)">
                <i class="fa-solid fa-square-poll-vertical"></i> Results
            </a>

            <a href="{{ route('student.profile') }}" class="block px-3 py-2 rounded hover:bg-(--blue-dark)">
                <i class="fa-solid fa-circle-user"></i> Profile
            </a>

            </nav>

        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <header class="bg-white shadow px-6 py-4 flex justify-between sticky top-0">
                <h1 class="text-xl font-semibold text-(--text)">
                    Student Dashboard
                </h1>

                <button class="inline-block px-4 py-2 rounded bg-(--blue) text-white hover:bg-(--blue-dark)">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out
                </button>
            </header>

            <main class="flex-1 p-6 bg-(--surface)">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>

</html>
