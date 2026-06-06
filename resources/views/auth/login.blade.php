@extends('components.layout')

@section('title', 'Sign In')

@section('content')

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
                    <label for="username" class="block text-base font-medium text-slate-700 mb-1.5">Username</label>
                    <input id="username" name="username" type="text" required autofocus value="{{ old('username') }}"
                        class="w-full text-base px-4 py-2 text-slate-900 bg-white border border-slate-200 rounded-[10px] placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-colors"
                        placeholder="Enter your username" />
                    @error('username')
                        <p class="text-sm text-red-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-base font-medium text-slate-700 mb-1.5">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full text-base px-4 py-2 text-slate-900 bg-white border border-slate-200 rounded-[10px] placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-colors"
                        placeholder="Enter your password" />
                    @error('password')
                        <p class="text-sm text-red-500 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                @if ($errors->any() && !$errors->has('username') && !$errors->has('password'))
                    <p class="text-sm text-red-500">{{ $errors->first() }}</p>
                @endif

                <button type="submit"
                    class="font-medium text-base w-full text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-[10px] transition-colors">
                    Sign in
                </button>

            </form>

            <p class="text-sm text-center text-slate-400 mt-8 leading-relaxed">
                Don't have credentials? Contact your administrator.
            </p>

        </div>

    </section>

@endsection
