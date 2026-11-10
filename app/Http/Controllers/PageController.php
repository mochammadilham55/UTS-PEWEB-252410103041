<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // ---------- DATA ----------
    private function getHeroes(): array
    {
        return [
            ['nama' => 'Masha',          'win' => 61.46, 'pick' => 0.55, 'ban' => 42.66, 'role' => 'Fighter'],
            ['nama' => 'Marcel',         'win' => 57.39, 'pick' => 0.30, 'ban' => 41.60, 'role' => 'Support'],
            ['nama' => 'Argus',          'win' => 56.65, 'pick' => 0.57, 'ban' => 1.00,  'role' => 'Fighter'],
            ['nama' => 'Khufra',         'win' => 54.59, 'pick' => 0.34, 'ban' => 2.01,  'role' => 'Tank'],
            ['nama' => 'Rafaela',        'win' => 54.48, 'pick' => 0.84, 'ban' => 12.30, 'role' => 'Support'],
            ['nama' => 'Valir',          'win' => 54.46, 'pick' => 1.28, 'ban' => 3.99,  'role' => 'Mage'],
            ['nama' => 'Gloo',           'win' => 54.40, 'pick' => 0.83, 'ban' => 43.40, 'role' => 'Tank'],
            ['nama' => 'Popol and Kupa', 'win' => 54.30, 'pick' => 0.43, 'ban' => 0.36,  'role' => 'Marksman'],
        ];
    }

    private function beriLabel(array $hero): array
    {
        $hero['win_label']  = $hero['win'] >= 55 ? 'Tinggi' : 'Stabil';
        $hero['pick_label'] = $hero['pick'] < 1 ? 'Jarang' : 'Umum';
        $hero['ban_label']  = $hero['ban'] >= 40 ? 'Sering di-ban' : 'Normal';
        return $hero;
    }

    // ---------- LOGIN ----------
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        return redirect('/dashboard?username=' . urlencode($request->username));
    }

    // ---------- DASHBOARD ----------
    public function dashboard(Request $request)
    {
        $heroes    = collect($this->getHeroes())->sortByDesc('win')->values();
        $terbaik   = $heroes->first();
        $palingBan = $heroes->sortByDesc('ban')->first();
        $maxWin    = $terbaik['win'];

        $top = $heroes->take(5)->map(function ($h) use ($maxWin) {
            $h['bar'] = round(($h['win'] - 40) / ($maxWin - 40) * 100);
            return $h;
        });

        $stats = [
            ['label' => 'Win rate tertinggi',   'nilai' => number_format($terbaik['win'], 2, ',', '.') . '%',   'catatan' => $terbaik['nama'],   'warna' => 'text-green-700'],
            ['label' => 'Paling sering di-ban', 'nilai' => number_format($palingBan['ban'], 2, ',', '.') . '%', 'catatan' => $palingBan['nama'], 'warna' => 'text-purple-700'],
            ['label' => 'Total hero',           'nilai' => $heroes->count(),                                    'catatan' => 'Hero dipantau',    'warna' => 'text-gray-900'],
            ['label' => 'Rata-rata win rate',   'nilai' => number_format($heroes->avg('win'), 2, ',', '.') . '%', 'catatan' => 'Seluruh hero',   'warna' => 'text-blue-700'],
        ];

        return view('dashboard', [
            'username' => $request->query('username', 'Tamu'),
            'stats'    => $stats,
            'top'      => $top,
            'banned'   => $heroes->where('ban', '>=', 40)->sortByDesc('ban')->values(),
            'roles'    => $heroes->groupBy('role')->map->count(),
        ]);
    }

    // ---------- PROFILE ----------
    public function profile(Request $request)
    {
        return view('profile', [
            'username'  => $request->query('username', 'Tamu'),
            'totalHero' => count($this->getHeroes()),
        ]);
    }

    // ---------- PENGELOLAAN ----------
    public function pengelolaan(Request $request)
    {
        $heroes = collect($this->getHeroes())
            ->sortByDesc('win')
            ->values();

        return view('pengelolaan', [
            'username' => $request->query('username', 'Tamu'),
            'heroes'   => $heroes,
        ]);
    }
}
