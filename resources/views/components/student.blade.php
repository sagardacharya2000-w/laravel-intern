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
            --primary: #445554;
            --primary-dark: #4a5b5a;
            --accent: #14B8A6;
            --bg: #F8FAFC;
            --card: #FFFFFF;
            --text: #0F172A;
            --muted: #64748B;
            --border: #E2E8F0;
            --sidebar: #1E293B;

        }
    </style>
</head>

<body class="bg-(--bg) text-(--text)">

    <div class="flex min-h-screen">

        <aside class="w-64 bg-(--primary) text-white p-4 hidden md:flex flex-col sticky top-0 h-screen">

            <div class="shadow">
                <h1 class="text-center  font-bold">OES<br><small>Online Examination System</small></h1>

                <nav class="space-y-2 py-4">
            </div>

            <a href="{{ route('student.dashboard') }}" class="block px-3 py-2 rounded hover:bg-(--primary-dark)">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>

            <a href="{{ route('student.courses') }}" class="block px-3 py-2 rounded hover:bg-(--primary-dark)">
                <i class="fa-solid fa-file-pen"></i> Courses
            </a>

            <a href="{{ route('student.exams') }}" class="block px-3 py-2 rounded hover:bg-(--primary-dark)">
                <i class="fa-solid fa-file-pen"></i> Exams
            </a>

            <a href="{{ route('student.result') }}" class="block px-3 py-2 rounded hover:bg-(--primary-dark)">
                <i class="fa-solid fa-square-poll-vertical"></i> Results
            </a>

            <a href="{{ route('student.profile') }}" class="block px-3 py-2 rounded hover:bg-(--primary-dark)">
                <i class="fa-solid fa-circle-user"></i> Profile
            </a>

            </nav>

        </aside>

        <div class="flex-1 flex flex-col">

            <header class="bg-white shadow px-6 py-4 flex justify-between sticky top-0">
                <h1 class="text-xl font-semibold">
                    Student Dashboard
                </h1>
                <button class="inline-block px-4 py-2 rounded bg-(--primary) text-white hover:bg-(--primary-dark)"><i
                        class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</button>
            </header>

            <main class="flex-1 p-6">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>

</html>
