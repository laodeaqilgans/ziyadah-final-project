@extends('template.template')

@section('content')
<div class="container my-5">
    @if(isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif

    @if(isset($tafsir))
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="mb-0">Tafsir {{ $tafsir['namaLatin'] }}</h1>
                        <h2 class="h4 text-muted">{{ $tafsir['nama'] }} - {{ $tafsir['arti'] }}</h2>
                    </div>
                    <span class="badge bg-primary">{{ $tafsir['nomor'] }}</span>
                </div>

                <div class="tafsir-content">
                    @foreach($tafsir['tafsir'] as $item)
                        <div class="tafsir-item mb-4 p-4 border-bottom">
                            <h3 class="h5 mb-3">
                                Ayat {{ $item['ayat'] }}
                            </h3>
                            <p class="text-justify">{{ $item['teks'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>

<style>
.tafsir-item {
    background-color: #fff;
    border-radius: 8px;
    transition: background-color 0.2s;
}

.tafsir-item:hover {
    background-color: #f8f9fa;
}

.badge {
    font-size: 1rem;
    padding: 0.5rem 1rem;
}

.text-justify {
    text-align: justify;
}
</style>
@endsection