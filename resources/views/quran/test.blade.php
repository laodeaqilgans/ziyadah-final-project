@extends('template.template')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Data eQuran</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">eQuran Data</h5>
            <p class="card-text">This is the data fetched from the eQuran API</p>
        </div>
    </div>

    @if(isset($surahs) && count($surahs) > 0)
        <div id="quranData" class="card">
            <div class="card-body">
                <h5 class="card-title">List of Surahs</h5>
                <div class="list-group">
                    @foreach($surahs as $surah)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <h5 class="mb-1">{{ $surah['namaLatin'] }} ({{ $surah['nama'] }})</h5>
                                    <p class="mb-1">{{ $surah['arti'] }}</p>
                                    <small class="text-muted">
                                        Number of Verses: {{ $surah['jumlah_ayat'] }} | 
                                        Revealed in: {{ $surah['tempatTurun'] }}
                                    </small>
                                </div>
                                <div class="badge bg-primary">{{ $surah['nomor'] }}</div>
                            </div>
                            @if($surah['audio'])
                                <div class="audio-player">
                                    <audio controls class="w-100">
                                        <source src="{{ $surah['audio'] }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @else
                                <p class="text-muted">Audio not available</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div id="quranData" class="card">
            <div class="card-body">
                <h5 class="card-title">No Data Available</h5>
                <p class="card-text">{{ $error ?? 'No data available from the API.' }}</p>
            </div>
        </div>
    @endif
</div>

<style>
.audio-player audio {
    max-width: 100%;
    margin-top: 10px;
}

.list-group-item {
    transition: all 0.3s ease;
    padding: 1rem;
}

.list-group-item:hover {
    background-color: #f8f9fa;
}

.badge {
    font-size: 1rem;
    padding: 0.5rem 1rem;
}
</style>
@endsection