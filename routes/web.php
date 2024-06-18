<?php


use App\Models\User;
// use App\Models\Pengguna;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Middleware\EnsureUserIsAuthenticated;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;


// ----------------------LOGIN------------------------//
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/forgot-password', function () {
//     return view('LOGIN/forgot-password', ['tittle' => 'Forgot Password']);
// });

// ----------------------USER-------------------------//

Route::get('/', [UserController::class, 'index']);

Route::get('/ajukan', [PekerjaanController::class, 'ajukan']);
Route::post('/ajukan', [PekerjaanController::class, 'store']);

Route::get('/ambil', function () {
    return view('USER/Pekerjaan/ambil', [
        'tittle' => 'Pekerjaan Tersedia',
        'name' => 'Chalifahdien Hamud',
        'pekerjaans' => Pekerjaan::with('pengguna')->get()
    ]);
});

Route::get('ambil/{pekerjaan:id_pengguna}', function (Pekerjaan $pekerjaan) {
    return view('USER/Pekerjaan/detail', [
        'tittle' => 'Detail Pekerjaan',
        'name' => 'Chalifahdien Hamud',
        'pekerjaan' => $pekerjaan
    ]);
});

Route::get('pengguna/{pengguna:id_pengguna}', function (User $pengguna) {
    return view('USER/Pekerjaan/ambil', [
        'tittle' => 'Pekerjaan By' . $pengguna->nama_lengkap,
        'name' => 'Chalifahdien Hamud',
        'pekerjaans' => $pengguna->pekerjaan
    ]);
});

// Route::middleware([EnsureUserIsAuthenticated::class])->group(function () {
//     Route::get('/',[UserController::class, 'index']);
//     Route::get('/ajukan', [PekerjaanController::class, 'ajukan']);
//     Route::post('/ajukan', [PekerjaanController::class, 'store']);
//     Route::get('/ambil', function () {
//         return view('USER/Pekerjaan/ambil', [
//             'tittle' => 'Pekerjaan Tersedia',
//             'name' => 'Chalifahdien Hamud',
//             'pekerjaans' => Pekerjaan::with('pengguna')->get()
//         ]);
//     });

//     Route::get('ambil/{pekerjaan:id_pengguna}', function (Pekerjaan $pekerjaan) {
//         return view('USER/Pekerjaan/detail', [
//             'tittle' => 'Detail Pekerjaan',
//             'name' => 'Chalifahdien Hamud',
//             'pekerjaan' => $pekerjaan
//         ]);
//     });

//     Route::get('pengguna/{pengguna:id_pengguna}', function (User $pengguna) {
//         return view('USER/Pekerjaan/ambil', [
//             'tittle' => 'Pekerjaan By' . $pengguna->nama_lengkap,
//             'name' => 'Chalifahdien Hamud',
//             'pekerjaans' => $pengguna->pekerjaan
//         ]);
//     });
// });

// Route::middleware([EnsureUserIsAuthenticated::class])->group(function () {
//     Route::get('/', function () {
//         // ...
//     });

//     Route::get('/profile', function () {
//         // ...
//     });
// });


// ----------------------Admin-------------------------//
Route::get('/admin', function () {
    return view('ADMIN/index', [
        'tittle' => 'Admin',
        'pekerjaans' => Pekerjaan::get(),
        'total_pengguna' => User::count()
    ]);
});

Route::get('/user', function () {
    return view('ADMIN/user', [
        'tittle' => 'User',
        'penggunas' => User::get()
    ]);
});

Route::get('/request', [PekerjaanController::class, 'index']);
Route::get('/ongoing', [PekerjaanController::class, 'ongoing']);

// Route::get('/ongoing', function () {
//     return view('ADMIN/Pekerjaan/berjalan', ['tittle' => 'Ongoing']);
// });

Route::get('/history', function () {
    return view('ADMIN/Pekerjaan/riwayat', [
        'tittle' => 'Riwayat Pekerjaan',
        'pekerjaans' => Pekerjaan::get()
    ]);
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
