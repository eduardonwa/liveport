<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="flex flex-col justify-evenly items-start h-full md:flex-row md:justify-around m-6 md:mt-12 md:m-20 gap-x-12 md:flex-1">

       <div class="rounded-md border border-gray-900 flex flex-col items-center justify-center md:w-2/4 p-8 mb-4">
            <div class="flex items-center flex-col md:flex-row md:justify-between w-full md:mb-4 mb-8">
                <span class="text-gray-700 font-semibold">Profile</span>
                <a 
                    href="profile/{{ auth()->user()->profile->id }}/edit"
                    class="font-semibold hover:text-green-500 hover:underline transition ease-in-out text-xl"
                >
                    Edit
                </a>
            </div> <!-- header end -->

            <img class="rounded-full shadow-2xl mb-8" src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="profile picture">
            
            @foreach ($profile as $profile)
                <div class="my-4 font-bold text-lg text-gray-700">
                    {{ $profile->full_name }}
                </div>

                <div class="my-4">
                    {{ $profile->bio }}
                </div>
            @endforeach

       </div> <!-- profile end -->

       <div class="rounded-md border border-gray-900 flex flex-col items-center justify-center w-full md:w-2/4 p-8 mb-4">
            <div class="flex items-center flex-col md:flex-row md:justify-between w-full md:mb-4 mb-8">
                <div class="flex">
                    <span class="font-semibold text-gray-700"> Projects </span>
                    <span class="pl-1 font-semibold"> ({{ $projects->total() }})</span>
                </div>
                <a 
                    href="{{route('projects')}}"
                    class="font-semibold hover:text-green-500 hover:underline transition ease-in-out text-xl"
                >
                    View all
                </a>
            </div> <!-- header end -->

            <div class="flex flex-col w-full mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <span class="my-2 font-semibold hidden md:block text-gray-700">Title</span>
                    <span class="my-2 font-semibold hidden md:block text-gray-700">Created at</span>
                </div>

                @foreach($projects as $project)
                <div class="flex flex-col md:flex-row justify-between items-center border-b-2 border-gray-700 my-4 p-3 md:pl-0 md:pr-0">
                    <a 
                        href="projects/{{ $project->id }}/edit"
                        class="text-center md:text-left"
                    >
                        {{ $project->title }}
                    </a>
                    <span>{{ \Carbon\Carbon::parse($project->created_at)->format('F j, Y') }}</span>
                </div>
                @endforeach

                <div class="md:flex-col">
                    {{$projects->links()}}
                </div>
            </div> <!-- projects end -->

        </div> <!-- wrapper end -->

    </div>
</x-app-layout>