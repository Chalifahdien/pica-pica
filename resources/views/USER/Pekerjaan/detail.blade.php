<x-layout>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
    <x-slot:nama>{{ $name }}</x-slot:nama>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pekerjaan yang tersedia</h1>
    <!-- DataTales Example -->
    <div class="card card-header-actions">
        <div class="card-header py-3">
            <span class="m-0 font-weight-bold text-primary">
                {{ $pekerjaan['judul'] }}
            </span> | <a href="#">By {{ $pekerjaan->pengguna->nama_lengkap }}</a>
        </div>
        <div class="card-body">
            {{ $pekerjaan['deskripsi'] }}
            <p class="card-text">
                {{ $pekerjaan['kategori'] }}
            </p>
            <p class="card-text">
                <small class="text-body-secondary">
                    Tenggat Waktu : {{ $pekerjaan->tenggat_waktu }}
                </small>
            </p>
            <p>
                <img class="rounded" src="{{ $pekerjaan->pengguna->foto_profil }}" alt="" style="width: 300px">
            </p>

            <a href="/ambil" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</x-layout>
