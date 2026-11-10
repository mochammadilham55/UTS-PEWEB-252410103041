<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.head')
    <title>@yield('title', 'MetaScope MLBB')</title>
</head>
<body class="min-h-screen flex flex-col bg-[#F5F2EB] text-[#12161F]">

    @hasSection('tanpa_navbar')
    @else
        <x-navbar :username="$username ?? 'Tamu'" />
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    @hasSection('tanpa_navbar')
    @else
        <x-footer />
    @endif

</body>
</html>
