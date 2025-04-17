<x-navlayout>
    <x-slot:title>Contact Page</x-slot:title>
    <x-slot:heading>
        Contact Page
    </x-slot:heading>

    <h1 class="text-2xl font-semibold mb-4">Welcome to the Contact Page</h1>

    <div class="space-y-6">
        <!-- Contact Form -->
        <form action="#" method="POST" class="bg-white p-6 rounded-md shadow-md">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full p-3 mt-2 border border-gray-300 rounded-md" placeholder="Your Name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 mt-2 border border-gray-300 rounded-md" placeholder="Your Email">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700">Message</label>
                <textarea id="message" name="message" class="w-full p-3 mt-2 border border-gray-300 rounded-md" rows="4" placeholder="Your Message"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Send Message</button>
        </form>

        <!-- Contact Map (Google Maps Embed for Ahmedabad) -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold">Our Location</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235014.29919226348!2d72.41492771306855!3d23.020158082040354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1732274278912!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        

        <!-- Contact Information -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold">Contact Info</h2>
            <p class="text-gray-700">Feel free to reach out to us via email or phone. We are always here to assist you!</p>
            <ul class="mt-4 space-y-2">
                <li class="text-gray-600">📧 Email: Bh@gmail.com</li>
                <li class="text-gray-600">📞 Phone: (123) 456-7890</li>
                <li class="text-gray-600">📍 Address: 123 Main St, City, Country</li>
            </ul>
        </div>
    </div>
</x-navlayout>
