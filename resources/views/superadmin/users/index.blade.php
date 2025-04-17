<x-superAdminLayout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl md:text-4xl font-extrabold text-sky-800 mb-6 text-center tracking-tight drop-shadow">
            All User List
        </h1>

        @if ($allUsers->count() > 0)
            <div class="space-y-6">
                @foreach ($allUsers as $user)
                    <div class="border-l-4 shadow p-6 transition hover:shadow-lg rounded-lg 
                        @if ($user->is_super_admin) bg-blue-100 border-blue-500
                        @elseif ($user->account_status === 'locked') bg-red-100 border-red-500
                        @else bg-gray-100 border-gray-400
                        @endif">

                        <div class="flex items-center justify-between cursor-pointer" onclick="toggleAccordion({{ $user->id }})">
                            <!-- Left: User Info -->
                            <div>
                                <h3 class="font-bold text-2xl text-gray-800">#{{ $user->id }} - {{ $user->name }}</h3>
                                <p class="text-gray-600 mt-1">
                                    <span class="font-medium">
                                        <strong class="text-sky-800 text-lg">Role:</strong> 
                                        {{ $user->is_super_admin ? 'Admin' : 'User' }}
                                    </span>
                                </p>
                            </div>
                        
                            <!-- Right: Badge + Arrow -->
                            <div class="flex items-center gap-3">
                                <!-- Account Status Badge -->
                                @if ($user->account_status === 'active')
                                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full shadow-sm">
                                        Active
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-sm font-semibold px-3 py-1 rounded-full shadow-sm">
                                        Locked
                                    </span>
                                @endif
                        
                                <!-- Accordion Arrow Icon -->
                                <svg id="icon-{{ $user->id }}" class="w-6 h-6 transform transition-transform duration-300 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>                        

                        <div id="accordion-{{ $user->id }}" class="mt-4 hidden border-t border-gray-500 pt-4">
                            <p class="text-gray-700"><strong class="text-sky-800 text-lg">Email:</strong> {{ $user->email }}</p>

                            <div class="mt-6 flex flex-wrap gap-3 justify-center">
                                <form action="{{ route('user.toggleAdmin', $user) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded transition">
                                        {{ $user->is_super_admin ? 'Remove Admin' : 'Make Admin' }}
                                    </button>
                                </form>

                                @if($user->account_status !== 'locked')
                                    <form action="{{ route('user.lock', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white text-sm font-medium py-2 px-4 rounded transition" onclick="return confirm('Lock this user?');">
                                            Lock Account
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('user.unlock', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded transition" onclick="return confirm('Unlock this user?');">
                                            Unlock Account
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white text-sm font-medium py-2 px-4 rounded transition" onclick="return confirm('Delete this user?');">
                                        Delete User
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600 mt-6">No user details found.</p>
        @endif

        <div class="mt-6">
            {{ $allUsers->links() }}
        </div>
    </div>

    @push('scripts')
        <script>
            function toggleAccordion(id) {
                const accordion = document.getElementById('accordion-' + id);
                const icon = document.getElementById('icon-' + id);
                if (accordion.classList.contains('hidden')) {
                    accordion.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                } else {
                    accordion.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            }
        </script>
    @endpush
</x-superAdminLayout>
