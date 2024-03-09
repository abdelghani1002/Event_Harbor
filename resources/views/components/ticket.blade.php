{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        /* add classes here */
    </style>

</head>

<body>
    <div
        class="hover:scale-[101%] bg-white dark:bg-slate-800 m-2 rounded-lg overflow-hidden shadow-lg ring-4 ring-violet-500 ring-opacity-40 max-w-sm w-full md:w-[30%] flex flex-col justify-between">
        <div class="relative w-full  dark:text-gray-300">
            <img class="w-full object-cover max-h-56"
                @if (file_exists(asset('storage/photos/' . $reservation->event->photo_src))) src="{{ asset('storage/photos/' . $reservation->event->photo_src) }}"
            @else
            src="{{ asset('storage/photos/event_default.png') }}" @endif
                alt="event Image">
            <div class="p-2">
                <div
                    class="absolute top-0 right-0 bg-violet-500 text-white px-2 py-1 m-2 rounded-md text-sm font-medium">
                    {{ \Carbon\Carbon::parse($reservation->event->date)->format('d M, Y | h:i') }}
                </div>
                <h3 class="text-lg dark:text-gray-200 font-medium mb-2">{{ $reservation->event->title }}</h3>
                <p class="text-gray-600 text-sm mb-4 dark:text-gray-300">
                    {{ Str::limit($reservation->event->description, 80, '...') }}</p>
                <span
                    class="font-medium mb-2 bg-gray-200 dark:bg-gray-600 p-1 rounded-md">{{ $reservation->event->category->name }}</span>
            </div>
        </div>
        <div class="p-4">
            <div class="flex items-end mt-4 justify-between">
                <span class="flex items-center gap-1">
                    <span>
                        <svg class="w-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            id="ticket">
                            <path
                                d="m4.906 11.541 3.551 3.553 6.518-6.518-3.553-3.551-6.516 6.516zm14.198-4.877-1.511-1.512a2.024 2.024 0 0 1-2.747-2.746L13.335.894a1.017 1.017 0 0 0-1.432 0L.893 11.904a1.017 1.017 0 0 0 0 1.432l1.512 1.51a2.024 2.024 0 0 1 2.747 2.748l1.512 1.51a1.015 1.015 0 0 0 1.432 0L19.104 8.096a1.015 1.015 0 0 0 0-1.432zM8.457 16.719l-5.176-5.178L11.423 3.4l5.176 5.176-8.142 8.143z">
                            </path>
                        </svg>
                    </span>
                    <span class="font-bold p-0 text-lg dark:text-gray-200">{{ $reservation->event->ticket_price }}$</span>
                </span>
                <span class="mt-3 inline-flex items-center">
                    <div class="flex justify-center items-center">
                        <span class="w-full">
                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                                viewBox="0 0 24 24">
                                <path class="fill-violet-400"
                                    d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                                </path>
                            </svg>
                        </span>
                        <div class="flex justify-center items-center h-full">
                            <p class="font-bold text-violet-400 pr-0.5 text-xl">EVENT</p>
                            <p class="text-violet-400"> HarBor</p>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        /* Add your custom styles here */

        .ticket {
            width: 100%;
            height: 50%;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .event-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .event-info {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .event-date {
            font-size: 14px;
            color: #555;
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
        }

        .event-details {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }

        .ticket-price {
            background-color: #eee;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
</head>

<body style="width: 100%; height: 100%;">
    <div class="ticket">
        {{-- <img class="event-image" src="{{ asset('storage/photos/' . $reservation->event->photo_src) }}" alt="Event Image"> --}}
        <div class="event-info">
            <div class="event-date">{{ \Carbon\Carbon::parse($reservation->event->date)->format('d M, Y | h:i') }}</div>
            <div class="ticket-price">${{ $reservation->event->ticket_price }}</div>
        </div>
        <h3 class="event-title">{{ $reservation->event->title }}</h3>
        <p class="event-details">{{ $reservation->event->place }}</p>
    </div>
</body>

</html>


