@extends('template.template')

@section('title', 'Tafsir - ' . $tafsir['namaLatin'])

@section('content')
    <div class="container my-5">
        @if (isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        @if (isset($tafsir))
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ url('baca') }}" class="btn btn-secondary rounded-pill px-4 py-2"><i
                        class="fas fa-arrow-left"></i> Kembali</a>
                <a href="{{ url('surah/' . $surah['nomor']) }}" class="btn btn-info rounded-pill px-4 py-2 ms-2"><i
                        class="fas fa-book"></i> Tafsir</a>
            </div>

            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="mb-0 text-primary">Tafsir {{ $tafsir['namaLatin'] }}</h1>
                            <h2 class="h4 text-muted">{{ $tafsir['nama'] }} - {{ $tafsir['arti'] }}</h2>
                        </div>
                        <span class="badge bg-primary rounded-pill py-2 px-3">{{ $tafsir['nomor'] }}</span>
                    </div>

                    <div class="tafsir-content">
                        @foreach ($tafsir['tafsir'] as $item)
                            <div class="tafsir-item mb-4 p-4 border rounded shadow-sm">
                                <h3 class="h5 mb-3 text-primary">
                                    Ayat {{ $item['ayat'] }}
                                </h3>
                                <p class="text-justify text-muted" style="line-height: 1.6;">
                                    {{ $item['teks'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    <style>
        .tafsir-item {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 1.5rem;
            transition: background-color 0.3s, transform 0.3s ease-in-out;
        }

        .tafsir-item:hover {
            background-color: #f8f9fa;
            transform: translateY(-5px);
        }

        .badge {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 50rem;
        }

        .btn-secondary {
            font-size: 1rem;
            padding: 0.5rem 1.5rem;
        }

        .tafsir-content {
            margin-top: 2rem;
        }

        .text-justify {
            text-align: justify;
        }

        .text-muted {
            color: #6c757d;
        }

        .btn-secondary {
            font-size: 1rem;
            padding: 0.5rem 1.5rem;
        }

        /* Add a subtle shadow to card and items */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        /* For smaller devices */
        @media (max-width: 768px) {
            .btn-secondary {
                padding: 0.5rem 1rem;
            }

            .tafsir-item {
                padding: 1rem;
            }

            .tafsir-content {
                margin-top: 1.5rem;
            }
        }
    </style>

@endsection
