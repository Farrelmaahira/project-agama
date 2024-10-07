<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public $urlAPI = 'https://api.quran.gading.dev';

    public function index()
    {
        if(Cache::has('data')) {
            $data = Cache::get('data');
            return view('pages.home.home', ['data' => $data]);
        }

        $res = Cache::remember('data', now()->addMinutes(150), function(){
           return Http::get($this->urlAPI . '/surah')->json();
        });

        return view('pages.home.home', ['data' => $res]);
    }



}
