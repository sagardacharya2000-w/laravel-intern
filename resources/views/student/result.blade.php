<x-student>

<div class="space-y-6">

<!-- Header -->
<div>
    <h1 class="text-2xl font-bold text-(--text)">Academic Results</h1>
    <p class="text-sm text-(--muted)">
        Performance in MCQ examinations
    </p>
</div>

<!-- Summary -->
<div class="grid md:grid-cols-3 gap-4">

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-sm text-(--muted)">Total Exams</h3>
        <p class="text-2xl font-bold">8</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-sm text-(--muted)">Average Score</h3>
        <p class="text-2xl font-bold">78%</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-sm text-(--muted)">Passed</h3>
        <p class="text-2xl font-bold text-green-600">7</p>
    </div>

</div>

<!-- Result Table -->
<div class="bg-white rounded shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Class</th>
                <th class="p-3 text-left">Subject</th>
                <th class="p-3 text-left">Score</th>
                <th class="p-3 text-left">Percentage</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Date</th>
            </tr>
        </thead>

        <tbody>

            <tr class="border-t">
                <td class="p-3">Class 10</td>
                <td class="p-3">Mathematics</td>
                <td class="p-3">18 / 20</td>
                <td class="p-3">90%</td>
                <td class="p-3 text-green-600 font-semibold">Passed</td>
                <td class="p-3">10 Jun 2026</td>
            </tr>

            <tr class="border-t">
                <td class="p-3">Class 11</td>
                <td class="p-3">Physics</td>
                <td class="p-3">15 / 25</td>
                <td class="p-3">60%</td>
                <td class="p-3 text-yellow-600 font-semibold">Borderline</td>
                <td class="p-3">12 Jun 2026</td>
            </tr>

            <tr class="border-t">
                <td class="p-3">Class 10</td>
                <td class="p-3">Science</td>
                <td class="p-3">22 / 25</td>
                <td class="p-3">88%</td>
                <td class="p-3 text-green-600 font-semibold">Passed</td>
                <td class="p-3">15 Jun 2026</td>
            </tr>

        </tbody>

    </table>

</div>

</div>

</x-student>
