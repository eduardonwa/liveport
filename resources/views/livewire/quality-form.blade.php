<div class="flex flex-col items-center justify-between w-2/4">
    <div
        x-data="{ show : false }"
        class="flex flex-col items-center justify-center space-y-6"
    >
        <span
            x-on:click="show = ! show"
            x-text=" show ? 'Nevermind' : '🙌 New Quality' "
            class="border-2 border-purple-600 bg-black text-gray-50 transition ease-in-out transform hover:scale-125 duration-300 p-2 rounded-md font-semibold text-sm cursor-pointer"
        >
        </span> <!-- quality button end -->

        <form
            wire:submit.prevent="submitForm"
            action="{{ route('quality.store') }}"
            method="POST"
            x-show="show"
            x-transition.duration.500ms
            x-transition:leave.duration.100ms
            x-collapse
            class="space-y-2"
            style="display: none"
        >
        @csrf
            <input
                wire:model.lazy="quality"
                class="focus:ring-2 bg-white border-2 border-l-0 border-t-0 border-r-0 text-center font-semibold focus:ring-blue-200 rounded-sm h-8 text-sm bg-transparent w-full placeholder-italic"
                type="text"
                name="quality"
                placeholder="New quality"
            >
                @error('quality')
                    <p class="text-red-500 bg-white p-2 rounded-md">
                        {{ $errors->first('quality') }}
                    </p>
                @enderror <!-- quality end -->
            <div class="flex justify-center items-center">
                <button
                    type="submit"
                    class="bg-gray-900 md:bg-opacity-40 transition ease-in-out duration-200 hover:bg-opacity-100 p-2 rounded-md text-gray-50 text-sm font-semibold shadow-2xl cursor-pointer"    
                >
                    Add
                </button>
            </div>
        </form> <!-- quality form end -->
   </div> 
</div> <!-- wrapper end -->