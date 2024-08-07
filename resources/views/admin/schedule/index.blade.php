<x-app-layout>

    @section('title', __('Planning'))
    @section('css_aditional')
        <link rel="stylesheet" href="/assets/libs/selectize/selectize.min.css">
    @endsection

    <section class="flex flex-col gap-y-14 py-8 max-w-9xl mx-auto  mt-10">
        <header class="flex flex-col gap-4  ">
            <div>
                <a href="{{ LaravelLocalization::localizeUrl(route('dashboard.index')) }}"
                    class="page-pretitle flex items-center text-zinc-700 dark:text-zinc-200  ">
                    <svg class="!me-2 rtl:-scale-x-100" width="8" height="10" viewBox="0 0 6 10" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z" />
                    </svg>
                    {{ __('Back to dashboard') }}
                </a>
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                {{ __('Planning') }}</h1>
            <div>
                <a href="{{ route('dashboard.schedule.addOrUpdate') }}"
                    class="font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm  shadow-sm bg-primary text-white hover:bg-primary focus-visible:ring-primary/50 dark:bg-primary dark:hover:bg-primary-hover dark:focus-visible:ring-pr relative inline-flex ">
                    <span>{{ __('Add Planning') }}</span></a>
            </div>
        </header>
        <form id="schedule_filter_form">

            <!-- Filtros - Busca -->
            <div class=" sm:inline-flex w-full gap-3">
                <div class="sm:w-[calc(100%/3)] flex flex-col gap-1">
                    <span class="text-zinc-600 dark:text-zinc-200 font-medium text-sm">Data do Planejamento Geral</span>
                    <input type="date" id="date_planning" value="{{ date('Y-m-d') }}" name="date_planning"
                        class="p-[6px] border-gray-300 dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-300 focus:border-primary dark:focus:border-primary focus:ring-primary dark:focus:ring-primary rounded-md shadow-sm">
                </div>
                <div class="sm:w-[calc(100%/3)] flex flex-col gap-1">
                    <span class="text-zinc-600 dark:text-zinc-200 font-medium text-sm">Status do Planejamento</span>
                    <select name="stats_planning" id="stats_planning" class="initSelect">
                        <option value="true">Disponivel</option>
                        <option value="false">Indisponivel</option>
                    </select>
                </div>
                <div class="sm:w-[calc(100%/3)] flex flex-col gap-1">
                    <span class="text-zinc-600 dark:text-zinc-200 font-medium text-sm">Total de Items</span>
                    <select name="limit_planning" id="limit_planning" class="initSelect">
                        <option value="10">10</option>
                        <option value="60">60</option>
                        <option value="90">90</option>
                    </select>
                </div>
                <div class="sm:w-[calc(100%/3)] flex flex-col gap-1">
                    <span class="text-zinc-600 dark:text-zinc-200 font-medium text-sm">Planejamento no Dia</span>
                    <div class="add-more-placeholder"></div>
                </div>
            </div>

            <!-- Filtros - Submit -->
            <div class= "">
                <button
                    class="  px-3 py-2 bg-primary hover:bg-primary-hover transition duration-75  text-white text-center mt-5   rounded-lg"
                    type="submit" id="schedule_filter_submit"
                    value="filtrar_planejamentos">{{ __('Filter planning') }}</button>
            </div>

        </form>
        <div  style="display: none"  class="check_schedule bg-white dark:bg-zinc-800 p-6 rounded-lg   border border-solid border-zinc-200 dark:border-zinc-700 text-zinc-800 dark:text-zinc-100">
            <p class="info-schedule"></p>
            <div id="delete_schedule"></div>
            <div class="display" style="display: none">
                <table id="demo" style="width:100%">
                    <thead>
                        <tr> 
                            <th>Operador</th>
                            <th>Equipamento</th>
                            <th>Sinaleiro ou Ajudante</th>
                            <th>Colaborador Extra</th>
                            <th>Local de Trabalho</th>
                            <th>Responsavel</th>
                            <th>Data de Inicio</th>
                            <th>Data Final</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
        <div id="list_schedule"></div>
        <div class="paginacao"></div>


        <template id="select-day">
            <div class="group-select" data-inputs-id="1">
                <select name="day_planning" id="day_planning" class="initSelectDay">
                </select>
            </div>
        </template>
    </section>


    @section('script')

        <script src="/assets/js/admin/schedule/list_schedule.js"></script>
        <script src="/assets/libs/selectize/selectize.min.js"></script>
        <script type="text/javascript">
            // Inicia o Selectize pros Selects do Filtro
            $('.initSelect').selectize({});
            $('.initSelectDay').selectize({});
        </script>
    @endsection
</x-app-layout>
