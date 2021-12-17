<ul 
    x-data="{ show : false }"
    x-on:mouseout="show = false"
>
    @if ($checked)
        <div x-data="{ hover: true}" x-transition.duration.500ms class="my-2 w-full flex items-center justify-end">
            <div
                @mouseover="hover=true" 
                @mouseover.away="hover=false" 
                class="bg-yellow-50 border border-gray-500 hover:border-transparent transition ease-in-out hover:bg-red-500 rounded-md h-auto p-2 w-auto"
            >
                <p 
                    class="text-black hover:text-gray-50 font-semibold text-sm cursor-pointer" 
                    x-text="hover == true ? 'Delete? ({{ count($checked) }})' : 'Selection'"
                    onclick="confirm('Are you sure you want to delete {{ count($checked) }} item(s)?') || event.stopInmediatePropagation()"
                    wire:click="removeTools()">
                </p>
            </div>
        </div> <!-- bulk delete button end -->
    @endif

    @if(session()->has('removed_tools'))
        <div class="rounded-md p-2 w-72 text-gray-900 flex items-center justify-around">
            {{ session()->get('removed_tools') }}
            <span 
                class="text-black font-bold cursor-pointer"
                onclick="this.parentElement.style.display='none';"
            >
                &#x2715
            </span>
        </div>
    @endif <!-- removed tools (bulk delete) end -->
    
    @foreach ($tools as $tool)
        <li
            x-on:mouseover="show = true"
            class="flex items-center cursor-pointer"
        >            
            <label class="flex items-center justify-start cursor-pointer group border-transparent border-2 rounded-md hover:border-blue-500 w-full">
                <input type="checkbox" value="{{ $tool->id }}"  wire:model="checked" class="hidden bg-transparent border-transparent rounded-full">
                <span class="p-1 w-full">{{ $tool->tool }}</span>
                <span 
                    x-show="show" 
                    style="display: none;"
                >
                    <form
                        wire:submit.prevent="deleteTool({{ $tool->id }})"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                            <button
                                type="submit"
                                onclick="return confirm('Are you sure you want to delete this?')"   
                            >
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    class="h-5 w-5 group-hover:text-red-500 transition ease-in" 
                                    viewBox="0 0 20 20" 
                                    fill="currentColor"
                                >
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                    </form>
                </span>
            </label> <!-- label end -->
        </li>
    @endforeach
</ul>