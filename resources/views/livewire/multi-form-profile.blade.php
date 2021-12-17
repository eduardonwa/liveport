<div x-show.transition="open" @keydown.escape.prevent.stop="open = false" @click="open = false" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="fixed inset-0 bg-blue-900 opacity-50"></div> <!-- bg end -->
    <div 
        @click.stop
        class="bg-yellow-50 shadow-2xl max-w-3xl h-3/5 m-auto mx-auto p-4 fixed inset-0 rounded-md
                flex flex-col items-center justify-evenly">
        
        <header class="m-2">
            <h1 class="text-2xl font-bold text-center" id="modal-title">{{$pages[$currentPage]['heading']}}</h1>
            <h1 class="text-sm text-center font-semibold italic">{{$pages[$currentPage]['subheading']}}</h1>
        </header>
        
        <form 
            wire:submit.prevent="submitForm"
            class="w-full flex flex-col items-center justify-evenly gap-y-6"
        >
            @if($currentPage === 0)
                <div class="flex flex-col items-center justify-evenly w-full h-full gap-y-6">
                    <button name="button" wire:click="nextPage" type="button" class="text-xl bg-black hover:bg-purple-900 text-gray-50 border-2 border-purple-700 transition ease-in-out transform hover:scale-125 duration-300 p-2 rounded-md font-semibold">
                        😎 Please do
                    </button>
                
                    <button
                        @click.prevent="open = false"
                        type="button"
                        class="text-xl text-gray-50 bg-gray-500 p-2 rounded-md font-semibold">
                            🚫 Not right now
                    </button>
                </div> <!-- buttons -->
            @elseif($currentPage === 1)
                <div class="flex flex-col items-center justify-center w-full h-full rounded-md">
                    <input
                        required
                        wire:model="full_name"
                        name="full_name"
                        class="focus:ring-2 text-gray-900 font-semibold text-lg text-center bg-yellow-100 border-transparent rounded-md w-96 bg-transparent"
                        type="text"
                    >
                        @error('full_name') <span class="text-md text-red-500 mt-1 font-semibold">{{ $message }}</span> @enderror
                </div>
            @elseif($currentPage === 2)
                <div class="flex flex-col items-center justify-center w-full h-full rounded-md">
                    <textarea
                        required
                        wire:model="bio"
                        name="bio"
                        class="h-56 w-full focus:ring-2 text-gray-900 font-semibold text-lg bg-yellow-100 border-transparent rounded-md bg-transparent"
                        type="text"></textarea>
                        @error('bio') <span class="text-md text-red-500 mt-1 font-semibold">{{ $message }}</span> @enderror
                </div>
            @elseif($currentPage === 3)
                <div class="flex flex-col items-center justify-center w-full h-full rounded-md">
                    <img class="rounded-full shadow-2xl h-full cursor-pointer" src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="profile picture">
                </div>
            @elseif($currentPage === 4)
                <div class="flex flex-col items-center justify-center w-full h-full rounded-md">
                    <input
                        wire:model="linkedin_url"
                        name="linkedin_url"
                        class="focus:ring-2 text-gray-900 font-semibold text-lg text-center bg-yellow-100 border-transparent rounded-md w-96 bg-transparent"
                        type="text"
                    >
                        @error('linkedin_url') <span class="text-md text-red-500 mt-1 font-semibold">{{ $message }}</span> @enderror
                </div>
            @elseif($currentPage === 5)
                <div class="flex flex-col items-center justify-center w-full h-full rounded-md">
                    <input
                        wire:model="optional"
                        name="optional"
                        class="focus:ring-2 text-gray-900 font-semibold text-lg text-center bg-yellow-100 border-transparent rounded-md w-96 bg-transparent"
                        type="text"
                    >
                </div>
            @elseif($currentPage === 6)
                <button
                    type="submit"
                    class="text-xl text-gray-50 bg-black p-2 rounded-md font-semibold">
                        Submit
                </button>
            @endif

            <div class="w-full flex items-center justify-around space-x-5">
                @if($currentPage == 0)
                @elseif($currentPage == 6)
                @else
                    <button wire:click="previousPage" type="button" class="bg-gray-500 hover:bg-black transition ease-in-out rounded-md border border-purple-700 text-gray-50 text-sm font-semibold p-2">Back</button>
                    <button wire:click="nextPage" type="button" class="bg-black rounded-md border border-purple-700 text-gray-50 text-sm font-semibold p-2">Next</button>
                @endif
            </div> <!-- navigation buttons end -->

        </form>
    </div> <!-- wrapper end -->
</div> <!-- alpine wrapper end -->