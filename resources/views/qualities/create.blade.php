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
            action="{{ route('quality.store') }}"
            method="POST"
            x-show="show"
            x-transition.duration.500ms
            x-transition:leave.duration.100ms
            x-collapse
            class="space-y-2"
            style="display: none"
        >
            @include('qualities.form', [
                'quality' => new App\Models\Quality
            ])
        </form> <!-- quality form end -->
   </div> 
</div> <!-- wrapper end -->