@extends('layouts.app')

@section('title', 'Pengelolaan | MetaScope')

@section('content')
<div class="mx-auto max-w-6xl space-y-6 p-6">

    <div>
        <h1 class="font-display text-4xl font-bold">Pengelolaan Hero</h1>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto rounded-2xl bg-white shadow-sm">
        <table class="w-full min-w-[760px] text-left">
            <thead class="bg-[#12161F] text-xs uppercase tracking-wider text-white">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Hero</th>
                    <th class="px-6 py-4">Win Rate</th>
                    <th class="px-6 py-4">Pick Rate</th>
                    <th class="px-6 py-4">Ban Rate</th>
                    <th class="px-6 py-4">Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($heroes as $h)
                    <tr class="border-t border-gray-200">
                        <td class="px-6 py-4 font-semibold text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-lg font-bold">{{ $h['nama'] }}</td>
                        <td class="px-6 py-4">
                            <span class="font-display text-lg font-bold text-green-700">{{ number_format($h['win'], 2, ',', '.') }}%</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-display text-lg font-bold text-blue-700">{{ number_format($h['pick'], 2, ',', '.') }}%</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-display text-lg font-bold {{ $h['ban'] >= 40 ? 'text-purple-700' : 'text-amber-700' }}">
                                {{ number_format($h['ban'], 2, ',', '.') }}%
                            </span>
                        </td>
                        <td class="px-6 py-4"><x-badge-role :role="$h['role']" /></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">Data hero belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
