<style>
    .users {
        background-color: rgba(255, 255, 255, 0.09);
    }
</style>
<x-app-layout>
    <div class="w-full flex flex-row">
        @include('layouts.aside')
        <div class="w-5/6">
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


            <div class="flex flex-col justify-between h-[79dvh] w-full">

                <!-- Users Table -->
                <table id="users_table" class="table-auto w-full text-sm whitespace-no-wrap border-spacing-2 px-2 pb-2">
                    <thead class="">
                        <tr class="bg-gray-400">
                            <th class="p-1 border-r border-gray-200">Name</th>
                            <th class="p-1 border-r border-gray-200">email</th>
                            <th class="p-1 border-r border-gray-200">applyed announcement</th>
                            <th class="p-1 border-r border-gray-200" colspan="3">
                                Manage
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
                                            <img class="w-7 h-7 rounded-full"
                                                src="{{ asset('storage/photos/' . $user->photo) }}"
                                                alt="{{ $user->name }} photo">
                                            <p class="font-semibold">{{ $user->name }}</p>
                                        </div>
                                        <div>
                                            @if ($user->hasRole('admin'))
                                                <span class="p-1 rounded-md border border-violet-500 bg-violet-700">admin</span>
                                            @elseif($user->hasRole('student'))
                                                <span class="p-1 rounded-md border border-blue-500 bg-blue-700">student</span>
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
                                            <span class="text-yellow-900 bg-yellow-400 p-1 rounded-lg text-center mr-2">
                                                not verified</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="p-2 border-r border-white text-center">
                                    <a href="https://www.facebook.com" class="p-2 border rounded-md hover:bg-slate-700">
                                        <strong
                                            class="p-1 rounded-full border border-yellow-300 text-yellow-400 mr-1">{{ count($user->applyed_announcements) }}</strong>
                                        announcements
                                    </a>
                                </td>

                                <td class="p-2 text-right border-r border-white">
                                    <form class="flex justify-center items-center m-0"
                                        action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="hover:bg-red-500 font-semibold hover:text-white text-red-500 border border-red-500 rounded-md p-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                                <td class="p-2 border-r border-white text-center">
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="hover:bg-green-500 font-semibold p-2.5 hover:text-white text-green-500 border border-green-500 rounded-md">
                                        Update
                                    </a>
                                </td>

                                <td class="p-2 text-center">
                                    <a href="{{ route('users.show', $user->id) }}" class=" text-blue-600">
                                        <svg class="w-5 m-auto text-gray-700 hover:scale-125"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path class="dark:fill-cyan-400"
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-2">
                    {{ $users->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
