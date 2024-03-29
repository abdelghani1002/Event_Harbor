<x-app-layout>
    <div>
        <div>
            @if (session('success'))
                <p class="alert bg-green-300 text-green-700 p-2 rounded-md">{{ session('success') }}</p>
            @elseif(session('error'))
                <p class="alert bg-red-300 text-red-700 p-2 rounded-md">{{ session('error') }}</p>
            @elseif(session('infos'))
                <p class="alert bg-cyan-300 text-cyan-700 p-2 rounded-md">{{ session('infos') }}</p>
            @endif
        </div>


        <section class="text-gray-400 bg-gray-900 body-font">
            <div class="container mx-auto flex px-5 py-12 md:flex-row items-center flex-col-reverse">
                <div
                    class="lg:flex-grow md:w-1/2 md:h-fit lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <div class="mb-5 md:mb-8 flex flex-col">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">
                            {{ $event->title }}
                        </h1>
                        <p class="mb-5 md:mb-8 leading-relaxed">
                            {{ $event->description }}
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quisquam repudiandae natus
                            voluptate hic, veniam magni deleniti quibusdam. Esse nam necessitatibus blanditiis, quam sit
                            labore eum ex eveniet aliquam dolores dolore ad aut ipsam delectus deleniti, sint odit eaque
                            sequi architecto? Illum possimus hic ullam ducimus iusto quod sapiente quia?
                        </p>
                        <div class="mb-5 md:mb-8 flex justify-between items-center dark:text-gray-100">
                            <span class="mb-3 w-fit px-2 py-1 rounded-md dark:bg-gray-700 ">
                                @if ($event->category)
                                    {{ $event->category->name }}
                                @else
                                    ---
                                @endif
                            </span>
                            <span class="font-bold m-0 p-1 text-2xl">
                                <span class="flex gap-2 items-end">
                                    <svg class="w-7 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        id="ticket">
                                        <path
                                            d="m4.906 11.541 3.551 3.553 6.518-6.518-3.553-3.551-6.516 6.516zm14.198-4.877-1.511-1.512a2.024 2.024 0 0 1-2.747-2.746L13.335.894a1.017 1.017 0 0 0-1.432 0L.893 11.904a1.017 1.017 0 0 0 0 1.432l1.512 1.51a2.024 2.024 0 0 1 2.747 2.748l1.512 1.51a1.015 1.015 0 0 0 1.432 0L19.104 8.096a1.015 1.015 0 0 0 0-1.432zM8.457 16.719l-5.176-5.178L11.423 3.4l5.176 5.176-8.142 8.143z">
                                        </path>
                                    </svg>
                                    {{ $event->ticket_price }}<strong class="">$</strong>
                                </span>
                            </span>
                        </div>
                        <div class="flex justify-between ">
                            <div class="w-1/3 flex flex-col md:flex-row items-center md:items-end gap-2">
                                <svg class="w-7 fill-white" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                    viewBox="0 0 64 64" id="location">
                                    <path fill=""
                                        d="M50.4,18.41a18.4,18.4,0,1,0-36.8,0C13.6,28.57,32,54.26,32,54.26S50.4,28.57,50.4,18.41ZM20,18.41a12,12,0,1,1,12,12A12,12,0,0,1,20,18.41Z">
                                    </path>
                                    <path fill=""
                                        d="M41.26,43c-1.38,2.25-2.72,4.33-3.9,6.11,5,.68,8.5,2.28,8.5,4.16,0,2.48-6.2,4.5-13.86,4.5s-13.86-2-13.86-4.5c0-1.89,3.52-3.49,8.51-4.16-1.18-1.78-2.52-3.87-3.9-6.12C10.65,44.36,1.91,48.42,1.91,53.23,1.91,59.18,15.38,64,32,64s30.09-4.82,30.09-10.77C62.09,48.42,53.35,44.36,41.26,43Z">
                                    </path>
                                </svg>
                                <p>{{ $event->place }}</p>
                            </div>
                            <div class="w-1/3 justify-end flex flex-col md:flex-row items-center md:items-end gap-2">
                                <svg class="w-7 fill-white" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                    viewBox="0 0 512 512" id="date">
                                    <rect width="72" height="70" x="103" y="50"></rect>
                                    <rect width="72" height="70" x="337" y="50"></rect>
                                    <path
                                        d="M219.55 338.5l-7.836 45.686 41.028-21.57a7 7 0 0 1 6.516 0l41.028 21.57L292.45 338.5a7 7 0 0 1 2.014-6.2l33.192-32.355-45.872-6.665a7 7 0 0 1-5.27-3.829L256 247.889l-20.514 41.566a7 7 0 0 1-5.27 3.829l-45.872 6.665L217.536 332.3A7 7 0 0 1 219.55 338.5zM479 130.434A38.305 38.305 0 0 0 440.446 92H423v35.332A6.448 6.448 0 0 1 416.33 134H330.437c-3.867 0-7.437-2.8-7.437-6.668V92H189v35.332c0 3.866-3.57 6.668-7.437 6.668H95.67A6.448 6.448 0 0 1 89 127.332V92H71.554A38.305 38.305 0 0 0 33 130.434V172H479z">
                                    </path>
                                    <path
                                        d="M71.554,462H440.446A38.579,38.579,0,0,0,479,423.245V186H33V423.245A38.579,38.579,0,0,0,71.554,462Zm91.09-169.1a7,7,0,0,1,5.65-4.764l56.267-8.175,25.162-50.985a7,7,0,0,1,12.554,0l25.162,50.985,56.267,8.175a7,7,0,0,1,3.879,11.94l-40.714,39.687,9.611,56.038a7,7,0,0,1-10.157,7.379L256,376.72l-50.325,26.458a7,7,0,0,1-10.157-7.379l9.611-56.038-40.714-39.687A7,7,0,0,1,162.644,292.9Z">
                                    </path>
                                </svg>
                                <p>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</p>

                                <p>{{ \Carbon\Carbon::parse($event->date)->format('h:i') }}</p>
                            </div>
                            <div class="w-1/3 justify-end flex flex-col md:flex-row items-center md:items-end gap-2">
                                <div class="flex justify-end">
                                    <p>by :</p>
                                </div>
                                <div
                                    class="flex title-font font-normal items-center dark:text-gray-300 lg:justify-center mb-4 md:mb-0">
                                    <span>
                                        @if (file_exists(asset('storage/photos/' . $event->organizer->photo)))
                                            <img class="w-7 h-7 rounded-full"
                                                src="{{ asset('storage/photos/' . $event->organizer->photo) }}"
                                                alt="{{ $event->name }} photo">
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
                                    </span>
                                    <span class="ml-3 text-md">{{ $event->organizer->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between w-full">
                        <span class="flex items-center gap-1">
                            <span class="">
                                <svg class="w-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    id="ticket">
                                    <path
                                        d="m4.906 11.541 3.551 3.553 6.518-6.518-3.553-3.551-6.516 6.516zm14.198-4.877-1.511-1.512a2.024 2.024 0 0 1-2.747-2.746L13.335.894a1.017 1.017 0 0 0-1.432 0L.893 11.904a1.017 1.017 0 0 0 0 1.432l1.512 1.51a2.024 2.024 0 0 1 2.747 2.748l1.512 1.51a1.015 1.015 0 0 0 1.432 0L19.104 8.096a1.015 1.015 0 0 0 0-1.432zM8.457 16.719l-5.176-5.178L11.423 3.4l5.176 5.176-8.142 8.143z">
                                    </path>
                                </svg>
                            </span>
                            <span class="">available seats : </span>
                            <span class="font-bold m-0 text-lg">
                                {{ $event->tickets_number - $event->tickets_booked }}
                            </span>
                        </span>

                        @if ($event->organizer->id == auth()->id())
                            <span
                                class="inline-flex text-white bg-indigo-600 border-0 py-2 px-6 focus:outline-none rounded text-lg">
                                <strong class="mr-2 text-xl">{{ $event->reservations->count() }} </strong>tickets sold
                            </span>
                        @elseif(auth()->user() && auth()->user()->events_booked_to->contains($event))
                            @if (file_exists("storage/tickets/ticket_" . auth()->id() . "_" . $event->id . ".pdf"))
                                <form action="{{ route('download.ticket', $event) }}" method="post"
                                    class="inline-flex text-white bg-teal-600 border-0 p-0 focus:outline-none rounded text-lg">
                                    @csrf
                                    @method('POST')
                                    <button class="px-3 py-2 m-0">Get my Ticket</button>
                                </form>
                            @else
                                <span
                                    class="inline-flex text-white bg-indigo-600 border-0 py-2 px-6 focus:outline-none rounded text-lg">
                                    Pending ..<span class="">.</span>
                                </span>
                            @endif
                        @elseif($event->tickets_number - $event->tickets_booked == 0)
                            <span
                                class="inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none rounded text-lg">
                                Sold out
                            </span>
                        @else
                            <form method="post" action="{{ route('reservations.store', $event) }}">
                                @csrf
                                @method('POST')
                                <button
                                    class="inline-flex text-white bg-violet-600 border-0 py-2 px-6 focus:outline-none hover:bg-violet-700 rounded text-lg">Book
                                    a seat
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero"
                        @if (file_exists('storage/photos/' . $event->photo_src)) src="{{ asset('storage/photos/' . $event->photo_src) }}"
                    @else
                    src="{{ asset('storage/photos/event_default.png') }}" @endif>
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')

</x-app-layout>
