<footer class="bg-black border-t border-white">
    <div class="max-w-5xl mx-auto px-8 py-6 flex flex-wrap items-center justify-between gap-3">
        <a href="{{ url('home') }}" class="text-2xl font-bold tracking-tight text-slate-900">
            <span class="text-blue-600">EMS.</span>
        </a>

        <ul class="flex items-center gap-4 list-none">
            <li><a href="#" class="text-base text-white hover:text-slate-900 transition-colors">Privacy</a></li>
            <li><a href="#" class="text-base text-white hover:text-slate-900 transition-colors">Terms</a></li>
            <li><a href="#" class="text-base text-white hover:text-slate-900 transition-colors">Contact</a></li>
        </ul>

        <span class="text-sm text-slate-400">&copy; {{ date('Y') }} OES. All rights reserved.</span>
    </div>

</footer>
