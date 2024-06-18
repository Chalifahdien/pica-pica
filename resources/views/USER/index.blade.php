<x-layout>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
    <x-slot:nama>Chalifahdien</x-slot:nama>
    {{-- @auth --}}
        {{-- {{ Auth::user->nama_lengkap }} --}}
    {{-- @endauth --}}

    <!-- Page Heading -->

    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <hr>
</x-layout>
