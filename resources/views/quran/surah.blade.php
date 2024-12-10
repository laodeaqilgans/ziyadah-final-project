@extends('template.template')

@section('content')
    <div class="container my-5">
        @if (isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        @if (isset($surah))
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="mb-0">{{ $surah['namaLatin'] }}</h1>
                            <h2 class="h4 text-muted">{{ $surah['nama'] }} - {{ $surah['arti'] }}</h2>
                        </div>
                        <span class="badge bg-primary">{{ $surah['nomor'] }}</span>
                    </div>

                    <div class="mb-4">
                        <p class="lead">{!! $surah['deskripsi'] !!}</p>
                        <div class="text-muted">
                            <small>
                                Tempat Turun: {{ $surah['tempatTurun'] }} |
                                Jumlah Ayat: {{ $surah['jumlahAyat'] }}
                            </small>
                        </div>
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-md-6">
                            @if (isset($surah['audioFull']))
                                <div class="audio-player">
                                    <h5>Audio Surah</h5>
                                    <audio controls class="w-100" id="surahAudio">
                                        <source src="{{ $surah['audioFull'][$selectedQari] }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center justify-content-end">
                                <form method="get" class="d-flex align-items-center">
                                    <label for="qari" class="me-2">Pilih Qari:</label>
                                    <select name="qari" id="qari" class="form-select" onchange="this.form.submit()">
                                        @foreach ($qaris as $key => $name)
                                            <option value="{{ $key }}"
                                                {{ $selectedQari == $key ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="card-title mb-0">Ayat-ayat</h3>
                        <div class="btn-group">
                            <button class="btn btn-primary" id="autoPlayToggle">
                                <i class="fas fa-play"></i> Auto Play
                            </button>
                            <button class="btn btn-secondary" id="stopButton" style="display: none;">
                                <i class="fas fa-stop"></i> Stop
                            </button>
                        </div>
                    </div>

                    @foreach ($surah['ayat'] as $ayat)
                        <div class="verse-container mb-4 p-3 border-bottom" data-ayat="{{ $ayat['nomorAyat'] }}">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="badge bg-secondary">{{ $ayat['nomorAyat'] }}</span>
                                <div class="arabic-text text-end" style="font-size: 2rem;">
                                    {{ $ayat['teksArab'] }}
                                </div>
                            </div>

                            <div class="latin-text mb-2">
                                {{ $ayat['teksLatin'] }}
                            </div>

                            <div class="translation text-muted">
                                {{ $ayat['teksIndonesia'] }}
                            </div>

                            @if (isset($ayat['audio']))
                                <div class="audio-player mt-3">
                                    <audio class="verse-audio w-100" data-ayat="{{ $ayat['nomorAyat'] }}">
                                        <source src="{{ $ayat['audio'][$selectedQari] }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <!-- Play Button -->
                                    <button class="btn btn-play" data-ayat="{{ $ayat['nomorAyat'] }}">
                                        <i class="fas fa-play"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <style>
        .verse-container {
            background-color: #fff;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .verse-container:hover {
            background-color: #f8f9fa;
        }

        .verse-container.playing {
            background-color: #e3f2fd;
            border: 1px solid #90caf9;
        }

        .arabic-text {
            font-family: "Traditional Arabic", serif;
            line-height: 1.8;
        }

        .audio-player audio {
            max-width: 100%;
        }

        .badge {
            font-size: 1rem;
            padding: 0.5rem 1rem;
        }

        /* Styling untuk tombol play bulat */
        .btn-play {
            background-color: #007bff;
            /* Warna biru tombol */
            color: white;
            border: none;
            border-radius: 50%;
            /* Membuat tombol bulat */
            padding: 10px;
            /* Ukuran tombol */
            font-size: 16px;
            /* Ukuran font lebih kecil */
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.2s ease;
            width: 40px;
            /* Lebar tombol lebih kecil */
            height: 40px;
            /* Tinggi tombol lebih kecil */
        }

        .btn-play:hover {
            background-color: #0056b3;
            /* Warna biru lebih gelap saat hover */
        }

        .btn-play:focus {
            outline: none;
            /* Menghilangkan border saat tombol difokuskan */
        }

        /* Styling untuk tombol stop bulat */
        .btn-stop {
            background-color: #dc3545;
            /* Warna merah tombol */
            color: white;
            border: none;
            border-radius: 50%;
            /* Membuat tombol bulat */
            padding: 10px;
            /* Ukuran tombol lebih kecil */
            font-size: 16px;
            /* Ukuran font lebih kecil */
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.2s ease;
            width: 40px;
            /* Lebar tombol lebih kecil */
            height: 40px;
            /* Tinggi tombol lebih kecil */
        }

        .btn-stop:hover {
            background-color: #c82333;
            /* Warna merah lebih gelap saat hover */
        }

        .btn-stop:focus {
            outline: none;
            /* Menghilangkan border saat tombol difokuskan */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const playButtons = document.querySelectorAll('.btn-play');
            const verseAudios = document.querySelectorAll('.verse-audio');
            const autoPlayButton = document.getElementById('autoPlayToggle');
            const stopButton = document.getElementById('stopButton');
            let currentAudioIndex = 0;
            let isAutoPlaying = false;
            let currentAudio = null; // Track the currently playing audio

            function playNextVerse() {
                if (!isAutoPlaying) return;

                if (currentAudioIndex < verseAudios.length) {
                    currentAudio = verseAudios[currentAudioIndex];
                    const verseContainer = document.querySelector(`[data-ayat="${currentAudio.dataset.ayat}"]`);

                    // Remove playing class from all containers
                    document.querySelectorAll('.verse-container').forEach(container => {
                        container.classList.remove('playing');
                    });

                    // Add playing class to current container
                    verseContainer.classList.add('playing');

                    // Scroll to current verse
                    verseContainer.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    currentAudio.play();

                    currentAudio.onended = function() {
                        currentAudioIndex++;
                        playNextVerse();
                    };
                } else {
                    stopAutoPlay();
                }
            }

            function startAutoPlay() {
                isAutoPlaying = true;
                currentAudioIndex = 0;
                autoPlayButton.style.display = 'none';
                stopButton.style.display = 'inline-block';
                playNextVerse();
            }

            function stopAutoPlay() {
                isAutoPlaying = false;
                currentAudioIndex = 0;
                autoPlayButton.style.display = 'inline-block';
                stopButton.style.display = 'none';

                // Remove playing class from all containers
                document.querySelectorAll('.verse-container').forEach(container => {
                    container.classList.remove('playing');
                });

                // Stop all audio
                verseAudios.forEach(audio => {
                    audio.pause();
                    audio.currentTime = 0;
                });
            }

            autoPlayButton.addEventListener('click', startAutoPlay);
            stopButton.addEventListener('click', stopAutoPlay);

            // Event listener untuk tombol play per ayat
            playButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const ayatNumber = this.getAttribute('data-ayat');
                    const audio = document.querySelector(`.verse-audio[data-ayat="${ayatNumber}"]`);

                    if (audio) {
                        // Stop current playing audio if there's any
                        if (currentAudio && !currentAudio.paused) {
                            currentAudio.pause();
                            currentAudio.currentTime = 0;
                        }

                        // Play the new selected audio
                        currentAudio = audio;
                        audio.play();

                        // Menambahkan kelas 'playing' untuk memberi efek visual pada ayat yang diputar
                        const verseContainer = document.querySelector(
                        `[data-ayat="${ayatNumber}"]`);
                        document.querySelectorAll('.verse-container').forEach(container => {
                            container.classList.remove('playing');
                        });
                        verseContainer.classList.add('playing');

                        // Scroll ke ayat yang sedang diputar
                        verseContainer.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        audio.onended = function() {
                            verseContainer.classList.remove('playing');
                        };
                    }
                });
            });
        });
    </script>
@endsection
