@extends('layouts.app')

@section('title', 'Dashboard | MetaScope')

@section('content')
<div class="mx-auto max-w-6xl space-y-8 p-6">

    <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="font-display text-4xl font-bold">Halo, {{ $username }}</h1>
        </div>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="rounded-lg bg-[#0B6E69] px-5 py-3 font-semibold text-white hover:bg-[#084C49]">
            Lihat semua hero
        </a>
    </div>


    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($stats as $s)
            <div class="rounded-2xl bg-white p-5 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ $s['label'] }}</p>
                <p class="font-display text-3xl font-bold {{ $s['warna'] }}">{{ $s['nilai'] }}</p>
                <p class="text-sm text-gray-500">{{ $s['catatan'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid gap-4 lg:grid-cols-3">
        {{-- Top win rate --}}
        <section class="space-y-4 rounded-2xl bg-white p-6 shadow-sm lg:col-span-2">
            <h2 class="font-display text-xl font-bold">Win rate tertinggi</h2>
            @foreach ($top as $h)
                <div class="flex items-center gap-4">
                    <span class="w-6 font-bold text-gray-500">{{ $loop->iteration }}</span>
                    <span class="w-28 font-semibold">{{ $h['nama'] }}</span>
                    <div class="h-3 flex-1 overflow-hidden rounded-full bg-gray-200">
                        <div class="h-full rounded-full bg-green-700" style="width: {{ $h['bar'] }}%"></div>
                    </div>
                    <span class="w-16 text-right font-semibold text-green-700">
                        {{ number_format($h['win'], 2, ',', '.') }}%
                    </span>
                </div>
            @endforeach
        </section>

        <div class="space-y-4">
            {{-- Sering di-ban --}}
            <section class="space-y-3 rounded-2xl bg-white p-6 shadow-sm">
                <h2 class="font-display text-xl font-bold">Sering di-ban</h2>
                @forelse ($banned as $b)
                    <div class="flex justify-between rounded-lg bg-purple-50 px-4 py-3">
                        <span class="font-semibold">{{ $b['nama'] }}</span>
                        <span class="font-bold text-purple-800">{{ number_format($b['ban'], 2, ',', '.') }}%</span>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada hero yang sering di-ban.</p>
                @endforelse
            </section>

            {{-- Sebaran role --}}
            <section class="space-y-3 rounded-2xl bg-white p-6 shadow-sm">
                <h2 class="font-display text-xl font-bold">Sebaran role</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach ($roles as $nama => $jumlah)
                        <x-badge-role :role="$nama" />
                        <span class="self-center text-sm text-gray-600">× {{ $jumlah }}</span>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
