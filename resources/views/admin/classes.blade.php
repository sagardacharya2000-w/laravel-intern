<x-layout title="Manage Classes">

    <div class="min-h-screen bg-gray-50 py-8 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Heading --}}
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900" style="font-family:'Sora',sans-serif;">
                    Classes
                </h2>
                <p class="text-gray-500 mt-1">Manage all classes and enrollments.</p>
            </div>

            {{-- Table --}}
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Class Name</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Grade</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Academic Year</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Class Code</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Teacher</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Students</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($classes as $class)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $class->name }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $class->grade_level }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $class->academic_year }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <code class="px-2 py-1 rounded-lg text-sm font-mono bg-blue-50 text-blue-600">
                                            {{ $class->class_code }}
                                        </code>
                                        <button
                                            onclick="copyCode('{{ $class->class_code }}', 'btn-{{ $class->id }}')"
                                            id="btn-{{ $class->id }}"
                                            class="w-7 h-7 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition text-xs">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-500">{{ $class->teacher?->name ?? '—' }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $class->students_count }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href="#"
                                            class="px-3 py-1 text-xs font-semibold rounded-lg border border-blue-600 text-blue-600 hover:bg-blue-50 transition">
                                            Edit
                                        </a>
                                        <a href="#"
                                            class="px-3 py-1 text-xs font-semibold rounded-lg border border-red-500 text-red-500 hover:bg-red-50 transition">
                                            Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-400">No classes found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <x-slot name="scripts">
    <script>
        function copyCode(code, btnId) {
            navigator.clipboard.writeText(code).then(() => {
                const btn = document.getElementById(btnId);
                btn.innerHTML = '<i class="fas fa-check"></i>';
                btn.classList.remove('bg-blue-50', 'text-blue-600');
                btn.classList.add('bg-green-100', 'text-green-600');
                setTimeout(() => {
                    btn.innerHTML = '<i class="fas fa-copy"></i>';
                    btn.classList.remove('bg-green-100', 'text-green-600');
                    btn.classList.add('bg-blue-50', 'text-blue-600');
                }, 1500);
            });
        }
    </script>
    </x-slot>

</x-layout>
