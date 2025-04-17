<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Add the Lexend font -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--  -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- <script src="{{ asset('public/build/assets/app-CvSG40sc.js') }}" ></script>
    <link href="{{ asset('public/build/assets/app-Bzu10ED2.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Include styles pushed from child components like toast -->
     {{-- @stack('styles') --}}
</head>

{{-- <body class="bg-gradient-to-b from-red-100 to-red-500 text-gray-900 font-lexend"> --}}
<body class="bg-gradient-to-b from-gray-300 to-gray-500 text-gray-900 font-lexend">

    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 bg-gray-800 text-white p-6 shadow-lg z-50 transform -translate-x-full transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 flex flex-col overflow-y-auto">
            <!-- Mobile Close Button -->
        <button id="sidebar-close" class="lg:hidden absolute top-4 right-4 text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
            <h2 class="text-2xl font-bold mb-6 text-center border-b-2 pb-2">Super Admin Panel</h2>
            <nav>
                <ul class="space-y-4">

                    <li>
                        <a href="{{route('user.index')}}" class="flex items-center text-lg font-semibold hover:bg-white hover:text-red-700 p-3 rounded transition duration-300 {{ request()->routeIs('user.index') ? 'bg-white text-red-700' : '' }}">
                            <svg class="w-6 h-6 mr-2" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM4 17.2c0-2.4 3.6-4.2 8-4.2s8 1.8 8 4.2V19H4v-1.8z" />
                            </svg>                       
                            All User List
                        </a>
                    </li>

                    {{-- <li>
                        <a href="" class="flex items-center text-lg font-semibold hover:bg-white hover:text-red-700 p-3 rounded transition duration-300 {{ request()->routeIs('sadmin.feedback.index') ? 'bg-white text-red-700' : '' }}">
                            <svg class="w-6 h-6 mr-2" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v3m0 12v3m9-9h-3M6 12H3m14.5 6.5l-2.5-2.5M6.5 6.5L4 9m14 0l-2.5 2.5M4 15.5l2.5-2.5" />
                            </svg>               
                            User Posts
                        </a>
                    </li> --}}

                    
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <!-- Add left margin on desktop to account for the sidebar -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <!-- Mobile Menu Toggle Button (visible only on mobile) -->
                <button id="sidebar-toggle" class="lg:hidden p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                </button>
                <!-- Profile Picture -->
                @if (auth()->user() && auth()->user()->profile && auth()->user()->profile->profile_picture)
                <img src="{{ asset(auth()->user()->profile->profile_picture) }}"
                        alt="Profile Picture"
                        class="w-12 h-12 rounded-full border-2 border-gray-300">
                @else
                <img src="{{ asset('images/default-profile.png') }}"
                        alt="Default Profile"
                        class="w-12 h-12 rounded-full border-2 border-gray-300">
                @endif
                <!-- User Name and Dashboard Text -->
                <div class="text-lg font-semibold text-gray-800">
                <a href="">
                    <span class="block text-xl font-bold capitalize">{{ auth()->user()->name }}'s Dashboard</span>
                </a>
                </div>
            </div>
            <form action="{{route('logout')}}" method="POST" class="flex items-center">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded focus:outline-none focus:ring focus:ring-red-300 transition duration-300">
                Logout
                </button>
            </form>
            </header>

            <!-- Main Content -->
            <main class="flex-1 bg-white rounded-lg shadow-lg mt-4 mx-4 mb-4">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gray-200 text-center p-4">
                <p class="text-gray-600">&copy; 2025 Super Admin Dashboard. All rights reserved.</p>
            </footer>
        </div>
    </div>

    @stack('scripts')
<!-- Mobile Sidebar Toggle Script -->
<script>
    $(document).ready(function() {
      // When the mobile toggle button is clicked, remove the "-translate-x-full" class to slide in the sidebar.
      $('#sidebar-toggle').click(function() {
        $('#sidebar').removeClass('-translate-x-full');
      });
      // When the close button inside the sidebar is clicked, add the "-translate-x-full" class to hide it.
      $('#sidebar-close').click(function() {
        $('#sidebar').addClass('-translate-x-full');
      });
    });

    let titleText = "User Dashboard | Crafted by Priyanshu Dave 💼 ";
    let speed = 360; 
    
    function scrollTitle() {
        titleText = titleText.substring(1) + titleText.charAt(0);
        document.title = titleText;
    }

    setInterval(scrollTitle, speed);
  </script>

</body>

</html>
