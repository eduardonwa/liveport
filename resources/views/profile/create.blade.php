<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="grid m-6 md:mt-12 md:m-20 border-2 border-gray-500 rounded-md p-8">
        <form
            action="{{ route('profile.store') }}"
            method="POST"
        >
            @include('profile.form', [
                'profile' => new App\Models\Profile
            ])
        </form>
    </div>
</x-app-layout>