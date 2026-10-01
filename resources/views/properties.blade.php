<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Properties') }}
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            {{ trans_choice('{1} :count property|[2,*] :count properties', $properties->count(), ['count' => $properties->count()]) }}
        </p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if ($properties->isEmpty())
                <div class="rounded-lg border border-dashed border-gray-300 bg-white px-6 py-16 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    <h3 class="mt-4 text-sm font-semibold text-gray-900">
                        {{ __('No properties yet') }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ __('Properties you add will show up here.') }}
                    </p>
                </div>
            @else
                @php
                    $gradients = [
                        'bg-gradient-to-br from-indigo-500 to-purple-600',
                        'bg-gradient-to-br from-emerald-500 to-teal-600',
                        'bg-gradient-to-br from-amber-500 to-orange-600',
                        'bg-gradient-to-br from-sky-500 to-cyan-600',
                    ];
                @endphp

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($properties as $property)
                        <article class="group flex h-full flex-col overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-100 transition duration-300 hover:-translate-y-0.5 hover:shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">

                            <div class="relative aspect-video {{ $gradients[$loop->index % count($gradients)] }}">
                                <svg class="h-16 w-16 fill-white/30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 3l9 8h-3v9h-5v-6h-2v6H6v-9H3l9-8z" />
                                </svg>

                                <span class="absolute end-3 top-3 inline-flex items-center gap-1 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-gray-900 shadow-sm backdrop-blur">
                                    &#8377;{{ number_format($property->price) }}
                                    <span class="font-normal text-gray-500">{{ __('/ night') }}</span>
                                </span>
                            </div>

                            <div class="flex flex-1 flex-col p-5">
                                <h3 class="font-semibold text-base text-gray-900">
                                    {{ $property->title }}
                                </h3>

                                <p class="mt-1 flex items-center gap-1.5 text-sm text-gray-500">
                                    <svg class="h-4 w-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    {{ $property->location }}
                                </p>

                                <p class="mt-3 text-sm leading-relaxed text-gray-600 line-clamp-2">
                                    {{ $property->description }}
                                </p>

                                <div class="mt-auto pt-5 flex items-center justify-between border-t border-gray-100">
                                    <p class="flex items-center gap-1.5 text-sm text-gray-500">
                                        <svg class="h-4 w-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                        {{ __('Up to :count guests', ['count' => $property->max_people_allowed]) }}
                                    </p>

                                    <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600">
                                        {{ $property->created_at?->format('M Y') }}
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>