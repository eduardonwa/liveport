<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="grid m-6 md:mt-12 md:m-32 border-2 border-gray-500 rounded-md p-8">
        <form
            
            action="/profile/{{ $profile->id }}"
            method="POST"
        >
            @method('PUT')
            @include('profile.form', [
                'submitButtonText' => 'Update',
            ])
        </form>
    </div>

</x-app-layout>