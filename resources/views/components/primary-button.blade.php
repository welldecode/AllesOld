<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-primary dark:bg-[#003276] border border-transparent rounded-lg font-semibold text-xs text-white dark:text-gray-800   tracking-widest hover:bg-[#195DB7] dark:hover:bg-[#003276] focus:bg-gray-700 dark:focus:bg-white active:bg-[#195DB7] dark:active:bg-[#195DB7] focus:outline-none focus:ring-2 focus:ring-[#195DB7] text-white dark:text-white focus:ring-offset-2 dark:focus:ring-offset-[#195DB7] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
