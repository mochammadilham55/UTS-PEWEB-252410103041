@props(['username' => 'Tamu'])

@php
    $menu = [
        ['label' => 'Dashboard',   'route' => 'dashboard'],
        ['label' => 'Profile',     'route' => 'profile'],
        ['label' => 'Pengelolaan', 'route' => 'pengelolaan'],
    ];
@endphp

<header class="bg-[#12161F] text-white">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center gap-3 px-6 py-3">
        <a href="{{ route('dashboard', ['username' => $username]) }}"
           class="font-display text-xl font-bold">MetaScope</a>

        <nav class="flex flex-1 flex-wrap gap-1">
            @foreach ($menu as $item)
                <a href="{{ route($item['route'], ['username' => $username]) }}"
                   class="rounded-lg px-4 py-2 text-sm font-medium
                          {{ request()->routeIs($item['route']) ? 'bg-[#0B6E69] text-white' : 'text-gray-300 hover:bg-[#232B3A] hover:text-white' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-3">
        </div>
    </div>
</header>
