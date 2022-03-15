<div class="container flex flex-col items-center py-5">

    <script>
        var limit = {{ $limit }};
        var total = {{ $posts->total() }};
        const container = document.querySelector('.container');
        window.addEventListener('scroll', () => {

          console.log((window.innerHeight + window.scrollY) , document.body.scrollHeight);

            if (((window.innerHeight + window.scrollY) >= (document.body.scrollHeight)) && (limit < total)) {
                livewire.emit('loadMore', 5);
                limit += 5;
                console.log(limit);
            }

        });

    </script>

    @foreach ($posts as $post)
    <div
        class="block mb-3 p-6 w-10/12 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->details }}</p>
    </div>
    @endforeach

</div>