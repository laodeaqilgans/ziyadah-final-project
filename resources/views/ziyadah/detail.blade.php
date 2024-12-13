@extends('template.template')

@section('title', 'Detail Ziyadah')

@section('content')
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="h3 mb-4 text-primary">Detail Ziyadah</h1>
        </div>

        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('ziyadah.index') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>

            <!-- Hapus Button -->
            <form action="{{ route('ziyadah.destroy', $ziyadah->id) }}" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-outline-danger shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                    <i class="fas fa-trash me-2"></i>Hapus
                </button>
            </form>
        </div>

        <div class="row g-4">
            <!-- Informasi Santri -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-user me-2"></i> Informasi Santri
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-4">
                            <div class="flex-shrink-0">
                                @if ($ziyadah->santri->gambar)
                                    <img src="{{ asset('storage/images/santri/' . $ziyadah->santri->gambar) }}"
                                        alt="{{ $ziyadah->santri->nama_santri }}" class="profile-image">
                                @else
                                    <div class="profile-placeholder">
                                        <i class="fas fa-user fa-3x text-secondary"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fw-bold mb-3">{{ $ziyadah->santri->nama_santri }}</h5>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <small class="text-secondary d-block">NIK</small>
                                            <span>{{ $ziyadah->santri->nik }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <small class="text-secondary d-block">Kamar</small>
                                            <span>{{ $ziyadah->santri->kamar }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <small class="text-secondary d-block">Kelas</small>
                                            <span>{{ $ziyadah->santri->kelas }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <small class="text-secondary d-block">Tanggal Lahir</small>
                                            <span>{{ $ziyadah->santri->tanggal_lahir ? \Carbon\Carbon::parse($ziyadah->santri->tanggal_lahir)->format('d M Y') : '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Ziyadah -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-book-open me-2"></i> Detail Ziyadah
                    </div>
                    <div class="card-body">
                        <div class="row g-3 mb-4">
                            <div class="col-sm-4">
                                <div class="stat-card">
                                    <h6 class="text-dark mb-2">Juz</h6>
                                    <div class="stat-value">{{ $ziyadah->juz }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-card">
                                    <h6 class="text-dark mb-2">Surat</h6>
                                    <div class="stat-value">{{ $ziyadah->surat }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-card">
                                    <h6 class="text-dark mb-2">Ayat</h6>
                                    <div class="stat-value">{{ $ziyadah->ayat }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-secondary mb-2">Catatan</h6>
                            <p class="mb-0">{{ $ziyadah->catatan ?? 'Tidak ada catatan' }}</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-secondary mb-2">Tanggal Ziyadah</h6>
                            <p class="mb-0">{{ \Carbon\Carbon::parse($ziyadah->tanggal_ziyadah)->format('d M Y') }}</p>
                        </div>

                        <button class="btn btn-primary w-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fas fa-edit me-2"></i>Edit Data
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Ziyadah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('ziyadah.update', $ziyadah->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Santri</label>
                                <select class="form-select" name="santri_id" required>
                                    <option value="{{ $ziyadah->santri->id }}">{{ $ziyadah->santri->nama_santri }}
                                    </option>
                                </select>
                            </div>

                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Juz</label>
                                        <input type="text" class="form-control" name="juz"
                                            value="{{ $ziyadah->juz }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Surat</label>
                                        <input type="text" class="form-control" name="surat"
                                            value="{{ $ziyadah->surat }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Ayat</label>
                                        <input type="text" class="form-control" name="ayat"
                                            value="{{ $ziyadah->ayat }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Ziyadah</label>
                                        <input type="text" class="form-control" name="tanggal_ziyadah"
                                            value="{{ $ziyadah->tanggal_ziyadah }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea class="form-control" name="catatan" rows="3">{{ $ziyadah->catatan }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Ziyadah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data Ziyadah ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                        <!-- Form Delete -->
                        <form action="{{ route('ziyadah.destroy', $ziyadah->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/ziyadah.css') }}">
        <style>
            .profile-image {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                object-fit: cover;
            }

            .profile-placeholder {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                background-color: #f0f0f0;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .stat-card {
                border: 1px solid #dee2e6;
                padding: 20px;
                text-align: center;
                border-radius: 8px;
                background-color: #f8f9fa;
            }

            .stat-value {
                font-size: 1.25rem;
                font-weight: bold;
                color: #007bff;
            }

            .modal-content {
                border-radius: 8px;
            }

            .btn-outline-danger:hover {
                background-color: #f8d7da;
            }

            .btn-outline-secondary:hover {
                background-color: #e2e6ea;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
                    }
                });
            });
        </script>
    @endpush
@endsection
