<x-layout>
    <x-card class="p-12 bg-white shadow-lg rounded-lg">
        <header class="bg-gray-100 p-6 rounded-md">
            <h1 class="text-4xl text-center font-bold my-4 uppercase text-blue-600">
                Manage Posts
            </h1>
            <p class="text-center text-gray-600">Manage your job listings effectively</p>
        </header>

        <table class="w-full table-auto bg-white rounded-md shadow-md mt-6">
            <thead class="bg-blue-100 text-blue-600">
                <tr>
                    <th class="px-4 py-3 text-left">Image</th>
                    <th class="px-4 py-3 text-left">Job Title</th>
                    <th class="px-4 py-3 text-center">Edit</th>
                    <th class="px-4 py-3 text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                @unless($listings->isEmpty())
                @foreach($listings as $listing)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-4 py-4 text-lg text-gray-800">
                        <a href="show.html" class="font-semibold hover:text-blue-500">
                            
                            <img src="{{$listing->logo ? asset('storage/'. $listing->logo): asset('/images/no-image.png')}}" class="w-16 h-16 object-cover rounded-md">
                        </a>
                    </td>
                    <td class="px-4 py-4 text-lg text-gray-800">
                        <a href="show.html" class="font-semibold hover:text-blue-500">
                            {{$listing->title}}
                        </a>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <a href="/listings/{{$listing->id}}/edit" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <form method="POST" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md">
                                <i class="fa-solid fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="px-4 py-8 text-lg text-center text-gray-500" colspan="4">
                        <p>No Listings Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
