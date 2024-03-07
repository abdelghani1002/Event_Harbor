<x-app-layout>
    <div>
        @if (request()->routeIs("home"))
               <x-hero-section />
                <div class="m-2 lg:mx-24 dark:bg-slate-800">
                    {{-- <x-search :categories="$categories" /> --}}
                </div>
        @endif
    </div>

    <div id="place_result" class="flex flex-wrap lg:px-10 px-8 gap-2 md:justify-center pb-10 pt-2 justify-center w-full">
        @foreach ($events as $event)
            <x-event-card :event="$event" />
        @endforeach
    </div>
    <div class="p-5">
        {{ $events->OnEachSide(1)->links() }}
    </div>

    @include('layouts.footer')
</x-app-layout>
