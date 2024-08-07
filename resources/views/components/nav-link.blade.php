@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center gap-2 px-1 py-2 rounded-md outline-none text-base bg-primary/10 dark:bg-primary/60 dark:text-slate-300 text-primary/80  hover:bg-primary-hover/30 font-medium leading-5  hover:border-zinc-300 dark:hover:border-zinc-700 focus:outline-none focus:text-zinc-700 dark:focus:text-zinc-300 focus:border-zinc-300 dark:focus:border-zinc-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center gap-2 px-1 py-2 outline-none text-base font-medium leading-5 text-zinc-500 dark:text-zinc-200 hover:text-zinc-700 dark:hover:text-zinc-300 hover:border-zinc-300 dark:hover:border-zinc-700 focus:outline-none focus:text-zinc-700 dark:focus:text-zinc-300 focus:border-zinc-300 dark:focus:border-zinc-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
