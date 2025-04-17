<x-superAdminLayout>

    <div class="container mx-auto p-10 mt-4 max-w-7xl">
        {{-- <h1 class=" text-4xl font-bold text-red-800 mb-8 text-center">Welcome to the Super Admin Dashboard</h1> --}}
        <h1 class=" text-4xl font-bold text-gray-800 mb-8 text-center">Welcome to the Super Admin Dashboard</h1>

        <div class="flex flex-wrap justify-center gap-6">
            <!-- Users Card -->
            <div class="bg-sky-100 rounded-lg shadow-lg p-6 w-72 text-center transition transform hover:scale-105 hover:shadow-xl">
                <a href="{{ route('user.index') }}" class="text-red-700 hover:text-red-800">
                {{-- <a href="" class="text-gray-700 hover:text-gray-800"> --}}
                    <span class="text-xl font-semibold">Users</span>
                    <p class="mt-2 text-gray-500">Manage and update user details</p>
                </a>
            </div>

            <!-- Posts Card -->
            {{-- <div class="bg-sky-100 rounded-lg shadow-lg p-6 w-72 text-center transition transform hover:scale-105 hover:shadow-xl">
                <a href="" class="text-red-700 hover:text-red-800">
                <a href="" class="text-gray-700 hover:text-gray-800">
                    <span class="text-xl font-semibold">Education</span>
                    <p class="mt-2 text-gray-500">Manage and update education details</p>
                </a>
            </div> --}}

            <!-- Analytics Card -->
            {{-- <div class="bg-sky-100 rounded-lg shadow-lg p-6 w-72 text-center transition transform hover:scale-105 hover:shadow-xl">
                <a href="" class="text-red-700 hover:text-red-800">
                <a href="" class="text-gray-700 hover:text-gray-800">
                    <span class="text-xl font-semibold">Projects</span>
                    <p class="mt-2 text-gray-500">Add and manage projects</p>
                </a>
            </div> --}}

            <!-- Settings Card -->
            {{-- <div class="bg-sky-100 rounded-lg shadow-lg p-6 w-72 text-center transition transform hover:scale-105 hover:shadow-xl">
                <a href="" class="text-red-700 hover:text-red-800">
                <a href="" class="text-gray-700 hover:text-gray-800">
                    <span class="text-xl font-semibold">Experience</span>
                    <p class="mt-2 text-gray-500">Manage work experience details</p>
                </a>
            </div> --}}
        </div>
    </div>
</x-superAdminLayout>
