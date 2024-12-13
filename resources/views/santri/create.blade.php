@extends('template.template')

@section('title', 'Tambah Santri')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card border-0 shadow-lg rounded-lg">
                    <div class="card-header text-center bg-primary text-white rounded-top">
                        <img src="{{ asset('images/bq-circle-2.png') }}" alt="Logo" class="img-fluid mb-3"
                            style="max-width: 15%; height: auto;">
                        <h4>Tambah Santri</h4>
                    </div>

                    <div class="card-body px-5 py-4">
                        <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Input Nama Santri -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="nama_santri" class="form-label fw-bold mb-3">Nama Santri</label>
                                        <input type="text" class="form-control shadow-sm" id="nama_santri"
                                            name="nama_santri" required>
                                    </div>
                                </div>

                                <!-- Input NIK -->  
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="nik" class="form-label fw-bold mb-3">NIK</label>
                                        <input type="text" class="form-control shadow-sm" id="nik" name="nik"
                                            required>
                                    </div>
                                </div>

                                <!-- Dropdown Kelas -->
                                <div class="col-md-6 mb-3">
                                    <label for="kelas" class="form-label fw-bold mb-3">Kelas</label>
                                    <select class="form-select" name="kelas" id="kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        <option value="7A">Kelas 7A</option>
                                        <option value="7B">Kelas 7B</option>
                                        <option value="8A">Kelas 8A</option>
                                        <option value="8B">Kelas 8B</option>
                                        <option value="9A">Kelas 9A</option>
                                        <option value="9B">Kelas 9B</option>
                                    </select>
                                </div>


                                <!-- Dropdown Kamar -->
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="kamar" class="form-label fw-bold mb-3">Kamar</label>
                                        <select class="form-select shadow-sm" id="kamar" name="kamar" required>
                                            <option value="">Pilih Kamar</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Input Tanggal Lahir -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="tanggal_lahir" class="form-label fw-bold mb-3">Tanggal Lahir</label>
                                        <input type="date" class="form-control shadow-sm" id="tanggal_lahir"
                                            name="tanggal_lahir">
                                    </div>
                                </div>

                                <!-- Input Alamat -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="alamat" class="form-label fw-bold mb-3">Alamat</label>
                                        <input type="text" class="form-control shadow-sm" id="alamat" name="alamat">
                                    </div>
                                </div>

                                <!-- Input Nomor Telepon -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="nomor_telepon" class="form-label fw-bold mb-3">Nomor Telepon</label>
                                        <input type="text" class="form-control shadow-sm" id="nomor_telepon"
                                            name="nomor_telepon">
                                    </div>
                                </div>

                                <!-- Input Gambar -->
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="gambar" class="form-label fw-bold mb-3">Gambar</label>
                                        <input type="file" class="form-control shadow-sm" id="gambar" name="gambar"
                                            accept="image/*">
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex gap-3 mt-4">
                                <!-- Back Button with Icon -->
                                <a href="{{ route('santri.index') }}" class="btn btn-light flex-fill py-2">
                                    Kembali
                                </a>

                                <!-- Save Button with Icon -->
                                <button type="submit" class="btn btn-primary flex-fill py-2">
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('kelas').addEventListener('change', function() {
            const kelas = this.value; // Mengambil nilai kelas yang dipilih
            const kamarSelect = document.getElementById('kamar'); // Referensi ke dropdown kamar

            let kamarOptions = []; // Inisialisasi array untuk opsi kamar

            // Menentukan kamar berdasarkan kelas yang dipilih
            if (kelas === '7A') {
                kamarOptions = @json($kelas7A);
            } else if (kelas === '7B') {
                kamarOptions = @json($kelas7B);
            } else if (kelas === '8A') {
                kamarOptions = @json($kelas8A);
            } else if (kelas === '8B') {
                kamarOptions = @json($kelas8B);
            } else if (kelas === '9A') {
                kamarOptions = @json($kelas9A);
            } else if (kelas === '9B') {
                kamarOptions = @json($kelas9B);
            }

            // Mengosongkan opsi kamar yang lama, tetap menyimpan opsi 'Pilih Kamar'
            kamarSelect.innerHTML = ''; // Kosongkan opsi lama terlebih dahulu

            // Menambahkan opsi 'Pilih Kamar' sebagai opsi pertama
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Pilih Kamar';
            kamarSelect.appendChild(defaultOption);

            // Menambahkan kamar yang sesuai setelah opsi 'Pilih Kamar'
            kamarOptions.forEach(function(kamar) {
                const option = document.createElement('option');
                option.value = kamar;
                option.textContent = kamar;
                kamarSelect.appendChild(option);
            });
        });

        // Memicu perubahan kamar jika kelas sudah dipilih sebelumnya
        document.getElementById('kelas').dispatchEvent(new Event('change'));
    </script>

@endsection

@push('styles')
    <style>
        .form-label {
            font-size: 1rem;
            color: #2d3748;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.2);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .btn-light {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-light:hover {
            background-color: #e9ecef;
            border-color: #ced4da;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-body {
            padding: 2rem;
        }

        .text-muted {
            color: #6c757d;
        }

        .shadow-sm {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }

            .btn-light,
            .btn-primary {
                font-size: 0.9rem;
                padding: 0.75rem;
            }
        }
    </style>
@endpush
