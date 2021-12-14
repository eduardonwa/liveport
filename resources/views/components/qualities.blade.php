<div class="text-center shadow-xl p-4 rounded-md h-full w-full bg-yellow-100 cursor-pointer transition ease-in-out transform scale-75 hover:scale-100 duration-300">
    <h2 class="text-center font-semibold my-4 text-xl text-gray-800 relative bottom-4"> 🙌 Qualities</h2>
    <div class="flex flex-col justify-center">
        @if ($qualities->count() <= 5)
            <ul class="flex flex-col">
                @foreach ($qualities as $quality)
                    <li> {{ $quality->quality }}</li>
                @endforeach
            </ul>
        @else
            <ul class="flex md:text-left flex-col m-2 md:grid grid-cols-2">
                @foreach ($qualities as $quality)
                    <li class="md:pr-5"> {{$quality->quality}} </li>   
                @endforeach
            </ul>
        @endif
    </div>
</div> <!-- qualities end -->