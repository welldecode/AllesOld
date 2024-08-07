<x-app-layout>

    @section('title', __('Dashboard'))
    @section('css_aditional')
        <link rel="stylesheet" href="/assets/libs/selectize/selectize.min.css">
    @endsection
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex w-full flex-col gap-2 lg:w-7/12  mb-5">
                <p class="font-light text-zinc-400">Painel de Controle</p>
                <h1 class="text-3xl font-bold text-zinc-700 dark:text-zinc-100">Bem-vindo, {{ Auth::user()->name }}.</h1>
                <span class="text-zinc-600 text-sm font-light ">Sistema em versão beta, pode ocorrer riscos de bugs.</span>
            </div>
            <hr class="mb-5">

            <div class="grid grid-cols-1 sm:grid-cols-4 lg:grid-cols-4 gap-4 mb-10 hidden">
                <div class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6 flex justify-between items-center">
                    <div class="">
                        <h1 class="font-bold text-zinc-500 dark:text-zinc-100 text-base mb-1">Total de Clientes</h1>
                        <span class="font-extrabold text-primary  dark:text-zinc-200">{{ $clients->count() }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"class="w-8 h-8 text-primary  dark:text-zinc-100" fill="currentColor">
                        <path
                            d="M12.0049 22.0027C6.48204 22.0027 2.00488 17.5256 2.00488 12.0027C2.00488 6.4799 6.48204 2.00275 12.0049 2.00275C17.5277 2.00275 22.0049 6.4799 22.0049 12.0027C22.0049 17.5256 17.5277 22.0027 12.0049 22.0027ZM12.0049 20.0027C16.4232 20.0027 20.0049 16.421 20.0049 12.0027C20.0049 7.58447 16.4232 4.00275 12.0049 4.00275C7.5866 4.00275 4.00488 7.58447 4.00488 12.0027C4.00488 16.421 7.5866 20.0027 12.0049 20.0027ZM9.00488 8.00275H15.0049L17.5049 11.5027L12.0041 17.0027L6.50488 11.5027L9.00488 8.00275ZM10.0349 10.0027L9.11488 11.2927L12.0041 14.1827L14.8949 11.2927L13.9749 10.0027H10.0349Z">
                        </path>
                    </svg>
                </div>
                <div class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6  flex  justify-between items-center">
                    <div class="">
                        <h1 class="font-bold text-zinc-500  dark:text-zinc-100 text-base mb-1">Total de Colaboradores
                        </h1>
                        <span
                            class="font-extrabold text-primary  dark:text-zinc-200">{{ $collaborators->count() }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"class="w-8 h-8 text-primary  dark:text-zinc-100" fill="currentColor">
                        <path
                            d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z">
                        </path>
                    </svg>

                </div>
                <div class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6  flex  justify-between items-center">
                    <div class="">
                        <h1 class="font-bold text-zinc-500  dark:text-zinc-100 text-base mb-1">Total de Planejamentos
                        </h1>
                        <span class="font-extrabold text-primary  dark:text-zinc-200">{{ $schedule->count() }}</span>
                    </div>
                    <svg stroke-width="1.5" class="w-8 h-8 text-primary dark:text-zinc-100"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                        <path d="M10 12l4 0"></path>
                    </svg>
                </div>
                <div class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6  flex  justify-between items-center">
                    <div class="">
                        <h1 class="font-bold text-zinc-500  dark:text-zinc-100 text-base mb-1">Total de Equipamentos
                        </h1>
                        <span class="font-extrabold text-primary  dark:text-zinc-200">{{ $hoists->count() }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="w-8 h-8 text-primary  dark:text-zinc-100" fill="currentColor">
                        <path
                            d="M16.3303 13.497C17.9562 12.2151 19 10.2278 19 7.9967H21C21 10.9687 19.5595 13.6043 17.3385 15.2432L19.8661 19.6211C20.4183 20.5776 20.0906 21.8008 19.134 22.3531L15.6073 16.2447C14.5029 16.7283 13.2828 16.9967 12 16.9967C10.7172 16.9967 9.49712 16.7283 8.39278 16.2447L4.86606 22.3531C3.90947 21.8008 3.58172 20.5776 4.13401 19.6211L9.19751 10.8508C8.45844 10.125 8.00003 9.11439 8.00003 7.9967C8.00003 6.13286 9.2748 4.56676 11 4.12272V1.9967H13V4.12272C14.7253 4.56676 16 6.13286 16 7.9967C16 9.11439 15.5416 10.125 14.8025 10.8508L16.3303 13.497ZM14.599 14.4983L13.071 11.8517C12.7302 11.9462 12.371 11.9967 12 11.9967C11.6291 11.9967 11.2699 11.9462 10.929 11.8517L9.40101 14.4983C10.2046 14.8198 11.0817 14.9967 12 14.9967C12.9184 14.9967 13.7955 14.8198 14.599 14.4983ZM12 9.9967C13.1046 9.9967 14 9.10127 14 7.9967C14 6.89213 13.1046 5.9967 12 5.9967C10.8955 5.9967 10 6.89213 10 7.9967C10 9.10127 10.8955 9.9967 12 9.9967Z">
                        </path>
                    </svg>
                </div>
            </div>

            <div class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6  ">
                <div class="md:flex md:flex-col">
                    <h1 class="font-bold text-zinc-700 dark:text-zinc-100 text-2xl mb-1">Horarios Disponiveis</h1>
                    <span class="font-regular text-xs text-zinc-500 dark:text-zinc-200 mb-5">Confira os horarios
                        disponiveis ou indisponiveis para planejamentos.</span>
                    <div class="form_d">
                        <form action="#" id="schedule_form">
                            <div class="input flex flex-col gap-1">
                                <div class="flex items-center gap-5">
                                    <div class="flex flex-col w-full">
                                        <label for="">Data:</label>
                                        <input type="date" name="start_date" id="start_date"
                                            value="{{ date('Y-m-d') }}"
                                            class=" p-[6px] border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm">

                                    </div>
                                    <div class="flex flex-col w-full">
                                        <label for="type_col">Escolha o Tipo:</label>
                                        <select name="type_col" id="type_col" placeholder="Selecione o tipo..."
                                            class="type_col selectType dark:bg-zinc-900  ">
                                            <option value="equipaments">Equipamentos</option>
                                            <option value="collaborators" selected>Colaboradores</option>
                                        </select>

                                    </div>
                                    <div class="flex flex-col w-full">
                                        <label for="stats">Selecione o Status:</label>
                                        <select name="stats" id="stats" placeholder="Selecione o Status..."
                                            class="stats selectType dark:bg-zinc-900  ">
                                            <option value="true">Disponivel</option>
                                            <option value="false">Indisponivel</option>
                                        </select>

                                    </div>
                                </div> <span
                                    class="hidden font-normal text-xs text-zinc-500 dark:text-zinc-200">Selecione uma
                                    data e
                                    horario para ver horarios disponiveis ou indisponiveis</span>
                                <!-- Filtros - Submit -->
                                <div class= "">
                                    <button
                                        class="  px-8 py-2 bg-primary hover:bg-primary-hover transition duration-75  text-white text-center mt-5   rounded-lg"
                                        type="submit" id="schedule_filter_submit"
                                        value="filtrar_planejamentos">{{ __('Filtrar') }}</button>
                                </div>
                            </div>
                        </form>
                        <p class="info-schedule"></p>
                        <div id="delete_schedule"></div>
                        <div class="display" style="display: none">
                            <table id="demo" style="width:100%">
                               

                            </table>
                        </div>
                    </div>
                </div>
                <hr class="mt-2 mb-5">
            </div>
        </div>
    </div>
    @section('script')
        <script src="/assets/js/admin/dashboard.js"></script>

        <script src="/assets/libs/selectize/selectize.min.js"></script>
        <script>
            $(".selectType").selectize({
                maxItems: 1,
                delimiter: ",",
            });
        </script>
    @endsection
</x-app-layout>
