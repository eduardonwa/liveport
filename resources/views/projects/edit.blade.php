<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="p-2 cool-bg space-x-2">
        <a href="/projects" class="hover:text-green-400 transition ease-in">Projects</a>
        <span> > </span>
        <a class="font-semibold">{{ $project->title }}</a>
    </div> <!-- ui end -->

    <div class="grid m-6 md:mt-12 md:m-32 border-2 border-gray-500 rounded-md p-8">
        <form
            action="/projects/{{ $project->id }}"
            method="POST"
        >
            @method('PUT')
            @include('projects.form', [
                'submitButtonText' => 'Update Project',
            ])
        </form>
    </div>

</x-app-layout>