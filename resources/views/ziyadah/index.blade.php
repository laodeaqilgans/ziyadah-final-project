@extends('template.template') <!-- Menggunakan template utama -->

@section('content')
    <h1 class="mb-5 mt-5 text-center text-primary">Daftar Ziyadah</h1>

    <div class="container my-5">

        <!-- Card Gambar di atas Tabel -->
        <div class="card mb-4 shadow-sm">
            <img src="{{ asset('images/card.jpg') }}" class="card-img-top" alt="Ziyadah Image"
                style="height: 220px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title text-center">Pentingnya Melakukan Ziyadah</h5>
                <p class="card-text text-justify">Bagi seorang santri, Ziyadah atau setoran hafalan merupakan kegiatan yang sangat penting dalam menjaga kualitas hafalan Al-Qur'an. Setiap hari, santri melakukan Ziyadah untuk memastikan hafalan mereka tetap terjaga dan semakin kuat. Selain sebagai bagian dari pendidikan agama, Ziyadah juga merupakan ibadah yang mendekatkan diri kepada Allah. Aktivitas ini memberikan kesempatan bagi santri untuk terus memperdalam ilmu agama dan menjadi pribadi yang lebih baik.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Semua Kegiatan Ziyadah</h5>
            </div>
            <div class="card-body">
                <!-- Menambahkan table-responsive agar tabel bisa digulir secara horizontal di perangkat kecil -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
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
                                    <td>{{ \Carbon\Carbon::parse($ziyadah_item->tanggal_ziyadah)->format('d-m-Y') }}</td>
                                    <td>
                                        <!-- Tombol Detail -->
                                        <a href="{{ route('ziyadah.show', $ziyadah_item->id) }}" class="btn btn-detail btn-sm">
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
                    <i class="fas fa-plus-circle"></i> Tambah Ziyadah
                </a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Menambahkan sedikit bayangan pada card */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Efek hover untuk baris tabel */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling tombol */
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        /* Menambahkan margin bawah pada tombol */
        .mt-3 {
            margin-top: 1rem !important;
        }
    </style>
@endpush
