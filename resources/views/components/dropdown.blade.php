@props(['align' => 'right', 'width' => '48', 'position' => 'absolute','contentClasses' => 'py-1 bg-white dark:bg-zinc-800 shadow-lg border border-solid  dark:border-zinc-700'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'ltr:origin-top-left rtl:origin-top-right start-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
switch ($position) {
    case 'relative':
        $position = 'relative';
        break;
    
        default:
        $position = 'absolute';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="{{ $position }} z-50 mt-2 {{ $width }} rounded-md {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>