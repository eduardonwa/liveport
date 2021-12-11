<div class="flex flex-col items-center justify-between w-2/4">
    <div
        x-data="{ show : false }"
        class="flex flex-col items-center justify-center space-y-6"
    >
        <span
            x-on:click="show = ! show"
            x-text=" show ? 'Nevermind' : '🧰 New Tool' "
            class="border-2 border-purple-600 hover:bg-purple-900 hover:text-gray-50 transition ease-in-out transform hover:scale-125 duration-300 p-2 rounded-md text-gray-900 font-semibold text-sm shadow-2xl cursor-pointer"
        >
        </span> <!-- quality button end -->

        <form 
            action="{{ route('toolbox.store') }}"
            method="POST"
            x-show="show"
            x-transition.duration.500ms
            x-transition:leave.duration.100ms
            x-collapse
            class="space-y-2"
            style="display: none"
        >
            @include('toolbox.form', [
                'tool' => new App\Models\Toolbox
            ])
        </form> <!-- quality form end -->
   </div> 
</div> <!-- wrapper end -->