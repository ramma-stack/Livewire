<div class="p-10 bg-gray-200">
    <div class="grid grid-cols-5 gap-4">
        @foreach ($posts as $post)

        <div class="overflow-hidden shadow-md">
            <!-- card header -->
            <div class="px-6 py-4 bg-white border-b border-gray-200 font-bold uppercase">
                {{ $post->title }}
            </div>
            <!-- card body -->
            <div class="p-6 bg-white border-b border-gray-200">
                {{ Str::limit($post->details, 50, ' ....') }}
            </div>
            <!-- card footer -->
            <div class="p-6 bg-white border-gray-200 text-right">
                <a class="bg-blue-500 shadow-md text-sm text-white font-bold py-3 md:px-8 px-4 hover:bg-blue-400 rounded uppercase" href="#">Click Me</a>
            </div>
        </div>

        @endforeach
    </div>


    @if ($items <= $posts->total())
        <div class="flex justify-center">
            <button wire:click="viweMore" class="capitalize m-5 duration-300 bg-purple-600 hover:bg-purple-700 text-xl text-white px-10 py-3 rounded">Viwe More</button>
        </div>
        @endif

        <!-- component -->
        <div wire:loading class="fixed top-0 bottom-0 right-0 left-0" style="background-color: rgba(20,20,20,.5);">
            <div class="flex items-center justify-center w-full h-full">
                <div class="flex justify-center items-center space-x-1 text-sm text-white">
                    
                    <svg fill='none' class="w-6 h-6 animate-spin" viewBox="0 0 32 32" xmlns='http://www.w3.org/2000/svg'>
                        <path clip-rule='evenodd' d='M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z' fill='currentColor' fill-rule='evenodd' />
                    </svg>
                    
                    <div>Loading ...</div>
                </div>
            </div>
        </div>
            
</div>