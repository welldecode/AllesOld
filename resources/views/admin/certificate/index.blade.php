<x-app-layout>
    <section class="flex flex-col gap-y-14 py-8">
        <header class="flex flex-col gap-4   ">
            <a href="{{ LaravelLocalization::localizeUrl(route('dashboard.index')) }}"
                class="page-pretitle flex items-center text-zinc-700 dark:text-zinc-200">
                <svg class="!me-2 rtl:-scale-x-100" width="8" height="10" viewBox="0 0 6 10" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z" />
                </svg>
                {{ __('Back to dashboard') }}
            </a>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                {{ __('Certificate') }}
            </h1>
            <a href="{{ route('dashboard.certificate.addOrUpdate') }}" class="relative inline-flex"> <span
                    class="font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm  shadow-sm bg-blue-600 text-white hover:bg-blue-500 focus-visible:ring-blue-500/50 dark:bg-blue-500 dark:hover:bg-blue-400 dark:focus-visible:ring-blue-400/50">{{ __('Add New Certificate') }}</span></a>
        </header>

        <div class="flex flex-col gap-8 md:flex-row">
            <ul class="w-64 flex-col gap-y-4 md:flex">
                <li
                    class="relative rounded-lg px-4 py-2 outline-none transition duration-75 hover:bg-gray-100 focus-visible:bg-gray-100 dark:hover:bg-white/5 dark:focus-visible:bg-white/5 bg-gray-100 dark:bg-white/5">
                    <a href="#">
                        <span
                            class="fi-sidebar-item-label flex-1 truncate text-sm font-semibold text-primary-600 dark:text-blue-500 ">Certificado
                            CRONOTACÓGRAFO</span></a>
                </li>
                <li class="w-full">
                    <a href="#"
                        class="relative rounded-lg px-4 py-2 block outline-none transition duration-75 text-slate-100 dark:text-zinc-700 hover:bg-gray-100 focus-visible:bg-gray-100 dark:hover:bg-white/5 dark:focus-visible:bg-white/5">
                        <span
                            class="fi-sidebar-item-label flex-1 truncate text-sm font-medium text-slate-700 dark:text-zinc-100">Certificado
                          
                            OP</span></a>
                </li>
            </ul>
            <div class="">
                <div class="text-gray-900 dark:text-gray-100">
                    Oi
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
