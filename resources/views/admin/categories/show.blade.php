<x-app-layout>
    <div class="dark:bg-gray-800 dark:text-white p-6">
        @if (session('success'))
            <p class="alert bg-green-300 text-green-700 p-2 rounded-md">{{ session('success') }}</p>
        @elseif(session('error'))
            <p class="alert bg-red-300 text-red-700 p-2 rounded-md">{{ session('error') }}</p>
        @elseif(session('infos'))
            <p class="alert bg-cyan-300 text-cyan-700 p-2 rounded-md">{{ session('infos') }}</p>
        @endif

        <h2 class="text-2xl font-bold my-4">{{ $announcement->title }}</h2>
        <p class="dark:text-gray-300 mb-2 text-sm">{{ $announcement->description }}</p>

        <div class="mb-3">
            <h3 class="font-semibold mb-2">Companies partened</h3>
            <div class="flex flex-wrap gap-4">
                @foreach ($parteners as $company)
                    <a href="{{ route('companies.show', $company) }}"
                        class="p-2 flex items-center gap-2 border border-gray-500 dark:text-gray-300 rounded-lg dark:bg-slate-900">
                        <span>
                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/logos/' . $company->logo) }}"
                                alt="{{ $company->name }} logo">
                        </span>
                        <p>{{ $company->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="w-full">
            <h3 class="font-semibold">Skills required</h3>
        </div>
        <div class="mb-3 w-full flex">
            <div class="my-2 flex flex-wrap gap-2 w-full">
                @foreach ($skills as $skill)
                    <span
                        class="p-1 rounded-md dark:text-gray-400 dark:bg-slate-900 border border-gray-600">{{ $skill->name }}</span>
                @endforeach
            </div>
            @auth
                @hasrole('student')
                    <form method="POST" action="{{ route('announcements.apply', $announcement) }}" class="self-end">
                        @csrf
                        @method('POST')
                        <button
                            class="px-4 py-2 rounded-md border border-violet-300 bg-cyan-600 hover:border-violet-500 hover:bg-blue-600">Apply
                        </button>
                    </form>
                @endhasrole
            @else
                <a href="{{ route("login") }}"
                    class="px-4 py-2 rounded-md border border-violet-300 bg-cyan-600 hover:border-violet-500 hover:bg-blue-600">Apply
                </a>
            @endauth
        </div>

        @if (isset($unmatched_skills) && $unmatched_skills->count() != 0)
        <div class="w-full">
            <h3 class="font-semibold">Unmatched skills</h3>
        </div>
        <div class="mb-3 w-full flex">
            <div class="my-2 flex flex-wrap gap-2 w-full">
                @foreach ($unmatched_skills as $skill)
                    <span
                        class="p-1 rounded-md dark:text-gray-400 dark:bg-slate-900 border border-gray-600">{{ $skill->name }}</span>
                @endforeach
            </div>
        </div>
        @endif

        <div class="flex justify-between items-end dark:text-gray-300">
            <div class="mt-4">
                <strong>Start Date:</strong> {{ $announcement->start_date }}
            </div>
            <div class="mt-2">
                <strong>End Date:</strong> {{ $announcement->end_date }}
            </div>
        </div>
    </div>

</x-app-layout>
