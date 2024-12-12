@extends('template.template')

@section('title', 'Tambah Ziyadah')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <img src="{{ asset('images/bq-circle-2.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 15%; height: auto;">
                    <h4>Tambah data ziyadah</h4>
                </div>

                <div class="card-body px-4 py-4">
                    <form action="{{ route('ziyadah.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="santri_id" class="form-label fw-bold mb-3">Nama Santri</label>
                                    <select class="form-select" id="santri_id" name="santri_id" required>
                                        <option value="" disabled selected>Pilih santri</option>
                                        @foreach ($santris as $santri)
                                            <option value="{{ $santri->id }}">{{ $santri->nama_santri }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="juz" class="form-label fw-bold mb-3">Juz</label>
                                    <input type="number" class="form-control" id="juz" name="juz" min="1" max="30" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="surat" class="form-label fw-bold mb-3">Surat</label>
                                    <input type="text" class="form-control" id="surat" name="surat" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="ayat" class="form-label fw-bold mb-3">Ayat</label>
                                    <input type="text" class="form-control" id="ayat" name="ayat" required>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="tanggal_ziyadah" class="form-label fw-bold mb-3">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_ziyadah" name="tanggal_ziyadah" required>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="catatan" class="form-label fw-bold mb-3">Catatan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Tambahkan catatan jika diperlukan"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mt-2">
                            <a href="{{ route('ziyadah.index') }}" class="btn btn-light flex-fill">
                                Kembali
                            </a>
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