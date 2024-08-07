<x-app-layout>
    @section('title', __('Clients'))
    <section class="flex flex-col gap-y-14 py-8 max-w-8xl mx-auto  mt-10">
        <header class="flex flex-col gap-4   ">
            <a href="{{ LaravelLocalization::localizeUrl(route('dashboard.index')) }}"
                class="page-pretitle flex items-center text-zinc-700 dark:text-zinc-200 w-36">
                <svg class="!me-2 rtl:-scale-x-100" width="8" height="10" viewBox="0 0 6 10" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z" />
                </svg>
                {{ __('Back to dashboard') }}
            </a>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                {{ __('Clients') }}
            </h1>
            
            <a href="{{ route('dashboard.client.addOrUpdate') }}" class="relative inline-flex w-50"> <span
                    class="font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm  shadow-sm bg-primary text-white hover:bg-primary focus-visible:ring-primary/50 dark:bg-primary dark:hover:bg-blue-400 dark:focus-visible:ring-blue-400/50">{{ __('Add New Client') }}</span></a>
        </header>

        <div class="flex flex-col gap-8 md:flex-row">

            <div class="w-full">
                <div class="text-gray-900 dark:text-gray-100">
                    <x-table>
                        <x-slot:head>
                            <tr class="p-6 relative">
                                <th>
                                    {{ __('ID') }}
                                </th>
                                <th>
                                    {{ __('Name') }}
                                </th>
                                <th>
                                    {{ __('Availability') }}
                                </th> 
                                <th>
                                    {{ __('Updated On') }}
                                </th>
                                <th>
                                    {{ __('Created At') }}
                                </th>
                                <th>
                                    <span class="hidden"> {{ __('Actions') }}</span>
                                </th>
                            </tr>
                        </x-slot:head>
                        <x-slot:body>
                            @foreach ($list as $entry)
                                <tr>
                                    <td class="name"> {{ $entry->id }}</td>
                                    <td class="name"> {{ $entry->name }}</td>

                                    @if ($entry->visible == 'true')
                                        <td class="name">
                                            <span
                                                class="inline-flex py-0.5 px-2 rounded-full font-medium transition-all hover:-translate-y-0.5 hover:shadow-lg lqd-badge-danger bg-green-500/10 text-green-500 hover:bg-green-500 hover:text-white hover:shadow-green-500/20 text-2xs group-[&amp;.passive]:block">
                                                Dísponivel
                                            </span>
                                        </td>
                                    @else
                                        <td class="name">
                                            <span
                                                class="inline-flex py-0.5 px-2 rounded-full font-medium transition-all hover:-translate-y-0.5 hover:shadow-lg lqd-badge-danger bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white hover:shadow-rose-500/20 text-2xs group-[&amp;.passive]:block">
                                                Indisponível
                                            </span>
                                        </td>
                                    @endif

                                    <td class="name"> {{ date_format($entry->updated_at, 'd M Y H:i') }}</td>
                                    <td class="name"> {{ date_format($entry->created_at, 'd M Y H:i') }}</td>
                                    <td class="name flex items-center gap-4">

                                        <a size="none" variant="ghost-shadow" class="lqd-btn inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 disabled:opacity-50 disabled:pointer-events-none lqd-btn-ghost-shadow bg-background text-foreground shadow-xs hover:text-primary-foreground  focus-visible:bg-primary focus-visible:text-zinc-400 dark:bg-white/[3%] dark:focus-visible:bg-zinc-600 dark:focus-visible:text-zinc-500 btn-size-none  btn-hover-none size-9"
                                            href="{{ route('dashboard.client.addOrUpdate', $entry->id) }}"
                                            title="{{ __('Edit') }}"> <svg stroke-width="1.5" class="size-5"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4">
                                                </path>
                                                <path d="M13.5 6.5l4 4"></path>
                                            </svg>
                                            <span class="sr-only">{{ __('Edit') }}</span>
                                        </a> 
                                        <a size="none" variant="ghost-shadow" class="lqd-btn inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 disabled:opacity-50 disabled:pointer-events-none lqd-btn-ghost-shadow bg-background text-foreground shadow-xs  focus-visible:bg-primary focus-visible:text-zinc-400 dark:bg-white/[3%] dark:focus-visible:bg-zinc-600 dark:focus-visible:text-zinc-500 btn-size-none  btn-hover-none size-9"
                                            href="{{ LaravelLocalization::localizeUrl( route('dashboard.client.delete', $entry->id) ) }}"
                                            title="{{ __('Delete') }}">

                                            <svg stroke-width="1.5" width="24" height="24" class="size-5"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 4V6H15V4H9Z">
                                                </path>
                                            </svg>

                                            <span class="sr-only">{{ __('Edit') }}</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </x-slot:body>
                    </x-table>
                    <ul class="pagination"></ul>
                </div>
            </div>
        </div>
    </section>
    @section('script')
        <script src="/assets/js/admin/user.js"></script>
    @endsection
</x-app-layout>
