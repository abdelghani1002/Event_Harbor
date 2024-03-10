<style>
    .categories {
        background-color: rgba(255, 255, 255, 0.09);
    }
</style>
<x-app-layout>
    <div class="w-full flex flex-row">
        @include('layouts.aside')
        <div class="w-11/12 md:w-5/6">
            <div class="flex flex-row items-center py-1 w-full px-2 justify-between">
                <h3 class="text-2xl font-bold text-cyan-800 dark:text-cyan-300">Categories</h3>
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
                <a class="cursor-pointer text-white font-bold bg-green-700 rounded-xl p-2 h-10 hover:bg-green-800"
                    href="{{ route('categories.create') }}">
                    + Add Category
                </a>
            </div>


            <div class="flex flex-col justify-between md:h-[79dvh] w-full overflow-x-scroll scrollbar-hide">

                <!-- Categories Table -->
                <table id="categories_table"
                    class="table-auto w-full text-sm whitespace-no-wrap border-spacing-2 px-2 pb-2">
                    <thead class="">
                        <tr class="bg-gray-400">
                            <th class="p-1 border-r border-gray-200">Title</th>
                            <th class="p-1 border-r border-gray-200">Photo</th>
                            <th class="p-1 border-r border-gray-200 w-1/6">Event number</th>
                            <th class="p-1 border-r border-gray-200 w-1/12">
                                Manage
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr
                                class="odd:bg-gray-200 even:bg-gray-300 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:text-gray-300">

                                <td class="p-2 border-r border-white">
                                    <div class="flex flex-row items-center gap-x-2">
                                        <p class="font-semibold text-center">{{ $category->name }}</p>
                                    </div>
                                </td>

                                <td class="p-2 border-r border-white">
                                    <div class="flex justify-center">
                                        @if (file_exists(public_path('storage/photos/') . $category->photo_src))
                                            <img class="w-16 h-16 object-center rounded-sm"
                                                src="{{ asset('storage/photos/' . $category->photo_src) }}"
                                                alt="{{ $category->name }} photo">
                                        @endif
                                    </div>
                                </td>

                                <td class="p-2 border-r border-white">
                                    <p class="text-center">
                                        {{ $category->events->count() }}
                                    </p>
                                </td>

                                <td
                                    class="p-2 text-right border-r border-white flex justify-center items-center w-fit gap-3">
                                    <form class="flex justify-center items-center m-0"
                                        onsubmit="return confirmDelete(event)"
                                        action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="hover:bg-red-500 font-semibold hover:text-white text-red-500 border border-red-500 rounded-md p-2">
                                            Delete
                                        </button>
                                    </form>
                                    <div>
                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="hover:bg-green-500 font-semibold p-2.5 hover:text-white text-green-500 border border-green-500 rounded-md">
                                            Update
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-2 w-full">
                    {{ $categories->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
