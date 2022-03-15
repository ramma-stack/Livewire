<div class="w-container flex flex-col items-center mt-10">

    <div class="w-1/2">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
        <form wire:submit.prevent="save" enctype="multipart/form-data">
            <input wire:model.defer="photos" multiple class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
            <button type="submit" class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">click</button>
        </form>
        @error('photos.*')
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">{{ $message }}</div>
        @enderror
    </div>

    @if ($photos)
    Photo Preview:
    @foreach ($photos as $p)
    <img width="300px" src="{{ $p->temporaryUrl() }}">
    @endforeach
    @endif

</div>