@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<div class="relative" data-controller="dropdown" data-action="turbo:before-cache@window->dropdown#closeNow click@window->dropdown#close close->dropdown#close">
    <div data-action="click->dropdown#toggle" data-dropdown-target="trigger">
        {{ $trigger }}
    </div>

    <div
        data-dropdown-target="menu"
        data-transition-enter="transition ease-out duration-200"
        data-transition-enter-start="transform opacity-0 scale-95"
        data-transition-enter-end="transform opacity-100 scale-100"
        data-transition-leave="transition ease-in duration-75"
        data-transition-leave-start="transform opacity-100 scale-100"
        data-transition-leave-end="transform opacity-0 scale-95"
        class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }} hidden"
    >
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
