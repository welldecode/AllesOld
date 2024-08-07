<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"class="max-sm:overflow-x-hidden">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $setting->site_name }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link href="/assets/libs/toastr/toastr.min.css" rel="stylesheet" />
    <link href="/assets/libs/datatable/dataTables.css" rel="stylesheet" />
    <link href="/assets/libs/animate/animate.min.css" rel="stylesheet" />
    <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @livewireStyles
    @laravelPWA
    @if (env('APP_ENV') == 'production')
        <link href="/build/assets/app-19940f1e.css" rel="stylesheet" />
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif 
    @yield('css_aditional')
     
</head>

<body class="font-sans antialiased bg-slate-50 dark:bg-zinc-900  w-full overflow-x-hidden">
    <div x-data="{ sidebarOpen: true }" class="flex">
        <div class=" flex min-h-screen w-full flex-row-reverse ">
            <div class=" w-screen flex-1 flex-col opacity-1 ">
                <div class=" sticky top-0 z-20 overflow-x-clip">
                    <nav
                        class="flex h-16 justify-between items-center gap-x-4  bg-white dark:bg-zinc-800 px-4 shadow-sm ring-1 ring-zinc-200  dark:ring-zinc-700 md:px-6 lg:px-8">
                        <div class="flex items-center gap-5">
                            <div class="moon nav-link items-center justify-center px-0 hide-theme-light text-zinc-700 dark:text-slate-100 hover:!bg-transparent  cursor-pointer  "
                                title="{{ __('Enable dark mode') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </div>
                            <div class="sun nav-link items-center justify-center px-0 hide-theme-light text-zinc-700 dark:text-slate-100 hover:!bg-transparent  cursor-pointer  "
                                title="{{ __('Enable light mode') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path
                                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </div>
                            <div class="  flex items-center ">
                                <x-dropdown align="left" width="48">
                                    <x-slot name="trigger">
                                        <p
                                            class="inline-flex  gap-3 items-center py-2 border border-transparent text-sm leading-4 cursor-pointer font-medium rounded-md text-zinc-500 dark:text-zinc-200   hover:text-zinc-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                stroke-width=".1" stroke="currentColor" viewBox="0 0 30 30"
                                                width="24" height="24">
                                                <path
                                                    d="M 5 3 C 3.9069372 3 3 3.9069372 3 5 L 3 16 C 3 17.093063 3.9069372 18 5 18 L 7 18 L 12 18 L 12 22 L 8 22 L 8 19 L 7 18 L 6 19 L 6 22 L 8 24 L 12 24 L 12 25 C 12 26.105 12.895 27 14 27 L 25 27 C 26.105 27 27 26.105 27 25 L 27 14 C 27 12.895 26.105 12 25 12 L 18 12 L 18 5 C 18 3.9069372 17.093063 3 16 3 L 5 3 z M 5 5 L 16 5 L 16 12 L 14 12 C 12.895 12 12 12.895 12 14 L 12 16 L 5 16 L 5 5 z M 12 14 L 12 13 C 11.755293 13 11.521351 12.969766 11.291016 12.933594 C 11.314874 12.916254 11.341774 12.902596 11.365234 12.884766 C 12.436415 12.070668 13 10.75101 13 9 L 14 9 L 14 8 L 11 8 L 11 6.5 L 10 6.5 L 10 8 L 7 8 L 7 9 L 12 9 C 12 10.54899 11.563585 11.478941 10.759766 12.089844 C 10.53998 12.25688 10.278088 12.396887 9.9902344 12.517578 C 9.667359 12.357894 9.3640918 12.177141 9.109375 11.962891 C 8.3922951 11.359732 8 10.591752 8 10 L 7 10 C 7 10.997248 7.5736736 11.978924 8.4648438 12.728516 C 8.5238513 12.778149 8.5962189 12.817683 8.6582031 12.865234 C 8.1567671 12.945359 7.6170728 13 7 13 L 7 14 C 8.1153185 14 9.1081165 13.884672 9.9570312 13.605469 C 10.57585 13.850013 11.261979 14 12 14 z M 18.402344 15.976562 L 20.59375 15.976562 L 22.962891 23.023438 L 21.009766 23.023438 L 20.570312 21.474609 L 18.269531 21.474609 L 17.816406 23.023438 L 16.039062 23.023438 L 18.402344 15.976562 z M 19.382812 17.564453 L 18.611328 20.185547 L 20.232422 20.185547 L 19.476562 17.564453 L 19.382812 17.564453 z" />
                                            </svg>

                                        </p>
                                    </x-slot>

                                    <x-slot name="content">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <x-dropdown-link
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </x-dropdown-link>
                                        @endforeach
                                    </x-slot>
                                </x-dropdown>
                            </div>
                           
                        </div>
                        <div class="flex items-center gap-7"> <!-- Settings Dropdown -->
                       
                            <div class="hidden sm:flex sm:items-center  ">
                                <x-dropdown align="right" width="w-80">
                                    <x-slot name="trigger">
                                        <p
                                            class="relative inline-flex  gap-3 items-center py-2 border border-transparent text-sm leading-4 cursor-pointer font-medium rounded-md text-zinc-500 dark:text-zinc-200   hover:text-zinc-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10V18H18V10ZM20 18.6667L20.4 19.2C20.5657 19.4209 20.5209 19.7343 20.3 19.9C20.2135 19.9649 20.1082 20 20 20H4C3.72386 20 3.5 19.7761 3.5 19.5C3.5 19.3918 3.53509 19.2865 3.6 19.2L4 18.6667V10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10V18.6667ZM9.5 21H14.5C14.5 22.3807 13.3807 23.5 12 23.5C10.6193 23.5 9.5 22.3807 9.5 21Z">
                                                </path>
                                            </svg>
                                            <span
                                                class="absolute top-0 -right-2  bg-red-500 text-zinc-50 px-2 py-[2px] text-[12px]  rounded-full">{{ auth()->user()->unreadNotifications->count() }}</span>
                                        </p>
                                    </x-slot>


                                    <x-slot name="content">

                                        @if (auth()->user()->unreadNotifications)
                                            <li class="m-2 text-center p-2 text-sm font-medium text-white bg-primary hover:bg-primary-hover transition-all rounded-md">
                                                <a href="{{ route('mark-as-read') }}"
                                                    class="btn btn-success btn-sm">Marcar tudo como lido </a>
                                            </li>
                                        @endif
                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                            <div class=" px-2 py-2 flex flex-col gap-2   ">
                                                <div class=" bg-zinc-50 px-4 py-2  ring-1 ring-zinc-200 rounded-lg ">
                                                    <div
                                                        class="text-sm font-medium text-zinc-700   dark:text-zinc-200 ">
                                                        {{ $notification->data['name'] }}
                                                    </div>
                                                    <div class="text-xs font-medium text-zinc-700 dark:text-zinc-200">
                                                        Data: <span
                                                            class="text-xs font-bold  text-zinc-600 dark:text-zinc-200 ">
                                                            {{ $notification->data['date'] }} </span></div>
                                                </div>

                                            </div>
                                        @endforeach
                                        @foreach (auth()->user()->readNotifications as $notification)
                                            <div class="opacity-60 px-2 py-2 flex flex-col gap-2   ">
                                                <div class=" bg-zinc-100 px-4 py-2  ring-1 ring-zinc-200 rounded-lg ">
                                                    <div
                                                        class="text-sm font-medium text-zinc-700   dark:text-zinc-200 ">
                                                        {{ $notification->data['name'] }}
                                                    </div>
                                                    <div class="text-xs font-medium text-zinc-700 dark:text-zinc-200">
                                                        Disponivel: <span
                                                            class="text-xs font-bold  text-zinc-600 dark:text-zinc-200 ">
                                                            {{ $notification->data['date'] }} </span></div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </x-slot>
                                </x-dropdown>
                            </div>      
                            <!-- Settings Dropdown -->
                            <div class=" hidden sm:flex sm:items-center  ">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-zinc-500 dark:text-zinc-400 bg-zinc-100 dark:bg-zinc-900 hover:text-zinc-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div> 
                            <button class="xl:hidden   text-zinc-700 dark:text-zinc-300"
                            title="{{ __('Enable light mode') }}" @click="sidebarOpen = !sidebarOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                            </svg>
                        </button>
                        </div>
                    </nav>
                </div>

                <!-- Page Content -->
                <main
                    class=" mx-auto h-full w-full px-4 md:px-6 lg:px-8 animate__animated animate__fadeIn animate__faster">

                          <!-- Settings Dropdown -->
                          <div class=" xl:hidden  mt-10  w-full">
                            <x-dropdown align="left"   width="w-full">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex w-full items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-zinc-800 dark:text-zinc-400 bg-zinc-200 dark:bg-zinc-800 hover:text-zinc-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div> 
                    {{ $slot }}
                </main>
            </div>
            @include('layouts.navigation')
        </div>
    </div> 

    @include('layouts.scripts')
 
    @yield('script')

    @livewireScripts
</body>

</html>
