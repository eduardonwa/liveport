<x-app-layout>
    <x-slot name="header">
        @if (( auth()->user()->profile ))
            <x-create-button href="profile/{{ auth()->user()->profile->id }}/edit">
                {{ __('Edit') }}
            </x-create-button>
        @else
            <x-create-button :href="route('profile.create')">
                {{ __('Create') }}
            </x-create-button>
        @endif <!-- edit/ create conditional end -->

        @if(session()->has('profile_created'))
            <div class="bg-green-800 rounded-md p-2 w-72 text-gray-50 flex items-center justify-around">
                {{ session()->get('profile_created') }}
                <span 
                    class="text-white font-bold cursor-pointer"
                    onclick="this.parentElement.style.display='none';"
                >
                    &#x2715
                </span>
            </div>
        @endif <!-- success message end -->

        @if(session()->has('edit_profile'))
            <div class="bg-green-800 rounded-md p-2 w-72 text-gray-50 flex items-center justify-around">
                {{ session()->get('edit_profile') }}
                <span 
                    class="text-white font-bold cursor-pointer"
                    onclick="this.parentElement.style.display='none';"
                >
                    &#x2715
                </span>
            </div>
        @endif <!-- edit message end -->

        @if(session()->has('new_quality'))
            <div class="bg-green-800 relative top-2 md:top-0 rounded-md p-2 w-44 text-gray-50 flex items-center justify-around">
                {{ session()->get('new_quality') }}
                <span 
                    class="text-white font-bold cursor-pointer"
                    onclick="this.parentElement.style.display='none';"
                >
                    &#x2715
                </span>
            </div>
        @endif <!-- new quality end -->

        @if(session()->has('new_tool'))
        <div class="bg-green-800 relative top-2 md:top-0 rounded-md p-2 w-44 text-gray-50 flex items-center justify-around">
            {{ session()->get('new_tool') }}
            <span 
                class="text-white font-bold cursor-pointer"
                onclick="this.parentElement.style.display='none';"
            >
                &#x2715
            </span>
        </div>
    @endif <!-- new quality end -->
    </x-slot>

    <div class="flex flex-col md:grid grid-cols-2 gap-y-8 md:gap-x-20 m-8">
        @foreach ($profile as $profile)
            <div class="relative">
                <div class="md:sticky md:top-5 flex items-center space-y-5 p-8 flex-col justify-center rounded-md h-auto cool-bg-purple bg-yellow-100 shadow-2xl">
                    <img class="rounded-full shadow-2xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="profile picture">
                    @livewire('quality-form', [], key('quality-form'))
                    @livewire('tool-form', [], key('tool-form'))
                </div>
            </div> <!-- profile picture & qualities end -->
            
            <div class="flex flex-col">
                
                <ul>
                    <li class="font-bold text-2xl my-2">{{ $profile->full_name }}</li>
                    <li class="font-semibold mt-2">{{ $profile->optional }}</li>
                    <li class="my-2"> {{$profile->bio}} </li>
                    <li class="flex items-center my-2">
                        <img class="w-6 h-6" src="https://img.icons8.com/color/144/000000/linkedin.png"/>
                        <a class="hover:underline text-blue-500" href="{{ $profile->linkedin_url }}">
                            My LinkedIn Profile
                        </a>
                    </li>
                </ul> <!-- profile end -->
                
                <div class="my-4">
                    <h1 class="font-bold text-xl mb-2">Projects</h1>
                        @foreach($profile->user->projects as $project)
                            <ul>
                                <li class="flex items-center">
                                    <span class="font-semibold">{{ $project->title }}</span>
                                    <span class="rounded-full w-1 h-1 mx-2 bg-black flex justify-center items-center"></span>
                                    <span> {{$project->display_date}} </span>
                                </li>
                            </ul>
                        @endforeach
                </div> <!-- projects end -->
                
                <div class="my-4 md:grid grid-cols-2 gap-x-8">
                    <div class="mb-8 col-start-1 row-start-1">
                        <h1 class="font-bold text-xl mb-2">Qualities</h1>
                        @livewire('quality-list')
                    </div> <!-- qualities end -->

                    <div class="mb-8 row-start-1 col-start-2">
                        <h1 class="font-bold text-xl mb-2">Toolbox</h1>
                        @livewire('tool-list')
                    </div> <!-- toolbox end -->
                </div>  <!-- toolbox & qualities end -->

            </div>
        @endforeach
    </div>
</x-app-layout>