@extends('layouts.app')

@section('title', 'Login - Hulyanas Hill')

@section('content')

<div class="min-h-screen bg-gray-50 flex items-center justify-center px-6 py-12 font-sans">

    <!-- LOGIN CARD -->
    <div class="w-full max-w-lg bg-white rounded-3xl border-4 border-gray-900 shadow-2xl overflow-hidden">

        <!-- HEADER -->
        <div class="bg-black px-10 py-10 text-center">
            <div class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center mx-auto mb-6">
                <span class="text-4xl font-extrabold text-black">H</span>
            </div>

            <h1 class="text-3xl font-extrabold text-white">Sign In</h1>
            <p class="text-gray-400 mt-2 text-lg">Welcome Back</p>
            <p class="text-gray-500 text-sm mt-1">
                Enter your credentials to access your account
            </p>
        </div>

        <!-- FORM -->
        <div class="p-10">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- USERNAME / EMAIL -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-gray-900 mb-4">
                        Username or Email
                    </label>

                    <input type="text"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="john.doe@email.com"
                           class="w-full px-6 py-5 text-lg bg-gray-50 border-4 border-gray-200 rounded-2xl
                           focus:border-black focus:bg-white focus:outline-none transition">
                </div>

                <!-- PASSWORD -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-gray-900 mb-4">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="••••••••"
                           class="w-full px-6 py-5 text-lg bg-gray-50 border-4 border-gray-200 rounded-2xl
                           focus:border-black focus:bg-white focus:outline-none transition">
                </div>

                <!-- SIGN IN BUTTON -->
                <button type="submit"
                        class="w-full py-5 text-xl font-bold text-white bg-black rounded-2xl
                        hover:bg-gray-800 hover:scale-[1.02] transition">
                    Sign In
                </button>

            </form>

            <!-- CREATE ACCOUNT -->
            <div class="text-center mt-8">
                <p class="text-lg text-gray-600">
                    Don't have an account?
                </p>

                <a href="{{ route('register') }}"
                   class="text-lg font-bold text-black underline decoration-2">
                    Create Account
                </a>
            </div>

            <!-- BACK TO HOME -->
            <div class="text-center mt-6">
                <a href="{{ route('home') }}"
                   class="text-gray-500 hover:text-black font-bold text-lg transition">
                    Back to Home
                </a>
            </div>

        </div>

    </div>

</div>

@endsection