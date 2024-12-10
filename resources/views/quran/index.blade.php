@extends('template.template')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Al-Quran Digital</h1>

    @if(isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif

    @if(isset($surahs) && count($surahs) > 0)
        <div class="row">
            @foreach($surahs as $surah)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title">
                                    {{ $surah['namaLatin'] }}
                                    <small class="d-block text-muted">{{ $surah['nama'] }}</small>
                                </h5>
                                <span class="badge bg-primary">{{ $surah['nomor'] }}</span>
                            </div>
                            
                            <p class="card-text">{{ $surah['arti'] }}</p>
                            
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt"></i> {{ $surah['tempatTurun'] }} |
                                    <i class="fas fa-book-open"></i> {{ $surah['jumlah_ayat'] }} Ayat
                                </small>
                            </div>

                            @if($surah['audio'])
                                <div class="audio-player mb-3">
                                    <audio controls class="w-100">
                                        <source src="{{ $surah['audio'] }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('quran.surah', $surah['nomor']) }}" class="btn btn-primary">
                                    Baca Surah
                                </a>
                                <a href="{{ route('quran.tafsir', $surah['nomor']) }}" class="btn btn-outline-secondary">
                                    Tafsir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
}

.audio-player audio {
    max-width: 100%;
}

.badge {
    font-size: 1rem;
    padding: 0.5rem 1rem;
}
</style>
@endsection