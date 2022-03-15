<div class="p-10 bg-gray-200">

    <div class="flex justify-center m-5">
        <input wire:model="search" type="text" id="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 capitalize"
            placeholder="input for search ...">
    </div>

    @if (session()->has('message'))
    <div class="flex justify-center m-5">
        <div class="p-4 mb-4 text-sm text-red-700 bg-gray-300 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-red-800"
            role="alert">
            <span class="font-medium capitalize">Warning alert!</span>
            {{ session('message') }}
        </div>
    </div>
    @endif

    <div class="w-full">
        <div wire:init='loadPosts'>
            <livewire:create />
        </div>
        <span wire:loading>Loding...</span>
    </div>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="flex justify-center m-5">
        <div class="p-4 mb-4 capitalize text-sm text-red-700 bg-gray-300 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-red-800"
            role="alert">
            <span class="font-medium ">Warning alert!</span>
            {{ $error }}
        </div>
    </div>
    @endforeach
    @endif

    @if ($posts->total() === 0) <div class="flex justify-center m-5">
        <div class="p-4 mb-4 capitalize text-sm text-yellow-700 bg-gray-300 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
            role="alert">
            <span class="font-medium ">Warning alert!</span> not found anything like this :
            {{ $search }}.
        </div>
    </div>
    @else
    <div class="grid grid-cols-5 gap-4">
        @foreach ($posts as $post)
        <div class="overflow-hidden shadow-md bg-white">
            <!-- card header -->
            <div class="px-6 py-4 border-b border-gray-200 font-bold uppercase">
                {{ $post->title }}
            </div>
            <!-- card body -->
            <div class="p-6 bg-white border-b border-gray-200">
                {{ Str::limit($post->details, 50, ' ....') }}
            </div>
            <!-- card footer -->
            <div class="flex py-6 px-5 bg-white border-gray-200 text-right">

                <button wire:click="delete({{ $post->id }})"
                    class="block mr-1 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Delete
                </button>

                <button wire:click="int({{ $post->id }})"
                    class="block mr-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button" data-modal-toggle="edit{{ $post->id }}">
                    Edit
                </button>

                <!-- Main modal -->
                <div wire:ignore.delf id="edit{{ $post->id }}" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
                    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content --> {{ $post->title }}
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="flex justify-end p-2">
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-toggle="edit{{ $post->id }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <form wire:submit.prevent='submit({{ $post->id }})'
                                class="px-6 pb-4 text-left space-y-6 lg:px-8 sm:pb-6 xl:pb-8" action="#">
                                <div>
                                    <label for="large-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                    <input wire:model.defer='title' placeholder="Title" type="text" id="large-input"
                                        class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Details</label>
                                    <textarea wire:model.defer='details' id="message" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Leave a Details..."></textarea>
                                </div>
                                <button data-modal-toggle="edit{{ $post->id }}"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 capitalize">update
                                    post</button>
                            </form>
                        </div>
                    </div>
                </div>

                <a href="{{ route('showpost', $post->id) }}"
                    class="block mr-1 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    View
                </a>

                <a href="{{ route('photoupload') }}"
                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Upload
                </a>

            </div>
        </div>
        @endforeach
    </div>
    @endif

    @if ($items <= $posts->total())
        <div class="flex justify-center">
            <button wire:click="viewMore"
                class="capitalize m-5 duration-300 bg-purple-600 hover:bg-purple-700 text-xl text-white px-10 py-3 rounded">Viwe
                More</button>
        </div>
        @endif

        <!-- component -->
        <div wire:loading class="fixed top-0 bottom-0 right-0 left-0" style="background-color: rgba(20,20,20,.5);">
            <div class="flex items-center justify-center w-full h-full">
                <div class="flex justify-center items-center space-x-1 text-sm text-white">

                    <svg fill='none' class="w-6 h-6 animate-spin" viewBox="0 0 32 32"
                        xmlns='http://www.w3.org/2000/svg'>
                        <path clip-rule='evenodd'
                            d='M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z'
                            fill='currentColor' fill-rule='evenodd' />
                    </svg>

                    <div>Loading ...</div>
                </div>
            </div>
        </div>
        <div wire:offline class="fixed top-0 bottom-0 right-0 left-0" style="background-color: rgba(20,20,20,.5);">
            <div class="flex items-center justify-center w-full h-full">
                <div class="flex justify-center items-center space-x-1 text-sm text-white">

                    <svg fill='none' class="w-6 h-6 animate-spin" viewBox="0 0 32 32"
                        xmlns='http://www.w3.org/2000/svg'>
                        <path clip-rule='evenodd'
                            d='M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z'
                            fill='currentColor' fill-rule='evenodd' />
                    </svg>

                    <div>Disconnect!</div>
                </div>
            </div>
        </div>

</div>