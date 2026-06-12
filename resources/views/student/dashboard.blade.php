<x-student>

    <div class="space-y-6">

        <!-- Welcome Section -->
        <section>
            <h1 class="text-2xl font-bold text-(--heading)">
                Welcome Back 👋
            </h1>

            <p class="text-(--muted) mt-1">
                Stay updated with your exams and performance.
            </p>
        </section>

        <!-- Statistics Cards -->
        <section class="grid grid-cols-1 md:grid-cols-4 gap-4">

            <article class="bg-white p-5 rounded-xl shadow">
                <h3 class="font-semibold text-(--heading)">
                    Upcoming Exams
                </h3>

                <p class="text-3xl font-bold mt-3">
                    2
                </p>

                <p class="text-sm text-(--muted)">
                    Scheduled exams
                </p>
            </article>

            <article class="bg-white p-5 rounded-xl shadow">
                <h3 class="font-semibold text-(--heading)">
                    Completed Exams
                </h3>

                <p class="text-3xl font-bold mt-3">
                    12
                </p>

                <p class="text-sm text-(--muted)">
                    Exams taken
                </p>
            </article>

            <article class="bg-white p-5 rounded-xl shadow">
                <h3 class="font-semibold text-(--heading)">
                    Average Score
                </h3>

                <p class="text-3xl font-bold mt-3">
                    84%
                </p>

                <p class="text-sm text-(--muted)">
                    Overall performance
                </p>
            </article>

            <article class="bg-white p-5 rounded-xl shadow">
                <h3 class="font-semibold text-(--heading)">
                    Passed Exams
                </h3>

                <p class="text-3xl font-bold mt-3">
                    11
                </p>

                <p class="text-sm text-(--muted)">
                    Successful attempts
                </p>
            </article>

        </section>

        <!-- Upcoming Exams -->
        <section class="bg-white p-5 rounded-xl shadow">

            <h2 class="font-semibold text-lg text-(--heading) mb-4">
                Upcoming Exams
            </h2>

            <div class="space-y-3">

                <div class="flex justify-between items-center border-b pb-3">
                    <div>
                        <h3 class="font-medium">Physics MCQ Test</h3>
                        <p class="text-sm text-(--muted)">
                            Grade 12 Science
                        </p>
                    </div>

                    <div class="grid">
                        <button class="inline-block px-4 py-2 mt-6 rounded bg-(--primary) text-white hover:bg-(--primary-dark)">Register</button>
                        <span class="text-sm text-(--muted)">
                            15 Aug 2026
                        </span>
                    </div>
                </div>

                <div class="flex justify-between items-center border-b pb-3">
                    <div>
                        <h3 class="font-medium">Chemistry MCQ Test</h3>
                        <p class="text-sm text-(--muted)">
                            Grade 12 Science
                        </p>
                    </div>

                    <div class="grid">
                        <button class="inline-block px-4 py-2 mt-6 rounded bg-(--primary) text-white hover:bg-(--primary-dark)">Register</button>
                        <span class="text-sm text-(--muted)">
                            22 Aug 2026
                        </span>
                    </div>
                </div>

            </div>

        </section>

        <!-- Recent Activity -->
        <section class="bg-white p-5 rounded-xl shadow">

            <h2 class="font-semibold text-lg text-(--heading) mb-4">
                Recent Activity
            </h2>

            <ul class="space-y-3 text-(--text)">

                <li>
                    ✅ Completed Computer Science C Programming MCQ Test (95%)
                </li>

                <li>
                    📊 Result published for Mathematics Algebra MCQ Test
                </li>

                <li>
                    📝 Registered for Physics Heat and Temperature MCQ Test
                </li>

                <li>
                    🎉 Scored highest marks in Chemistry Organic Chemistry MCQ Test
                </li>

            </ul>

        </section>

    </div>

</x-student>
