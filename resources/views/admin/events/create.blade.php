<style>
    .events {
        background-color: rgba(255, 255, 255, 0.09);
    }
</style>
<x-app-layout>
    <div class="w-full flex flex-row">
        @include('layouts.aside')
        <div class="w-5/6 bg-gray-900">
            <div class="px-3 h-full flex flex-col justify-between">
                @if (session('error'))
                    <p data-icon="error" data-title="Error!" class="alert text-red-400 text-center">
                        {{ session('error') }}
                    </p>
                @endif
                <h2 class="text-2xl font-semibold my-3 text-center dark:text-gray-300">New Event</h2>

                <div class="flex flex-row justify-center h-full">
                    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data"
                        class="w-full flex flex-col justify-between h-full">
                        @csrf
                        @method('POST')

                        <div class="h-full flex gap-5">
                            {{-- Left of form --}}
                            <div class="w-1/2 h-full flex flex-col justify-between">
                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300">
                                    @error('title')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="description"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Category</label>
                                    <select name="category_id"
                                        class="w-full dark:bg-slate-800 border border-neutral-600 p-1.5 dark:text-gray-300 rounded-lg">
                                        @foreach ($categories as $category)
                                            <option value="" class="hidden" selected>Select Category</option>
                                            <option class="text-gray-900 dark:text-gray-300 dark:bg-slate-800"
                                                value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div class="mb-3">
                                    <label for="place"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Location</label>
                                    <input type="text" name="place" id="place" value="{{ old('place') }}"
                                        class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300">
                                    @error('place')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div class="mb-3">
                                    <label for="date"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Date</label>
                                    <input type="datetime-local" name="date" id="date"
                                        class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300"
                                        value="{{ old('date') }}">
                                    @error('date')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="flex justify-between">
                                    <!-- Tickets number -->
                                    <div class="w-5/12">
                                        <label for="tickets_number"
                                            class="block mb-1 text-sm font-medium dark:text-gray-300">Number of
                                            tickets</label>
                                        <input type="number" name="tickets_number" id="tickets_number"
                                            class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300"
                                            value="{{ old('tickets_number') }}">
                                        @error('tickets_number')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Ticket price -->
                                    <div class="w-5/12">
                                        <label for="ticket_price"
                                            class="block mb-1 text-sm font-medium dark:text-gray-300">Ticket price ( USD
                                            )</label>
                                        <input type="number" name="ticket_price" id="ticket_price"
                                            class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300"
                                            value="{{ old('ticket_price') }}">
                                        @error('ticket_price')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Right of form --}}
                            <div class="w-1/2 flex flex-col h-full">
                                <!-- Photo -->
                                <div class="mb-3 flex justify-between w-full">
                                    <div class="w-full">
                                        <label for="photo"
                                            class="block mb-1 text-sm font-medium dark:text-gray-300">Photo</label>
                                        <input type="file" name="photo" id="photo"
                                            class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300">
                                        @error('photo')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Reservation type -->
                                <div class="mb-3 w-full">
                                    <label for="reservation_type"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Reservation
                                        type</label>
                                    <ul class="grid w-full gap-6 md:grid-cols-2">
                                        <li>
                                            <input type="radio" id="automatic" checked name="reservation_type"
                                                value="automatic" class="hidden peer" />
                                            <label for="automatic"
                                                class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-violet-500 peer-checked:border-violet-600 peer-checked:text-violet-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Automatic</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="manual" name="reservation_type" value="manual"
                                                class="hidden peer">
                                            <label for="manual"
                                                class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-violet-500 peer-checked:border-violet-600 peer-checked:text-violet-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Manual</div>
                                                </div>
                                            </label>
                                        </li>
                                    </ul>
                                    @error('reservation_type')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="h-1/2 flex flex-col flex-grow">
                                    <label for="description"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Description</label>
                                    <textarea name="description" id="myeditorinstance"
                                        class="flex-grow form-textarea w-full rounded-md dark:bg-gray-800 dark:text-gray-300">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Submit button --}}
                        <div class="flex justify-center mt-2">
                            <button type="submit"
                                class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:shadow-outline-blue active:bg-green-800">
                                Create Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
