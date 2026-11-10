@extends('layouts.app')

@section('title', 'Profile | MetaScope')

@section('content')
<div class="mx-auto max-w-6xl space-y-6 p-6">
    <h1 class="font-display text-4xl font-bold">Profile</h1>

    <div class="grid gap-4 lg:grid-cols-3">
        <section class="flex flex-col items-center gap-3 rounded-2xl bg-white p-8 text-center shadow-sm">
            <span class="flex h-28 w-28 items-center justify-center rounded-full bg-[#F2A33A] font-display text-5xl font-bold">
                {{ strtoupper(substr($username, 0, 1)) }}
            </span>
            <h2 class="font-display text-2xl font-bold">{{ $username }}</h2>
            <span class="rounded-full bg-green-100 px-4 py-1 text-sm font-semibold text-green-800">Sesi aktif</span>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}"
               class="mt-2 rounded-lg bg-[#0B6E69] px-5 py-3 font-semibold text-white hover:bg-[#084C49]">
                Buka data hero
            </a>
        </section>

        <section class="rounded-2xl bg-white p-6 shadow-sm lg:col-span-2">
            <h2 class="mb-3 font-display text-xl font-bold">Informasi akun</h2>
            <dl class="divide-y divide-gray-200">
                <div class="flex flex-wrap justify-between gap-2 py-3">
                    <dt class="text-gray-500">Username</dt><dd class="font-semibold">{{ $username }}</dd>
                </div>
                <div class="flex flex-wrap justify-between gap-2 py-3">
                    <dt class="text-gray-500">Sumber data</dt><dd class="font-semibold">Request parameter dari form login</dd>
                </div>
                <div class="flex flex-wrap justify-between gap-2 py-3">
                    <dt class="text-gray-500">Hero dipantau</dt><dd class="font-semibold">{{ $totalHero }} hero</dd>
                </div>
            </dl>
        </section>
    </div>
</div>
@endsection
