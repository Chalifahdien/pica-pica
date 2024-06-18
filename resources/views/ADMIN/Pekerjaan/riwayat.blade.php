<x-layout-admin>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Riwayat Pekerjaan</h1>
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
                            @if ($pekerjaan['id_status'] == 3)
                                <tr>
                                    <td>
                                        <div class="card card-header-actions">
                                            <div class="card-header py-3">
                                                <span class="m-0 font-weight-bold text-primary">
                                                    {{ $pekerjaan['judul'] }}
                                                </span> | <a href="#">By {{ $pekerjaan['id_pengguna'] }}</a>
                                            </div>
                                            <div class="card-body">
                                                {{ $pekerjaan['deskripsi'] }}
                                                <p class="card-text">
                                                    {{ $pekerjaan['kategori'] }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-body-secondary">
                                                        Tenggat Waktu : {{ $pekerjaan['tenggat_waktu'] }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layout-admin>
