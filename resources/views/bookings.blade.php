<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Bookings') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @php
                $gradients = [
                    'bg-gradient-to-br from-indigo-500 to-purple-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-sky-500 to-cyan-600',
                ];
            @endphp

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($bookings as $booking)
                    <article class="group flex h-full flex-col overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-100 transition duration-300 hover:-translate-y-0.5 hover:shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">

                        <div class="relative {{ $gradients[$loop->index % count($gradients)] }} px-5 py-6">
                            <svg class="h-16 w-16 fill-white/30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 3l9 8h-3v9h-5v-6h-2v6H6v-9H3l9-8z" />
                            </svg>

                            <span class="absolute end-4 top-4 inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-gray-900 shadow-sm backdrop-blur">
                                {{ \Illuminate\Support\Carbon::parse($booking->booking_date)->format('j M Y') }}
                            </span>
                        </div>

                        <div class="flex flex-1 flex-col p-5">
                            <h3 class="font-semibold text-base text-gray-900">
                                {{ $booking->title }}
                            </h3>

                            <p class="mt-1 flex items-center gap-1.5 text-sm text-gray-500">
                                <svg class="h-4 w-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                {{ $booking->location }}
                            </p>

                            <p class="mt-3 flex items-center gap-1.5 text-sm text-gray-500">
                                <svg class="h-4 w-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                {{ __('Up to :count guests', ['count' => $booking->people_count]) }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>