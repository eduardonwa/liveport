<x-app-layout>
    <x-slot name="header">
        <x-create-button :href="route('projects.create')">
            {{ __('Create') }}
        </x-create-button>

            @if(session()->has('new_project'))
                <div class="bg-green-800 rounded-md p-2 w-72 text-gray-50 flex items-center justify-around">
                    {{ session()->get('new_project') }}
                    <span 
                        class="text-white font-bold cursor-pointer"
                        onclick="this.parentElement.style.display='none';"
                    >
                        &#x2715
                    </span>
                </div>
            @endif <!-- success message end -->

            @if(session()->has('edit_project'))
            <div class="bg-green-800 rounded-md p-2 w-72 text-gray-50 flex items-center justify-around">
                {{ session()->get('edit_project') }}
                <span 
                    class="text-white font-bold cursor-pointer"
                    onclick="this.parentElement.style.display='none';"
                >
                    &#x2715
                </span>
            </div>
        @endif <!-- edited message end -->
    </x-slot>

    <div class="flex items-center justify-center m-6 md:mt-12 md:m-20">

        <div class="w-full h-auto">
            @foreach ($projects as $project)
                <div class="flex flex-col md:grid grid-cols-4 w-full h-auto my-6">
                    <x-project-fields :project="$project"/>
                    
                    <x-project-actions :project="$project"/>
                    
                    <x-project-details :project="$project"/>
                </div> <!-- wrapper end -->
            @endforeach

            {{$projects->links()}}
        </div> <!-- wrapper end -->
    </div> <!-- wrapper end -->

</x-app-layout>