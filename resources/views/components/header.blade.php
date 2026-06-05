<nav
    class="sticky top-0 z-50 h-14 flex items-center justify-between px-8 border-b border-slate-200 bg-white/90 backdrop-blur-sm text-m">

    <a href="{{ url('/') }}" class="text-base font-semibold tracking-tight text-slate-900">
        <span class="text-blue-600">OES</span>
    </a>

    <ul class="flex items-center gap-1 list-none">
        <li>
            <a href="{{ url('/#features') }}"
                class=" text-slate-500 hover:text-slate-900 hover:bg-slate-100 px-3 py-1.5 rounded-md transition-colors">
                Features
            </a>
        </li>
        <li>
            <a href="{{ url('/#about') }}"
                class=" text-slate-500 hover:text-slate-900 hover:bg-slate-100 px-3 py-1.5 rounded-md transition-colors">
                About
            </a>
        </li>
    </ul>

    <a href=""
        class="font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-1.5 rounded-md transition-colors">
        Sign in
    </a>

</nav>
