@extends('layouts.app')

@section('title', 'Hulyanas Hill - Home')

@section('content')

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="min-h-screen bg-gray-50 font-sans">

    <!-- NAVIGATION -->
    <nav class="bg-white border-b-4 border-black sticky top-0 z-50 shadow-lg">
        <div class="max-w-full mx-auto px-6 lg:px-10">
            <div class="flex justify-between h-24 items-center">

                <!-- Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-black text-white flex items-center justify-center rounded-2xl font-extrabold text-2xl">
                        H
                    </div>
                    <div class="hidden sm:flex flex-col">
                        <span class="text-2xl font-extrabold text-gray-900 leading-none">
                            Hulyanas <span class="font-normal text-gray-500">Hill</span>
                        </span>
                        <span class="text-sm font-medium text-gray-400 uppercase tracking-widest">
                            Good Food. Great View.
                        </span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-3">

                    @php
                        $navItems = [
                            ['name' => 'Home', 'id' => 'home'],
                            ['name' => 'Menu', 'id' => 'menu'],
                            ['name' => 'About', 'id' => 'about'],
                            ['name' => 'Locations', 'id' => 'locations'],
                            ['name' => 'Contact', 'id' => 'contact'],
                        ];
                    @endphp

                    @foreach($navItems as $item)
                        <a href="#{{ $item['id'] }}"
                           class="px-6 py-3 text-lg font-bold rounded-xl transition-all duration-200 text-gray-800 hover:bg-gray-200 hover:-translate-y-0.5">
                            {{ $item['name'] }}
                        </a>
                    @endforeach

                    <!-- Login -->
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 text-lg font-bold rounded-xl bg-gray-100 text-gray-800 hover:bg-gray-200 transition">
                        Login
                    </a>
                </div>

                <!-- Mobile Button -->
                <button type="button"
                        class="lg:hidden p-3 bg-gray-100 rounded-xl"
                        onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

            </div>
        </div>

        <!-- MOBILE MENU -->
        <div id="mobile-menu" class="hidden lg:hidden border-t-4 border-black bg-white">
            <div class="px-6 py-6 space-y-3">

                <a href="#home" class="block px-6 py-5 text-xl font-bold hover:bg-gray-200 rounded-2xl">Home</a>
                <a href="#menu" class="block px-6 py-5 text-xl font-bold hover:bg-gray-200 rounded-2xl">Menu</a>
                <a href="#about" class="block px-6 py-5 text-xl font-bold hover:bg-gray-200 rounded-2xl">About</a>
                <a href="#locations" class="block px-6 py-5 text-xl font-bold hover:bg-gray-200 rounded-2xl">Locations</a>
                <a href="#contact" class="block px-6 py-5 text-xl font-bold hover:bg-gray-200 rounded-2xl">Contact</a>

                <a href="{{ route('login') }}"
                   class="block px-6 py-5 text-xl font-bold bg-gray-100 hover:bg-gray-200 rounded-2xl">
                    Login
                </a>

            </div>
        </div>
    </nav>

<!-- HERO -->
<section id="home" class="relative overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <div class="absolute inset-0">
    <img src="{{ asset('storage/products/main.png') }}"
         class="w-full h-full object-cover"
         alt="Hulyanas Hill Background">
    </div>

    <!-- DARK OVERLAY -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- CONTENT -->
    <div class="relative max-w-full mx-auto px-6 lg:px-10 py-24 lg:py-32 text-center">

        <span class="inline-block px-6 py-2 text-lg font-bold bg-white text-black rounded-full mb-6">
            Authentic Hill Cuisine
        </span>

        <h1 class="text-6xl lg:text-8xl font-extrabold text-white">
            Hulyanas <span class="text-gray-400">Hill</span>
        </h1>

        <p class="text-xl lg:text-2xl text-gray-300 max-w-2xl mx-auto mt-6 mb-10">
            Experience the authentic flavors of Southern Leyte's hill cuisine, crafted with family recipes passed down through generations.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">

            <a href="#menu"
               class="px-10 py-5 text-xl font-bold bg-white text-black rounded-2xl hover:bg-gray-200 transition">
                View Menu
            </a>

            <a href="#locations"
               class="px-10 py-5 text-xl font-bold border-4 border-white text-white rounded-2xl hover:bg-white hover:text-black transition">
                Find Us
            </a>

        </div>

    </div>

</section>

    <!-- MENU -->
<section id="menu" class="py-20 bg-gray-50">
    <div class="max-w-full mx-auto px-6 lg:px-10 text-center">

        <h2 class="text-5xl font-extrabold mb-4">Featured Products</h2>

        <p class="text-xl text-gray-500 mb-12">
            Our most loved drinks and pastries
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($featuredProducts as $item)

                <div class="bg-white border-4 border-gray-900 rounded-3xl shadow-xl overflow-hidden hover:scale-105 transition duration-300">

                    <!-- IMAGE -->
                    <div class="h-56 w-full overflow-hidden">

                        <img src="{{ asset('storage/' . $item->image) }}"
                             alt="{{ $item->name }}"
                             class="w-full h-full object-cover">

                    </div>

                    <!-- CONTENT -->
                    <div class="p-6 text-left">

                        <h3 class="text-2xl font-extrabold text-gray-900">
                            {{ $item->name }}
                        </h3>

                        <p class="text-gray-500 mt-2 text-lg">
                            {{ $item->description }}
                        </p>

                        <div class="mt-6 flex justify-between items-center">

                            <span class="text-3xl font-extrabold text-black">
                                ₱{{ number_format($item->price, 2) }}
                            </span>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-xl">
                        No featured menu available.
                    </p>
                </div>

            @endforelse

        </div>

    </div>
</section>
<!-- ABOUT -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-full mx-auto px-6 lg:px-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- TEXT CONTENT -->
            <div class="text-center lg:text-left">
                <h2 class="text-5xl font-extrabold mb-6">About Us</h2>

                <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                    Hulyanas Hill is a cozy café built for comfort, community, and quality coffee experience.
                    We serve handcrafted drinks, freshly baked pastries, and a warm atmosphere that feels like home.
                </p>

                <p class="text-xl text-gray-500 mt-6 max-w-2xl">
                    Inspired by the natural beauty of Southern Leyte, we bring a relaxing hill-top café vibe
                    right into the heart of the community.
                </p>
            </div>

            <!-- IMAGE -->
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-full h-full border-4 border-black rounded-3xl"></div>

                 <img src="{{ asset('storage/products/about.png') }}"
                     alt="Hulyanas Hill Cafe Interior"
                     class="relative w-full h-[420px] object-cover rounded-2xl shadow-xl">
            </div>

        </div>

    </div>
</section>

    <!-- LOCATIONS -->
    <section id="locations" class="py-20 bg-gray-50">
        <div class="max-w-full mx-auto px-6 lg:px-10 text-center">

            <h2 class="text-5xl font-extrabold mb-12">Our Locations</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <div class="bg-white border-4 border-black rounded-3xl p-8">
                    <h3 class="text-2xl font-bold">Silago Branch</h3>
                    <p class="text-gray-500 mt-2">8:00 AM - 6:00 PM</p>
                </div>

                <div class="bg-white border-4 border-black rounded-3xl p-8">
                    <h3 class="text-2xl font-bold">Hinunangan Branch</h3>
                    <p class="text-gray-500 mt-2">8:00 AM - 6:00 PM</p>
                </div>

            </div>

        </div>
    </section>

<!-- CONTACT -->
<section id="contact" class="py-20 bg-white">
    <div class="max-w-full mx-auto px-6 lg:px-10 text-center">

        <h2 class="text-5xl font-extrabold mb-4">Contact Us</h2>
        <p class="text-xl text-gray-500 mb-12">
            We’re here to serve you
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- PHONE -->
            <div class="bg-gray-50 border-4 border-gray-900 rounded-3xl p-8 hover:scale-105 transition">
                
                <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-black text-white rounded-2xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.21l-2.26 1.13a11 11 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 6V5z"/>
                    </svg>
                </div>

                <h3 class="text-2xl font-extrabold mb-2">Phone</h3>
                <p class="text-lg text-gray-600">+63 917 123 4567</p>
                <p class="text-sm text-gray-400 mt-2">Available during business hours</p>
            </div>

            <!-- EMAIL -->
            <div class="bg-gray-50 border-4 border-gray-900 rounded-3xl p-8 hover:scale-105 transition">

                <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-black text-white rounded-2xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>

                <h3 class="text-2xl font-extrabold mb-2">Email</h3>
                <p class="text-lg text-gray-600">hello@hulyanashill.com</p>
                <p class="text-sm text-gray-400 mt-2">We reply within 24 hours</p>
            </div>

            <!-- HOURS -->
            <div class="bg-gray-50 border-4 border-gray-900 rounded-3xl p-8 hover:scale-105 transition">

                <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-black text-white rounded-2xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <h3 class="text-2xl font-extrabold mb-4">Opening Hours</h3>

                <p class="text-lg font-bold text-gray-800">Silago Branch</p>
                <p class="text-gray-600 mb-3">8:00 AM - 6:00 PM</p>

                <p class="text-lg font-bold text-gray-800">Hinunangan Branch</p>
                <p class="text-gray-600">8:00 AM - 6:00 PM</p>
            </div>

        </div>

    </div>
</section>

<!-- FOOTER -->
<footer class="bg-black text-white py-16">
    <div class="max-w-full mx-auto px-6 lg:px-10">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            <!-- BRAND -->
            <div>
                <h3 class="text-3xl font-extrabold mb-4">Hulyanas Hill</h3>
                <p class="text-gray-400 text-lg leading-relaxed">
                    Authentic Southern Leyte hill cuisine. Two locations serving fresh, traditional flavors.
                </p>
            </div>

            <!-- QUICK LINKS -->
            <div>
                <h4 class="text-xl font-bold mb-4">Quick Links</h4>
                <ul class="space-y-3 text-gray-400 text-lg">
                    <li><a href="#home" class="hover:text-white transition">Home</a></li>
                    <li><a href="#menu" class="hover:text-white transition">Menu</a></li>
                    <li><a href="#about" class="hover:text-white transition">Locations</a></li>
                    <li><a href="#locations" class="hover:text-white transition">Contacts</a></li>
                </ul>
            </div>
        <!-- FOLLOW + INFO -->
        <div>
            <h4 class="text-xl font-bold mb-4">Follow Us</h4>

            <div class="flex gap-5 mb-6">

                <!-- Facebook -->
                <a href="https://www.facebook.com/hulyanashill/" target="_blank" class="text-gray-400 hover:text-white transition">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.613 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="https://www.instagram.com/hulyanas_hill/" target="_blank" class="text-gray-400 hover:text-white transition">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4z"/>
                    </svg>
                </a>

                <!-- Twitter / X -->
                <a href="https://www.threads.com/@hulyanas_hill" target="_blank"    class="text-gray-400 hover:text-white transition">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2H21.5l-7.5 8.543L22 22h-6.2l-4.86-6.34L5.4 22H2l8.05-9.19L2 2h6.3l4.4 5.8L18.244 2zm-1.1 18h1.9L7.1 4H5.1l12.044 16z"/>
                    </svg>
                </a>

            </div>

            <p class="text-gray-500 text-sm leading-relaxed">
                © 2024 Hulyanas Hill. All rights reserved. <br>
                Silago & Hinunangan Branches
            </p>
        </div>

        </div>

    </div>
</footer>

</div>

@endsection