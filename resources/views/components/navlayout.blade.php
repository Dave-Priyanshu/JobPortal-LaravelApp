<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/navlayout.css') }}">

    <!-- Add Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img class="size-8" src="{{ asset('assets/images/logo.png') }}" alt="Your Company">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <x-nav-links href="/" :active="request()->is('/')">Home</x-nav-links>
                <x-nav-links href="/jobs" :active="request()->is('jobs')">Job</x-nav-links>
                <x-nav-links href="/contact" :active="request()->is('contact')">Contact</x-nav-links>
              </div>
            </div>
          </div>
          
          <!-- Right-aligned Login, Register Links, and Create Job Button -->
          <div class="flex items-center space-x-4">
            {{-- guest users --}}
            @guest
            <x-nav-links href="/login" :active="request()->is('login')" class="text-white">Login</x-nav-links>
            <x-nav-links href="/register" :active="request()->is('register')" class="text-white">Register</x-nav-links>
            @endguest
            
            {{-- authenticated users --}}
            @auth
            <a href="/listings/create" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-md shadow-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500">
              Create Job
            </a>
            <form method="POST" action="/logout" class="inline">
              @csrf
              <button type="submit" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-5 rounded-md shadow-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-500">Logout</button>
            </form>
          
            @endauth
          </div>
        </div>
      </div>
    </nav>
    
    @if (session('success'))
    <div id="successMessage" 
         class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg transition-opacity duration-1000 ease-in-out">
        {{ session('success') }}
    </div>
@endif
    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
      </div>
    </header>
    
    <main>
      <div class="mx-auto w-full ">
        {{$slot}}
      </div>
    </main>
</div>
<!-- Fade out the success message -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const successMessage = document.getElementById('successMessage');
      if (successMessage) {
          setTimeout(() => {
              successMessage.classList.add('opacity-0');
              setTimeout(() => successMessage.remove(), 1000); // Fully remove after fade out
          }, 2000);
      }
  });
</script>
</body>
</html>
