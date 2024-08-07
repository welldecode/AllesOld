@props([
    'selectedOptions' => [],
])
<div class="select-new">

    <span class="select-new-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-[1.15rem] h-[1.15rem]" viewBox="0 0 24 24" fill="currentColor"> <pathd="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></pathd=></svg> </span>
    <select {{ $attributes->merge(['class' => 'border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm  w-full ']) }} >


        {{ $content }}
    </select>
</div>
