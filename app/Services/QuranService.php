<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class QuranService
{
    protected $baseUrl = 'https://equran.id/api/v2';
    protected $qaris = [
        '01' => 'Abdullah Al Juhany',
        '02' => 'Abdul Muhsin Al Qasim',
        '03' => 'Abdurrahman as Sudais',
        '04' => 'Ibrahim Al Dossari',
        '05' => 'Misyari Rasyid Al Afasi'
    ];

    public function getAllSurahs()
    {
        return $this->makeRequest('surat');
    }

    public function getSurah($surahNumber)
    {
        return $this->makeRequest("surat/$surahNumber");
    }

    public function getVerse($surahNumber, $verseNumber)
    {
        return $this->makeRequest("ayat/$surahNumber/$verseNumber");
    }

    public function getTafsir($surahNumber)
    {
        return $this->makeRequest("tafsir/$surahNumber");
    }

    public function getQaris()
    {
        return $this->qaris;
    }

    protected function makeRequest($endpoint)
    {
        $cacheKey = "quran_api_{$endpoint}";
        
        return Cache::remember($cacheKey, 3600, function () use ($endpoint) {
            try {
                $response = Http::get("{$this->baseUrl}/{$endpoint}");
                
                if ($response->successful()) {
                    return $response->json();
                }
                
                return ['error' => 'Failed to fetch data from API'];
            } catch (\Exception $e) {
                return ['error' => 'An error occurred: ' . $e->getMessage()];
            }
        });
    }
}