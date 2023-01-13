@props(['name'])

<div class="mb-6">

    <x-form.label name="{{ $name }}" />

    <textarea class="border border-gray-400 rounded p6 w-full"
        type="text"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes }}
    > {{ $slot  ?? old($name)}}
    </textarea>

    <x-form.error name="{{ $name }}" />
</div>
