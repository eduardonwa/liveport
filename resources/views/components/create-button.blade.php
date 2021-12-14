<div class="flex justify-end items-center w-full" {{ $attributes }}>
    <a 
        {{ $attributes->merge(['class' => "flex justify-center items-center text-lg border border-gray-900 bg-yellow-50 hover:bg-yellow-100 font-semibold transition ease-in w-44 text-center text-black rounded-md p-2"]) }}
    >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400 mx-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
              </svg>
        {{ $slot }}
    </a>
</div>