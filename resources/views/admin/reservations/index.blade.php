<style>
    .requests {
        background-color: rgba(255, 255, 255, 0.09);
    }
</style>
<x-app-layout>
    <div class="w-full flex flex-row">
        @include('layouts.aside')
        <div class="w-11/12 md:w-5/6">
            <div class="flex flex-row items-center py-1 w-full px-2 justify-between">
                <h3 class="text-2xl font-bold text-cyan-800 dark:text-cyan-300">Requests</h3>
                <!-- Success&Error alert -->
                @if (session('success'))
                    <p data-icon="success" data-title="Success." class="alert text-green-400 text-center">
                        {{ session('success') }}
                    </p>
                @elseif (session('error'))
                    <p data-icon="error" data-title="Error!" class="alert text-red-400 text-center">
                        {{ session('error') }}
                    </p>
                @endif
                <form class="m-0 cursor-pointer text-white font-bold bg-green-700 rounded-xl p-2 hover:bg-green-800"
                    href="{{ route('reservations.accepteAll') }}">
                    <button class="p-0 m-0">
                        Accept All
                    </button>
                </form>
            </div>


            <div class="flex flex-col justify-between md:h-[79dvh] w-full  overflow-x-scroll scrollbar-hide">

                <!-- Events Table -->
                @unless ($reservations->count() == 0)
                    <table id="reservations_table"
                        class="table-auto w-full text-sm whitespace-no-wrap border-spacing-2 px-2 pb-2">
                        <thead class="">
                            <tr class="bg-gray-400">
                                <th class="p-1 border-r border-gray-200">#</th>
                                <th class="p-1 border-r border-gray-200">Client</th>
                                <th class="p-1 border-r border-gray-200">Event</th>
                                <th class="p-1 border-r border-gray-200">Date</th>
                                <th class="p-1 border-r border-gray-200">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr
                                    class="odd:bg-gray-200 even:bg-gray-300 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:text-gray-300">

                                    <td class="p-2 border-r border-white">
                                        <p class="text-center">
                                            #{{ $reservation->id }}
                                        </p>
                                    </td>

                                    <td class="p-2 border-r border-white">
                                        <div class="flex flex-row items-center gap-x-2">
                                            @if (file_exists(asset('storage/photos/' . $reservation->client->photo_src)))
                                                <img class="w-7 h-7 rounded-full"
                                                    src="{{ asset('storage/photos/' . $reservation->client->photo_src) }}"
                                                    alt="{{ $reservation->name }} photo">
                                            @else
                                                <div
                                                    class="relative w-7 h-7 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                    <svg class="absolute w-9 h-9 text-gray-400 -left-1" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <p class="font-semibold">{{ $reservation->client->name }}</p>
                                        </div>
                                    </td>

                                    <td class="p-2 border-r border-white">
                                        <p class="text-center">
                                            {{ $reservation->event->title }}
                                        </p>
                                    </td>

                                    <td class="p-2 border-r border-white">
                                        <p class="text-center">
                                            {{ $reservation->created_at }}
                                        </p>
                                    </td>
                                    <td class="p-2 border-r border-white text-center">
                                        <form method="POST"
                                            action="{{ route('reservations.edit', $reservation) }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="status"
                                                @if ($reservation->status == 'pending') class="status_select text-center rounded-md p-1 bg-yellow-300 text-yellow-600" @endif
                                                @if ($reservation->status == 'accepted') class="status_select text-center rounded-md p-1 bg-green-300 text-green-600" @endif
                                                @if ($reservation->status == 'rejected') class="status_select text-center rounded-md p-1 bg-violet-300 text-violet-600" @endif>
                                                <option class="dark:bg-slate-800 dark:text-gray-300" value="pending"
                                                    @if ($reservation->status == 'pending') selected @endif>
                                                    pending</option>
                                                <option class="dark:bg-slate-800 dark:text-gray-300" value="accepted"
                                                    @if ($reservation->status == 'accepted') selected @endif>
                                                    accepted</option>
                                                <option class="dark:bg-slate-800 dark:text-gray-300" value="rejected"
                                                    @if ($reservation->status == 'rejected') selected @endif>
                                                    rejected</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-2">
                        {{ $reservations->links() }}
                    </div>
                @else
                    <div class="w-full h-full flex justify-center items-center">
                        <p class="text-center dark:text-gray-300">No request for now</p>
                    </div>
                @endunless
            </div>
        </div>
    </div>

    @vite(['resources/js/status.js'])

</x-app-layout>
