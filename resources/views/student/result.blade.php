<x-student>

    <section class="mb-6">
        <h1 class="text-2xl font-bold text-(--text)">
            Exam Results
        </h1>

        <p class="text-(--muted)">
            View your MCQ examination history and performance.
        </p>
    </section>

    <!-- Summary Cards -->
    <section class="grid md:grid-cols-3 gap-4 mb-6">

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-(--muted) text-sm">Total Exams Taken</h3>
            <p class="text-3xl font-bold mt-2">12</p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-(--muted) text-sm">Average Score</h3>
            <p class="text-3xl font-bold mt-2">84%</p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-(--muted) text-sm">Passed Exams</h3>
            <p class="text-3xl font-bold mt-2">11</p>
        </div>

    </section>

    <!-- Result History -->
    <section class="bg-white rounded-xl shadow overflow-hidden">

        <div class="p-5 border-b">
            <h2 class="text-lg font-semibold">
                Exam History
            </h2>
        </div>

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">Exam</th>
                    <th class="p-4 text-left">Subject</th>
                    <th class="p-4 text-left">Correct</th>
                    <th class="p-4 text-left">Score</th>
                    <th class="p-4 text-left">Percentage</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Date</th>
                </tr>
            </thead>

            <tbody>

                <tr class="border-t">
                    <td class="p-4">Unit Test - 1</td>
                    <td class="p-4">Physics</td>
                    <td class="p-4">18 / 20</td>
                    <td class="p-4">18</td>
                    <td class="p-4">90%</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                            Passed
                        </span>
                    </td>
                    <td class="p-4">15 Jun 2026</td>
                </tr>

                <tr class="border-t">
                    <td class="p-4">Monthly Test</td>
                    <td class="p-4">Chemistry</td>
                    <td class="p-4">16 / 20</td>
                    <td class="p-4">16</td>
                    <td class="p-4">80%</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                            Passed
                        </span>
                    </td>
                    <td class="p-4">02 Jul 2026</td>
                </tr>

                <tr class="border-t">
                    <td class="p-4">Chapter Quiz</td>
                    <td class="p-4">Mathematics</td>
                    <td class="p-4">11 / 20</td>
                    <td class="p-4">11</td>
                    <td class="p-4">55%</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                            Borderline
                        </span>
                    </td>
                    <td class="p-4">12 Jul 2026</td>
                </tr>

                <tr class="border-t">
                    <td class="p-4">Weekly Test</td>
                    <td class="p-4">Computer Science</td>
                    <td class="p-4">19 / 20</td>
                    <td class="p-4">19</td>
                    <td class="p-4">95%</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                            Passed
                        </span>
                    </td>
                    <td class="p-4">25 Jul 2026</td>
                </tr>

            </tbody>

        </table>

    </section>

</x-student>
