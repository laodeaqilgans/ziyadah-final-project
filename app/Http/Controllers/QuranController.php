<?php

namespace App\Http\Controllers;

use App\Services\QuranService;
use Illuminate\Http\Request;

class QuranController extends Controller
{
    protected $quranService;

    public function __construct(QuranService $quranService)
    {
        $this->quranService = $quranService;
    }

    public function index()
    {
        $response = $this->quranService->getAllSurahs();
        $qaris = $this->quranService->getQaris();
        
        if (!isset($response['error'])) {
            $surahs = collect($response['data'])->map(function ($surah) {
                return [
                    'nomor' => $surah['nomor'],
                    'nama' => $surah['nama'],
                    'namaLatin' => $surah['namaLatin'],
                    'jumlah_ayat' => $surah['jumlahAyat'],
                    'tempatTurun' => $surah['tempatTurun'],
                    'arti' => $surah['arti'],
                    'deskripsi' => $surah['deskripsi'],
                    'audio' => $surah['audioFull']['01'] ?? null,
                ];
            });
            return view('quran.index', compact('surahs', 'qaris'));
        }

        return view('quran.index', ['error' => $response['error'], 'qaris' => $qaris]);
    }

    public function showSurah($number, Request $request)
    {
        $response = $this->quranService->getSurah($number);
        $qaris = $this->quranService->getQaris();
        $selectedQari = $request->get('qari', '01');
        
        if (!isset($response['error'])) {
            $surah = $response['data'];
            return view('quran.surah', compact('surah', 'qaris', 'selectedQari'));
        }

        return view('quran.surah', ['error' => $response['error'], 'qaris' => $qaris]);
    }

    public function showVerse($surahNumber, $verseNumber)
    {
        $response = $this->quranService->getVerse($surahNumber, $verseNumber);
        
        if (!isset($response['error'])) {
            $verse = $response['data'];
            return view('quran.verse', compact('verse'));
        }

        return view('quran.verse', ['error' => $response['error']]);
    }

    public function showTafsir($number)
    {
        $response = $this->quranService->getTafsir($number);
        
        if (!isset($response['error'])) {
            $tafsir = $response['data'];
            return view('quran.tafsir', compact('tafsir'));
        }

        return view('quran.tafsir', ['error' => $response['error']]);
    }

    // API endpoints for JSON responses
    public function apiGetAllSurahs()
    {
        return response()->json($this->quranService->getAllSurahs());
    }

    public function apiGetSurah($number)
    {
        return response()->json($this->quranService->getSurah($number));
    }

    public function apiGetVerse($surahNumber, $verseNumber)
    {
        return response()->json($this->quranService->getVerse($surahNumber, $verseNumber));
    }

    public function apiGetTafsir($number)
    {
        return response()->json($this->quranService->getTafsir($number));
    }
}