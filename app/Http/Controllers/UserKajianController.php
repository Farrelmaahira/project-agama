<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserKajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {
            $data = Kajian::all();
            $collectedData = collect($data);
            $collectedData->map(function($item){
                $date = $item->tanggal;
                $formattedDate = Carbon::parse($date)->translatedFormat('l, d F Y');
                $item->tanggal = $formattedDate;
                return $item;
            });

            return view('user.kajian.kajian', ['data' => $collectedData]);
        } catch (\Throwable $th) {
            return redirect()->intended('/kajian')->with('error', $th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
