@extends('components.layout')

@section('title', 'Home')

@section('content')

    {{-- HERO --}}
    <section class="max-w-2xl mx-auto px-8 py-24 text-center">

        <span
            class="inline-flex items-center gap-1.5 text-xs font-medium text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full mb-7">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
            Exam Management System
        </span>

        <h1 class="text-4xl font-semibold tracking-tight leading-tight text-slate-900 mb-5">
            Conduct exams with<br>clarity and control
        </h1>

        <p class="text-base text-slate-500 max-w-md mx-auto mb-9 leading-relaxed">
            OES is a school-managed exam platform. Students and staff sign in with credentials provided by the
            administration.
        </p>

        <a href="{{ url('login') }}"
            class="font-medium test-base text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-[10px] transition-colors">
            Sign in to your account
        </a>

    </section>

    <hr class="border-t border-slate-200 mx-8" />

    {{-- FEATURES --}}
    <section class="max-w-5xl mx-auto px-8 py-20" id="features">

        <p class="text-sm font-medium text-blue-600 uppercase tracking-widest mb-3">Features</p>
        <h2 class="text-2xl font-semibold tracking-tight text-slate-900 mb-2">Everything you need to run exams</h2>
        <p class="text-base text-slate-500 max-w-sm mb-12">A focused set of tools built around the exam lifecycle — from
            setup to results.</p>

        <div class="grid grid-cols-4 gap-4" style="grid-template-columns: repeat(4, 1fr);">

            {{-- Exam Builder --}}
            <div class="border border-slate-200 rounded-xl p-6 bg-white hover:border-blue-200 hover:shadow transition-all">
                <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 border border-blue-200 mb-4">
                    <svg class="text-blue-600" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                    </svg>
                </div>
                <p class="text-base font-semibold text-slate-900 mb-1.5 tracking-tight">Exam Builder</p>
                <p class="text-sm text-slate-500 leading-relaxed">Create structured exams with multiple question types,
                    time
                    limits, and configurable scoring rules.</p>
            </div>

            {{-- Timed Sessions --}}
            <div class="border border-slate-200 rounded-xl p-6 bg-white hover:border-blue-200 hover:shadow transition-all">
                <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 border border-blue-200 mb-4">
                    <svg class="text-blue-600" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <p class="text-base font-semibold text-slate-900 mb-1.5 tracking-tight">Timed Sessions</p>
                <p class="text-sm text-slate-500 leading-relaxed">Each exam runs with a live countdown. Time is tracked
                    server-side and auto-submits when it expires.</p>
            </div>

            {{-- Instant Results --}}
            <div class="border border-slate-200 rounded-xl p-6 bg-white hover:border-blue-200 hover:shadow transition-all">
                <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 border border-blue-200 mb-4">
                    <svg class="text-blue-600" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10" />
                        <line x1="12" y1="20" x2="12" y2="4" />
                        <line x1="6" y1="20" x2="6" y2="14" />
                    </svg>
                </div>
                <p class="text-base font-semibold text-slate-900 mb-1.5 tracking-tight">Instant Results</p>
                <p class="text-sm text-slate-500 leading-relaxed">Scores are calculated automatically on submission.
                    Students see results right away; admins get a full breakdown.</p>
            </div>

            {{-- User Management --}}
            <div class="border border-slate-200 rounded-xl p-6 bg-white hover:border-blue-200 hover:shadow transition-all">
                <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 border border-blue-200 mb-4">
                    <svg class="text-blue-600" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <p class="text-base font-semibold text-slate-900 mb-1.5 tracking-tight">User Management</p>
                <p class="text-sm text-slate-500 leading-relaxed">Admins can manage student accounts, assign exams, and
                    review attempt history from a central dashboard.</p>
            </div>

        </div>
    </section>

    {{-- STATS --}}
    <div class="bg-slate-50 border-y border-slate-200">
        <div class="max-w-5xl mx-auto px-8 py-12 grid grid-cols-3 gap-8" style="grid-template-columns: repeat(3, 1fr);">
            <div class="text-center">
                <span class="block text-3xl font-semibold tracking-tight text-slate-900">100%</span>
                <p class="text-sm text-slate-500 mt-1">Automated grading</p>
            </div>
            <div class="text-center">
                <span class="block text-3xl font-semibold tracking-tight text-slate-900">Real-time</span>
                <p class="text-sm text-slate-500 mt-1">Timer enforcement</p>
            </div>
            <div class="text-center">
                <span class="block text-3xl font-semibold tracking-tight text-slate-900">Role-based</span>
                <p class="text-sm text-slate-500 mt-1">Access control</p>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <section class="max-w-xl mx-auto px-8 py-24 text-center" id="about">
        <h2 class="text-2xl font-semibold tracking-tight text-slate-900 mb-3">Access your account</h2>
        <p class="text-base text-slate-500 mb-8">Accounts are created and managed by your school administrator. Contact
            your
            admin if you need access.</p>
        <a href="{{ url('login') }}"
            class="font-medium test-base text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-[10px] transition-colors">
            Sign in
        </a>
    </section>

@endsection
