<style>
    .announcements {
        background-color: rgba(255, 255, 255, 0.09);
    }
</style>
<x-app-layout>
    <div class="w-full flex flex-row">
        @include('layouts.aside')
        <div class="w-11/12 md:w-5/6 bg-gray-900">
            <div class="p-3 w-full flex flex-col justify-center">
                <h2 class="text-2xl font-semibold mb-3 text-center dark:text-gray-300">Update Category</h2>

                <div class="flex flex-row justify-center h-full">
                    <form action="{{ route('categories.update', $category) }}" method="post"
                        class="w-full flex flex-col items-center" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="w-4/5 flex h-full flex-col justify-between">

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name"
                                    class="block mb-1 text-sm font-medium dark:text-gray-300">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                                    class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Photo -->
                            <div class="mb-3 flex justify-between w-full">
                                <div class="w-full">
                                    <label for="photo"
                                        class="block mb-1 text-sm font-medium dark:text-gray-300">Photo</label>
                                    <input type="file" name="photo" id="photo"
                                        class="form-input w-full rounded-md dark:bg-gray-800 dark:text-gray-300"
                                        >
                                    @error('photo')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center mt-4">
                            <button type="submit"
                                class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
