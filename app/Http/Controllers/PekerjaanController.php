<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PekerjaanController extends Controller
{
    public function index()
    {
        return view('ADMIN/Pekerjaan/permintaan', [
            'tittle' => 'Permintaan Pengajuan',
            'pekerjaans' => Pekerjaan::get()
        ]);
    }
    public function ongoing()
    {
        return view('ADMIN/Pekerjaan/berjalan', [
            'tittle' => 'Pekerjaan Tersedia',
            'pekerjaans' => Pekerjaan::get()
        ]);
    }

    public function ajukan()
    {
        return view('USER/Pekerjaan/ajukan', [
            'tittle' => 'Detail Pekerjaan',
            'name' => 'Chalifahdien Hamud'

        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'tenggat_waktu' => 'required|date',
            'lampiran' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048'
        ]);

        $validatedData['id_status'] = 1;
        $validatedData['id_pengguna'] = Auth::id();

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filePath = $file->store('lampiran', 'public'); // Menyimpan file ke direktori 'lampiran' di penyimpanan publik
            $validatedData['lampiran'] = $filePath;
        }

        Pekerjaan::create($validatedData);

        return redirect('/ajukan')->with(
            'success',
            'Pekerjaan berhasil diajukan!'
        );
    }

}
