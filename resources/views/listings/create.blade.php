<x-layout>
    <div class="bg-gray-100 border border-gray-300 p-8 rounded-lg shadow-lg max-w-4xl mx-auto mt-12">
        <div class="flex flex-wrap lg:flex-nowrap">
            <!-- Form -->
            <div class="flex-1 lg:mr-8">
                <header class="text-center mb-6">
                    <h2 class="text-3xl font-bold uppercase mb-2 text-gray-800">
                        Create New Job
                    </h2>
                    <p class="text-lg text-gray-600 mb-4">Post a job to find a talented developer.</p>
                </header>

                <!-- Progress Bar -->
                <div class="relative mb-6">
                    <!-- Progress Bar Container -->
                    <div class="relative h-5 bg-gray-200 rounded-full overflow-hidden">
                        <!-- Progress Bar Fill -->
                        <div id="progress-bar" class="h-full bg-laravel transition-all duration-500 ease-in-out rounded-full"></div>
                
                        <!-- Percentage Labels -->
                        <div class="absolute inset-0 flex items-center justify-between px-2 text-xs font-semibold text-gray-800">
                            <span class="flex-shrink-0">0%</span>
                            <span class="flex-shrink-0">100%</span>
                        </div>
                    </div>
                </div>
                

                <form id="job-form" action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <!-- Form Fields -->
                    <div class="relative">
                        <input
                            type="text"
                            id="company"
                            class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                            name="company"
                            placeholder="Enter company name"
                            required
                            aria-label="Company Name"
                        />
                        <i class="fa fa-building absolute top-4 left-3 text-gray-500"></i>
                    </div>

                    <div class="relative">
                        <input
                            type="text"
                            id="title"
                            class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                            name="title"
                            placeholder="Example: Senior Laravel Developer"
                            required
                            aria-label="Job Title"
                        />
                        <i class="fa fa-briefcase absolute top-4 left-3 text-gray-500"></i>
                    </div>

                    <div class="relative">
                        <input
                            type="text"
                            id="location"
                            class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                            name="location"
                            placeholder="Example: Remote, Boston MA, etc"
                            required
                            aria-label="Job Location"
                        />
                        <i class="fa fa-map-marker-alt absolute top-4 left-3 text-gray-500"></i>
                    </div>

                    <div class="relative">
                        <input
                            type="email"
                            id="email"
                            class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                            name="email"
                            placeholder="Enter contact email"
                            required
                            aria-label="Contact Email"
                        />
                        <i class="fa fa-envelope absolute top-4 left-3 text-gray-500"></i>
                    </div>

                    <div class="relative">
                        <input
                            type="url"
                            id="website"
                            class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                            name="website"
                            placeholder="Example: https://companywebsite.com"
                            aria-label="Website URL"
                        />
                        <i class="fa fa-globe absolute top-4 left-3 text-gray-500"></i>
                    </div>

                    <div class="relative">
                        <input
                            type="text"
                            id="tags"
                            class="border border-gray-300 rounded-lg p-3 pl-10 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                            name="tags"
                            placeholder="Example: Laravel, Backend, Postgres, etc"
                            aria-label="Tags"
                        />
                        <i class="fa fa-tags absolute top-4 left-3 text-gray-500"></i>
                    </div>

                    <div class="relative">
                        <input
                            type="file"
                            id="logo"
                            class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none transition duration-300"
                            name="logo"
                            aria-label="Company Logo"
                        />
                    </div>

                    <div class="relative">
                        <textarea
                            id="description"
                            class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
                            name="description"
                            rows="8"
                            placeholder="Include tasks, requirements, salary, etc"
                            aria-label="Job Description"
                            required
                        ></textarea>
                    </div>

                    <div class="flex items-center justify-between space-x-4">
                        <button
                            type="submit"
                            class="bg-laravel text-white rounded-lg py-3 px-6 hover:bg-black transition duration-300 flex items-center"
                        >
                            <i class="fa fa-plus mr-2"></i> Create Job
                        </button>

                        <a href="/" class="text-gray-700 hover:text-gray-900 transition duration-300">Back</a>
                    </div>
                </form>
            </div>

            <!-- Preview Section -->
            <div class="w-full lg:w-1/3 mt-8 lg:mt-0">
                <div id="preview" class="bg-white border border-gray-300 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Job Listing Preview</h3>
                    <div class="text-gray-600 space-y-2">
                        <p><strong class="text-gray-800">Company Name:</strong> <span id="preview-company" class="text-gray-700">-</span></p>
                        <p><strong class="text-gray-800">Job Title:</strong> <span id="preview-title" class="text-gray-700">-</span></p>
                        <p><strong class="text-gray-800">Location:</strong> <span id="preview-location" class="text-gray-700">-</span></p>
                        <p><strong class="text-gray-800">Contact Email:</strong> <span id="preview-email" class="text-gray-700">-</span></p>
                        <p><strong class="text-gray-800">Website URL:</strong> <span id="preview-website" class="text-gray-700">-</span></p>
                        <p><strong class="text-gray-800">Tags:</strong> <span id="preview-tags" class="text-gray-700">-</span></p>
                        <p><strong class="text-gray-800">Description:</strong> <span id="preview-description" class="text-gray-700">-</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to update progress bar
        function updateProgressBar() {
            const formFields = document.querySelectorAll('#job-form input, #job-form textarea');
            const totalFields = formFields.length;
            const filledFields = Array.from(formFields).filter(field => field.value.trim() !== '').length;
            const progress = Math.min((filledFields / totalFields) * 100, 100);
            document.getElementById('progress-bar').style.width = progress + '%';
        }

        // Function to update preview
        function updatePreview() {
            document.getElementById('preview-company').textContent = document.getElementById('company').value || '-';
            document.getElementById('preview-title').textContent = document.getElementById('title').value || '-';
            document.getElementById('preview-location').textContent = document.getElementById('location').value || '-';
            document.getElementById('preview-email').textContent = document.getElementById('email').value || '-';
            document.getElementById('preview-website').textContent = document.getElementById('website').value || '-';
            document.getElementById('preview-tags').textContent = document.getElementById('tags').value || '-';
            document.getElementById('preview-description').textContent = document.getElementById('description').value || '-';
        }

        // Add event listeners to inputs and textarea
        document.querySelectorAll('#job-form input, #job-form textarea').forEach(field => {
            field.addEventListener('input', () => {
                updateProgressBar();
                updatePreview();
            });
        });

        // Initial update
        updateProgressBar();
        updatePreview();
    </script>
</x-layout>
