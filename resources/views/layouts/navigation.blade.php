 
<aside class="sm:w-[19rem] flex flex-col  transition-all duration-300 dark:zinc-900 lg:z-0 lg:bg-transparent lg:shadow-none lg:ring-0 lg:transition dark:lg:bg-transparent
  shadow-xl   rtl:-translate-x-0 sticky top-0 z-20 " >
    <div class="sm:w-[19rem]   fixed left-0 border-r dark:border-zinc-700 bg-white dark:bg-zinc-800  h-full " :class="{ '-ml-96': !sidebarOpen }"> 
    <div class="overflow-x-clip">
        <header class="flex items-center px-8 w-full justify-center">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex justify-center items-center">
                    <a href="{{ route('dashboard.index') }}">
                        <x-application-logo class="block mt-5 h-20 w-auto fill-current text-primary dark:text-gray-200" />
                    </a>
                </div>
            </div>
        </header>
    </div>
    <nav class=" w-[19rem] overflow-y-auto overscroll-contain top-28  inset-y-0 flex-grow flex flex-col gap-y-7 overflow-x-hidden px-7 py-8 ">
        <ul class="fi-sidebar-nav-groups -mx-2 flex flex-col gap-y-3">
            <span
                class="font-bold text-zinc-600 dark:text-zinc-400 inline-block ps-2 pt-2 text-3xs uppercase tracking-widest lg:px-2 lg:w-full ">
                ADMIN
            </span>
            <li class="flex flex-col gap-y-1 fi-active">
                <x-nav-link href="{{ route('dashboard.index') }}" active="{{activeRoute('dashboard.index')}}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[1.25rem] h-[1.25rem]" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" fill="none"
                        stroke-linejoin="round" stroke="currentColor">
                        <path d="M4 4h6v6h-6z"></path>
                        <path d="M14 4h6v6h-6z"></path>
                        <path d="M4 14h6v6h-6z"></path>
                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    </svg>
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>
       
            <li class="flex flex-col gap-y-1 fi-active  ">
                <x-dropdown align="left" position="relative" width="full" contentClasses="bg-transparent relative">
                    <x-slot name="trigger">
                        <div class="cursor-pointer inline-flex w-full justify-between items-center gap-2  px-2 py-2 rounded-md  outline-none text-base font-medium leading-5 text-zinc-500 dark:text-zinc-200 hover:text-zinc-700 dark:hover:text-zinc-300 hover:border-zinc-300 dark:hover:border-zinc-700 focus:outline-none focus:text-zinc-700 dark:focus:text-zinc-300 focus:border-zinc-300 dark:focus:border-zinc-700 dark:hover:bg-zinc-900 transition duration-150 ease-in-out">
                         <div class="flex items-center gap-2"> 
                            <svg stroke-width="1.5" class="w-[1.25rem] h-[1.25rem]"xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path> <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path><path d="M10 12l4 0"></path> </svg> 
                            <div>{{ __('Planning') }}</div></div>
                            <svg stroke-width="1.5" class="w-[1.25rem] h-[1.25rem]"xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        </div>
                    </x-slot>
                    <x-slot name="content">
                        <div class="flex w-full flex-col gap-2 pl-4 ml-3 mt-4 border-l-2 border-solid border-blue-100">

                            <x-dropdown-link href="{{ route('dashboard.schedule.index') }}">
                                {{ __('Filtro de Planejamentos') }} 
                            </x-dropdown-link>         
                            <x-dropdown-link href="{{ route('dashboard.schedule.listSchedule') }}">
                                {{ __('Lista de Planejamentos') }} 
                            </x-dropdown-link>     
                             <x-dropdown-link href="{{ route('dashboard.schedule.addOrUpdate') }}">
                                {{ __('Add New') }}
                            </x-dropdown-link>    
                        </div> 
                    </x-slot>
                </x-dropdown> 
            </li>
            

              <!-- Settings Dropdown -->
              <li class="flex flex-col gap-y-1 fi-active  ">
                <x-dropdown align="left" position="relative" width="48" contentClasses="bg-transparent relative">
                    <x-slot name="trigger">
                        <div
                            class="cursor-pointer inline-flex justify-between w-full items-center gap-2 px-2 py-2 rounded-md  outline-none text-base font-medium leading-5 text-zinc-500 dark:text-zinc-200 hover:text-zinc-700 dark:hover:text-zinc-300 hover:border-zinc-300 dark:hover:border-zinc-700 focus:outline-none focus:text-zinc-700 dark:focus:text-zinc-300 focus:border-zinc-300 dark:focus:border-zinc-700 dark:hover:bg-zinc-900 transition duration-150 ease-in-out">
                            <div class="flex items-center gap-2"> 
                                   <svg xmlns="http://www.w3.org/2000/svg" class="w-[1.25rem] h-[1.25rem]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L21.5 6.5V17.5L12 23L2.5 17.5V6.5L12 1ZM5.49388 7.0777L12.0001 10.8444L18.5062 7.07774L12 3.311L5.49388 7.0777ZM4.5 8.81329V16.3469L11.0001 20.1101V12.5765L4.5 8.81329ZM13.0001 20.11L19.5 16.3469V8.81337L13.0001 12.5765V20.11Z"></path></svg>
                                 <div>{{ __('Registrations') }}</div></div>  
                               <svg stroke-width="1.5" class="w-[1.25rem] h-[1.25rem]"xmlns="http://www.w3.org/2000/svg"
                               width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round">
                               <path d="M12 5l0 14"></path>
                               <path d="M5 12l14 0"></path>
                           </svg>
                        </div>
                    </x-slot>
                    <x-slot name="content">
                        <div class="w-[15rem] flex flex-col gap-2 pl-4 ml-3 mt-4 border-l-2 border-solid border-blue-100">   
                            <x-dropdown-link href="{{ route('dashboard.client.index') }}">
                                {{ __('Clientes') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('dashboard.collaborators.index') }}">
                                {{ __('Collaborators') }}
                            </x-dropdown-link>  
                            <x-dropdown-link href="{{ route('dashboard.equipment.index') }}">
                                {{ __('Equipments') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('dashboard.locate_work.index') }}">
                                {{ __('Local de Trabalho') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('dashboard.responsible.index') }}">
                                {{ __('Responsavel pela Área') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('dashboard.functions.index') }}">
                                {{ __('Functions') }}
                            </x-dropdown-link>  
                        </div> 
                    </x-slot>
                </x-dropdown>
            </li>
             
            <li class="flex flex-col gap-y-1 fi-active  w-full  ">
                <x-dropdown align="left" position="relative" width="48" contentClasses="bg-transparent relative">
                    <x-slot name="trigger">
                        <div class="cursor-pointer inline-flex w-full justify-between items-center gap-2  px-2 py-2 rounded-md  outline-none text-base font-medium leading-5 text-zinc-500 dark:text-zinc-200 hover:text-zinc-700 dark:hover:text-zinc-300 hover:border-zinc-300 dark:hover:border-zinc-700 focus:outline-none focus:text-zinc-700 dark:focus:text-zinc-300 focus:border-zinc-300 dark:focus:border-zinc-700 dark:hover:bg-zinc-900 transition duration-150 ease-in-out">
                         <div class="flex items-center gap-2"> 
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-[1.25rem] h-[1.25rem]" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4V2H17V4H20.0066C20.5552 4 21 4.44495 21 4.9934V21.0066C21 21.5552 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5551 3 21.0066V4.9934C3 4.44476 3.44495 4 3.9934 4H7ZM7 6H5V20H19V6H17V8H7V6ZM9 4V6H15V4H9Z"></path></svg> 
                              <div>{{ __('Documents') }}</div></div>
                            <svg stroke-width="1.5" class="w-[1.25rem] h-[1.25rem]"xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        </div>
                    </x-slot>
                    <x-slot name="content">
                        <div class="flex w-full flex-col gap-2 pl-4 ml-3 mt-4 border-l-2 border-solid border-blue-100">
                            
                            <x-dropdown-link href="{{ route('dashboard.document.index') }}">
                                {{ __('All Document') }}
                            </x-dropdown-link> 
                            <x-dropdown-link href="{{ route('dashboard.document.addOrUpdate') }}">
                                {{ __('Add Document') }}
                            </x-dropdown-link> 
                           
                            <x-dropdown-link href="{{ route('dashboard.document.category') }}">
                                {{ __('Functions') }}
                            </x-dropdown-link> 
                        </div> 
                    </x-slot>
                </x-dropdown> 
            </li>
            
            <span
                class="font-bold text-zinc-600 dark:text-zinc-400 inline-block ps-2 pt-2 text-3xs uppercase tracking-widest lg:px-2 lg:w-full ">
                WEBSITE
            </span>
            <li class="flex flex-col gap-y-1 fi-active ">
                <x-nav-link href="{{ route('admin.users.index') }}"  active="{{activeRoute('admin.users.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="w-[1.25rem] h-[1.25rem]" viewBox="0 0 24 24" fill="currentColor"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path></svg>
                 
                    {{ __('Users') }}
                </x-nav-link>
            </li>
            <li class="flex flex-col gap-y-1 fi-active  ">
                <x-dropdown align="left" position="relative" width="48" contentClasses="bg-transparent relative">
                    <x-slot name="trigger">
                        <div class="cursor-pointer inline-flex w-full justify-between items-center gap-2  px-2 py-2 rounded-md  outline-none text-base font-medium leading-5 text-zinc-500 dark:text-zinc-200 hover:text-zinc-700 dark:hover:text-zinc-300 hover:border-zinc-300 dark:hover:border-zinc-700 focus:outline-none focus:text-zinc-700 dark:focus:text-zinc-300 focus:border-zinc-300 dark:focus:border-zinc-700 dark:hover:bg-zinc-900 transition duration-150 ease-in-out">
                         <div class="flex items-center gap-2"> 
                            <svg xmlns="http://www.w3.org/2000/svg"  class="w-[1.25rem] h-[1.25rem]" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M2 11.9998C2 11.1353 2.1097 10.2964 2.31595 9.49631C3.40622 9.55283 4.48848 9.01015 5.0718 7.99982C5.65467 6.99025 5.58406 5.78271 4.99121 4.86701C6.18354 3.69529 7.66832 2.82022 9.32603 2.36133C9.8222 3.33385 10.8333 3.99982 12 3.99982C13.1667 3.99982 14.1778 3.33385 14.674 2.36133C16.3317 2.82022 17.8165 3.69529 19.0088 4.86701C18.4159 5.78271 18.3453 6.99025 18.9282 7.99982C19.5115 9.01015 20.5938 9.55283 21.6841 9.49631C21.8903 10.2964 22 11.1353 22 11.9998C22 12.8643 21.8903 13.7032 21.6841 14.5033C20.5938 14.4468 19.5115 14.9895 18.9282 15.9998C18.3453 17.0094 18.4159 18.2169 19.0088 19.1326C17.8165 20.3043 16.3317 21.1794 14.674 21.6383C14.1778 20.6658 13.1667 19.9998 12 19.9998C10.8333 19.9998 9.8222 20.6658 9.32603 21.6383C7.66832 21.1794 6.18354 20.3043 4.99121 19.1326C5.58406 18.2169 5.65467 17.0094 5.0718 15.9998C4.48848 14.9895 3.40622 14.4468 2.31595 14.5033C2.1097 13.7032 2 12.8643 2 11.9998ZM6.80385 14.9998C7.43395 16.0912 7.61458 17.3459 7.36818 18.5236C7.77597 18.8138 8.21005 19.0652 8.66489 19.2741C9.56176 18.4712 10.7392 17.9998 12 17.9998C13.2608 17.9998 14.4382 18.4712 15.3351 19.2741C15.7899 19.0652 16.224 18.8138 16.6318 18.5236C16.3854 17.3459 16.566 16.0912 17.1962 14.9998C17.8262 13.9085 18.8225 13.1248 19.9655 12.7493C19.9884 12.5015 20 12.2516 20 11.9998C20 11.7481 19.9884 11.4981 19.9655 11.2504C18.8225 10.8749 17.8262 10.0912 17.1962 8.99982C16.566 7.90845 16.3854 6.65378 16.6318 5.47605C16.224 5.18588 15.7899 4.93447 15.3351 4.72552C14.4382 5.52844 13.2608 5.99982 12 5.99982C10.7392 5.99982 9.56176 5.52844 8.66489 4.72552C8.21005 4.93447 7.77597 5.18588 7.36818 5.47605C7.61458 6.65378 7.43395 7.90845 6.80385 8.99982C6.17376 10.0912 5.17754 10.8749 4.03451 11.2504C4.01157 11.4981 4 11.7481 4 11.9998C4 12.2516 4.01157 12.5015 4.03451 12.7493C5.17754 13.1248 6.17376 13.9085 6.80385 14.9998ZM12 14.9998C10.3431 14.9998 9 13.6567 9 11.9998C9 10.343 10.3431 8.99982 12 8.99982C13.6569 8.99982 15 10.343 15 11.9998C15 13.6567 13.6569 14.9998 12 14.9998ZM12 12.9998C12.5523 12.9998 13 12.5521 13 11.9998C13 11.4475 12.5523 10.9998 12 10.9998C11.4477 10.9998 11 11.4475 11 11.9998C11 12.5521 11.4477 12.9998 12 12.9998Z">
                            </path>
                        </svg>
             <div>{{ __('Documents') }}</div></div>
                            <svg stroke-width="1.5" class="w-[1.25rem] h-[1.25rem]" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        </div>
                    </x-slot>
                    <x-slot name="content">
                        <div class="flex w-full flex-col gap-2 pl-4 ml-3 mt-4 border-l-2 border-solid border-blue-100">
                            
                            <x-dropdown-link href="{{ route('admin.settings.general') }}">
                                {{ __('Geral') }}
                            </x-dropdown-link> 
                            <x-dropdown-link href="{{ route('dashboard.document.addOrUpdate') }}">
                                {{ __('SMPT') }}
                            </x-dropdown-link> 
                            
                        </div> 
                    </x-slot>
                </x-dropdown> 
              
            </li>

        </ul>
    </nav></div>
</aside> 