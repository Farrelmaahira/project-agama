<?php

namespace App\Http\Controllers;

use App\Models\Sunnah;
use Illuminate\Http\Request;
use Throwable;

class SunnahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Sunnah::all();
            return view('admin.sunnah.sunnah', compact('data'));
        } catch (\Throwable $th) {
            
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
        try {
            $request->validate([
                'judul' => ['required'],
                'description' => ['required'],
                'foto' => ['file', 'mimes:jpg,png,gif,jpeg']
            ]);

            $payload = [
                'judul' => $request->judul,
                'description' => $request->description,
            ];

            if($request->has('foto') != null) {
                $path = $request->file('foto')->store('uploads/sunnah');
                $payload['foto'] = $path;
            }

            $data = Sunnah::create($payload);
            if($data) {
                return redirect()->intended('/admin/sunnah');
            }

        } catch (\Throwable $th) {

        }

    }

    public function show(string $id)
    {
        try {
            $data = Sunnah::find($id);

            if($data == null) {
                return redirect()->intended('/admin/sunnah');
            }

            dd($data);
        } catch(\Throwable $e) {
            dd($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = Sunnah::find($id);

            if($data == null) {
                return redirect()->intended('/admin/sunnah');
            }

            dd($data);
        } catch(\Throwable $e) {
            dd($e);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'judul' => ['required'],
                'description' => ['required'],
                'foto' => ['file', 'mimes:jpg,png,gif,jpeg']
            ]);

            $payload = [
                'judul' => $request->judul,
                'description' => $request->description,
            ];

            if($request->has('foto') != null) {
                $path = $request->file('foto')->store('uploads/sunnah');
                $payload['foto'] = $path;
            }

            $sunnah = Sunnah::find($id); 

            if($sunnah == null) {
                return redirect()->intended('/admin/sunnah')->with('error', 'Data not found');
            }

            $sunnah->update($payload);

            dd($sunnah);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Sunnah::find($id);
            if($data == null) {
                return redirect()->intended('/admin/sunnah')->with('error', 'Data not found');
            }


            $data->delete();
            if($data) {
                return redirect()->intended('/admin/sunnah');
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
