@props(['trigger'])


<div x-data="{show:false}" @click.away="show=false">
    
    <div @click = "show = ! show">

        {{$trigger}}

    </div>

    <div x-show="show" class="absolute bg-gray-100 w-32 mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display:none ">

        {{$slot}}

    </div>

</div>
