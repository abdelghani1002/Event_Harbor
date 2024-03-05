<style>
    .statistics {
        background-color: rgba(128, 128, 128, 0.489);
    }
</style>
<x-app-layout>
    <div class="w-full flex flex-row">

        @include('layouts.aside')
        
        <div class="w-5/6">
            <div class="p-2 rounded-lg dark:border-gray-700 flex flex-col grow justify-between h-full">
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div
                        class="flex flex-col grow items-center bg-green-500 justify-center h-24 rounded dark:bg-gray-800">
                        <p class="text-md md:text-3xl font-extrabold text-gray-100 dark:text-gray-300">
                            {{-- {{ $students_count }} --}}133
                        </p>
                        <p class="text-md md:text-2xl text-gray-100 dark:text-gray-400">
                            Students
                        </p>

                    </div>
                    <div
                        class="flex flex-col grow items-center bg-green-500 justify-center h-24 rounded dark:bg-gray-800">
                        <p class="text-md md:text-3xl font-extrabold text-gray-100 dark:text-gray-300">
                            {{-- {{ $announcements_count }} --}}133
                        </p>
                        <p class="text-md md:text-2xl text-gray-100 dark:text-gray-400">
                            Announcements
                        </p>

                    </div>
                    <div
                        class="flex flex-col grow items-center bg-green-500 justify-center h-24 rounded dark:bg-gray-800">
                        <p class="text-md md:text-3xl font-extrabold text-gray-100 dark:text-gray-300">
                            {{-- {{ $companies_count }} --}}133
                        </p>
                        <p class="text-md md:text-2xl text-gray-100 dark:text-gray-400">
                            Companies
                        </p>

                    </div>
                </div>

                <div
                    class="flex flex-col grow bg-green-500 items-center justify-center h-48 mb-4 rounded dark:bg-gray-800">
                    <p class="text-md md:text-3xl font-extrabold text-gray-100 dark:text-gray-300">
                        {{-- {{ $skill_matching_rate }} --}}133
                    </p>
                    <p class="text-md md:text-2xl text-gray-100 dark:text-gray-400">
                        applyed announcements
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
