<style>
    .statistics {
        background-color: rgba(128, 128, 128, 0.489);
    }
</style>
<x-app-layout>
    <div class="w-full flex flex-row">

        @include('layouts.aside')

        <div class="w-11/12 md:w-5/6">
            <div class="p-2 rounded-lg dark:border-gray-700 flex flex-col grow justify-between h-full">
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div
                        class="flex flex-col grow items-center bg-violet-500 justify-center h-24 rounded dark:bg-gray-800">
                        <div class="w-14 h-14">
                            <svg class="w-full h-full p-0 m-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24"
                                style="fill: rgba(112, 128, 144, 1);transform: ;msFilter:;">
                                <path
                                    d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex items-end gap-1 md:gap-3">
                            <span class="text-md md:text-3xl font-extrabold text-gray-100 dark:text-gray-300">
                                {{ $users_count }}
                            </span>
                            <span class="text-md md:text-2xl text-gray-100 dark:text-gray-400">
                                Users
                            </span>
                        </div>
                    </div>
                    <div
                        class="flex flex-col grow items-center bg-green-500 justify-center h-24 rounded dark:bg-gray-800">
                        <div class="w-14 h-14">
                            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" style="fill: rgba(112, 128, 144, 1);transform: ;msFilter:;">
                                <path d="M11 12h6v6h-6z"></path>
                                <path
                                    d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm.001 16H5V8h14l.001 12z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex items-end gap-1 md:gap-3">
                            <span class="text-md md:text-3xl font-extrabold text-gray-100 dark:text-gray-300">
                                {{ $events_count }}
                            </span>
                            <span class="text-md md:text-2xl text-gray-100 dark:text-gray-400">
                                Events
                            </span>
                        </div>

                    </div>
                    <div
                        class="flex flex-col grow items-center bg-violet-500 justify-center h-24 rounded dark:bg-gray-800">
                        <div class="w-14 h-14">
                            <svg class="w-full h-full" style="fill: rgba(112, 128, 144, 1);"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" id="ticket">
                                <path
                                    d="m4.906 11.541 3.551 3.553 6.518-6.518-3.553-3.551-6.516 6.516zm14.198-4.877-1.511-1.512a2.024 2.024 0 0 1-2.747-2.746L13.335.894a1.017 1.017 0 0 0-1.432 0L.893 11.904a1.017 1.017 0 0 0 0 1.432l1.512 1.51a2.024 2.024 0 0 1 2.747 2.748l1.512 1.51a1.015 1.015 0 0 0 1.432 0L19.104 8.096a1.015 1.015 0 0 0 0-1.432zM8.457 16.719l-5.176-5.178L11.423 3.4l5.176 5.176-8.142 8.143z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex items-end gap-1 md:gap-3">
                            <span class="text-md md:text-3xl font-extrabold text-gray-100 dark:text-gray-300">
                                {{ $reservations_count }}
                            </span>
                            <span class="text-md md:text-2xl text-gray-100 dark:text-gray-400">
                                Reservations
                            </span>
                        </div>

                    </div>
                </div>

                <div
                    class="flex flex-col grow bg-violet-500 items-center justify-center h-48 mb-4 rounded dark:bg-gray-800">
                    <div class="w-14 h-14">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(112, 128, 144, 1);transform: ;msFilter:;">
                            <path
                                d="M12 15c-1.84 0-2-.86-2-1H8c0 .92.66 2.55 3 2.92V18h2v-1.08c2-.34 3-1.63 3-2.92 0-1.12-.52-3-4-3-2 0-2-.63-2-1s.7-1 2-1 1.39.64 1.4 1h2A3 3 0 0 0 13 7.12V6h-2v1.09C9 7.42 8 8.71 8 10c0 1.12.52 3 4 3 2 0 2 .68 2 1s-.62 1-2 1z">
                            </path>
                            <path d="M5 2H2v2h2v17a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4h2V2H5zm13 18H6V4h12z"></path>
                        </svg>
                    </div>
                    <div class="flex items-end gap-1 md:gap-3">
                        <span class="text-md md:text-3xl font-extrabold text-gray-100 dark:text-gray-300">
                            {{ $total_revenue }} $
                        </span>
                        <span class="text-md md:text-2xl text-gray-100 dark:text-gray-400">
                            Total Revenue
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
