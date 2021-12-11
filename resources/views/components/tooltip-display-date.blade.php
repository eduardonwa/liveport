<button 
    data-tooltip-target="tooltip-date" 
    data-tooltip-placement="right" 
    type="button"
    class="italic pt-3 md:pt-0"
>
    {{ $slot }}
</button>
 <div 
    id="tooltip-date" 
    role="tooltip" 
    class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 invisible"
>
    Display date
    <div class="tooltip-arrow" data-popper-arrow></div>
</div> <!-- tooltip message end -->