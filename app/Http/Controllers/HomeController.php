<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public $urlAPI = 'https://al-quran-8d642.firebaseio.com';

    public function index()
    {
        if(Cache::has('list-surah')) {
            $data = Cache::get('list-surah');
            return view('welcome', data: ['data' => $data]);
        }

        $res = Cache::remember('list-surah', now()->addMinutes(150), function(){
           return Http::get($this->urlAPI . '/data.json?print=pretty')->json();
        });

        return view('welcome', data: ['data' => $res]);
    }

    public function show($id)
    {
    
    }



}
