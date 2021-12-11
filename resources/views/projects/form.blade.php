@csrf
<div 
    data-validate="Title is required" 
    class="pl-8 flex items-center justify-start"
>
    <input 
        class="focus:ring-2 border-t-0 border-l-0 border-r-0 border-b-2 border-gray-900 focus:ring-blue-200 rounded-sm h-14 text-xl bg-transparent w-3/5"
        type="text"
        name="title"
        placeholder="Title"
        value="{{ old('title') ?? $project->title }}"
    >
        @error('title')
            <p class="text-red-500 bg-white p-2 rounded-md">
                {{ $errors->first('title') }}
            </p>
        @enderror
</div> <!-- title end -->

<div class="flex flex-col md:grid grid-cols-3">
    <div 
        data-validate="Description is required" 
        class="col-span-2 p-8 flex items-center justify-center"
    >
        <textarea 
            class="border-0 rounded-md min-w-full h-44"
            name="description"
            placeholder="Description">{{ old('description') ?? $project->description }}</textarea>
            @error('description')
                <p class="text-red-500 absolute">
                    {{ $errors->first('description') }}
                </p>
            @enderror
    </div> <!-- description end -->

    <div class="col-start-3 space-y-6">
        <div 
            data-validate="Display date is required" 
            class="md:pr-4 px-4 flex items-center justify-start"
        >
            <input 
                class="text-sm focus:ring-2 border-t-0 border-l-0 border-r-0 border-b-2 border-gray-900 focus:ring-blue-200 rounded-sm h-14 w-full bg-transparent"
                type="text"
                name="display_date"
                placeholder="Date to display"
                value="{{ old('display_date') ?? $project->display_date }}"
            >
                @error('display_date')
                    <p class="text-red-500 relative bottom-4 left-2 bg-white p-2 rounded-md">
                        {{ $errors->first('display_date') }}
                    </p>
                @enderror
        </div> <!-- display date end -->
        
        <div
            id="url" 
            class="md:pr-4 px-4 flex items-center justify-start"
        >
            <input 
                class="text-sm focus:ring-2 border-t-0 border-l-0 border-r-0 border-b-2 border-gray-900 focus:ring-blue-200 rounded-sm h-14 w-full bg-transparent"
                type="text"
                name="url"
                placeholder="URL http://www.website.com (optional)"
                value="{{ old('url') ?? $project->url }}"
            >
                @error('url')
                    <p class="text-red-500 relative bottom-4 left-2 bg-white p-2 rounded-md">
                        {{ $errors->first('url') }}
                    </p>
                @enderror
        </div> <!-- url end -->

        <div class="flex items-center justify-center">
            <button class="flex items-center justify-center bg-green-400 hover:bg-green-600 text-white p-3 rounded-md">
                {{ $submitButtonText ?? 'Create Project' }}
            </button>
        </div>
    </div> <!-- date & url end -->
</div> <!-- desc, date & url end -->