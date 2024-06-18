<x-layout>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
    <x-slot:nama>{{ $name }}</x-slot:nama>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pekerjaan yang tersedia</h1>
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <hr class="mt-0">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pekerjaans as $pekerjaan)

                                <tr>
                                    <td>
                                        <div class="card card-header-actions">
                                            <div class="card-header py-3">
                                                <span class="m-0 font-weight-bold text-primary">
                                                    {{ $pekerjaan['judul'] }}
                                                </span> | <a href="/pengguna/{{ $pekerjaan->pengguna->id_pengguna }}">By {{ $pekerjaan->pengguna->nama_lengkap }}</a>
                                            </div>
                                            <div class="card-body">
                                                {{ $pekerjaan['deskripsi'] }}
                                                <p class="card-text">
                                                    {{ $pekerjaan['kategori'] }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-body-secondary">
                                                        Tenggat Waktu : {{ $pekerjaan['tenggat_waktu'] }}
                                                        <p>
                                                            Upload at : {{ $pekerjaan->created_at->diffForHumans() }}
                                                        </p>
                                                    </small>
                                                </p>
                                                <a href="/ambil/{{ $pekerjaan['id_pengguna'] }}" class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
