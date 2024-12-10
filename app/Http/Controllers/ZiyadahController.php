<?php

namespace App\Http\Controllers;

use App\Models\Ziyadah;
use App\Models\Santri; // Pastikan untuk menggunakan model Santri
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Pastikan Carbon di-import

class ZiyadahController extends Controller
{
    public function __construct()
    {
        // Memeriksa apakah pengguna sudah login sebelum mengakses fungsi lain
        $this->middleware(function ($request, $next) {
            if (Auth::check() === false) {
                return redirect('/login');  // Jika belum login, arahkan ke halaman login
            }
            return $next($request);
        });
    }

    // Menampilkan daftar Ziyadah
    public function index()
    {
        // Menggunakan eager loading untuk mengakses data santri yang terkait
        $ziyadah = Ziyadah::with('santri')->get();  
        return view('ziyadah.index', compact('ziyadah'));
    }

    // Menampilkan form tambah Ziyadah
    public function create()
    {
        // Ambil semua santri untuk dropdown
        $santris = Santri::all();
        return view('ziyadah.create', compact('santris'));
    }    

    // Menyimpan data Ziyadah baru
    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',  // Pastikan santri_id valid
            'juz' => 'required|integer',
            'surat' => 'required|string|max:255',
            'ayat' => 'required|string',
            'catatan' => 'nullable|string',
            'tanggal_ziyadah' => 'required|date',
        ]);

        // Menyimpan data Ziyadah baru
        Ziyadah::create([
            'santri_id' => $request->santri_id,  // Menyimpan santri_id, bukan santri
            'juz' => $request->juz,
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'catatan' => $request->catatan,
            'tanggal_ziyadah' => $request->tanggal_ziyadah,
        ]);

        return redirect()->route('ziyadah.index');
    }

    // Menampilkan form edit Ziyadah
    public function edit($id)
    {
        $ziyadah = Ziyadah::findOrFail($id);
        $santris = Santri::all();  // Mengambil semua data santri untuk dropdown atau pilihan
        return view('ziyadah.edit', compact('ziyadah', 'santris'));
    }

    // Mengupdate data Ziyadah
    public function update(Request $request, $id)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',  // Pastikan santri_id valid
            'juz' => 'required|integer',
            'surat' => 'required|string|max:255',
            'ayat' => 'required|string',
            'catatan' => 'nullable|string',
            'tanggal_ziyadah' => 'required|date',
        ]);

        $ziyadah = Ziyadah::findOrFail($id);
        $ziyadah->update([
            'santri_id' => $request->santri_id,  // Menyimpan santri_id, bukan santri
            'juz' => $request->juz,
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'catatan' => $request->catatan,
            'tanggal_ziyadah' => $request->tanggal_ziyadah,
        ]);

        return redirect()->route('ziyadah.index');
    }

    // Menghapus data Ziyadah
    public function destroy($id)
    {
        Ziyadah::destroy($id);
        return redirect()->route('ziyadah.index');
    }

    // Menampilkan detail Ziyadah
    public function show($id)
    {
        // Mengambil data Ziyadah dengan relasi ke Santri
        $ziyadah = Ziyadah::with('santri')->findOrFail($id);
    
        // Tidak perlu lagi memformat tanggal di sini, karena sudah di-handle oleh model
        return view('ziyadah.detail', compact('ziyadah'));
    }
    
}
