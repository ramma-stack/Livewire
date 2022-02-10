<div class=" flex flex-col items-center">

    @if ($check != '')
        <div class="flex justify-center m-5">
            <div class="p-4 mb-4 capitalize text-sm text-yellow-700 bg-gray-300 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                role="alert">
                <span class="font-medium ">Warning alert!</span> your post is 
                {{ $check }}
            </div>
        </div>
    @endif

    <form wire:submit.prevent='submit' class="w-2/5 bg-gray-100 p-5 m-5 rounded shadow-md shadow-gray-300">
        <div class="mb-6">
            <div class="mb-6">
                <label for="large-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                <input wire:model='title' placeholder="Title" type="text" id="large-input"
                    class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('title')
                    <p class="text-red-600 py-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-6">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Details</label>
            <textarea wire:model='details' id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Leave a Details..."></textarea>
            @error('details')
                <p class="text-red-600 py-1">{{ $message }}</p>
            @enderror
        </div>
        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</div>
