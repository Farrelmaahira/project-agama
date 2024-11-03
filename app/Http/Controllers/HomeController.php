<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{
    public $urlAPI = 'https://al-quran-8d642.firebaseio.com';

    private function slugMaker($string)
    {
        // Convert string to lowercase
        $str = strtolower($string);

        // Replace the spaces with hyphens
        $str = str_replace(' ', '-', $str);

        // Remove the special characters
        $str = preg_replace('/[^a-z0-9\-]/', '', $str);

        // Remove the consecutive hyphens
        $str = preg_replace('/-+/', '-', $str);

        // Trim hyphens from the beginning
        // and ending of String
        $str = trim($str, '-');

        return $str;
    }

    public function index()
    {
        try {
            $data = [];
            if (Cache::has('list-surah')) {
                $data = Cache::get('list-surah');
            } else {
                $data = Cache::remember('list-surah', now()->addMinutes(150), function () {
                    $res = Http::get($this->urlAPI . '/data.json?print=pretty')->json();
                    foreach ($res as $key => $value) {
                        $res[$key]['slug'] = $this->slugMaker($value['nama']);
                    }
                    return $res;
                });
            }

            $dataKajian = Kajian::latest()->take(4)->get();
            return view('user.welcome', ['data' => $data, 'kajian' => $dataKajian]);
        } catch (\Throwable $e) {
            return view('user.welcome')->with('error', $e);
        }
    }

    public function show(int $id)
    {
        try {
            $data = [];

            if (Cache::has('surah-' . $id)) {
                $data = Cache::get('surah-' . $id);
                return view('user.surah.detail', ['data' => $data]);
            }

            $data = Cache::remember('surah-' . $id, now()->addMinutes(150), function () use ($id) {
                $res = Http::get($this->urlAPI . '/surat/' . $id . '.json?print=pretty')->json();

                $newData = collect($res)->map(function ($item) use ($id) {
                    // Check if it's Surah Al-Fatihah (Surah 1)
                    if ($id === 1 && $item['nomor'] === '1') {
                        // Keep Bismillah as part of the first ayah for Surah Al-Fatihah
                        $item['bismillah'] = null;
                    } else {
                        // Separate Bismillah for other Surahs
                        if (Str::contains($item['ar'], 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ')) {
                            $item['bismillah'] = 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ';
                            $item['ar'] = str_replace('بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ', '', $item['ar']);
                        } else {
                            $item['bismillah'] = null;
                        }
                    }

                    return $item;
                });

                return $newData;
            });

            return view('user.surah.detail', ['data' => $data]);
        } catch (\Throwable $e) {
            return view('user.surah.detail')->with('error', $e->getMessage());
        }
    }


}
