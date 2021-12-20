@csrf
<div class="flex flex-col items-center justify-center md:grid grid-cols-4 gap-x-6 gap-y-12">
    <div class="outline-none flex items-center justify-center md:mt-12 cursor-pointer col-start-4 row-start-1">        
        @if (isset($profile->profile_pic))
            <label 
                for="profile_pic" 
                class="block focus-visible:ring-2 focus-visible:ring-rose-500"
            >
                <img src="{{ asset('storage/'. $profile->profile_pic) }}" class="rounded-full shadow-2xl h-52 w-52 cursor-pointer" alt="">
            <input
                type="file"
                name="profile_pic"
                id="profile_pic"
                class="hidden"
            >
                @error('profile_pic') <p class="text-red-500 bg-white p-2 rounded-md"> {{ $message }} </p> @enderror 
        @else
            <label 
                for="profile_pic" 
                class="block focus-visible:ring-2 focus-visible:ring-rose-500"
            >
            <span 
                class="overflow-hidden h-56 w-56 border border-gray-400 rounded-full flex items-center justify-center cursor-pointer"
            >
                <svg class="h-auto w-auto relative top-10 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
            </span>

            <input
                type="file"
                name="profile_pic"
                id="profile_pic"
                class="hidden"
            >
        @endif
    </div> <!-- profile picture end -->

    <div class="col-start-1 col-end-4">
        <div 
            data-validate="Full Name is required" 
            class="md:mt-0 my-18 mt-6 flex items-center justify-center"
        >
            <input 
                class="focus:ring-2 border-transparent border-0 text-center font-semibold border-gray-900 focus:ring-blue-200 rounded-sm h-14 text-xl bg-transparent w-full"
                type="text"
                name="full_name"
                required
                placeholder="Full name"
                value="{{ old('full_name') ?? $profile->full_name }}"
            >
                @error('full_name') <p class="text-red-500 bg-white p-2 rounded-md"> {{ $message }} </p> @enderror
        </div>

        <div 
            data-validate="About me is required" 
            class="md:py-6 flex items-center justify-center"
        >
            <textarea 
                class="border-0 rounded-md w-full h-48"
                name="bio"
                required
                placeholder="About me...">{{ old('bio') ?? $profile->bio }}</textarea>
                @error('bio')
                    <p class="text-red-500 absolute">
                        {{ $errors->first('bio') }}
                    </p>
                @enderror
        </div>
    </div> <!-- name & bio end -->

    <div class="flex flex-col items-start justify-center col-start-1 col-end-3 space-y-4">
        <h1 class="font-semibold">Optional Field</h1>
        <input 
            class="focus:ring-2 border-t-0 border-l-0 border-r-0 border-b-2 text-sm border-gray-900 focus:ring-blue-200 rounded-sm h-auto bg-transparent w-full"
            type="text"
            name="optional"
            placeholder="(URL, quote, etc)"
            value="{{ old('optional') ?? $profile->optional }}"
        >
            @error('optional')
                <p class="text-red-500 bg-white p-2 rounded-md">
                    {{ $errors->first('optional') }}
                </p>
            @enderror 
    </div>

    <div class="col-start-4 row-start-2 flex flex-col space-y-4">
        <h1 class="font-semibold text-center">LinkedIn Profile</h1>
        <input 
            class="focus:ring-2 border-t-0 border-l-0 border-r-0 border-b-2 text-sm border-gray-900 focus:ring-blue-200 rounded-sm h-auto bg-transparent w-full"
            type="text"
            name="linkedin_url"
            value="{{ old('linkedin_url') ?? $profile->linkedin_url }}"
        >
        @error('linkedin_url')
            <p class="text-red-500 bg-white p-2 rounded-md">
                {{ $errors->first('linkedin_url') }}
            </p>
        @enderror <!-- linked in url end -->
    </div>
</div>

<div class="flex items-center justify-center mt-10">
    <button 
        type="submit"
        class="bg-purple-600 hover:bg-green-600 transition ease-in-out text-gray-100 p-4 w-32 h-auto rounded-md font-semibold"    
    >
        {{ $submitButtonText ?? 'Create' }}
    </button>
</div>