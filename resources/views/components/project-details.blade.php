<div class="col-start-4 row-start-2 flex items-center justify-around bg-tri-two
            border rounded-b-md md:rounded-br-md md:rounded-bl-none border-gray-900 p-4 h-24 border-t-0">
                        
    <div class="text-center">
        <p class="font-bold opacity-15">Published</p>
        {{ \Carbon\Carbon::parse($project->created_at)->format('F j, Y') }}
    </div>

    <div class="flex flex-col items-center justify-center py-2">
        <p class="font-bold opacity-15">URL</p>
        <a 
            href="{{ $project->url }}"
            class="text-center"    
        >
            @if ($project->url == true)
                <div class="border-transparent hover:border-gray-400 border rounded-full transition ease-in">
                    <svg 
                        class="w-6 h-6 text-gray-50 font-semibold rounded-full bg-green-500" 
                        fill="none" 
                        stroke="currentColor" 
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

            @else
                <div class="border-transparent hover:border-gray-400 border rounded-full transition ease-in">
                    <svg 
                        class="w-6 h-6 text-gray-50 font-semibold rounded-full bg-red-500" 
                        fill="none" 
                        stroke="currentColor" 
                        iewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            @endif
        </a> <!-- url end -->
    </div> <!-- wrapper end -->

</div> <!-- right column end -->