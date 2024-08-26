<x-layout>
    @include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="!p-10">
           
            {{-- Show the creator's name & email --}}
            {{-- <div class="text-lg font-bold mb-4">
                Posted by: {{ $listing->user ? $listing->user->name : 'Unknown' }} </br>
                Contact Details: {{ $listing->user ? $listing->user->email : 'Unknown' }} 
            </div> --}}


            {{--! Final - Show the creator's name & email --}}
            <style>
                .tooltip {
                    position: relative;
                    display: inline-block;
                    cursor: pointer;
                }
            
                .tooltip .tooltiptext {
                    visibility: hidden;
                    width: 150px;
                    background-color: #333;
                    color: #fff;
                    text-align: center;
                    border-radius: 6px;
                    padding: 5px 0;
                    position: absolute;
                    z-index: 1;
                    bottom: 90%; /* Position above the link */
                    left: 100%;
                    margin-left: -40px;
                    opacity: 0;
                    transition: opacity 0.3s;
                }
            
                .tooltip:hover .tooltiptext {
                    visibility: visible;
                    opacity: 1;
                }
            </style>
            
            <div class="bg-gray-100 p-4 rounded-lg shadow-md mb-6 border border-gray-300">
                <div class="mb-4">
                    <span class="bg-blue-500 text-white text-sm font-semibold py-1 px-3 rounded-full">
                        Posted by
                    </span>
                </div>
                <div class="flex items-center mb-2">
                    <i class="fa-solid fa-user text-gray-600 text-lg mr-2"></i>
                    <h4 class="text-xl font-semibold text-gray-800">{{ $listing->user ? $listing->user->name : 'Unknown' }}</h4>
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-envelope text-gray-600 text-lg mr-2"></i>
                    <div class="tooltip">
                        <a href="mailto:{{$listing->user ? $listing->user->email : 'Unknown' }}" class="text-md email-link">
                            {{ $listing->user ? $listing->user->email : 'Unknown' }}
                        </a>
                        <div class="tooltiptext">Click to send an email</div>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col items-center justify-center text-center">
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$listing->logo ? asset('storage/'. $listing->logo): asset('/images/no-image.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>

                {{-- To call the tags from the backend --}}
                <x-listing-tags :tagsCsv="$listing->tags" />
                
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>

                <div class="border border-gray-200 w-full mb-6"></div>

                {{-- Job Description Section --}}
                <div class="mb-6">
                    <h3 class="text-3xl font-bold mb-4">Job Description</h3>
                    <div class="text-lg space-y-6">
                        {{ $listing->description }}
                    </div>
                </div>

                {{-- Contact and Website Section --}}
                <div class="w-full flex flex-col space-y-4">
                    <a
                        href="mailto:{{ $listing->email }}"
                        class="block w-full bg-laravel text-white py-2 px-4 rounded-xl hover:opacity-80"
                    >
                        <i class="fa-solid fa-envelope"></i> Contact Employer
                    </a>
                    <a
                        href="{{ $listing->website }}"
                        target="_blank"
                        class="block w-full bg-black text-white py-2 px-4 rounded-xl hover:opacity-80"
                    >
                        <i class="fa-solid fa-globe"></i> Visit Website
                    </a>
                </div>
            </div>
        </x-card>

        {{-- Edit form --}}
        <x-card class="mt-4 p-2 flex space-x-6"> 
            <a href="/listings/{{$listing->id}}/edit">
            <i class="i fa-solid fa-pencil mr-1"></i>Edit
            </a>

            {{-- delete from --}}
            <form method="POST" action="/listings/{{$listing->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
            {{-- <buttton class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</buttton> --}}
            </form>
        </x-card>
    </div>
</x-layout>
