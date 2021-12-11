@csrf
<input
    class="focus:ring-2 border-2 border-l-0 border-t-0 border-r-0 text-center font-semibold focus:ring-blue-200 rounded-sm h-8 text-sm bg-transparent w-full placeholder-italic"
    type="text"
    name="tool"
    value="{{ old('tool') ?? $tool->tool }}"
    placeholder="New Tool"
>
    @error('tool')
        <p class="text-red-500 bg-white p-2 rounded-md">
            {{ $errors->first('tool') }}
        </p>
    @enderror <!-- tool end -->
<div class="flex justify-center items-center">
    <button
        type="submit"
        class="bg-gray-900 md:bg-opacity-40 transition ease-in-out duration-200 hover:bg-opacity-100 p-2 rounded-md text-gray-50 text-sm font-semibold shadow-2xl cursor-pointer"    
    >
        Add
    </button>
</div>