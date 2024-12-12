<?php

use App\Http\Controllers\ZiyadahController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\LoginController;

// Rute utama, arahkan ke halaman login jika belum autentikasi
Route::get('/', function () {
    return redirect()->route('login'); // Mengarahkan ke halaman login jika belum login
});

// Rute untuk login dan register
Auth::routes();

// Rute untuk Ziyadah (CRUD)
Route::resource('ziyadah', ZiyadahController::class);

// Rute setelah login, arahkan ke halaman ziyadah
Route::get('/home', function () {
    // Memeriksa jika pengguna sudah login
    if (Auth::check()) {
        return redirect()->route('ziyadah.index');  // Pengguna yang sudah login diarahkan ke halaman ziyadah
    }
    
    return redirect('/login');  // Jika belum login, arahkan ke halaman login
})->name('home');

// Rute untuk tampilan template
Route::view('tampilan', 'template.template');

// Rute untuk logout (gunakan middleware auth untuk logout)
Route::post('/logout', function () {
    Auth::logout();  // Logout pengguna
    return redirect('/login');  // Arahkan pengguna ke halaman login setelah logout
})->name('logout');

Route::resource('santri', SantriController::class);

Route::get('/quran', [QuranController::class, 'getQuranData']);
Route::get('/baca', [QuranController::class, 'index']);

Route::get('/quran', [QuranController::class, 'index'])->name('quran.index');
Route::get('/quran/surah/{number}', [QuranController::class, 'showSurah'])->name('quran.surah');
Route::get('/quran/verse/{surahNumber}/{verseNumber}', [QuranController::class, 'showVerse'])->name('quran.verse');
Route::get('/quran/tafsir/{number}', [QuranController::class, 'showTafsir'])->name('quran.tafsir');

// API Routes
Route::prefix('api/quran')->group(function () {
    Route::get('/', [QuranController::class, 'apiGetAllSurahs']);
    Route::get('/surah/{number}', [QuranController::class, 'apiGetSurah']);
    Route::get('/verse/{surahNumber}/{verseNumber}', [QuranController::class, 'apiGetVerse']);
    Route::get('/tafsir/{number}', [QuranController::class, 'apiGetTafsir']);
});
