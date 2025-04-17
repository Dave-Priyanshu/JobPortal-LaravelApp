<x-navlayout>
    <x-slot:title>Home Page</x-slot:title>
    <x-slot:heading>
        Find Your Dream Job or Post Opportunities
    </x-slot:heading>
    {{-- custom css --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    @endpush

    <!-- Hero Section -->
    <div class="bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
            <img src="{{ asset('assets/images/find_job.jpg') }}" alt="Job Search" class="rounded-lg mb-6 shadow-lg">
            <h1 class="text-4xl font-bold text-gray-800 mb-4 text-center">Welcome to Job Listing App</h1>
            <p class="text-lg text-gray-600 text-center">
                Your one-stop platform for discovering job opportunities and sharing career possibilities. Whether you’re hiring or looking, we’ve got you covered.
            </p>
        </div>
    </div>

   <!-- Features Section -->
    <div class="bg-white py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Why Choose Us?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-6 bg-gray-50 rounded-lg shadow-lg text-center">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-briefcase"></i> <!-- Icon for job creation -->
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Create Jobs with Ease</h3>
                    <p class="text-gray-600">Post job opportunities in minutes and attract talented professionals from all fields.</p>
                </div>
                <!-- Feature 2 -->
                <div class="p-6 bg-gray-50 rounded-lg shadow-lg text-center">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-th-list"></i> <!-- Icon for categories -->
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Diverse Job Categories</h3>
                    <p class="text-gray-600">Explore jobs across IT, healthcare, finance, education, and more.</p>
                </div>
                <!-- Feature 3 -->
                <div class="p-6 bg-gray-50 rounded-lg shadow-lg text-center">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-laptop"></i> <!-- Icon for user interface -->
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">User-Friendly Interface</h3>
                    <p class="text-gray-600">Seamlessly navigate through listings and applications with an intuitive design.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Job Categories Section -->
    <div class="bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Explore Job Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <img src="{{ asset('assets/images/it_jobs.jpg') }}" alt="IT Jobs" class="rounded-lg mb-2 shadow-lg transition-transform transform hover:scale-105 hover:shadow-md duration-300">
                    <h3 class="text-lg font-medium text-gray-700">IT & Software</h3>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/images/healthcare.jpg') }}" alt="Healthcare Jobs" class="rounded-lg mb-2 shadow-lg transition-transform transform hover:scale-105 hover:shadow-md duration-300">
                    <h3 class="text-lg font-medium text-gray-700">Healthcare</h3>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/images/finance.jpg') }}" alt="Finance Jobs" class="rounded-lg mb-2 shadow-lg transition-transform transform hover:scale-105 hover:shadow-md duration-300">
                    <h3 class="text-lg font-medium text-gray-700">Finance</h3>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/images/education.jpg') }}" alt="Education Jobs" class="rounded-lg mb-2 shadow-lg transition-transform transform hover:scale-105 hover:shadow-md duration-300">
                    <h3 class="text-lg font-medium text-gray-700">Education</h3>
                </div>
            </div>
        </div>
    </div>


    <!-- Call to Action -->
    <div class="bg-blue-600 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Take the Next Step?</h2>
            <p class="text-lg text-white mb-6">
                Post a job or browse our extensive list of opportunities today!
            </p>
            <div class="flex justify-center space-x-4">
                <a href="/login" class="bg-white text-blue-600 font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-gray-100">
                    Post a Job
                </a>
                <a href="/jobs" class="bg-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-blue-700">
                    Browse Jobs
                </a>
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <div class="bg-gray-800 text-white py-8 ">
        <div class="w-full sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Column 1: Contact Info -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Contact Us</h3>
                    <p class="text-gray-400">Email: support@joblisting.com</p>
                    <p class="text-gray-400">Phone: +1 123-456-7890</p>
                    <p class="text-gray-400">Address: 123 Main Street, City, Country</p>
                </div>

                <!-- Column 2: Useful Links -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Useful Links</h3>
                    <ul>
                        <li><a href="/about" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="/terms" class="text-gray-400 hover:text-white">Terms of Service</a></li>
                        <li><a href="/privacy" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>

                <!-- Column 3: Social Media -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i> <!-- Facebook Icon -->
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i> <!-- Twitter Icon -->
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-linkedin-in"></i> <!-- LinkedIn Icon -->
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-instagram"></i> <!-- Instagram Icon -->
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright Section -->
            <div class="mt-8 border-t border-gray-700 pt-4 text-center">
                <p class="text-gray-400 text-sm">&copy; 2024 Job Listing App. All rights reserved.</p>
            </div>
        </div>
    </div>

</x-navlayout>
