<div class="flex justify-between bg-dots-darker bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 px-4 md:px-8">

    <x-application-logo />

    @if (Route::has('login'))
        <div class="py-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-violet-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-300 hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-violet-500 bg-green-700 p-2 rounded-md">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-300 hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-violet-500 bg-violet-700 p-2 rounded-md">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
