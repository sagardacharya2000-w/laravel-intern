<x-layout title="Manage Users">

    <div class="min-h-screen bg-gray-50 py-8 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Heading --}}
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900" style="font-family:'Sora',sans-serif;">
                    Users
                </h2>
                <p class="text-gray-500 mt-1">Manage all students, teachers and admins.</p>
            </div>

            {{-- Search Bar --}}
            <form method="GET" action="{{ route('admin.users') }}" class="mb-6">
                <div class="flex gap-2" style="max-width:420px;">
                    <div class="relative flex-1">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <i class="fas fa-search text-sm"></i>
                        </span>
                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="Search by name or email..."
                            class="w-full pl-9 pr-4 py-2 rounded-xl border border-gray-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-xl hover:bg-blue-700 transition">
                        Search
                    </button>
                </div>
            </form>

            {{-- Table --}}
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    @if($user->role === 'admin')
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-600">Admin</span>
                                    @elseif($user->role === 'teacher')
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-600">Teacher</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-600">Student</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($user->is_active)
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-600">Active</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-600">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href="#"
                                            class="px-3 py-1 text-xs font-semibold rounded-lg border border-blue-600 text-blue-600 hover:bg-blue-50 transition">
                                            Edit
                                        </a>
                                        <a href="#"
                                            class="px-3 py-1 text-xs font-semibold rounded-lg border border-red-500 text-red-500 hover:bg-red-50 transition">
                                            Deactivate
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-400">No users found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($users->hasPages())
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $users->links() }}
                </div>
                @endif

            </div>

        </div>
    </div>

</x-layout>
