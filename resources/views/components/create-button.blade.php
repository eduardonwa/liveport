<div class="flex justify-end items-center w-full" {{ $attributes }}>
    <a 
        {{ $attributes->merge(['class' => "flex justify-center items-center text-lg border hover:bg-gray-600 hover:text-gray-50 transition ease-in w-44 text-center text-black rounded-md p-2"]) }}
    >
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                class="h-6 w-6 text-blue-400 mx-2 hover:fill-current hover:text-white transition ease-in" 
                viewBox="0 0 20 20" 
                fill="currentColor"
            >
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
            </svg>
        {{ $slot }}
    </a>
</div>