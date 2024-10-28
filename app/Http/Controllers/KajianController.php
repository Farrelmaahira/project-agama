<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Kajian::all();
            return view('admin.kajian.kajian', ["data" => $data]);
        } catch (\Throwable $e) {
            return view('admin.kajian.kajian')->with('error', $e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kajian.add-kajian');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'judul' => ['required'],
                'tanggal' => ['required'],
                'jam' => ['required', 'date_format:H:i'],
                'description' => ['required'],
            ]);

            $time = Carbon::createFromFormat('H:i', $request->jam);

            $data = [
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'jam' => $time,
                'description' => $request->description
            ];

            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('uploads');
                $data['foto'] = $path;
            }

            $res = Kajian::create($data);
            dd($res);
            return view('admin.kajian.kajian');

        } catch (\Throwable $e) {
            dd($e);
            return view('admin.kajian.add-kajian')->with('error', $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
        } catch (\Throwable $th) {
            return view();
        }
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
