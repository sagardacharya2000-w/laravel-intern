<x-layout title="Admin Dashboard">

    <div class="min-h-screen bg-gray-50 py-8 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Heading --}}
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900" style="font-family:'Sora',sans-serif;">
                    Admin Dashboard
                </h2>
                <p class="text-gray-500 mt-1">Welcome back, {{ auth()->user()->name }}!</p>
            </div>

            {{-- Stat Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">

                {{-- Total Students --}}
                <div class="bg-white rounded-2xl shadow-sm p-5 border-t-4 border-blue-600">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900" style="font-family:'Sora',sans-serif;">
                                {{ $totalStudents }}
                            </div>
                            <div class="text-sm text-gray-500">Total Students</div>
                        </div>
                    </div>
                </div>

                {{-- Total Teachers --}}
                <div class="bg-white rounded-2xl shadow-sm p-5 border-t-4 border-blue-600">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chalkboard-teacher text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900" style="font-family:'Sora',sans-serif;">
                                {{ $totalTeachers }}
                            </div>
                            <div class="text-sm text-gray-500">Total Teachers</div>
                        </div>
                    </div>
                </div>

                {{-- Total Exams --}}
                <div class="bg-white rounded-2xl shadow-sm p-5 border-t-4 border-blue-600">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900" style="font-family:'Sora',sans-serif;">
                                {{ $totalExams }}
                            </div>
                            <div class="text-sm text-gray-500">Total Exams</div>
                        </div>
                    </div>
                </div>

                {{-- Subscription Status --}}
                <div class="bg-white rounded-2xl shadow-sm p-5 border-t-4 border-green-500">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-crown text-green-500 text-xl"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-green-500" style="font-family:'Sora',sans-serif;">
                                Active
                            </div>
                            <div class="text-sm text-gray-500">Subscription</div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Recent Users Table --}}
            <div class="bg-white rounded-2xl shadow-sm mb-6 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h5 class="font-semibold text-gray-800" style="font-family:'Sora',sans-serif;">
                        <i class="fas fa-users mr-2 text-blue-600"></i>Recent Users
                    </h5>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Registered</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($recentUsers as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4">
                                    @if($user->role === 'admin')
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-600">Admin</span>
                                    @elseif($user->role === 'teacher')
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-600">Teacher</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-600">Student</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-400">No users yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Active Exams Table --}}
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                    <h5 class="font-semibold text-gray-800" style="font-family:'Sora',sans-serif;">
                        <i class="fas fa-bolt mr-2 text-green-500"></i>Active Exams
                    </h5>
                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-600">Live Now</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Exam Title</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Class</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Expires At</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Attempts</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($activeExams as $exam)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $exam->questionSet?->title ?? '—' }}
                                </td>
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $exam->schoolClass?->name ?? '—' }}
                                </td>
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $exam->expires_at?->format('d M Y, h:i A') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-600">
                                        <i class="fas fa-circle mr-1" style="font-size:0.4rem;vertical-align:middle;"></i>Live
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $exam->attempts_count }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-400">No active exams right now.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</x-layout>
