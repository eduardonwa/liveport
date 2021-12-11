<div class="text-center shadow-xl p-4 rounded-md h-full">
    <h2 class="text-center font-semibold my-4 text-xl text-gray-800"> 🧰 Toolbox</h2>
    <div class="flex flex-col justify-center">
        @if ($tools->count() <= 5)
            <ul class="flex flex-col">
                @foreach ($tools as $tools)
                    <li>{{$tools->tool}}</li>
                @endforeach
            </ul>
        @else
            <ul class="flex md:text-left flex-col m-2 md:grid grid-cols-2">
                @foreach ($tools as $tools)
                    <li class="md:text-left">{{$tools->tool}}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div> <!-- toolbox projects end -->