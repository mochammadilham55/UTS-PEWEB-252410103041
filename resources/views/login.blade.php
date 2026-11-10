@extends('layouts.app')

@section('title', 'Login | MetaScope')
@section('tanpa_navbar', 'ya')

@section('content')
    <div class="flex min-h-screen items-center justify-center p-6">
        <form action="{{ route('login.proses') }}" method="POST"
              class="w-full max-w-sm space-y-4 rounded-2xl bg-white p-8 shadow">
            @csrf
            <h1 class="font-display text-3xl font-bold">Masuk</h1>
            <input type="text" name="username" placeholder="Username" required
                   class="h-12 w-full rounded-lg border border-gray-400 px-3">
            <input type="password" name="password" placeholder="Password" required
                   class="h-12 w-full rounded-lg border border-gray-400 px-3">
            <button type="submit"
                    class="h-12 w-full rounded-lg bg-[#0B6E69] font-semibold text-white hover:bg-[#084C49]">
                Masuk ke Dashboard
            </button>
        </form>
    </div>
@endsection
