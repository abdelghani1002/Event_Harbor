<style>
    .users {
        background-color: rgba(255, 255, 255, 0.09);
    }
</style>
<x-app-layout>
    <div class="w-full flex flex-row">
        @include('layouts.aside')
        <div class="w-11/12 md:w-5/6">
            <div class="flex flex-row items-center py-1 w-full px-2 justify-between">
                <h3 class="text-2xl font-bold text-cyan-800 dark:text-cyan-300">Users</h3>
                <!-- Success alert -->
                @if (session('success'))
                    <p data-icon="success" data-title="Success." class="alert text-green-400 text-center">
                        {{ session('success') }}
                    </p>
                @elseif (session('error'))
                    <p data-icon="error" data-title="Error!" class="alert text-red-400 text-center">
                        {{ session('error') }}
                    </p>
                @endif
            </div>


            <div class="flex flex-col justify-between md:h-[79dvh] w-full overflow-x-scroll scrollbar-hide">

                <!-- Users Table -->
                <table id="users_table" class="table-auto w-full text-sm whitespace-no-wrap border-spacing-2 px-2 pb-2">
                    <thead class="">
                        <tr class="bg-gray-400">
                            <th class="p-1 border-r border-gray-200">Name</th>
                            <th class="p-1 border-r border-gray-200">email</th>
                            <th class="p-1 border-r border-gray-200">
                                Ban ⛔
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr
                                class="odd:bg-gray-200 even:bg-gray-300 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:text-gray-300">

                                <td class="p-2 border-r border-white">
                                    <div class="flex justify-between items-center">
                                        <div class="flex flex-row items-center gap-x-2">
                                            <div
                                                class="relative w-7 h-7 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                <svg class="absolute w-9 h-9 text-gray-400 -left-1" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="font-semibold">{{ $user->name }}</p>
                                        </div>
                                        <div>
                                            @if ($user->hasRole('admin'))
                                                <span
                                                    class="p-1 rounded-md border border-violet-500 bg-violet-700">admin</span>
                                            @elseif($user->hasRole('organizer'))
                                                <span
                                                    class="p-1 rounded-md border border-green-500 bg-green-700">organizer</span>
                                            @else
                                                <span
                                                    class="p-1 rounded-md border border-blue-500 bg-blue-700">spectator</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td class="p-2 border-r border-white">
                                    <div class="flex justify-between items-center w-full ">
                                        <span class="text-center">
                                            {{ $user->email }}
                                        </span>
                                        @if ($user->hasVerifiedEmail())
                                            <span class="text-green-700 bg-green-300 p-1 rounded-lg text-center mr-2">
                                                verified</span>
                                        @else
                                            <span class="text-yellow-900 bg-yellow-300 p-1 rounded-lg text-center mr-2">
                                                not verified</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="p-2 text-right border-r border-white">
                                    @if ($user->is_banned)
                                        <form class="flex justify-center items-center m-0"
                                            action="{{ route('users.update', $user->id) }}" method="POST"
                                            onsubmit="return confirmBan(event)">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="is_banned" value="0">
                                            <button
                                                class="hover:bg-green-500 font-semibold hover:text-white text-violet-500 border border-green-500 rounded-md p-2">
                                                Reban
                                            </button>
                                        </form>
                                    @else
                                        <form class="flex justify-center items-center m-0"
                                            action="{{ route('users.update', $user->id) }}" method="POST"
                                            >
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="is_banned" value="1">
                                            <button
                                                class="hover:bg-yellow-500 font-semibold hover:text-white text-red-500 border border-yellow-500 rounded-md p-2">
                                                Ban
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-2">
                {{ $users->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
