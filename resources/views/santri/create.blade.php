@extends('template.template')

@section('title', 'Tambah Santri')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <img src="{{ asset('images/bq-circle-2.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 15%; height: auto;">
                    <h4>Tambah Santri</h4>
                </div>

                <div class="card-body px-4 py-4">
                    <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <!-- Input Nama Santri -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="nama_santri" class="form-label fw-bold mb-3">Nama Santri</label>
                                    <input type="text" class="form-control" id="nama_santri" name="nama_santri" required>
                                </div>
                            </div>

                            <!-- Input NIK -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="nik" class="form-label fw-bold mb-3">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" required>
                                </div>
                            </div>

                            <!-- Dropdown Kelas -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="kelas" class="form-label fw-bold mb-3">Kelas</label>
                                    <select class="form-select" id="kelas" name="kelas" required onchange="updateKamarOptions()">
                                        <option value="">Pilih Kelas</option>
                                        <option value="7">Kelas 7</option>
                                        <option value="8">Kelas 8</option>
                                        <option value="9">Kelas 9</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Dropdown Kamar -->
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="kamar" class="form-label fw-bold mb-3">Kamar</label>
                                    <select class="form-select" id="kamar" name="kamar" required>
                                        <option value="">Pilih Kamar</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Input Tanggal Lahir -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="tanggal_lahir" class="form-label fw-bold mb-3">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                            </div>

                            <!-- Input Alamat -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="alamat" class="form-label fw-bold mb-3">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                            </div>

                            <!-- Input Nomor Telepon -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="nomor_telepon" class="form-label fw-bold mb-3">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon">
                                </div>
                            </div>

                            <!-- Input Gambar -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="gambar" class="form-label fw-bold mb-3">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                </div>
                            </div>

                        </div>

                        <div class="d-flex gap-3 mt-2">
                            <!-- Back Button with Icon -->
                            <a href="{{ route('santri.index') }}" class="btn btn-light flex-fill">
                                Kembali
                            </a>

                            <!-- Save Button with Icon -->
                            <button type="submit" class="btn btn-primary flex-fill">
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
    const kelas7 = @json($kelas7);
    const kelas8 = @json($kelas8);
    const kelas9 = @json($kelas9);

    function updateKamarOptions() {
        const kelasSelect = document.getElementById('kelas');
        const kamarSelect = document.getElementById('kamar');
        const selectedKelas = kelasSelect.value;

        kamarSelect.innerHTML = '<option value="">Pilih Kamar</option>'; // Reset options

        let kamarOptions = [];
        if (selectedKelas === '7') {
            kamarOptions = kelas7;
        } else if (selectedKelas === '8') {
            kamarOptions = kelas8;
        } else if (selectedKelas === '9') {
            kamarOptions = kelas9;
        }

        kamarOptions.forEach(kamar => {
            const option = document.createElement('option');
            option.value = kamar;
            option.textContent = kamar;
            kamarSelect.appendChild(option);
        });
    }
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

    .form-control:focus, .form-select:focus {
        border-color: #dee2e6;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }

    .btn-primary {
        background-color: #0d6efd;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }

    .btn-light {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    .btn-light:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
</style>
@endpush
