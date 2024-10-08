<!-- Hero -->
<section
class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
<div
    class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
    style="background-image: url('images/laravel-logo.png'); background: linear-gradient(to bottom, rgba(239, 59, 45, 0.7), rgba(0, 0, 0, 0.7)), url('images/laravel-logo.png');"
></div>

<div class="z-10">
    <h1 class="text-6xl font-bold uppercase text-white animate-fade-in">
        Job<span class="text-black">Portal</span>
    </h1>
    <p class="text-2xl text-gray-200 font-bold my-4 animate-fade-in">
        Find or post Laravel jobs & projects
    </p>
    <div>
        <a
        href="register.html"
        class="inline-block border-2 border-white text-white py-2 px-4 rounded-full uppercase mt-2 hover:text-black hover:border-black transition duration-300 ease-in-out transform hover:scale-110"
        >Quit scrolling; start applying!</a
    >

    </div>
</div>
</section>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 1s ease-in-out;
}
</style>
