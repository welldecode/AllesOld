<x-app-layout>

    @section('css_aditional')
        <link rel="stylesheet" href="/assets/libs/dropzone/dist/dropzone.css">
    @endsection

    <section class="flex flex-col gap-y-14 py-8 max-w-8xl mx-auto">
        <header class="flex flex-col gap-4">
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
                {{ __('Add Equipment') }}
            </h1>
        </header>

        <div class="grid flex-1 auto-cols-fr gap-y-8">
            <form onsubmit="return templateSave(event {{ $template != null ? ',' . $template->id : null }});"
                enctype="multipart/form-data" class="fi-form grid gap-y-6">
                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(3, minmax(0, 1fr));"
                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                    <div style="--col-span-default: span 1 / span 1; --col-span-lg: span 2 / span 2;"
                        class="col-[--col-span-default] lg:col-[--col-span-lg] gap-5 flex flex-col">
                        <section
                            class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10">
                            <div class="p-6 ">
                                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr));"
                                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                    <div>
                                        <x-input-label for="model" :value="__('Model')" />
                                        <x-text-input id="model" class="block mt-1 w-full" type="text"
                                            name="model" value="{{ $template != null ? $template->model : null }}"
                                            required />
                                        <x-input-error :messages="$errors->get('model')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div>
                                        <x-input-label for="plate" :value="__('Plate')" />
                                        <x-text-input id="plate" class="block mt-1 w-full" type="text"
                                            name="plate" value="{{ $template != null ? $template->plate : null }}"
                                            required />
                                        <x-input-error :messages="$errors->get('plate')" class="mt-2" />
                                    </div>

                                    <div class="">
                                        <x-input-label for="type" :value="__('Tipo de Equipamento')" />
                                        <x-input-select id="type" name="type" class="block mt-1 w-full">
                                            <x-slot name="content"> 
                                                <option value="articulado" {{$template!=null && $template->type == 'articulado' ? 'selected' : ''}}>Guindastes Articulado</option>
                                                <option value="telescopico" {{$template!=null && $template->type == 'telescopico' ? 'selected' : ''}}>Guindastes Telescópico</option> 
                                                <option value="empilhadeira" {{$template!=null && $template->type == 'empilhadeira' ? 'selected' : ''}}>Empilhadeira</option>
                                                <option value="plataforma" {{$template!=null && $template->type == 'plataforma' ? 'selected' : ''}}>Plataforma</option>
                                            </x-slot>
                                        </x-input-select>
                                    </div>
                                    <div class="">
                                        <x-input-label for="frotas" :value="__('Numero de Frota')" />
                                        <x-text-input id="frotas" class="block mt-1 w-full" type="number"  
                                            name="frotas" value="{{ $template != null ? $template->frotas : null }}"
                                            required />
                                        <x-input-error :messages="$errors->get('frotas')" class="mt-2" />
                                    </div>
                                    
                                </div>

                            </div>

                        </section>
                        <section
                            class="rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10 ">
                            <h1 class="text-zinc-700 dark:text-zinc-200 font-bold text-lg p-4 px-6">
                                {{ __('Additional') }}</h1>
                            <div class="border-t border-gray-200 dark:border-white/10">
                                <div class="p-6">
                                    <div
                                        class="dz-message dropzone text-slate-600 dark:text-zinc-200 bg-slate-100 dark:bg-zinc-900 border-dashed border-slate-300 dark:border-zinc-500 border-2">
                                    </div>
                                    <br />

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
                                                        <input type="checkbox" id="toggleB" class="sr-only"  
                                                        {{ ($template != null ? $template->visible : '') == 'true' ? 'checked' : '' }} checked> 
                                                        <div class="dota block bg-zinc-400 w-12 h-7 rounded-full"></div>
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
                                                class="text-xs text-zinc-600 dark:text-zinc-300">{{ __('This hoists is hidden on all channels.') }}</span>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <section
                            class="rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10 ">
                            <button id="hoist_form" type="submit"
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
    @section('script')
        <script src="/assets/libs/dropzone/dist/dropzone-min.js"></script>
        <script src="/assets/js/admin/hoists.js"></script>
    @endsection

</x-app-layout>
