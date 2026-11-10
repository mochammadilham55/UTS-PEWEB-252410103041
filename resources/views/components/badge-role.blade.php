@props(['role'])

@php
    $warna = match ($role) {
        'Fighter'  => 'bg-orange-100 text-orange-800',
        'Tank'     => 'bg-blue-100 text-blue-800',
        'Support'  => 'bg-green-100 text-green-800',
        'Mage'     => 'bg-purple-100 text-purple-800',
        'Marksman' => 'bg-yellow-100 text-yellow-800',
    };
@endphp

<span class="inline-block rounded-full px-3 py-1 text-sm font-semibold {{ $warna }}">{{ $role }}</span>
