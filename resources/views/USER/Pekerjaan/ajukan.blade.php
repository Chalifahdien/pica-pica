<x-layout>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
    <x-slot:nama>{{ $name }}</x-slot:nama>
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8">
                    <h3 class="text-primary">Mengajukan Pekerjaan</h3>
                    <h5 class="card-title mb-4">Memasukan Informasi Pekerjaan</h5>
                    <form action="/ajukan" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="small mb-1" for="judul">Masukan Judul Pekerjaan</label>
                            <input class="form-control" name="judul" id="judul" type="text"
                                placeholder="Judul Pekerjaan" required />
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="deskripsi">Masukan Deskripsi Pekerjaan</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Pekerjaan" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="kategori">Masukan Kategori Pekerjaan</label>
                            <input class="form-control" name="kategori" id="kategori" type="text"
                                placeholder="Kategori Pekerjaan" required />
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="tenggat_waktu">Masukan Tenggat Waktu Pekerjaan</label>
                            <input class="form-control" name="tenggat_waktu" id="tenggat_waktu" type="date"
                                placeholder="Tenggat Waktu Pekerjaan" required />
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="lampiran">Masukan Lampiran Mengenai Pekerjaan</label>
                            <input class="form-control" name="lampiran" id="lampiran" type="file"
                                placeholder="Lampiran Pekerjaan" />
                        </div>
                        <hr class="my-4" />
                        <button class="btn btn-primary btn-user btn-block" type="submit">
                            Ajukan Pekerjaan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
