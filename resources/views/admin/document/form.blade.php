<x-app-layout>

    @section('css_aditional')
        <link rel="stylesheet" href="/assets/libs/dropzone/dist/dropzone.css">
    @endsection

    <section class="flex flex-col gap-y-14 mt-10 py-8 max-w-8xl mx-auto">
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
                {{ __('Add Document') }}
            </h1>
        </header>

        <div class="grid flex-1 auto-cols-fr gap-y-8">
            <form onsubmit="return templateSave(event {{ $template != null ? ',' . $template->id : null }});"
                enctype="multipart/form-data" class="fi-form grid gap-y-6">
                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(3, minmax(0, 1fr));"
                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                    <div style="--col-span-default: span 1 / span 1; --col-span-lg: span 2 / span 2;"
                        class="col-[--col-span-default] lg:col-[--col-span-lg]">
                        <section
                            class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10">
                            <div class="p-6 ">
                                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr));"
                                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">

                                    <div style="--col-span-default: 1 / -1; "
                                        class=" flex flex-col gap-1 col-[--col-span-default] ">
                                        <x-input-label for="name_document" :value="__('Nome do Documento')" />
                                        <x-text-input id="name_document" class="block w-full" type="text"
                                            name="name_document"
                                            value="{{ $template != null ? $template->name : null }}" required />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <div style="--col-span-default: 1 / -1; "
                                        class=" flex flex-col gap-1 col-[--col-span-default] ">
                                        <x-input-label for="type_document" :value="__('Tipo de Documento')" />
                                        <x-input-select id="type_document" name="type_document"
                                            class="block w-full">
                                            <x-slot name="content">
                                                @foreach ($document_type as $type)
                                                    <option value="{{ lcfirst($type->name) }}"
                                                        {{ $template != null && $template->type_document == lcfirst($type->name) ? 'selected' : '' }}>
                                                        {{ $type->name }} </option>
                                                @endforeach
                                            </x-slot>
                                        </x-input-select>
                                    </div>

                                    <div>
                                        <x-input-label for="collaborators" :value="__('Collaborator')" />
                                        <x-input-select id="collaborators" name="collaborators"
                                            class="block w-full">
                                            <x-slot name="content">
                                                @foreach ($collaborators as $collaborator)
                                                    <option value="{{ $collaborator->name }}"
                                                        {{ $template != null && $template->collaborator == $collaborator->name ? 'selected' : '' }}>
                                                        {{ $collaborator->name }}
                                                    </option>
                                                @endforeach
                                            </x-slot>
                                        </x-input-select>
                                    </div>
                                    <div>
                                        <x-input-label for="expiration" :value="__('Data de Vencimento')" />
                                        <x-text-input id="expiration" class="block w-full" type="date"
                                            name="expiration"
                                            value="{{ $template != null ? $template->expiration : null }}" required />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div style="--col-span-default: 1 / -1; "
                                        class=" flex flex-col gap-1 col-[--col-span-default] ">
                                        <x-input-label for="slug" :value="__('Vinculação:')" />
                                        <div class="flex gap-5 ">
                                            @if ($template != null) 
                                                @foreach (json_decode($template->vinculation) as $id_key => $types)
                                                <div class="flex">
                                                    <div class="flex items-center h-5">
                                                        <input id="{{strtolower($id_key)}}-checkbox"  {{ $template != null && strtolower($id_key) == strtolower($id_key) ? 'selected' : '' }}
                                                            aria-describedby="{{strtolower($id_key)}}-checkbox-text" type="radio"
                                                            value="{{strtolower($id_key)}}" name="radios"
                                                            class="names w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    </div>   
                                                    <div class="ms-2 text-sm">
                                                        <label for="{{strtolower($id_key)}}-checkbox"
                                                            class="  font-medium text-gray-900 dark:text-gray-300">{{ ucfirst($id_key) }}</label>
                                                        <p id="{{strtolower($id_key)}}-checkbox-text"
                                                            class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                                            Clique para abrir a lista de operadores.</p>
                                                    </div>
                                                </div>
                                                    
                                                @endforeach
                                         
                                            @else
                                                <div class="flex">
                                                    <div class="flex items-center h-5">
                                                        <input id="operator-checkbox"
                                                            aria-describedby="operator-checkbox-text" type="radio"
                                                            value="operator" name="radios"
                                                            class="names w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    </div>
                                                    <div class="ms-2 text-sm">
                                                        <label for="operator-checkbox"
                                                            class="  font-medium text-gray-900 dark:text-gray-300">Operador</label>
                                                        <p id="operator-checkbox-text"
                                                            class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                                            Clique para abrir a lista de operadores.</p>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex items-center h-5">
                                                        <input id="equipament-checkbox"
                                                            aria-describedby="equipament-checkbox-text" type="radio"
                                                            value="equipament" name="radios"
                                                            class="names namesw-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    </div>
                                                    <div class="ms-2 text-sm">
                                                        <label for="equipament-checkbox"
                                                            class="font-medium text-gray-900 dark:text-gray-300">Tipo
                                                            de
                                                            Equipamentos</label>
                                                        <p id="equipament-checkbox-text"
                                                            class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                                            Clique para abrir a lista de equipamentos</p>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <Br />
                                <div class="add-more-placeholder"></div>
                                <Br />
                                <Br />
                                <div style="--col-span-default: 1 / -1;"
                                    class="flex flex-col gap-1 col-[--col-span-default]  mb-[20px]">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea class="form-control tinymce" id="description" rows="25">{{ $template != null ? $template->description : null }}</textarea>
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
                                <h1 class="text-zinc-700 dark:text-zinc-200 font-bold text-lg p-4 px-6">Status</h1>
                                <div class="border-t border-gray-200 dark:border-white/10">
                                    <div class="p-6 flex flex-col gap-4">
                                        <div class="">
                                            <div class="flex items-center gap-2">
                                                <label for="toggleB" class="flex items-center cursor-pointer">
                                                    <div class="relative">
                                                        <input type="checkbox" id="toggleB"
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
                                                class="text-xs text-zinc-600 dark:text-zinc-300">{{ __('This document is hidden on all channels.') }}</span>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <section
                            class="rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10 ">
                            <button id="document_form" type="submit"
                                class="btn bg-primary w-full py-3 px-5 text-white rounded-xl text-base font-medium  shadow-sm">
                                {{ __('Save') }}
                            </button>
                        </section>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <template id="operador">
        <div class="user-input-group">
            <div style="--col-span-default: 1 / -1; " class=" flex flex-col gap-1 col-[--col-span-default] w-full">
                <x-input-label for="vinculation" :value="__('Operator')" />
                <x-input-select id="vinculation" name="vinculation" class="item_one">
                    <x-slot name="content">
                        @foreach ($operator as $operators)
                            <option value="{{ $operators->name }}">{{ $operators->name }}
                            </option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <button
                class="remove-inputs-group inline-flex items-center justify-center !w-6 !h-6 p-0 border-none rounded-md absolute right-0  -bottom-3 bg-[transparent] text-red-700 transition-all hover:text-white hover:bg-red-600"
                type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </button>
        </div>
    </template>

    <template id="equipamento">
        <div class="user-input-group">
            <div style="--col-span-default: 1 / -1; " class=" flex flex-col gap-1 col-[--col-span-default] ">
                <x-input-label for="vinculation" :value="__('Equipments')" />
                <x-input-select id="vinculation" name="vinculation" class="item_two">
                    <x-slot name="content">
                        @foreach ($equipament as $equipaments)
                            <option value="{{ lcfirst($equipaments->name) }}"
                                {{ $template != null && lcfirst($template->name) == lcfirst($equipaments->name) ? 'selected' : '' }}>
                                {{ $equipaments->name }} </option>
                        @endforeach
                    </x-slot>
                </x-input-select>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <button
                class="remove-inputs-group inline-flex items-center justify-center !w-6 !h-6 p-0 border-none rounded-md absolute right-0  -bottom-3 bg-[transparent] text-red-700 transition-all hover:text-white hover:bg-red-600"
                type="button" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </button>
        </div>
    </template>

    @section('script')
        <script src="/assets/libs/dropzone/dist/dropzone-min.js"></script>
        <script src="/assets/js/admin/document.js"></script>
    @endsection

</x-app-layout>
