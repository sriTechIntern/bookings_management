<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Find your next stay') }}
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            {{ $properties->count() }} {{ __('properties available') }}
        </p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <form method="GET" action="{{ route('properties.filter') }}" class="bg-white shadow-sm sm:rounded-lg p-4 sm:p-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-12 lg:items-end">

                   

                    <div class="lg:col-span-3">
                        <x-input-label for="location" :value="__('Location')" />

                        <select id="location" name="location"
                                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">{{ __('All locations') }}</option>
                            @foreach ($locations ?? [] as $locationOption)
                                <option value="{{ $locationOption }}" @selected(request('location') === $locationOption)>
                                    {{ $locationOption }}
                                </option>
                            @endforeach
                        </select>
                    </div>

            

                    <div class="lg:col-span-1">
                        <x-input-label for="guests" :value="__('Guests')" />

                        <select id="guests" name="guests"
                                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">{{ __('Any') }}</option>
                            @for ($guestCount = 1; $guestCount <= 8; $guestCount++)
                                <option value="{{ $guestCount }}" @selected((int) request('guests') === $guestCount)>
                                    {{ $guestCount }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="lg:col-span-2 flex items-center gap-3">
                        <x-primary-button class="w-full justify-center">
                            {{ __('Search') }}
                        </x-primary-button>

                        @if (request()->hasAny(['q', 'location', 'check_in', 'guests']))
                            <a href="{{ route('dashboard') }}"
                               class="text-sm text-gray-500 underline hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded-md">
                                {{ __('Clear') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>

            @php
                $gradients = [
                    'bg-gradient-to-br from-indigo-500 to-purple-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-sky-500 to-cyan-600',
                ];
            @endphp

            <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($properties as $property)
                    <div>
                        <article class="group flex h-full flex-col overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-100 transition duration-300 hover:-translate-y-0.5 hover:shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">

                            <div class="relative aspect-video {{ $gradients[$loop->index % count($gradients)] }}">
                                <svg class="h-16 w-16 fill-white/30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 3l9 8h-3v9h-5v-6h-2v6H6v-9H3l9-8z" />
                                </svg>

                                <span class="absolute end-3 top-3 inline-flex items-center gap-1 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-gray-900 shadow-sm backdrop-blur">
                                    ₹{{ number_format($property->price) }}
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

                                <div class="mt-auto pt-5">
                                    <p class="flex items-center gap-1.5 text-sm text-gray-500">
                                        <svg class="h-4 w-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                        </svg>
                                        {{ __('Up to :count guests', ['count' => $property->max_people_allowed]) }}
                                    </p>
    
                                    @auth
                                    <button type="button"
                                            data-modal-open="book-property-{{ $property->id }}"
                                            class="mt-4 inline-flex w-full items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Book now') }}
                                    </button>
                                    @endauth
                                </div>
                            </div>
                        </article>

                        <x-modal name="book-property-{{ $property->id }}" maxWidth="lg">
                            <form method="POST" action="{{ route('booking') }}" class="p-6">
                                @csrf

                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h2 class="text-lg font-semibold text-gray-900">
                                            {{ $property->title }}
                                        </h2>
                                        <p class="mt-0.5 text-sm text-gray-500">
                                            {{ $property->location }}
                                        </p>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-lg font-semibold text-gray-900">
                                            ₹{{ number_format($property->price) }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ __('per night') }}</p>
                                    </div>
                                </div>

                                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>
                                        <x-input-label for="booking_date_{{ $property->id }}" :value="__('Check in date')" />
                                        <x-text-input id="booking_date_{{ $property->id }}"
                                                       name="booking_date"
                                                       type="date"
                                                       class="mt-1 block w-full"
                                                       value="{{ old('booking_date') }}"
                                                       min="{{ date('Y-m-d') }}" />
                                    </div>

                                    <div>
                                        <x-input-label for="people_count_{{ $property->id }}" :value="__('Number of people')" />
                                        <x-text-input id="people_count_{{ $property->id }}"
                                                       name="people_count"
                                                       type="number"
                                                       inputmode="numeric"
                                                       step="1"
                                                       min="1"
                                                       max="{{ $property->max_people_allowed }}"
                                                       class="mt-1 block w-full"
                                                       value="{{ old('people_count', 1) }}" />
                                    </div>

                                    <input type="hidden" name="property_id" value="{{ $property->id }}" />
                                </div>

                                <div class="mt-6 flex items-center justify-end gap-3">
                                    <div class="message">
                                    @if ($modal_message!==null)
                                        {{ __($modal_message) }}
                                    @endif
                                    </div>
                                    
                                    <x-secondary-button data-modal-close>
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                    
                                    <x-primary-button data-modal-submit>
                                        {{ __('Submit') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    @if ($modal_open && $modal_property_id)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalName = 'book-property-{{ $modal_property_id }}';

            const button = document.querySelector(
                `[data-modal-open="${modalName}"]`
            );

            if (button) {
                button.click();
            }
        });
    </script>
@endif
</x-app-layout>
