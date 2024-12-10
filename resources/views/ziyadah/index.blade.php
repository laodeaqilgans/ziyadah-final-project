@extends('template.template') <!-- Menggunakan template utama -->

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Daftar Ziyadah</h1>

        <!-- Card Gambar di atas Tabel -->
        <div class="card mb-4">
            <img src="{{ asset('images/card.jpg') }}" class="card-img-top" alt="Ziyadah Image"
                style="height: 210px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Pentingnya Melakukan Ziyadah</h5>
                <p class="card-text">Ziyadah adalah aktivitas tambahan yang sangat bermanfaat untuk meningkatkan kualitas
                    ibadah dan pemahaman agama. Setiap langkah dalam aktivitas ini memiliki nilai yang besar, baik untuk
                    diri sendiri maupun untuk orang lain.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Semua Kegiatan Ziyadah
            </div>
            <div class="card-body">
                <!-- Menambahkan table-responsive agar tabel bisa digulir secara horizontal di perangkat kecil -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Santri</th>
                                <th>Ziyadah</th>
                                <th>Catatan</th>
                                <th>Tanggal Ziyadah</th>
                                <th>Aksi</th> <!-- Kolom Aksi Baru -->
                            </tr>
                        </thead>
                        <!-- Bagian Tabel di Index -->
                        <tbody>
                            @foreach ($ziyadah as $ziyadah_item)
                                <tr>
                                    <!-- Mengakses nama santri dari relasi -->
                                    <td>{{ $ziyadah_item->santri->nama_santri }}</td> 
                                    <td>{{ $ziyadah_item->juz }} - {{ $ziyadah_item->surat }} ({{ $ziyadah_item->ayat }})</td>
                                    <td>{{ Str::limit($ziyadah_item->catatan, 50) }}</td>
                                    <td>{{ $ziyadah_item->tanggal_ziyadah }}</td>
                                    <td>
                                        <!-- Tombol Detail -->
                                        <a href="{{ route('ziyadah.show', $ziyadah_item->id) }}" class="btn btn-detail">
                                            <i class="fas fa-info-circle"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- Tombol untuk menambah Ziyadah dengan ikon -->
                <a href="{{ route('ziyadah.create') }}" class="btn btn-primary mt-3">
                    Tambah ziyadah
                </a>
            </div>
        </div>
    </div>
@endsection
