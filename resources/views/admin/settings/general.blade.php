<x-app-layout>

    @section('title', __('Dashboard'))

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 mt-10">
            <form id="settings_form" onsubmit="return generalSettingsSave();" enctype="multipart/form-data">
 
                
                    <section class="flex flex-col gap-y-14 py-8 max-w-8xl mx-auto"> 
                        <div class="grid flex-1 auto-cols-fr gap-y-8">
                            <form onsubmit="return templateSave($template->id);"
                                enctype="multipart/form-data" class="fi-form grid gap-y-6">
                          
                                    <div style="--col-span-default: span 1 / span 1; --col-span-lg: span 2 / span 2;"
                                        class="col-[--col-span-default] lg:col-[--col-span-lg] gap-5 flex flex-col">
                                        <section
                                            class="fi-section rounded-xl  flex flex-col xl:w-[43rem] justify-center m-auto gap-6"> 
                                            <h3 class="mb-[25px]  text-2xl font-bold text-zinc-700 dark:text-zinc-300">{{ __('Global Settings') }}
                                            </h3>
                                         
                                                <div 
                                                    class=" flex flex-col gap-5">
                                                    @foreach ($template as $item)
                                  
                                                    <div>
                                                        <x-input-label for="model" :value="__('Site Name')" />
                                                        <x-text-input id="model" class="block mt-1 w-full" type="text"
                                                            name="model"  value="{{ $item != null ? $item->site_name : null }}"
                                                            required />
                                                        <x-input-error :messages="$errors->get('model')" class="mt-2" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="model" :value="__('Site URL')" />
                                                        <x-text-input id="model" class="block mt-1 w-full" type="text"
                                                            name="model"  value="{{ $item != null ? $item->site_url : null }}"
                                                            required />
                                                        <x-input-error :messages="$errors->get('model')" class="mt-2" />
                                                    </div> 
                                                    <div>
                                                        <x-input-label for="model" :value="__('Site Email')" />
                                                        <x-text-input id="model" class="block mt-1 w-full" type="text"
                                                            name="model"  value="{{ $item != null ? $item->site_email : null }}"
                                                            required />
                                                        <x-input-error :messages="$errors->get('model')" class="mt-2" />
                                                    </div>
                                                    @endforeach 
                                                </div>
                 
                                                <section class="rounded-xl bg-white shadow-sm ring-1 ring-zinc-950/5 dark:bg-zinc-800 dark:ring-white/10">
                                                <button id="hoist_form" type="submit" class="bg-blue-500 w-full py-3 px-5 text-white rounded-xl text-base font-medium shadow-sm">
                                                    {{ __('Save') }}
                                                </button>
                                            </section> 
                                        </section>
                                    
                                    </div>
                                   
                            </form>
                        </div>
                    </section>                  
            </form>
        </div>
    </div>
    @section('script') 
        <script src="/assets/js/admin/settings.js"></script>
    @endsection

</x-app-layout>
