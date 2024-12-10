<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    // Method untuk menampilkan daftar santri
    public function index()
    {
        // Mengambil data santri dengan pagination
        $santris = Santri::paginate(10); // Mengambil 10 santri per halaman

        // Mengembalikan view dengan data santri
        return view('santri.index', compact('santris'));
    }

    // Menampilkan form tambah santri
    public function create()
    {
        // Data kamar untuk setiap kelas
        $kelas7 = ['Edierne', 'Alquds', 'Astana', 'Riyadh', 'Almeria', 'Iskandariah', 'Aleppo', 'Asqalan'];
        $kelas8 = ['Kairo', 'Beirut', 'Doha', 'Baghdad', 'Sanaa', 'Gaza'];
        $kelas9 = ['Cordoba', 'Kazan', 'Sevilla', 'Istanbul', 'Vienna', 'Andalusia', 'Albania'];
    
        return view('santri.create', compact('kelas7', 'kelas8', 'kelas9'));
    }

    // Menyimpan data santri
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_santri' => 'required|string|max:255',
            'nik' => 'required|string|unique:santris,nik|max:255', // Validasi NIK
            'kamar' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date', // Validasi tanggal lahir
            'alamat' => 'nullable|string|max:255', // Validasi alamat
            'nomor_telepon' => 'nullable|string|max:15', // Validasi nomor telepon
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validasi gambar
        ]);
    
        $input = $request->all();
    
        // Mengonversi tanggal_lahir menjadi objek Carbon jika ada
        if (!empty($input['tanggal_lahir'])) {
            $input['tanggal_lahir'] = Carbon::createFromFormat('Y-m-d', $input['tanggal_lahir']);
        }

        // Jika ada gambar, simpan gambar dan simpan path-nya
        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar'); // Mengambil file gambar
            $path_simpan = 'public/images/santri'; // Menentukan path penyimpanan
            $format = $photo->getClientOriginalExtension(); // Mengambil format gambar
            $nama = 'gambar-santri-' . Carbon::now()->format('Ymd-His') . random_int(100000, 999999) . '.' . $format; // Membuat nama file unik
            $photo->storeAs($path_simpan, $nama); // Menyimpan ke path
            $input['gambar'] = $nama; // Menambahkan path gambar ke array input
        }
    
        // Menyimpan data santri
        Santri::create($input);
       
        return redirect()->route('santri.index'); // Hanya redirect tanpa notifikasi
    }

    // Menampilkan form edit santri
    public function edit($id)
    {
        // Mencari santri berdasarkan ID
        $santri = Santri::findOrFail($id);
        return view('santri.edit', compact('santri'));
    }

    // Memperbarui data santri
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_santri' => 'required|string|max:255',
            'nik' => 'required|string|unique:santris,nik,' . $id . '|max:255', // Validasi NIK
            'kamar' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date', // Validasi tanggal lahir
            'alamat' => 'nullable|string|max:255', // Validasi alamat
            'nomor_telepon' => 'nullable|string|max:15', // Validasi nomor telepon
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validasi gambar
        ]);

        // Mencari santri berdasarkan ID
        $santri = Santri::findOrFail($id);
        $input = $request->all();

        // Mengonversi tanggal_lahir menjadi objek Carbon jika ada
        if (!empty($input['tanggal_lahir'])) {
            $input['tanggal_lahir'] = Carbon::createFromFormat('Y-m-d', $input['tanggal_lahir']);
        }

        // Jika ada gambar, simpan gambar dan simpan path-nya
        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar'); // Mengambil file gambar
            $path_simpan = 'public/images/santri'; // Menentukan path penyimpanan
            $format = $photo->getClientOriginalExtension(); // Mengambil format gambar
            $nama = 'gambar-santri-' . Carbon::now()->format('Ymd-His') . random_int(100000, 999999) . '.' . $format; // Membuat nama file unik
            $photo->storeAs($path_simpan, $nama); // Menyimpan ke path
            $input['gambar'] = $nama; // Menambahkan path gambar ke array input
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $input['gambar'] = $santri->gambar;
        }

        // Memperbarui data santri
        $santri->update($input);
        
        return redirect()->route('santri.index'); // Hanya redirect tanpa notifikasi
    }

    // Menghapus santri
    public function destroy($id)
    {
        // Mencari santri berdasarkan ID
        $santri = Santri::findOrFail($id);
        
        // Menghapus gambar jika ada
        if ($santri->gambar) {
            $path = public_path('storage/images/santri/' . $santri->gambar);
            if (file_exists($path)) {
                unlink($path); // Menghapus file gambar
            }
        }

        // Menghapus data santri
        $santri->delete();
        
        return redirect()->route('santri.index'); // Hanya redirect tanpa notifikasi
    }
}