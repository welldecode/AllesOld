<x-app-layout>

    @section('title', __('Planning'))
    @section('css_aditional')
        <link rel="stylesheet" href="/assets/libs/selectize/selectize.min.css">
    @endsection

    <article class="flex flex-col gap-y-14 mt-10 py-8 max-w-9xl mx-auto">
        <header class="flex flex-col gap-4   ">
            <a href="{{ LaravelLocalization::localizeUrl(route('dashboard.index')) }}"
                class="page-pretitle w-48 inline-flex items-center text-zinc-700 dark:text-zinc-200">
                <svg class="!me-2 rtl:-scale-x-100" width="8" height="10" viewBox="0 0 6 10" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z" />
                </svg>
                {{ __('Back to dashboard') }}
            </a>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                {{ __('Add Planning') }}
            </h1>
        </header>

        <div class="grid flex-1 auto-cols-fr gap-y-8">
            <form onsubmit="return templateSave(event {{ $template != null ? ',' . $template->id : null }});"
                id="schedule_forms" enctype="multipart/form-data" class="fi-form grid gap-y-6">
                <x-text-input id="name" class=" mt-1 w-full" type="text" name="template_id"
                    value="{{ $template != null ? $template->id : 'undefined' }}" style="display: none" />
                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(3, minmax(0, 1fr));"
                    class="sm:grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                    <div style="--col-span-default: span 1 / span 1; --col-span-lg: span 2 / span 2;"
                        class="col-[--col-span-default] lg:col-[--col-span-lg]">
                        <section
                            class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10">
                            <div class="p-6 ">
                                <div>
                                    <div class="user-input-group input-group control-group flex-col !py-5  relative  rounded-[--tblr-border-radius]"
                                        data-inputs-id="1">
                                        <div style="--col-span-default: 1 / -1; "
                                            class="flex flex-col gap-1 col-[--col-span-default]  mb-[20px]">
                                            <x-input-label for="client" :value="__('Cliente')" />
                                            <select name="client" id="client"
                                                class="selectCollaborator dark:bg-zinc-900">
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->name }}"
                                                        {{ $template != null && $template->client == $client->name ? 'selected' : '' }}>
                                                        {{ $client->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(3, minmax(0, 1fr));"
                                            class="  ">
                                            @if ($template != null)
                                                <?php $question_i = 1; ?>
                                                @foreach (json_decode($template->values) as $question)
                                                    <div class="group-schedule  border-t border-gray-200 dark:border-white/10 pt-10"
                                                        data-inputs-id="{{ $question_i }}">
                                                        <div
                                                            class="bg-zinc-50 relative dark:bg-zinc-900 p-8 ring-1 ring-zinc-950/5 rounded-md flex flex-col gap-7 w-full mb-10 pt-5">
                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg:  repeat(2, 1fr);"
                                                                class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                                                <div>
                                                                    <x-input-label for="equipaments"
                                                                        :value="__('Equipment')" />
                                                                    <select id="equipaments[]" name="equipaments[]"
                                                                        placeholder="Pesquise por um equipamento..."
                                                                        class="selectCollaborator equipaments dark:bg-zinc-900">
                                                                        @foreach ($hoists as $equipaments)
                                                                            <option value="{{ $equipaments->model }}"
                                                                                {{ $question->equipaments == $equipaments->model ? 'selected' : '' }}>
                                                                                {{ $equipaments->model }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                                </div>

                                                                <div>
                                                                    <x-input-label for="operator" :value="__('Operador')" />
                                                                    <select id="operator[]" name="operator[]"
                                                                        placeholder="Pesquise por um operador..."
                                                                        class="selectCollaborator operators dark:bg-zinc-900">
                                                                        @foreach ($operator as $operators)
                                                                            <option value="{{ $operators->name }}"
                                                                                {{ $question->operators == $operators->name ? 'selected' : '' }}>
                                                                                {{ $operators->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>

                                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                                </div>

                                                         
                                                            </div>
                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                                                            class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                                            <div>
                                                                <x-input-label for="signal_helper"
                                                                    :value="__('Sinaleiro ou Ajudante')" />
                                                                <select name="signal_helper[]" id="signal_helper[]"
                                                                    placeholder="Pesquise por um sinaleiro ou ajudante..."
                                                                    class="selectCollaborator signal_helper dark:bg-zinc-900">
                                                                    <option value="Nenhum" selected>
                                                                        Selecione um Sinaleiro ou Ajudante</option>
                                                                    @foreach ($signal_helper as $signal_helpers)
                                                                        <option value="{{ $signal_helpers->name }}"
                                                                            {{ $question->signal_helper == $signal_helpers->name ? 'selected' : '' }}>
                                                                            {{ $signal_helpers->name }} -
                                                                            {{ ucfirst($signal_helpers->role) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <x-input-label for="collaborators"
                                                                    :value="__('Colaborador Extra')" />
                                                                <select name="collaborators[]"
                                                                    id="collaborators[]"
                                                                    placeholder="Pesquise por um colaborador..."
                                                                    class="selectCollaborator dark:bg-zinc-900 collaborators_extras">
                                                                    <option value="Nenhum" selected>
                                                                        Selecione um Colaborador Extra</option>
                                                                    @foreach ($collaborators as $collaborator)
                                                                        <option value="{{ $collaborator->name }}"
                                                                            {{ $question->collaborators_extras == $collaborator->name ? 'selected' : '' }}>
                                                                            {{ $collaborator->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            
                                                        </div>

                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                                                                class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                                                <div>
                                                                    <x-input-label for="timer" :value="__('Data de inicio do vencimento')" />

                                                                    <x-text-input id="timer[]" name="timer[]"
                                                                        class="block mt-1 w-full timer"
                                                                        type="datetime-local"
                                                                         min="2023-12-31T22:20"
                                                                    max="2026-02-20T20:20"
                                                                        value="{{ $template != null ? $question->timer : null }}" />
                                                                    <span
                                                                        class="text-zinc-500 dark:text-zinc-400 mb-1 font-normal text-sm -mt-1">
                                                                        Isso não se aplica
                                                                        aos colaboradores.</span>
                                                                </div>
                                                                <div>
                                                                    <x-input-label for="timer_f" :value="__('Data final do vencimento')" />

                                                                    <x-text-input id="timer_f[]" name="timer_f[]"
                                                                        class="block mt-1 w-full timer_f"
                                                                        type="datetime-local"
                                                                         min="2023-12-31T22:20"
                                                                    max="2026-02-20T20:20"
                                                                        value="{{ $template != null ? $question->timer_f : null }}" />
                                                                    <span
                                                                        class="text-zinc-500 dark:text-zinc-400 mb-1 font-normal text-sm -mt-1">
                                                                        Isso não se aplica
                                                                        aos colaboradores.</span>
                                                                </div>
                                                            </div>
                                                         

                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                                                                class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                                                <div class=" ">
                                                                    <x-input-label for="responsible"
                                                                        :value="__('Responsavel pela Área')" />
                                                                    <select name="responsible[]" id="responsible[]"
                                                                        placeholder="Selecione um Responsavel pela Área..."
                                                                        class="responsible selectCollaborator dark:bg-zinc-900  ">

                                                                        <option value="Nenhum" selected>
                                                                            Selecione um responsavel pela área</option>
                                                                        @foreach ($responsible as $responsibles)
                                                                            <option
                                                                                {{ $question->responsible == $responsibles->name ? 'selected' : '' }}
                                                                                value="{{ $responsibles->name }}">
                                                                                {{ $responsibles->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                                <div class=" ">
                                                                    <x-input-label for="work_place"
                                                                        :value="__('Local de Trabalho')" />
                                                                    <select name="work_place[]" id="work_place[]"
                                                                        placeholder="Selecione o local de trabalho..."
                                                                        class="work_place selectCollaborator dark:bg-zinc-900  ">

                                                                        <option value="Nenhum" selected>
                                                                            Selecione um local de trabalho</option>
                                                                        @foreach ($locate_work as $locate_works)
                                                                            <option
                                                                                {{ $question->work_place == $locate_works->name ? 'selected' : '' }}
                                                                                value="{{ $locate_works->name }}">
                                                                                {{ $locate_works->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>


                                                            <button
                                                                class="remove-inputs-group inline-flex items-center justify-center !w-10 !h-10 p-2 rounded-md shadow-md ring-1 ring-zinc-300 dark:ring-zinc-700 absolute -top-4 -right-2 bg-white dark:bg-zinc-800 text-red-700 transition-all hover:text-white hover:bg-red-600"
                                                                type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path
                                                                        d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0">
                                                                    </path>
                                                                    <path d="M9 12l6 0"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="add-more-placeholder"></div>
                                                    <?php $question_i++; ?>
                                                @endforeach
                                            @else
                                                <div class="group-schedule  border-t border-gray-200 dark:border-white/10 pt-10"
                                                    data-inputs-id="1">
                                                    <div
                                                        class="bg-zinc-50 relative dark:bg-zinc-900 p-8 ring-1 ring-zinc-950/5 rounded-md flex flex-col gap-7 w-full mb-10 pt-5">
                                                        <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg:  repeat(2, 1fr);"
                                                            class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                                            <div>
                                                                <x-input-label for="equipaments" :value="__('Equipment')" />
                                                                <select id="equipaments[]" name="equipaments[]"
                                                                    placeholder="Pesquise por um equipamento..."
                                                                    class="selectCollaborator equipaments dark:bg-zinc-900">
                                                                    @foreach ($hoists as $hoist)
                                                                        <option value="{{ $hoist->model }}">
                                                                            {{ $hoist->model }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                            </div>

                                                            <div>
                                                                <x-input-label for="operator" :value="__('Operador')" />
                                                                <select id="operator[]" name="operator[]"
                                                                    placeholder="Pesquise por um operador..."
                                                                    class="selectCollaborator operators dark:bg-zinc-900">
                                                                    @foreach ($operator as $operators)
                                                                        <option value="{{ $operators->name }}">
                                                                            {{ $operators->name }} </option>
                                                                    @endforeach
                                                                </select>

                                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                            </div>

                                                      
                                                        </div>
                                                        
                                                        <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                                                            class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                                            <div>
                                                                <x-input-label for="signal_helper"
                                                                    :value="__('Sinaleiro ou Ajudante')" />
                                                                <select name="signal_helper[]" id="signal_helper[]"
                                                                    placeholder="Pesquise por um sinaleiro ou ajudante..."
                                                                    class="selectCollaborator signal_helper dark:bg-zinc-900">
                                                                    <option value="Nenhum" selected>
                                                                        Sinaleiro ou Ajudante</option>
                                                                    @foreach ($signal_helper as $signal_helpers)
                                                                        <option value="{{ $signal_helpers->name }}">
                                                                            {{ $signal_helpers->name }} -
                                                                            {{ ucfirst($signal_helpers->role) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <x-input-label for="collaborators"
                                                                    :value="__('Colaborador Extra')" />
                                                                <select name="collaborators[]" id="collaborators[]"
                                                                    placeholder="Pesquise por um colaborador..."
                                                                    class="selectCollaborator dark:bg-zinc-900 collaborators_extras">
                                                                    <option value="Nenhum" selected>
                                                                        Selecione um Colaborador Extra</option>
                                                                    @foreach ($collaborators as $collaborator)
                                                                        <option value="{{ $collaborator->name }}">
                                                                            {{ $collaborator->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div> 
                                                        </div>
                                                        <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                                                            class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                                            <div>
                                                                <x-input-label for="timer" :value="__('Data de inicio do vencimento')" />

                                                                <x-text-input id="timer"
                                                                    class="block mt-1 w-full timer"   min="2023-12-31T22:20"
                                                                    max="2026-02-20T20:20" type="datetime-local"
                                                                    name="timer[]" />
                                                                <span
                                                                    class="text-zinc-500 dark:text-zinc-400 mb-1 font-normal text-sm -mt-1">
                                                                    Isso não se aplica
                                                                    aos colaboradores.</span>
                                                            </div>
                                                            <div>
                                                                <x-input-label for="timer_f" :value="__('Data final do vencimento')" />

                                                                <x-text-input id="timer_f"
                                                                    class="block mt-1 w-full timer_f"   min="2023-12-31T22:20"
                                                                    max="2026-02-20T20:20"
                                                                    type="datetime-local" name="timer_f[]" /> <span
                                                                    class="text-zinc-500 dark:text-zinc-400 mb-1 font-normal text-sm -mt-1">
                                                                    Isso não se aplica
                                                                    aos colaboradores.</span>
                                                            </div>
                                                        </div> 
                                                        <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                                                            class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                                            <div class=" ">
                                                                <x-input-label for="responsible" :value="__('Responsavel pela Área')" />
                                                                <select name="responsible[]" id="responsible[]"
                                                                    placeholder="Selecione um Responsavel pela Área..."
                                                                    class="responsible selectCollaborator dark:bg-zinc-900  ">

                                                                    <option value="Nenhum" selected>
                                                                        Selecione um responsavel pela área</option>
                                                                    @foreach ($responsible as $responsibles)
                                                                        <option value="{{ $responsibles->name }}">
                                                                            {{ $responsibles->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class=" ">
                                                                <x-input-label for="work_place" :value="__('Local de Trabalho')" />
                                                                <select name="work_place[]" id="work_place[]"
                                                                    placeholder="Selecione o local de trabalho..."
                                                                    class="work_place selectCollaborator dark:bg-zinc-900  ">

                                                                    <option value="Nenhum" selected>
                                                                        Selecione um local de trabalho</option>
                                                                    @foreach ($locate_work as $locate_works)
                                                                        <option value="{{ $locate_works->name }}">
                                                                            {{ $locate_works->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <button
                                                            class="remove-inputs-group inline-flex items-center justify-center !w-10 !h-10 p-2 rounded-md shadow-md ring-1 ring-zinc-300 dark:ring-zinc-700 absolute -top-4 -right-2 bg-white dark:bg-zinc-800 text-red-700 transition-all hover:text-white hover:bg-red-600"
                                                            type="button" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0">
                                                                </path>
                                                                <path d="M9 12l6 0"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="add-more-placeholder"></div>
                                            @endif
                                        </div>

                                        <div type="button bg-zinc-100  dark:bg-zinc-700"
                                            class="add-more cursor-pointer inline-flex items-center px-3 py-2 gap-4 justify-center border-none rounded-lg !ms-auto bg-primary transition-all duration-300 hover:bg-primary-hover text-zinc-100 hover:shadow-lg">
                                            <span class="font-medium text-base ">Adicionar Grade</span> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 5l0 14"></path>
                                                <path d="M5 12l14 0"></path>
                                            </svg>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div style="--col-span-default: span 1 / span 1; --col-span-lg: span 1 / span 1;"
                        class="col-[--col-span-default] lg:col-[--col-span-lg]">
                        <div style="--cols-default: repeat(1, minmax(0, 1fr));"
                            class="grid grid-cols-[--cols-default] fi-fo-component-ctn gap-6">

                            <section
                                class="rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10 ">
                                <button id="schedule_form" type="submit"
                                    class="btn bg-primary hover:bg-primary-hover w-full py-3 px-5 text-white rounded-xl text-base transition-all duration-300 font-medium  shadow-sm">
                                    {{ __('Save') }}
                                </button>
                            </section>
                            <section
                                class="rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10 ">
                                <h1 class="text-zinc-700 dark:text-zinc-200 font-bold text-lg p-4 px-6">Status</h1>
                                <div class="border-t border-gray-200 dark:border-white/10">
                                    <div class="p-6 flex flex-col gap-4">
                                        <div class="">
                                            <div class="flex items-center gap-2">
                                                <label for="toggleB" class="flex items-center cursor-pointer">
                                                    <div class="relative">
                                                        <input type="checkbox" id="toggleB" name="visible"
                                                            {{ ($template != null ? $template->visible : '') == 'true' ? 'checked' : '' }}
                                                            checked class="sr-only">
                                                        <div class="dota block bg-zinc-400 w-12 h-7 rounded-full">
                                                        </div>
                                                        <div
                                                            class="dot absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="ml-3 text-base font-bold text-zinc-600 dark:text-zinc-100">
                                                        {{ __('Visible?') }}
                                                    </div>
                                                </label>
                                            </div>

                                            <span
                                                class="text-xs text-zinc-600 dark:text-zinc-300">{{ __('This user is hidden on all channels.') }}</span>
                                        </div>
                                        <div>
                                            <x-input-label for="availability" :value="__('Disponível Até:')" />
                                            <x-text-input id="availability" class="block mt-1 w-full" type="date"
                                                name="availability" :value="date('Y-m-d')" required autofocus
                                                autocomplete="availability" />
                                            <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </section> 
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </article>

    <template id="geral">
        <div class="group-schedule border-t border-gray-200 dark:border-white/10 pt-10" data-inputs-id="1">
            <div
                class="bg-zinc-50 relative dark:bg-zinc-900 p-8 ring-1 ring-zinc-950/5 rounded-md  flex flex-col  gap-7 w-full mb-10  pt-5">
                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg:  repeat(2, 1fr);"
                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                    <div>
                        <x-input-label for="equipaments" :value="__('Equipment')" />
                        <select id="equipaments" name="equipaments[]" placeholder="Pesquise por um equipamento..."
                            class="selectCollaborator equipaments dark:bg-zinc-900">
                            @foreach ($hoists as $hoist)
                                <option value="{{ $hoist->model }}">
                                    {{ $hoist->model }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="operator" :value="__('Operador')" />
                        <select id="operator" name="operator[]" placeholder="Pesquise por um operador..."
                            class="selectCollaborator operators dark:bg-zinc-900">
                            @foreach ($operator as $operators)
                                <option value="{{ $operators->name }}">
                                    {{ $operators->name }} </option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
 
                </div>
                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">

                <div>
                    <x-input-label for="signal_helper" :value="__('Sinaleiro ou Ajudante')" />
                    <select name="signal_helper[]" id="signal_helper[]"
                        placeholder="Pesquise por um sinaleiro ou ajudante..."
                        class="selectCollaborator signal_helper dark:bg-zinc-900">
                        <option value="Nenhum" selected>
                            Selecione um Sinaleiro ou Ajudante</option>
                        @foreach ($signal_helper as $signal_helpers)
                            <option value="{{ $signal_helpers->name }}">
                                {{ $signal_helpers->name }} -
                                {{ ucfirst($signal_helpers->role) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label for="collaborators" :value="__('Colaborador Extra')" />
                    <select name="collaborators[]" id="collaborators"
                        placeholder="Pesquise por um colaborador..."
                        class="selectCollaborator dark:bg-zinc-900 collaborators_extras">
                        <option value="Nenhum" selected>
                            Selecione um Colaborador Extra</option>
                        @foreach ($collaborators as $collaborator)
                            <option value="{{ $collaborator->name }}">
                                {{ $collaborator->name }}</option>
                        @endforeach
                    </select>
                </div>
            
            </div>
                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                    <div>
                        <x-input-label for="timer" :value="__('Data de inicio do vencimento')" />

                        <x-text-input id="timer" class="block mt-1 w-full timer"  min="2023-12-31T22:20"
                        max="2026-02-20T20:20" type="datetime-local"
                            name="timer[]" /> <span
                            class="text-zinc-500 dark:text-zinc-400 mb-1 font-normal text-sm -mt-1"> Isso não se aplica
                            aos colaboradores.</span>
                    </div>
                    <div>
                        <x-input-label for="timer_f" :value="__('Data final do vencimento')" />

                        <x-text-input id="timer_f" min="2023-12-31T22:20"
                        max="2026-02-20T20:20" class="block mt-1 w-full timer_f" type="datetime-local"
                            name="timer_f[]" /> <span
                            class="text-zinc-500 dark:text-zinc-400 mb-1 font-normal text-sm -mt-1"> Isso não se aplica
                            aos colaboradores.</span>
                    </div>
                </div>
             
                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2 , minmax(0, 1fr));"
                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                    <div class=" ">
                        <x-input-label for="responsible" :value="__('Responsavel pela Área')" />
                        <select name="responsible[]" id="responsible[]"
                            placeholder="Selecione um Responsavel pela Área..."
                            class="responsible selectCollaborator dark:bg-zinc-900  ">

                            <option value="Nenhum" selected>
                                Selecione um responsavel pela área</option>
                            @foreach ($responsible as $responsibles)
                                <option value="{{ $responsibles->name }}">
                                    {{ $responsibles->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class=" ">
                        <x-input-label for="work_place" :value="__('Local de Trabalho')" />
                        <select name="work_place[]" id="work_place[]" placeholder="Selecione o local de trabalho..."
                            class="work_place selectCollaborator dark:bg-zinc-900  ">

                            <option value="Nenhum" selected>
                                Selecione um local de trabalho</option>
                            @foreach ($locate_work as $locate_works)
                                <option value="{{ $locate_works->name }}">
                                    {{ $locate_works->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <button
                    class="remove-inputs-group inline-flex items-center justify-center !w-10 !h-10 p-2 rounded-md shadow-md ring-1 ring-zinc-300 dark:ring-zinc-700 absolute -top-4 -right-2 bg-white dark:bg-zinc-800 text-red-700 transition-all hover:text-white hover:bg-red-600"
                    type="button" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0">
                        </path>
                        <path d="M9 12l6 0"></path>
                    </svg>
                </button>
            </div>
        </div>
    </template>


    @section('script')
        <script src="/assets/libs/selectize/selectize.min.js"></script>
        <script src="/assets/js/admin/schedule/save_schedule.js"></script>
        <script>
            $(".selectCollaborator").selectize({
                maxItems: 1,
                delimiter: ",",
            });
        </script>
    @endsection

</x-app-layout>
