@csrf
<div class="flex flex-col items-center justify-center md:grid grid-cols-4 gap-x-6 gap-y-12">
    <div class="flex items-center justify-center md:mt-12 cursor-pointer col-start-4 row-start-1">
        <img class="rounded-full shadow-2xl" src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="profile picture">
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
                placeholder="Full name"
                value="{{ old('full_name') ?? $profile->full_name }}"
            >
                @error('full_name')
                    <p class="text-red-500 bg-white p-2 rounded-md">
                        {{ $errors->first('full_name') }}
                    </p>
                @enderror
        </div>

        <div 
            data-validate="About me is required" 
            class="md:py-6 flex items-center justify-center"
        >
            <textarea 
                class="border-0 rounded-md w-full h-48"
                name="bio"
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