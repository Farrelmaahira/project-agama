<?php

namespace App\Http\Controllers;

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
            if (Cache::has('list-surah')) {
                $data = Cache::get('list-surah');
                return view('user.welcome', data: ['data' => $data]);
            }

            $res = Cache::remember('list-surah', now()->addMinutes(150), function () {
                $data = Http::get($this->urlAPI . '/data.json?print=pretty')->json();
                foreach ($data as $key => $value) {

                    $data[$key]['slug'] = $this->slugMaker($value['nama']);
                }
                return $data;
            });
            return view('user.welcome', ['data' => $res]);
        } catch (\Throwable $e) {
            return view('user.welcome')->with('error', $e);
        }
    }

    public function show(int $id)
    {
        try {
            if (Cache::has('surah-' . $id)) {
                $data = Cache::get('surah-' . $id);
                return view('user.surah.detail', ['data' => $data]);
            }

            $res = Cache::remember('surah-' . $id, now()->addMinutes(150), function () use ($id) {
                return Http::get($this->urlAPI . '/surat/' . $id . '.json?print=pretty')->json();
            });

            $newData = collect($res)->map(function ($item) {
                if (Str::contains($item['ar'], 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ')) {
                    $item['bismillah'] = 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ';
                    $item['ar'] = str_replace('بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ', '', $item['ar']);
                } else {
                    $item['bismillah'] = null;
                }
                return $item;
            });

            return view('user.surah.detail', ['data' => $newData]);
        } catch (\Throwable $e) {
            return view('user.surah.detail')->with('error', $e->getMessage());
        }
    }

}
