<x-app-layout>
    @section('title', __('Documents'))
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
                {{ __('Documents') }}
            </h1>

            <a href="{{ route('dashboard.document.addOrUpdate') }}" class="relative inline-flex w-50"> <span
                    class="font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm  shadow-sm bg-primary text-white hover:bg-primary focus-visible:ring-primary/50 dark:bg-primary dark:hover:bg-blue-400 dark:focus-visible:ring-blue-400/50">{{ __('Add Document') }}</span></a>
        </header>
    </section>
    <section class=" max-w-8xl mx-auto  mt-10">
        <div class="flex  gap-10 flex-wrap">
            @forelse($list as $entry)
                <article
                    class="relative w-[calc(100%/2_-_2rem)] bg-white dark:bg-zinc-800 p-6 rounded-lg shadow-lg transition-all hover:-translate-y-0.5 hover:shadow-xl ">
                    <a href="{{ route('dashboard.document.addOrUpdate', $entry->id) }}" class="flex flex-col gap-3">
                        <div class="absolute right-5 top-5">
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
                        </div>
                        <div class="flex flex-col gap-4 ">
                            <h2 class="text-xl font-bold text-zinc-600 dark:text-zinc-100">{{ $entry->name }}</h2>
                            
                            <div class="flex flex-col gap-1 ">
                                <div class="font-normal text-sm text-zinc-500 dark:text-zinc-100 flex gap-1  ">
                                  Tipo de Documento: <div class="font-semibold"> {{ ucfirst($entry->type_document) }}</div>
                                </div>
                                <div class="font-normal text-sm text-zinc-500 dark:text-zinc-100 flex gap-1  ">
                                    Vencimento: <div class="font-semibold"> {{ ucfirst($entry->expiration) }}</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="flex w-full justify-between gap-2 ">
                            <div class="font-normal text-sm text-zinc-500 dark:text-zinc-100 flex flex-col">
                                Colaborador:
                                <span class="font-medium  text-green-500 dark:text-green-500">
                                    {{ $entry->collaborator }}</span>
                            </div>
                            @foreach (json_decode($entry->vinculation) as $id_key => $types)
                                @if ($types > 1)
                                    <div class="font-normal text-sm text-zinc-500 dark:text-zinc-100 flex flex-col ">

                                        Vinculado a {{ $id_key }}:
                                        <div class="font-semibold text-red-500 dark:text-red-500 ">
                                            {{ ucfirst($types) }}
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </a>
                </article>
            @empty
                @include('/admin/document/document_empty')
            @endforelse
        </div>

    </section>
    @section('script')
        <script src="/assets/js/admin/document.js"></script>
    @endsection
</x-app-layout>
