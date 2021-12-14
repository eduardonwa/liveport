<div class="col-span-1 flex flex-col border md:border-r-0 border-b-0 md:border-b md:rounded-l-md border-gray-900 p-4 text-center space-y-0 md:space-y-2">
    <div class="font-bold underline"> 
        {{ $project->title }}
    </div> <!-- title end -->

    <div>
       <x-tooltip-author>
            {{ $project->user->name }}
       </x-tooltip-author>
    </div> <!-- author end -->

    <div class="italic text-gray-900">
        <x-tooltip-display-date>
            {{ $project->display_date }}
        </x-tooltip-display-date>
    </div> <!-- display_date end -->
</div> <!-- left column end -->

<div class="col-span-3 flex-auto p-4 border border-gray-900 border-t-0 md:rounded-tr-md md:border-t md:border-l-0 bg-tri-two">
    <div>
        {{ $project->description }}
    </div>
</div> <!-- right column end -->