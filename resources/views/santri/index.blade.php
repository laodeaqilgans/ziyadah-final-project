@extends('template.template')

@section('title', 'Daftar Santri')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Santri</h1>

    <div class="mb-3 text-end">
        <a href="{{ route('santri.create') }}" class="btn btn-primary">
            Tambah Santri
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            Semua Santri
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Santri</th>
                            <th>NIK</th>
                            <th>Kamar</th>
                            <th>Kelas</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($santris as $santri)
                            <tr>
                                <td>{{ $santri->nama_santri }}</td>
                                <td>{{ $santri->nik }}</td>
                                <td>{{ $santri->kamar }}</td>
                                <td>{{ $santri->kelas }}</td>
                                <td>
                                    @if ($santri->tanggal_lahir)
                                        {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d-m-Y') }}
                                    @else
                                        Tidak ada
                                    @endif
                                </td>
                                <td>{{ $santri->alamat ?? 'Tidak ada' }}</td>
                                <td>{{ $santri->nomor_telepon ?? 'Tidak ada' }}</td>
                                <td>
                                    @if ($santri->gambar)
                                        <img src="{{ asset('storage/images/santri/' . $santri->gambar) }}" alt="{{ $santri->nama_santri }}" width="100">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSantriModal{{ $santri->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </td>
                            </tr>

                            <!-- Edit Modal for each santri -->
                            <div class="modal fade" id="editSantriModal{{ $santri->id }}" tabindex="-1" aria-labelledby="editSantriModalLabel{{ $santri->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editSantriModalLabel{{ $santri->id }}">Edit Santri: {{ $santri->nama_santri }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama_santri" class="form-label">Nama Santri</label>
                                                            <input type="text" class="form-control" id="nama_santri" name="nama_santri" value="{{ $santri->nama_santri }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nik" class="form-label">NIK</label>
                                                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $santri->nik }}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="kamar" class="form-label">Kamar</label>
                                                            <input type="text" class="form-control" id="kamar" name="kamar" value="{{ $santri->kamar }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="kelas" class="form-label">Kelas</label>
                                                            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $santri->kelas }}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $santri->tanggal_lahir }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $santri->nomor_telepon }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $santri->alamat }}</textarea>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="gambar" class="form-label">Gambar</label>
                                                            <input type="file" class="form-control" id="gambar" name="gambar">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @if ($santri->gambar)
                                                                <div class="mt-2">
                                                                    <img src="{{ asset('storage/images/santri/' . $santri->gambar) }}" alt="Preview" class="img-thumbnail" width="100">
                                                                    <p class="small text-muted">Gambar saat ini</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('santri.destroy', $santri->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus santri ini?');">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data santri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-3">
                {{ $santris->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Handle form submission feedback
    const editForms = document.querySelectorAll('form');
    editForms.forEach(form => {
        form.addEventListener('submit', function() {
            // Disable submit button to prevent double submission
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            }
        });
    });

    // Show filename in file input
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            const label = this.nextElementSibling;
            if (label && label.classList.contains('custom-file-label')) {
                label.textContent = fileName || 'Pilih file';
            }
        });
    });
</script>
@endpush
@endsection